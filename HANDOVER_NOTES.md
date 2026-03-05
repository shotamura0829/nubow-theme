# 引き継ぎ事項：nubowプロジェクト修正

## プロジェクト統合済み（2025-02-19）

- **Downloads** の最新を **Desktop** に統合しました（先祖返り防止）。
- 以降は **`/Users/shotamura/Desktop/nubow_0730`** を Cursor で開いて作業してください。
- sync_fix.py と sync_cta_to_local.py は Desktop を参照するよう更新済み。

## 重要な注意点：作業ディレクトリと Local の不一致

このプロジェクトでは、Cursorで開いている作業ディレクトリと、Local by Flywheelが実際に参照している公開ディレクトリが異なります。

- **プロジェクト（メイン）**: `/Users/shotamura/Desktop/nubow_0730` … **こちらを Cursor で開いて作業**
- **Local by Flywheel公開ディレクトリ**: `/Users/shotamura/Local Sites/nubow-local/app/public/wp-content/themes/nubow` (および `nubow_0730`)

**注意**: Cursorでファイルを編集しただけでは、ブラウザ上のサイト (`http://nubow-local.local`) には反映されません。編集後は必ずファイルをLocal by Flywheelのディレクトリへコピー（同期）する必要があります。

## 同期コマンド（Pythonスクリプト推奨）

```bash
# Pythonスクリプトを使用して同期（プロジェクトは Desktop を参照）
python3 /Users/shotamura/Desktop/nubow_0730/sync_fix.py
```

## 今回の修正内容 (2025-02-06 最終版)

### 1. 新規テンプレート作成: `page-celebration-plants.php`
- `celebration-plants` スラッグ専用のテンプレートファイルを作成。
- **デザイン統一**:
    - **商品リスト**: `.price` クラス内は金額のみとし、属性情報（尺鉢・鉢皿付など）は `.name` 内の `<span class="item-detail">` に移動しました。
    - **Service / Green Rental**: 胡蝶蘭ページのデザインに合わせて、ヘッダー中央揃え、背景色 `#f0ebe6`、縦並び（SP時）に統一しました。
- コンテンツ内容：
    - 観葉植物商品リスト（6点、PC:2カラム/SP:1カラム）
    - 価格から選ぶ（既存ACF）
    - Serviceセクション（背景色あり）
    - Green Rentalセクション（背景色あり）
    - 特典セクション（背景色 `#cbdea6`）
    - Suite (サスティー) セクション（背景色 `#cbdea6`）

### 2. 既存テンプレート修正: `page-service-list-detail.php`
- `celebration-plants` ページで「その他のサービス（ACF）」が表示されないように除外条件 (`!is_page('celebration-plants')`) を追加済み。

### 3. CSS追加: `css/page.css`
- `celebration-plants` 用のスタイル定義を追加。
- SP表示時の商品画像は横幅いっぱい (`width: 100%`)、テキストは左寄せに設定。

### 4. バックアップ
- 完了時点のファイルを `backups/20260206_final/` に保存しました。

---

## プロジェクトの重さと軽量化（原因・改善）

### 原因
- **合計**: 約 107MB
- **img**: 約 54MB（大半）
  - `img/page` 約 42MB（店舗・祝い花・観葉など大容量 JPG/PNG）
  - `img/top` 約 10MB（FV・店舗画像など）
- その他: `backups/`、`*-OLD.php` / `*-BACKUP.php` などの重複テンプレート

### 実施した改善（Cursor を軽くする）
- **`.cursorignore`** を追加し、以下を Cursor のインデックス対象から除外しました。
  - `.git/` … Git履歴（約52MB）
  - `img/` … 画像（約55MB）
  - `backups/`
  - `*-OLD.php`, `*-BACKUP.php`
  - `css/swiper-bundle.css`, `css/aos.css` … 外部ライブラリ
- これにより Cursor の検索・インデックス負荷が減り、体感が軽くなります。

### それでも遅い場合の対処
1. **Cursor の完全再起動** … プロジェクトを閉じ、Cursor アプリを終了してから再度開く。インデックスが再構築され、`.cursorignore` の反映が進む。
2. **Git の整理** … ターミナルで `git gc --aggressive` を実行すると `.git` のサイズが減ることがある。
3. **プロジェクトの配置** … すでに Desktop に統合済み。体感が遅い場合は Cursor 再起動を試す。

### さらに軽くしたい場合（任意）
1. **画像の最適化**  
   - `img/page`・`img/top` の JPG/PNG を圧縮（例: [Squoosh](https://squoosh.app/)、ImageOptim、`cwebp` で WebP 化）。  
   - 特に大きいファイル例: `shop-info_honten_img01.webp`（約 2.6MB）、`fv01.jpg`（約 1.4MB）、祝い系の商品画像（数百KB〜1MB級）。
2. **バックアップの整理**  
   - `backups/` を別フォルダへ退避するか、不要なら削除。
3. **旧版 PHP の整理**  
   - `page-service-list-detail-OLD.php`、`*-BACKUP.php` など、参照していなければ削除してよいです。

---

## 画像の差し替え方法

### 御祝いスタンド花（celebration-stand-flower）の画像を差し替える場合

**置き場所（次のどちらか）:**

| 置く場所 | パス |
|----------|------|
| **プロジェクト内（推奨）** | `Desktop/nubow_0730/img/page/celebration-stand-flower/` |
| デスクトップの素材フォルダ | `Desktop/celebration-stand-flower素材/` |

**ファイル名（同じ名前のまま上書き）:**

- `celebration-stand-flower-image01.webp` … Mサイズ
- `celebration-stand-flower-image02.webp` … Lサイズ
- `celebration-stand-flower-image03.webp` … LLサイズ
- `celebration-stand-flower-image04.webp` … 2段
- `celebration-stand-flower-car.webp` … Columnセクション用

**手順:**

1. 上記のフォルダに、**同じファイル名**で新しい画像を置く（既存ファイルを上書きでOK）。
2. デスクトップの素材フォルダに置いた場合は、次のコマンドでプロジェクトへコピーしてから同期する。（`\cp` は上書き確認を出さない）
   ```bash
   \cp -f "/Users/shotamura/Desktop/celebration-stand-flower素材/"celebration-stand-flower-*.webp /Users/shotamura/Desktop/nubow_0730/img/page/celebration-stand-flower/
   ```
3. Local に反映するため、同期を実行する。
   ```bash
   python3 /Users/shotamura/Desktop/nubow_0730/sync_fix.py
   ```
4. ブラウザでハードリロード（Cmd+Shift+R）して表示を確認する。
