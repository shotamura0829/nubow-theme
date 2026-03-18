# 引き継ぎ事項：nubowプロジェクト

---

## 🟢 現在の状態（2026-03-16 更新）

| 項目 | 内容 |
|------|------|
| **本番サイト** | https://nubow.co.jp ✅ 公開中 |
| **WordPress管理画面** | https://nubow.co.jp/dev/wp-admin/ |
| **開発サイト** | https://dev.nubow.co.jp（参照用・更新停止） |
| **テーマ** | `nubow`（`httpdocs/dev/wp-content/themes/nubow/`） |
| **GitHubリポジトリ** | https://github.com/shotamura0829/nubow-theme |
| **ローカル作業ディレクトリ** | `/Users/shotamura/Desktop/nubow_0730` |

---

## 🚀 デプロイ方法

### dev（自動）
`main` ブランチに push すると自動で `dev.nubow.co.jp` にデプロイされる。

```bash
git add .
git commit -m "変更内容"
git push
```

### 本番（手動）
GitHub Actions から手動実行が必要。

1. https://github.com/shotamura0829/nubow-theme/actions を開く
2. 「**Deploy to nubow.co.jp (PRODUCTION)**」をクリック
3. 「**Run workflow**」→「Run workflow」で実行
4. 完了（緑チェック）を確認

> ⚠️ 初回は全ファイルアップロードのため10〜15分かかる。2回目以降は差分のみで高速。

---

## 🗂️ サーバー構成（Plesk）

```
ホームディレクトリ（FTPルート）
├── httpdocs/               ← nubow.co.jp のドキュメントルート
│   ├── dev/                ← WordPress本体（本番）
│   │   ├── wp-content/
│   │   │   ├── themes/nubow/   ← アクティブテーマ（ここにデプロイ）
│   │   │   ├── uploads/        ← メディアファイル（13.4GB・削除不可）
│   │   │   └── plugins/
│   │   └── wp-config.php
│   └── .htaccess           ← リダイレクト設定
├── dev.nubow.co.jp/        ← 開発用WordPressのファイル（参照のみ）
├── wordpress-backups/      ← 移行時のバックアップ
└── logs/
```

---

## ⚙️ .htaccess リダイレクト設定（httpdocs/.htaccess）

```apache
# URL Redirect
RewriteBase /
RewriteRule ^dev/?$ https://nubow.co.jp/ [R=301,L]
RewriteRule ^case-list/?$ https://nubow.co.jp/works [R=301,L]
RewriteRule ^top/?$ https://nubow.co.jp/ [R=301,L]
RewriteCond %{REQUEST_URI} !(^/service$)
RewriteCond %{REQUEST_URI} !(^/service/gift)
RewriteCond %{REQUEST_URI} !(^/service/cafe-restaurant/?$)
RewriteCond %{REQUEST_URI} !(^/service/indoor-greening/?$)
RewriteCond %{REQUEST_URI} !(^/service/garden-planning/?$)
RewriteCond %{REQUEST_URI} !(^/service/funeral/?$)
RewriteCond %{REQUEST_URI} !(^/service/wedding/?$)
RewriteCond %{REQUEST_URI} !(^/service/celebration-)
RewriteCond %{REQUEST_URI} !(^/service/funeral-flower/?$)
RewriteCond %{REQUEST_URI} !(^/service/funeral-stand-flower/?$)
RewriteRule ^service/(.*)$ https://nubow.co.jp/works/$1 [R=301,L]
```

> ⚠️ `.htaccess` はサーバー上のみ管理（Gitに含まれない）。変更はPleskファイルマネージャーから直接編集。

---

## 🔧 コード変更の手順

1. `/Users/shotamura/Desktop/nubow_0730/` でファイルを編集
2. `git add . && git commit -m "説明" && git push`
3. dev で確認 → GitHub Actions から本番デプロイ実行

> ⚠️ **注意**: 本番デプロイを実行しないと `nubow.co.jp` には反映されない。

---

