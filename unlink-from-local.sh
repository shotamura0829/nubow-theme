#!/bin/bash
# シンボリックリンクを解除し、ワークスペースの内容をコピーで戻す。

WORKSPACE="$(cd "$(dirname "$0")" && pwd)"
LOCAL_BASE="/Users/shotamura/Local Sites/nubow-local/app/public/wp-content/themes"

for THEME in nubow nubow_0730; do
  THEME_DIR="$LOCAL_BASE/$THEME"
  [ ! -d "$THEME_DIR" ] && continue

  if [ -L "$THEME_DIR/css/page.css" ]; then
    /bin/rm -f "$THEME_DIR/css/page.css"
    /bin/cp "$WORKSPACE/css/page.css" "$THEME_DIR/css/page.css"
    echo "  $THEME: css/page.css リンク解除・コピーで復元"
  fi
  if [ -L "$THEME_DIR/page-aboutus.php" ]; then
    /bin/rm -f "$THEME_DIR/page-aboutus.php"
    /bin/cp "$WORKSPACE/page-aboutus.php" "$THEME_DIR/page-aboutus.php"
    echo "  $THEME: page-aboutus.php リンク解除・コピーで復元"
  fi
done

echo "完了。"
