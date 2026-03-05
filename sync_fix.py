import os
import shutil

source_dir = "/Users/shotamura/Downloads/nubow_0730"
targets = [
    "/Users/shotamura/Local Sites/nubow-local/app/public/wp-content/themes/nubow",
    "/Users/shotamura/Local Sites/nubow-local/app/public/wp-content/themes/nubow_0730"
]

files_to_copy = [
    "page-aboutus.php",
    "page-service.php",
    "page-celebration-plants.php",
    "page-service-list-detail.php",
    "page-nubow-aile.php",
    "page-news.php",
    "home.php",
    "functions.php",
    "front-page.php",
    "archive.php",
    "category.php",
    "css/page.css",
    "css/top.css"
]

def copy_file(src, dst, file_rel):
    if not os.path.isfile(src):
        print(f"SKIP (not found): {src}")
        return
    try:
        if os.path.exists(dst) and os.path.samefile(src, dst):
            print(f"Skipped: {file_rel} (same file as destination)")
            return
    except OSError:
        pass
    try:
        shutil.copy2(src, dst)
        print(f"Copied: {src} -> {dst}")
    except Exception as e:
        print(f"Error copying {src} to {dst}: {e}")

for target_base in targets:
    if not os.path.exists(target_base):
        continue

    for file_rel in files_to_copy:
        src = os.path.join(source_dir, file_rel)
        dst = os.path.join(target_base, file_rel)
        copy_file(src, dst, file_rel)

    # celebration-stand-flower画像（使用する5ファイルのみ）
    stand_img_names = [
        "celebration-stand-flower-image01.webp",
        "celebration-stand-flower-image02.webp",
        "celebration-stand-flower-image03.webp",
        "celebration-stand-flower-image04.webp",
        "celebration-stand-flower-car.webp",
    ]
    stand_img_src = os.path.join(source_dir, "img/page/celebration-stand-flower")
    stand_img_dst = os.path.join(target_base, "img/page/celebration-stand-flower")
    if os.path.isdir(stand_img_src):
        os.makedirs(stand_img_dst, exist_ok=True)
        for name in stand_img_names:
            s = os.path.join(stand_img_src, name)
            d = os.path.join(stand_img_dst, name)
            if os.path.isfile(s):
                try:
                    if os.path.exists(d) and os.path.samefile(s, d):
                        print(f"Skipped: img/page/celebration-stand-flower/{name} (same file)")
                    else:
                        shutil.copy2(s, d)
                        print(f"Copied: img/page/celebration-stand-flower/{name}")
                except Exception as ex:
                    print(f"Error: img/page/celebration-stand-flower/{name}: {ex}")

    # celebration-arrangement画像（L/LLサイズ + 参考イメージ用preview）
    celebration_arrangement_names = [
        "celebration-arrangement-image03.webp",
        "celebration-arrangement-image04.webp",
        "celebration-arrangement-preview01.webp",
        "celebration-arrangement-preview02.webp",
        "celebration-arrangement-preview03.webp",
        "celebration-arrangement-preview04.webp",
        "celebration-arrangement-preview05.webp",
        "celebration-arrangement-preview06.webp",
    ]
    celebration_arrangement_src = os.path.join(source_dir, "img/page/celebration-arrangement")
    celebration_arrangement_dst = os.path.join(target_base, "img/page/celebration-arrangement")
    if os.path.isdir(celebration_arrangement_src):
        os.makedirs(celebration_arrangement_dst, exist_ok=True)
        for name in celebration_arrangement_names:
            s = os.path.join(celebration_arrangement_src, name)
            d = os.path.join(celebration_arrangement_dst, name)
            if os.path.isfile(s):
                try:
                    if os.path.exists(d) and os.path.samefile(s, d):
                        print(f"Skipped: img/page/celebration-arrangement/{name} (same file)")
                    else:
                        shutil.copy2(s, d)
                        print(f"Copied: img/page/celebration-arrangement/{name}")
                except Exception as ex:
                    print(f"Error: img/page/celebration-arrangement/{name}: {ex}")

    # funeral-flower画像
    funeral_img_names = [
        "funeral-flower-image01.webp",
        "funeral-flower-image02.webp",
        "funeral-flower-image03.webp",
        "funeral-flower-image04.webp",
        "funeral-flower-image05.webp",
        "funeral-flower-orchid-image01.webp",
        "funeral-flower-orchid-image02.webp",
        "funeral-flower-orchid-image03.webp",
        "funeral-flower-orchid-image04.webp",
        "funeral-flower-sighboard.webp",
        "funeral-flower-book.webp",
        "funeral-flower-column.webp",
    ]
    funeral_img_src = os.path.join(source_dir, "img/page/funeral-flower")
    funeral_img_dst = os.path.join(target_base, "img/page/funeral-flower")
    if os.path.isdir(funeral_img_src):
        os.makedirs(funeral_img_dst, exist_ok=True)
        for name in funeral_img_names:
            s = os.path.join(funeral_img_src, name)
            d = os.path.join(funeral_img_dst, name)
            if os.path.isfile(s):
                try:
                    if os.path.exists(d) and os.path.samefile(s, d):
                        print(f"Skipped: img/page/funeral-flower/{name} (same file)")
                    else:
                        shutil.copy2(s, d)
                        print(f"Copied: img/page/funeral-flower/{name}")
                except Exception as ex:
                    print(f"Error: img/page/funeral-flower/{name}: {ex}")

    # funeral-stand-flower画像
    funeral_stand_img_names = [
        "funeral-stand-flower-sighboard.webp",
        "funeral-stand-flower-car.webp",
        "funeral-stand-flower-0.webp",
    ]
    funeral_stand_img_src = os.path.join(source_dir, "img/page/funeral-stand-flower")
    funeral_stand_img_dst = os.path.join(target_base, "img/page/funeral-stand-flower")
    if os.path.isdir(funeral_stand_img_src):
        os.makedirs(funeral_stand_img_dst, exist_ok=True)
        for name in funeral_stand_img_names:
            s = os.path.join(funeral_stand_img_src, name)
            d = os.path.join(funeral_stand_img_dst, name)
            if os.path.isfile(s):
                try:
                    if os.path.exists(d) and os.path.samefile(s, d):
                        print(f"Skipped: img/page/funeral-stand-flower/{name} (same file)")
                    else:
                        shutil.copy2(s, d)
                        print(f"Copied: img/page/funeral-stand-flower/{name}")
                except Exception as ex:
                    print(f"Error: img/page/funeral-stand-flower/{name}: {ex}")

    # トップ・店舗画像（img/top）
    top_img_names = [
        "shop_img01.webp",
    ]
    top_img_src = os.path.join(source_dir, "img/top")
    top_img_dst = os.path.join(target_base, "img/top")
    if os.path.isdir(top_img_src):
        os.makedirs(top_img_dst, exist_ok=True)
        for name in top_img_names:
            s = os.path.join(top_img_src, name)
            d = os.path.join(top_img_dst, name)
            if os.path.isfile(s):
                try:
                    if os.path.exists(d) and os.path.samefile(s, d):
                        print(f"Skipped: img/top/{name} (same file)")
                    else:
                        shutil.copy2(s, d)
                        print(f"Copied: img/top/{name}")
                except Exception as ex:
                    print(f"Error: img/top/{name}: {ex}")

    # 店舗詳細・About 画像（img/page）
    shop_img_names = [
        "shop-info_honten_img01.webp",
        "hanayanomikata_icon.webp",
    ]
    shop_img_src = os.path.join(source_dir, "img/page")
    shop_img_dst = os.path.join(target_base, "img/page")
    if os.path.isdir(shop_img_src):
        os.makedirs(shop_img_dst, exist_ok=True)
        for name in shop_img_names:
            s = os.path.join(shop_img_src, name)
            d = os.path.join(shop_img_dst, name)
            if os.path.isfile(s):
                try:
                    if os.path.exists(d) and os.path.samefile(s, d):
                        print(f"Skipped: img/page/{name} (same file)")
                    else:
                        shutil.copy2(s, d)
                        print(f"Copied: img/page/{name}")
                except Exception as ex:
                    print(f"Error: img/page/{name}: {ex}")

print("Sync complete.")
