import os
import shutil

source_dir = "/Users/shotamura/Downloads/nubow_0730"
targets = [
    "/Users/shotamura/Local Sites/nubow-local/app/public/wp-content/themes/nubow",
    "/Users/shotamura/Local Sites/nubow-local/app/public/wp-content/themes/nubow_0730"
]

files_to_copy = [
    "page-celebration-plants.php",
    "css/page.css"
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

print("Sync complete.")
