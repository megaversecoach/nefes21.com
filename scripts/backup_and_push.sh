#!/usr/bin/env bash
set -euo pipefail

DOMAIN="nefes21.com"
WEBROOT="/www/wwwroot/${DOMAIN}"
REPO_DIR="/opt/nefes21-backup"
STAMP="$(date +%F_%H%M)"

cd "$REPO_DIR"

# === DB bilgilerini tespit (CodeIgniter > WordPress > .env) ===
DB_NAME=""; DB_USER=""; DB_PASS=""; DB_HOST=""
if [ -f "${WEBROOT}/application/config/database.php" ]; then
  CFG="${WEBROOT}/application/config/database.php"
  DB_HOST="$(sed -n "s/.*'hostname' *=> *'\([^']*\)'.*/\1/p" "$CFG" | head -1)"
  DB_USER="$(sed -n "s/.*'username' *=> *'\([^']*\)'.*/\1/p" "$CFG" | head -1)"
  DB_PASS="$(sed -n "s/.*'password' *=> *'\([^']*\)'.*/\1/p" "$CFG" | head -1)"
  DB_NAME="$(sed -n "s/.*'database' *=> *'\([^']*\)'.*/\1/p" "$CFG" | head -1)"
elif [ -f "${WEBROOT}/wp-config.php" ]; then
  CFG="${WEBROOT}/wp-config.php"
  DB_NAME="$(grep -E "define\(\s*'DB_NAME'"     "$CFG" | sed -E "s/.*'DB_NAME',\s*'([^']+)'.*/\1/")"
  DB_USER="$(grep -E "define\(\s*'DB_USER'"     "$CFG" | sed -E "s/.*'DB_USER',\s*'([^']+)'.*/\1/")"
  DB_PASS="$(grep -E "define\(\s*'DB_PASSWORD'" "$CFG" | sed -E "s/.*'DB_PASSWORD',\s*'([^']+)'.*/\1/")"
  DB_HOST="$(grep -E "define\(\s*'DB_HOST'"     "$CFG" | sed -E "s/.*'DB_HOST',\s*'([^']+)'.*/\1/")"
elif [ -f "${WEBROOT}/.env" ]; then
  CFG="${WEBROOT}/.env"
  DB_NAME="$(grep -E '^DB_DATABASE=' "$CFG" | cut -d= -f2-)"
  DB_USER="$(grep -E '^DB_USERNAME=' "$CFG" | cut -d= -f2-)"
  DB_PASS="$(grep -E '^DB_PASSWORD=' "$CFG" | cut -d= -f2-)"
  DB_HOST="$(grep -E '^DB_HOST='     "$CFG" | cut -d= -f2-)"
fi

DB_HOST="${DB_HOST:-127.0.0.1}"

echo "[*] DB: name=${DB_NAME} user=${DB_USER} host=${DB_HOST}"

# === DB dump (no-tablespaces) ===
mkdir -p db
command -v mysqldump >/dev/null 2>&1 || { apt update && apt -y install mariadb-client; }
MYSQL_PWD="${DB_PASS}" mysqldump -u "${DB_USER}" -h "${DB_HOST}" \
  --single-transaction --quick --routines --triggers \
  --no-tablespaces \
  "${DB_NAME}" > "db/${DB_NAME}_${STAMP}.sql"

gzip -f "db/${DB_NAME}_${STAMP}.sql"
ln -sfn "${DB_NAME}_${STAMP}.sql.gz" "db/${DB_NAME}_latest.sql.gz"

# (İsteğe bağlı) 14 adetten eski SQL arşivlerini çalışma ağacından temizle
ls -1t db/*.sql.gz 2>/dev/null | tail -n +15 | xargs -r rm -f

# === Web dosyalarını çek ===
mkdir -p web
rsync -a --delete \
  --exclude=".git" \
  --exclude="node_modules" \
  --exclude="vendor" \
  --exclude="storage/logs" \
  --exclude="*.log" \
  --exclude="cache" \
  "${WEBROOT}/" "web/"

# === Git LFS ve commit/push ===
git lfs install || true
git lfs track "*.sql.gz" || true

git add -A
git commit -m "Backup: ${DOMAIN} ${STAMP}" || echo "[*] No changes to commit."
git push origin main || git push origin master || true
