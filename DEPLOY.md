# dev 環境へのデプロイ設定

## GitHub Actions + FTP デプロイ

`main` ブランチに push すると、自動で dev.nubow.co.jp にテーマがデプロイされます。

---

## セットアップ手順

### 1. GitHub リポジトリを作成

1. GitHub で新規リポジトリを作成
2. このプロジェクトを push

```bash
cd /path/to/nubow_0730
git init
git add .
git commit -m "Initial commit"
git remote add origin https://github.com/YOUR_USERNAME/YOUR_REPO.git
git branch -M main
git push -u origin main
```

### 2. GitHub の Secrets を設定

リポジトリの **Settings** → **Secrets and variables** → **Actions** で以下を追加：

| Secret 名 | 値 | 説明 |
|-----------|-----|------|
| `FTP_SERVER` | `dev.nubow.co.jp` | FTP ホスト |
| `FTP_USERNAME` | `sho-tamura` | FTP ユーザー名 |
| `FTP_PASSWORD` | （FTPパスワード） | FTP パスワード |

### 3. リモートパスの確認

`deploy-dev.yml` の `server-dir` は `wp-content/themes/nubow/` になっています。

FTP 接続時のルートが WordPress のドキュメントルートでない場合は、適宜変更してください。

- 例: `httpdocs/wp-content/themes/nubow/`
- 例: `/dev.nubow.co.jp/httpdocs/wp-content/themes/nubow/`

---

## 使い方

- **自動**: `main` に push するだけでデプロイ
- **手動**: リポジトリの **Actions** タブ → 「Deploy to dev.nubow.co.jp」→ **Run workflow**
