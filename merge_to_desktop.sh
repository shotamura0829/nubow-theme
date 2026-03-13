#!/bin/bash
# Downloads の最新を Desktop に統合（先祖返り防止）
set -e
SRC="/Users/shotamura/Downloads/nubow_0730"
DST="/Users/shotamura/Desktop/nubow_0730"

if [ ! -d "$SRC" ]; then
  echo "Error: Source not found: $SRC"
  exit 1
fi
if [ ! -d "$DST" ]; then
  echo "Error: Destination not found: $DST"
  exit 1
fi

echo "Syncing $SRC -> $DST (latest from Downloads to Desktop)..."
rsync -av --exclude='.git/objects' "$SRC/" "$DST/"
echo "Done. Desktop now has the latest."
echo ""
echo "Next: Update sync_fix.py to use Desktop path, then open Desktop/nubow_0730 in Cursor."
