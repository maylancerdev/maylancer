#!/bin/bash
set -e

# ============================================
# Auto Deploy Script (runs via cron)
# Checks GitHub for new commits every 2 minutes
# Only deploys if new changes detected
# ============================================
BRANCH="main"

PROJECT_DIR="$(cd "$(dirname "$0")" && pwd)"
LOG_DIR="${LOG_DIR:-$PROJECT_DIR/storage/logs}"

mkdir -p "$LOG_DIR"
LOG_FILE="$LOG_DIR/auto-deploy.log"

cd "$PROJECT_DIR"

git fetch origin "$BRANCH" --quiet

LOCAL=$(git rev-parse HEAD)
REMOTE=$(git rev-parse "origin/$BRANCH")

if [ "$LOCAL" = "$REMOTE" ]; then
    exit 0
fi

echo "" >> "$LOG_FILE"
echo "=== Auto-deploy started at $(date '+%Y-%m-%d %H:%M:%S') ===" >> "$LOG_FILE"
echo "Local:  $LOCAL" >> "$LOG_FILE"
echo "Remote: $REMOTE" >> "$LOG_FILE"

exec >> "$LOG_FILE" 2>&1

echo "[1/8] Stashing local changes..."
git stash 2>/dev/null || true

echo "[2/8] Pulling from $BRANCH..."
git pull origin "$BRANCH"

echo "[3/8] Installing PHP dependencies..."
composer install --no-dev --no-interaction --optimize-autoloader

echo "[4/8] Installing npm packages..."
npm install --legacy-peer-deps 2>/dev/null

echo "[5/8] Building frontend assets..."
npm run build

echo "[6/8] Running migrations..."
php artisan migrate --force --no-interaction

echo "[7/8] Optimizing..."
php artisan optimize:clear
php artisan optimize

echo "[8/8] Restarting queue workers..."
php artisan queue:restart

echo "=== Auto-deploy completed at $(date '+%Y-%m-%d %H:%M:%S') ==="
