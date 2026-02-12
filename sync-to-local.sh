#!/bin/bash
# ワークスペース（nubow_0730）のファイルを Local テーマにシンボリックリンクで同期する。
# 一度実行すると、こちらの編集がそのままテーマに反映される（コピー不要）。
# 解除するときは unlink-from-local.sh を実行。

WORKSPACE="$(cd "$(dirname "$0")" && pwd)"
LOCAL_BASE="/Users/shotamura/Local Sites/nubow-local/app/public/wp-content/themes"

if [ ! -d "$LOCAL_BASE" ]; then
  echo "Local のテーマフォルダが見つかりません: $LOCAL_BASE"
  exit 1
fi

for THEME in nubow nubow_0730; do
  THEME_DIR="$LOCAL_BASE/$THEME"
  [ ! -d "$THEME_DIR" ] && continue

  # css/page.css
  if [ -f "$THEME_DIR/css/page.css" ] && [ ! -L "$THEME_DIR/css/page.css" ]; then
    /bin/rm -f "$THEME_DIR/css/page.css"
  fi
  [ -e "$THEME_DIR/css/page.css" ] && /bin/rm -f "$THEME_DIR/css/page.css"
  ln -sf "$WORKSPACE/css/page.css" "$THEME_DIR/css/page.css" && echo "  $THEME: css/page.css → リンク済み"

  # page-aboutus.php
  if [ -f "$THEME_DIR/page-aboutus.php" ] && [ ! -L "$THEME_DIR/page-aboutus.php" ]; then
    /bin/rm -f "$THEME_DIR/page-aboutus.php"
  fi
  [ -e "$THEME_DIR/page-aboutus.php" ] && /bin/rm -f "$THEME_DIR/page-aboutus.php"
  ln -sf "$WORKSPACE/page-aboutus.php" "$THEME_DIR/page-aboutus.php" && echo "  $THEME: page-aboutus.php → リンク済み"
done

echo "完了。このフォルダで編集すると Local テーマにそのまま反映されます。"
