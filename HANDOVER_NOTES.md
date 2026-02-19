# 引き継ぎ事項：nubowプロジェクト修正

## 重要な注意点：作業ディレクトリの不一致

このプロジェクトでは、Cursorで開いている作業ディレクトリと、Local by Flywheelが実際に参照している公開ディレクトリが異なります。

- **Cursor作業ディレクトリ**: `/Users/shotamura/Downloads/nubow_0730`
- **Local by Flywheel公開ディレクトリ**: `/Users/shotamura/Local Sites/nubow-local/app/public/wp-content/themes/nubow` (および `nubow_0730`)

**注意**: Cursorでファイルを編集しただけでは、ブラウザ上のサイト (`http://nubow-local.local`) には反映されません。編集後は必ずファイルをLocal by Flywheelのディレクトリへコピー（同期）する必要があります。

## 同期コマンド（Pythonスクリプト推奨）

```bash
# Pythonスクリプトを使用して同期（確認メッセージなしで実行）
python3 /Users/shotamura/Downloads/nubow_0730/sync_fix.py
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
  - `img/` … 画像を索引しない（コード内のパス参照は可能）
  - `backups/`
  - `*-OLD.php`, `*-BACKUP.php`
- これにより Cursor の検索・インデックス負荷が減り、体感が軽くなります。

### さらに軽くしたい場合（任意）
1. **画像の最適化**  
   - `img/page`・`img/top` の JPG/PNG を圧縮（例: [Squoosh](https://squoosh.app/)、ImageOptim、`cwebp` で WebP 化）。  
   - 特に大きいファイル例: `shop-info_honten_img01.jpg`（約 2.6MB）、`fv01.jpg`（約 1.4MB）、祝い系の商品画像（数百KB〜1MB級）。
2. **バックアップの整理**  
   - `backups/` を別フォルダへ退避するか、不要なら削除。
3. **旧版 PHP の整理**  
   - `page-service-list-detail-OLD.php`、`*-BACKUP.php` など、参照していなければ削除してよいです。
