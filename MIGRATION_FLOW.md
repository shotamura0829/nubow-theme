# dev 移行フロー

本番 → dev 移行の作業フローと手順です。

---

## 全体の流れ

```
Phase 1: マッピング確認・修正
    ↓
Phase 2: News 移行
    ↓
Phase 3: Title / Description 移行・ブラッシュアップ
    ↓
Phase 4: 画像最適化（重い）
```

---

## Phase 1: マッピング確認・修正

**目的**: 事例・News のカテゴリ構成をそろえ、移行後のずれを防ぐ。

### 1-1. 事例カテゴリ（works_category）

- [ ] 本番と dev で `works_category` の slug・名前を比較
- [ ] REDIRECT_AND_CATEGORY_MAP.md のマッピング表と照合
- [ ] サービスページとの対応（bouquet ↔ celebration-bouquet など）を確認
- [ ] 漏れ・重複があれば WordPress 管理画面で修正

### 1-2. News カテゴリ（post の category）

| 本番 | dev | 備考 |
|------|-----|------|
| お知らせ | ? | |
| 取材・メディア情報 | ? | |
| 店舗情報 | ? | |

- [ ] 本番の投稿カテゴリ一覧を取得
- [ ] dev のカテゴリと slug・対応関係を確認
- [ ] 必要なら dev にカテゴリを作成 or マッピング表を作成

### 1-3. URL 構造の確認

- [ ] News: 本番 `/news/category/xxx` などと dev のパスが一致するか確認
- [ ] 必要に応じて `functions.php` のリライトルールを調整

---

## Phase 2: News 移行

**目的**: 本番の News（投稿）を dev に反映する。

### 方法A: All-in-One WP Migration（推奨）

1. 本番で「投稿」のみをエクスポート（テーマ・プラグイン・メディアは除外可）
2. ファイルサイズが大きい場合はメディアを除外して 256MB 以下に
3. dev の wp-config 等でアップロード制限を緩めるか、FTP + Import from file でインポート
4. インポート時に URL を `nubow.co.jp` → `dev.nubow.co.jp` に置換

### 方法B: データベースのみ

1. 本番の `wp_posts`（post_type=post）をエクスポート
2. dev の DB にマージ or インポート
3. `wp_term_relationships` など関連テーブルも必要に応じて同期
4. Search Replace で URL を置換

### 方法C: WP-CLI（SSH が使える場合）

```bash
# 本番で投稿をエクスポート
wp post list --post_type=post --format=csv > posts.csv

# dev でインポート（スクリプトまたは手動）
```

### 移行後チェック

- [ ] 記事一覧が表示される
- [ ] カテゴリが正しく紐づいている
- [ ] ページネーションが動く
- [ ] アイキャッチ・本文内画像が表示される

---

## Phase 3: Title / Description 移行・ブラッシュアップ

**目的**: 本番のタイトル・ディスクリプションを dev に移行し、必要に応じて改善する。

### 3-1. 移行対象

- サイト全体: 設定 → 一般（サイトタイトル・キャッチフレーズ）
- 各固定ページ: Yoast SEO 等の title / meta description
- トップページ・主要ランディングのメタ情報

### 3-2. 手順

1. **本番の現状を書き出し**
   - 管理画面 or DB から title / description を取得
   - スプレッドシート等に一覧化

2. **dev に反映**
   - 管理画面で手動入力
   - または DB を Search Replace で一括置換

3. **ブラッシュアップ**
   - 文字数（title 30字前後、description 120字前後）を確認
   - キーワード・訴求文の見直し

---

## Phase 4: 画像最適化

**目的**: ページ表示速度の改善。負荷が大きいため最後に実施。

### 4-1. 対象

- `wp-content/uploads/` 内の画像
- テーマ内 `img/` の画像
- WebP 化・リサイズ・圧縮

### 4-2. 方法

| 方法 | 説明 |
|------|------|
| プラグイン | ShortPixel, Imagify, EWWW 等で一括最適化 |
| WP-CLI | `wp media regenerate` + 最適化スクリプト |
| 手動 | ツールで変換 → アップロードし直し |

### 4-3. 注意

- 本番で実行する前に dev で試す
- バックアップを取得してから実行
- 一度に大量処理するとサーバー負荷が高くなるため、バッチ処理を検討

---

## チェックリスト（全体）

- [ ] Phase 1: マッピング確認・修正
- [ ] Phase 2: News 移行
- [ ] Phase 3: Title / Description 移行・ブラッシュアップ
- [ ] Phase 4: 画像最適化

---

## 参照

- REDIRECT_AND_CATEGORY_MAP.md（カテゴリ・リダイレクト詳細）
- DEPLOY.md（GitHub Actions による dev デプロイ）
