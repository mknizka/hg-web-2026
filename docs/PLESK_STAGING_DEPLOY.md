# Plesk pull deployment for staging

Recommended deployment model for `n.horecagroup.sk`.

## Why this model

The staging server keeps inbound SSH restricted by IP. Plesk performs the outbound pull from GitHub instead, so no public SSH access is required for GitHub Actions.

## Repository

Remote repository:

```
https://github.com/mknizka/hg-web-2026.git
```

Active branch:

```
qa/mobile-performance-v1
```

## Safe rollout

Do not deploy the repository root directly over the whole staging document root.

The repository contains only templates plus repository metadata/docs, while the staging site also contains backend files that are not in Git.

Recommended setup:

1. Websites & Domains -> n.horecagroup.sk -> Git -> Add Repository
2. Choose Remote Git hosting
3. Use the GitHub repository above
4. Start with Manual deployment
5. Clone/deploy to a separate staging folder such as `git-preview`, not directly over the live subdomain root
6. Select branch `qa/mobile-performance-v1`
7. After the repository is connected, use an Additional deployment action to synchronise only:
   `git-preview/template/` -> `n.horecagroup.sk/template/`
8. Preserve the large file that intentionally does not live in Git:
   `template/ellipse/video/manager-dashboard.mp4`
9. Copy Plesk's generated webhook URL into GitHub repository Settings -> Webhooks, trigger on push
10. After one successful manual test, switch the Plesk repository to Automatic deployment

## Example sync command

Exact relative paths depend on the Plesk subscription layout. A typical Linux subscription layout is:

```bash
rsync -a --delete-delay \
  --exclude 'ellipse/video/manager-dashboard.mp4' \
  ./git-preview/template/ \
  ./n.horecagroup.sk/template/
```

Before using this command, verify the actual working directory and paths shown by Plesk.

## Result

After setup:

ChatGPT/Cursor -> push to qa/mobile-performance-v1 -> GitHub webhook -> Plesk pull -> staging deploy -> n.horecagroup.sk

No inbound SSH access from GitHub is required.
