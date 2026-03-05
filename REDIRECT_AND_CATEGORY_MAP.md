# リダイレクトマップ & カテゴリ・サービス対応表

## 1. 「休止」（scw_term_hidden）について

### 意味
**「休止」= そのカテゴリを「カテゴリから探す」リンク一覧に表示しないためのフラグ**です。

- `scw_term_hidden = 1` にすると、そのタームは以下から**除外**されます：
  - `taxonomy-works_category.php` の「カテゴリから探す」リンク一覧
  - `archive-works.php` の同様のリンク一覧
- 管理画面の用語としては「休止」と書いてあるが、実質は **「一覧に表示しない」** に近い動作です。

### 使用場面
- 廃止したがデータとして残しているカテゴリをユーザーに見せたくない
- 一時的に非表示にしたいカテゴリがある
- 「サービスから探す」の親ターム（service_category）など、直接選ばせたくないタームを隠す（※親タームは別条件で取得しているので、このフラグとは別）

### 用語の提案
「休止」より **「一覧に表示しない」** や **「カテゴリ一覧から非表示」** の方がわかりやすい可能性があります。ラベル変更を検討してください。

---

## 2. リダイレクトマップ

### 現状のリダイレクト（functions.php で実装済み）

| 元URL | 先URL | 備考 |
|-------|-------|------|
| `/aboutus/style` | `/aboutus/message` | 301 |
| 末尾スラッシュ付きURL全般 | 同パスの末尾スラッシュなし | 301 |

### 事例紹介関連URL（本番・ローカル想定）

| 種類 | URL | テンプレート |
|------|-----|-------------|
| 事例一覧トップ | `/works` | archive-works.php |
| 事例一覧（別パス） | `/case-list` | page-case-list.php（固定ページ） |
| カテゴリアーカイブ | `/works/{slug}` | taxonomy-works_category.php |
| カテゴリページネーション | `/works/{slug}/page/2` | 同上 |

※ taxonomy `works_category` の rewrite slug が `works` の場合、`get_term_link()` は `/works/bouquet` などを返します。  
CPT UI 等で登録時の rewrite 設定により異なります。

### 本番URLについて

本番（https://nubow.co.jp/works）では事例は **`/works`** をベースとしたURLを使用しています。  
`/case/xxx` や `/case_cat/xxx` といったパターンは使われていません。リダイレクトの追加は、本番で404になっている旧URLがある場合のみ検討すればよいです。

---

## 3. ローカル事例カテゴリ一覧 & サービスページとの対応

### ローカル works_category 構成（現状）

```
service_category（親）
 ├ bouquet（御祝い花束）
 ├ arrangement（御祝いアレンジメント花）
 ├ plants（御祝い観葉植物）
 ├ phalaenopsis（御祝い胡蝶蘭）
 ├ stand-celebration（御祝いスタンド花）
 ├ stand-funeral（葬儀スタンド花）
 ├ funeral-flower（お悔やみ・お供え花）
 └ gardening（植木･庭木手入れ -お庭や-）

wedding（ウェディング装飾）
flower-gift（生花ギフト）
todays_flower_gift（今日の花贈り）
carries_smile（笑顔を運ぶ花贈り）
funeral（葬儀生花祭壇・お別れ会）
funeral-flowers（葬儀・法事花）
display-decorations（ディスプレイ装飾）
shibancyu（人工芝施行 -芝人-）
rental（緑のレンタル -グリーンポケット-）
regular-delivery（定期届け花）
wedding-flower-decorations（ウエディング会場装花）
others（その他）
abstract-flowers（演台花）
wedding-bouquet（ウェディングブーケ）
```

### 漏れ確認（2024.2 時点）

カテゴリの漏れは**なし**。gardening（植木･庭木手入れ -お庭や-）も追加済み。

### サービスページ ⇔ 事例カテゴリ マッピング

| サービス名 | サービスURL | 事例カテゴリ slug | ローカル |
|-----------|-------------|-------------------|----------|
| 御祝い花束 | `/service/celebration-bouquet` | bouquet | ○ |
| 御祝いアレンジメント花 | `/service/celebration-arrangement` | arrangement | ○ |
| 御祝い胡蝶蘭 | `/service/celebration-orchid` | phalaenopsis | ○ |
| 御祝い観葉植物 | `/service/celebration-plants` | plants | ○ |
| 御祝いスタンド花 | `/service/celebration-stand-flower` | stand-celebration | ○ |
| お悔やみ・お供え花 | `/service/funeral-flower` | funeral-flower | ○ |
| 葬儀スタンド花 | `/service/funeral-stand-flower` | stand-funeral | ○ |

※ その他は slug: `others` で存在。footer/sitemap で直指定している7種は上記の service_category 子ターム。
- **注意**: `page-case-list.php` 57行目は `post_type='case'` を参照。ローカルで `works` を使う場合は `works` に変更すること。

### サービスページにカテゴリを表示する場合

サービス詳細ページ（`page-service-list-detail.php`）で「このサービスの事例一覧」を出すには、上記マッピングを使って：

1. 現在ページのスラッグ（例: `celebration-bouquet`）を取得
2. マッピングで対応する事例カテゴリスラッグ（例: `bouquet`）を特定
3. `get_term_by('slug', 'bouquet', 'works_category')` でターム取得
4. `get_term_link($term)` で事例一覧へのリンクを出力

このマッピングを定数または配列として functions.php 等に定義しておくと再利用しやすくなります。

---

## 4. 参照元一覧（ハードコードURL）

### 事例カテゴリURLを直指定している箇所

| ファイル | 内容 |
|----------|------|
| `footer.php` | `/works/bouquet`, `arrangement`, `phalaenopsis`, `plants`, `stand-celebration`, `funeral-flower`, `stand-funeral` の7種 |
| `page-sitemap.php` | 同上 |
| `header.php` | `/works`（事例紹介トップ） |

※ `gardening`（お庭）は含まれていない。追加する場合は両ファイルを更新するか、`get_term_link()` に置き換えて動的に出力する。

---

## 5. 事例サムネが表示されない問題（ローカル環境）

DBを落としてもサムネが出ない主な理由は次のとおりです。

### 想定される原因

1. **wp-content/uploads が同期されていない**
   - アイキャッチは `wp_posts` の attachment に紐づき、実ファイルは `wp-content/uploads/YYYY/MM/` にある
   - DB だけインポートしていると、`_thumbnail_id` は存在するが画像ファイルがローカルにない

2. **attachment の guid が本番ドメインのまま**
   - 本番URLのまま保存されていると、一部の出力で本番を参照してしまうことがある

3. **サムネイルサイズ未生成**
   - `medium` サイズが未生成で、元ファイルも無い場合など

### 対処手順

1. **本番の uploads をローカルに同期**
   ```bash
   # 例: rsync で本番サーバから取得
   rsync -avz user@nubow.co.jp:/path/to/wp-content/uploads/ ./wp-content/uploads/
   ```

2. **DB の URL をローカル用に置換**
   - Search Replace DB や WP-CLI で `https://nubow.co.jp` → `http://nubow-local.local` などに置換
   - シリアライズされた文字列にも注意（Search Replace DB は対応）

3. **サムネイルの再生成**
   ```bash
   wp media regenerate --yes
   ```

4. **sync_fix.py の対象範囲**
   - 現在はテーマファイル（PHP, CSS, img）のみ。`uploads` は別で同期する必要あり。
