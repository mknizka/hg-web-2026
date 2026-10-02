"""Narrow, conflict-checked deployment using the existing staging SSH identity."""
import hashlib, json, os, pathlib, shlex, subprocess

ROOT = pathlib.Path(__file__).resolve().parents[2]
BASE = 'b80de63f0c24fd9c9a9c39311a66e42f406402a4'
TARGET = '/var/www/vhosts/horecagroup.sk/n.horecagroup.sk/template'
configured = os.environ.get('DEPLOY_TARGET', '').rstrip('/')
if configured and configured != TARGET:
    raise SystemExit('Configured target differs from reviewed staging path; no files changed')
files = ['files/hg-content.php', 'files/hg-solutions-view.php',
         'files/hg-solution-body.php', 'files/hg-solution-explore.php',
         'files/hg-solution-modules.php', 'css/hg-solution-explore.css',
         'js/hg-platform-map.js', 'css/hg-platform-map.css',
         'css/hg-typography.css', 'css/hg-icons.css', 'files/header.php',
         'files/homepage.php', 'files/hg-platform-map.php',
         'files/hg-module-page.php', 'files/hg-product-page.php']
# Include shared mobile styles and their cache-versioned consumers.
ssh = ['ssh', '-o', 'BatchMode=yes', '-o', 'ConnectTimeout=15', '-p',
       os.environ.get('DEPLOY_PORT') or '22',
       os.environ['DEPLOY_USER'] + '@' + os.environ['DEPLOY_HOST']]
backup = ROOT / 'template-backup'
backup.mkdir(exist_ok=True)
pending = []
for relative in files:
    path = 'template/ellipse/' + relative
    remote = TARGET + '/ellipse/' + relative
    desired = (ROOT / path).read_bytes()
    result = subprocess.run(ssh + ['if test -f ' + shlex.quote(remote) + '; then cat ' + shlex.quote(remote) + '; else exit 44; fi'], capture_output=True)
    if result.returncode not in (0, 44):
        raise SystemExit('Remote read failed; no files changed')
    if result.returncode == 0 and result.stdout == desired:
        continue
    old = subprocess.run(['git', 'show', BASE + ':' + path], capture_output=True)
    if (old.returncode == 0 and (result.returncode != 0 or result.stdout != old.stdout)) or (old.returncode != 0 and result.returncode != 44):
        raise SystemExit('Uncommitted server change at ' + relative + '; no files changed')
    if result.returncode == 0:
        saved = backup / relative
        saved.parent.mkdir(parents=True, exist_ok=True)
        saved.write_bytes(result.stdout)
    pending.append((remote, desired))
(backup / 'manifest.json').write_text(json.dumps([p for p, _ in pending]))
for remote, desired in pending:
    # Temporary sibling and atomic rename; no unrelated files are removed.
    command = 'umask 022; tmp=$(mktemp ' + shlex.quote(remote + '.XXXXXX') + ') && cat > "$tmp" && chmod 644 "$tmp" && mv "$tmp" ' + shlex.quote(remote)
    subprocess.run(ssh + [command], input=desired, check=True)
    check = subprocess.run(ssh + ['sha256sum ' + shlex.quote(remote)], capture_output=True, check=True)
    if check.stdout.decode().split()[0] != hashlib.sha256(desired).hexdigest():
        raise SystemExit('Post-deployment checksum mismatch')
print('Verified template files:', len(files), '; updated:', len(pending))
