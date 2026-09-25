#!/usr/bin/env bash
set -euo pipefail

# Safe helper for n.horecagroup.sk preview deployment.
# Default is dry-run. Pass --apply to actually copy files.

REPO_DIR="${REPO_DIR:-/var/www/vhosts/horecagroup.sk/ellipse-web}"
STAGING_DIR="${STAGING_DIR:-/var/www/vhosts/horecagroup.sk/n.horecagroup.sk/template}"
BRANCH="${BRANCH:-qa/mobile-performance-v1}"
MODE="${1:---dry-run}"

cd "$REPO_DIR"

git -c safe.directory="$REPO_DIR" fetch origin "$BRANCH"
git -c safe.directory="$REPO_DIR" switch "$BRANCH"
git -c safe.directory="$REPO_DIR" pull --ff-only origin "$BRANCH"

RSYNC_ARGS=(-a --delete-delay)

if [[ "$MODE" != "--apply" ]]; then
  RSYNC_ARGS+=(--dry-run --itemize-changes)
  echo "DRY RUN only. No staging files will be changed."
else
  echo "Applying branch $BRANCH to staging template directory."
fi

rsync "${RSYNC_ARGS[@]}" "$REPO_DIR/template/" "$STAGING_DIR/"

if [[ "$MODE" != "--apply" ]]; then
  echo
  echo "Review the changes above. Then run:"
  echo "  BRANCH=$BRANCH $0 --apply"
fi
