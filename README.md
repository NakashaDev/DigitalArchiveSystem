# NewDigitalArchiveSystem

デジタルアーカイブ管理システム / Digital Archive Management System

[![License: AGPL v3](https://img.shields.io/badge/License-AGPL%20v3-blue.svg)](https://www.gnu.org/licenses/agpl-3.0)

## 概要 / Overview

デジタルアーカイブのコレクション、分類、項目を管理するためのWebアプリケーションです。

A web application for managing digital archive collections, genres, and items.

## 機能 / Features

- 📚 コレクション管理（資料の登録・編集・検索）
- 🏷️ 分類管理（カテゴリの設定）
- 📝 項目管理（メタデータ項目の定義）
- 👥 ユーザー管理（権限ベースのアクセス制御）
- 🌐 多言語対応（日本語・英語・中国語・韓国語）

---

## システム要件 / Requirements

| 項目 | バージョン |
|-----|-----------|
| PHP | 8.0.2以上 |
| MySQL | 5.7以上 |
| Laravel | 9.x |
| Composer | 2.x |
| Node.js | 16.x以上（任意） |

---

## ライセンス / License

Copyright (C) 2026 ナカシャクリエイテブ株式会社 (NAKASHA CREATIVE Co., Ltd.)

本ソフトウェアは **GNU Affero General Public License v3.0 (AGPL-3.0)** の下で公開されています。

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU Affero General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

詳細は [LICENSE](LICENSE) ファイルをご覧ください。

### ⚠️ 重要な注意事項 / Important Notice

- 本ソフトウェアを修正して使用する場合、修正後のソースコードを公開する必要があります
- 本ソフトウェアをネットワークサービス（SaaS等）として提供する場合も、ソースコードを公開する必要があります
- 商用利用は可能ですが、上記の条件を遵守する必要があります

### 📋 商用ライセンス / Commercial License

AGPL-3.0の条件を満たせない場合（ソースコード非公開での利用等）、
商用ライセンスをご検討ください。

**お問い合わせ / Contact:**  
ナカシャクリエイテブ株式会社  
https://www.nakasha.co.jp/

> ※ 著作権者であるナカシャクリエイテブ株式会社およびその従業員は、
> 本ライセンスの制限を受けずに本ソフトウェアを使用することができます。

---

## 開発者向け情報 / For Developers

### ディレクトリ構成

```
├── app/                # アプリケーションコード
│   ├── Http/Controllers/   # コントローラー
│   ├── Models/             # Eloquentモデル
│   └── Enums/              # 列挙型
├── config/             # 設定ファイル
├── database/           # マイグレーション・シーダー
├── resources/          # ビュー・アセット
├── routes/             # ルーティング
└── public/             # 公開ディレクトリ
```

---

## 貢献 / Contributing

プルリクエストや Issue の報告を歓迎します。
貢献される際は、AGPL-3.0 ライセンスに同意したものとみなされます。

---

## サポート / Support

問題が発生した場合は、GitHub Issues でお知らせください。

---

**© 2026 ナカシャクリエイテブ株式会社 All Rights Reserved.**
