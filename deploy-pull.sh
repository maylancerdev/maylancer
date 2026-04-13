#!/bin/bash
set -e

# ============================================
# Manual Deploy Script
# Usage: bash deploy-pull.sh
# ============================================
BRANCH="main"

PROJECT_DIR="$(cd "$(dirname "$0")" && pwd)"
LOG_DIR="${LOG_DIR:-$PROJECT_DIR/storage/logs}"
TIMESTAMP=$(date '+%Y-%m-%d %H:%M:%S')

mkdir -p "$LOG_DIR"
LOG_FILE="$LOG_DIR/deploy.log"
exec > >(tee -a "$LOG_FILE") 2>&1

echo ""
echo "=== Deploy started at $TIMESTAMP ==="
cd "$PROJECT_DIR"

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

echo "=== Deploy completed at $(date '+%Y-%m-%d %H:%M:%S') ==="
echo ""