## 📝 主要テンプレートファイル一覧

| ファイル | 役割 |
|----------|------|
| `front-page.php` | トップページ |
| `page-aboutus.php` | 会社概要・スタッフ |
| `page-service-list-detail.php` | サービス詳細（全サービス共通） |
| `page-service.php` | サービス一覧 |
| `archive-works.php` | 事例一覧 |
| `single-works.php` | 事例詳細 |
| `page-contact.php` | お問い合わせ |
| `functions.php` | カスタム関数・リダイレクト・robots.txt |
| `header.php` | ヘッダー（ナビ・メタ情報） |
| `footer.php` | フッター（リンク・JS） |
| `parts/parts-otherlinks2.php` | サービスページ下部CTA |
| `css/common.css` | 共通CSS |
| `css/page.css` | ページ別CSS |

---

## ✅ 実装済み機能（本番反映済み）

- **SEO**: h1タグ適切実装・Yoast SEO設定・全ページtitle/description設定
- **OGP**: デフォルト画像設定（nubow-ogp.webp）
- **favicon**: favicon.ico 設置
- **robots.txt**: `/wp-admin/`・`/wp-includes/`・`/dev/` のDisallow設定
- **301リダイレクト**: 旧URL→新URL（100件以上）
- **構造化データ**: JSON-LD（LocalBusiness・FAQPage）
- **パフォーマンス**: 画像WebP化・ブラウザキャッシュ設定（.htaccess）
- **FVスライダー**: Swiper v11・fv01-1.webp
- **スタッフ画像**: about_staff_1〜7.webp
- **事例カテゴリ**: works_category タクソノミー設定
- **はなやのミカタリンク**: https://hanayanomikata.com/ （別タブ）
- **来店予約リンク**: parts-otherlinks2.php → `/reservation`

---

## ⚠️ 既知の問題・注意事項

### プラグインエラー
- **All-in-One WP Migration Pro（v1.35）** が無料版との互換性エラーを発生中
- 移行作業は完了しているため、**無効化推奨**
- 使用する場合は最新版に更新が必要

### ディスク容量
- `nubow.co.jp` のウェブ容量：**約70GB**（上限50GB）
- 上限超過時はサーバーが自動停止する（毎朝4:00に集計）
- 削除済み：`uploads-local.zip`（2.94GB）、`nubow.co.jp/`フォルダ（誤デプロイ）、`wp-content/themes/`（114MB）
- **今後の対策**: 不要プラグイン削除、不要テーマ削除、`.git`フォルダ（79.5MB）削除を検討

### PHP バージョン
- 現在 **PHP 7.4.33**（EOL・サポート終了）
- PHP 8.1以上へのアップグレードを推奨（Plesk → PHP設定から変更可能）

### SMTPパスワード
- GitHubにSMTP認証情報が漏洩（GitGuardianで検知済み）
- クライアントに `info@nubow.co.jp` のパスワード変更を依頼済み
- 変更後、WordPress管理画面 → WP Mail SMTP → 設定を更新すること

### GSCサイトマップ
- `nubow.co.jp/sitemap_index.xml` → クライアントのGSCアカウントで登録要

---

## 🔑 認証情報

| 項目 | 内容 |
|------|------|
| **WordPress管理URL** | https://nubow.co.jp/dev/wp-admin/ |
| **Plesk管理** | P9057017934 アカウント |
| **FTPサーバー** | dev.nubow.co.jp |
| **FTPユーザー** | Secrets: `FTP_USERNAME` / `FTP_PASSWORD` |

---

## 🗑️ 削除しても良いファイル（サーバー上）

| パス | 容量 | 理由 |
|------|------|------|
| `httpdocs/dev/wp-content/.git/` | 79.5MB | Git履歴（不要） |
| `httpdocs/dev/wp-content/themes/` 内の `nubow` 以外 | 数十MB | デフォルトテーマ |
| `wordpress-backups/` 内の `.wpress` | 残存分 | 移行完了済み |

---

*最終更新: 2026-03-16*
