# dev 環境へのデプロイ設定

## 重要事項

- **デプロイ先**: dev.nubow.co.jp **のみ**（本番・他環境には一切アップロードしない）
- **アップロード先**: `wp-content/themes/nubow/`（有効テーマ）
- **元ファイル**: ローカルの nubow_0730（リポジトリの内容）
- ※ サーバー側の `nubow_0730` フォルダは古いため使用しない。常に `nubow` に反映

---

## GitHub Actions + FTP デプロイ

`main` ブランチに push すると、自動で dev.nubow.co.jp の `nubow` テーマにデプロイされます。

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
| `FTP_USERNAME` | `sho-tamura` | FTP ユーザー名 |
| `FTP_PASSWORD` | （FTPパスワード） | FTP パスワード |

※ `FTP_SERVER` は不要です。`dev.nubow.co.jp` に固定されています。

### 3. リモートパスの確認

`deploy-dev.yml` の `server-dir` は `wp-content/themes/nubow/` になっています。

FTP 接続時のルートが WordPress のドキュメントルートでない場合は、適宜変更してください。

- 例: `httpdocs/wp-content/themes/nubow/`
- 例: `/dev.nubow.co.jp/httpdocs/wp-content/themes/nubow/`

---

## 使い方

- **自動**: `main` に push するだけでデプロイ
- **手動**: リポジトリの **Actions** タブ → 「Deploy to dev.nubow.co.jp」→ **Run workflow**
