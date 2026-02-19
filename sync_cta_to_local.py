#!/usr/bin/env python3
"""CTA用パーツと画像を Local Sites テーマへコピーする"""
import os
import shutil

src_base = "/Users/shotamura/Downloads/nubow_0730"
dst_base = "/Users/shotamura/Local Sites/nubow-local/app/public/wp-content/themes/nubow"

# 1. parts-otherlinks2.php
shutil.copy2(
    os.path.join(src_base, "parts/parts-otherlinks2.php"),
    os.path.join(dst_base, "parts/parts-otherlinks2.php"),
)
print("Copied: parts/parts-otherlinks2.php")

# 2. css/page.css（CTA用スタイル含む）
css_src = os.path.join(src_base, "css/page.css")
css_dst = os.path.join(dst_base, "css/page.css")
try:
    if os.path.exists(css_dst) and os.path.samefile(css_src, css_dst):
        print("Skipped: css/page.css (same file as destination)")
    else:
        shutil.copy2(css_src, css_dst)
        print("Copied: css/page.css")
except OSError:
    shutil.copy2(css_src, css_dst)
    print("Copied: css/page.css")

# 3. img/nubow-cta
dst_cta = os.path.join(dst_base, "img/nubow-cta")
os.makedirs(dst_cta, exist_ok=True)
cta_src_dir = os.path.join(src_base, "img/nubow-cta")
for name in ("phone.png", "reserve.png"):
    src = os.path.join(cta_src_dir, name)
    if os.path.isfile(src):
        shutil.copy2(src, os.path.join(dst_cta, name))
        print(f"Copied: img/nubow-cta/{name}")
    else:
        print(f"SKIP (not found): {src}  ← このファイルをワークスペースの img/nubow-cta/ に置いてから再度実行してください。")

print("Done. ブラウザで http://nubow-local.local/service/celebration-bouquet を再読み込みしてください。")
