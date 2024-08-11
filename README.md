# CorePvP
気まぐれクッキング  
一周回ってレガシーなコード

# DB
### players(プレイヤー)
| 論理カラム名 | 物理カラム名 | 型 | PK | FK | NN | UNIQUE | A_I | INDEX | DEFAULT | 備考 |
| --- | --- | --- | :---: | --- | :---: | :---: | :---: | :---: | --- | --- |
| ID| id | INTEGER UNSIGNED | ○ |  |  |  | ○ |  |  |  |
| プレイヤーUUID | uuid | BINARY(16) |  |  | ○ | ○ |  | ○ |  |  |
| 作成日 | created_at | DATETIME |  |  | ○ |  |  |  | CURRENT_TIMESTAMP |  |

### name_histories(プレイヤー名更新履歴)
| 論理カラム名 | 物理カラム名 | 型 | PK | FK | NN | UNIQUE | A_I | INDEX | DEFAULT | 備考 |
| --- | --- | --- | :---: | :---: | :---: | :---: | :---: | :---: | --- | --- |
| ID | id | INTEGER UNSIGNED | ○ |  |  |  | ○ |  |  |  |
| プレイヤーID | player | INTEGER UNSIGNED |  | players.id | ○ |  |  |  |  |  |
| 更新前名前 | old_name | VARCHAR(16) |  |  | ○ |  |  |  |  |  |
| 更新後名前 | new_name | VARCHAR(16) |  |  | ○ |  |  |  |  |  |
| 更新理由 | reason | VARCHAR(50) |  |  |  |  |  |  |  |  |
| 作成日 | created_at | DATETIME |  |  | ○ |  |  |  | CURRENT_TIMESTAMP |  |

### money_histories(所持金更新履歴)
| 論理カラム名 | 物理カラム名 | 型 | PK | FK | NN | UNIQUE | A_I | INDEX | DEFAULT | 備考 |
| --- | --- | --- | :---: | :---: | :---: | :---: | :---: | :---: | --- | --- |
| ID | id | INTEGER UNSIGNED | ○ |  |  |  | ○ |  |  |  |
| プレイヤーID | player | INTEGER UNSIGNED |  | players.id | ○ |  |  |  |  |  |
| 更新前金額 | old_money | INTEGER UNSIGNED |  |  | ○ |  |  |  |  |  |
| 更新後金額 | new_money | INTEGER UNSIGNED |  |  | ○ |  |  |  |  |  |
| 更新理由 | reason | VARCHAR(50) |  |  |  |  |  |  |  |  |
| 作成日 | created_at | DATETIME |  |  | ○ |  |  |  | CURRENT_TIMESTAMP |  |

### level_histories(レベル更新履歴)
| 論理カラム名 | 物理カラム名 | 型 | PK | FK | NN | UNIQUE | A_I | INDEX | DEFAULT | 備考 |
| --- | --- | --- | :---: | :---: | :---: | :---: | :---: | :---: | --- | --- |
| ID | id | INTEGER UNSIGNED | ○ |  |  |  | ○ |  |  |  |
| プレイヤーID | player | INTEGER UNSIGNED |  | players.id | ○ |  |  |  |  |  |
| 更新前レベル | old_level | FLOAT UNSIGNED |  |  | ○ |  |  |  |  |  |
| 更新後レベル | new_level | FLOAT UNSIGNED |  |  | ○ |  |  |  |  |  |
| 更新理由 | reason | VARCHAR(50) |  |  |  |  |  |  |  |  |
| 作成日 | created_at | DATETIME |  |  | ○ |  |  |  | CURRENT_TIMESTAMP |  |

### game_histories(ゲーム開催履歴)
| 論理カラム名 | 物理カラム名 | 型 | PK | FK | NN | UNIQUE | A_I | INDEX | DEFAULT | 備考 |
| --- | --- | --- | :---: | :---: | :---: | :---: | :---: | :---: | --- | --- |
| ID | id | INTEGER UNSIGNED | ○ |  |  |  | ○ |  |  |  |
| 開始日時 | began_at | DATETIME |  |  |  |  |  |  |  |  |
| 終了日時 | ended_at | DATETIME |  |  |  |  |  |  |  |  |
| 作成日 | created_at | DATETIME |  |  | ○ |  |  |  | CURRENT_TIMESTAMP |  |

### join_game_histories(ゲーム参加履歴)
| 論理カラム名 | 物理カラム名 | 型 | PK | FK | NN | UNIQUE | A_I | INDEX | DEFAULT | 備考 |
| --- | --- | --- | :---: | --- | :---: | :---: | :---: | :---: | --- | --- |
| ID | id | INTEGER UNSIGNED | ○ |  |  |  | ○ |  |  |  |
| ゲームID | game | INTEGER UNSIGNED |  | game_histories.id | ○ |  |  |  |  |  |
| プレイヤーID | player | INTEGER UNSIGNED |  | players.id | ○ |  |  |  |  |  |
| チーム | team | INTEGER UNSIGNED |  |  | ○ |  |  |  |  |  |
| 作成日 | created_at | DATETIME |  |  | ○ |  |  |  | CURRENT_TIMESTAMP |  |

### destroy_core_histories(コア破壊履歴)
| 論理カラム名 | 物理カラム名 | 型 | PK | FK | NN | UNIQUE | A_I | INDEX | DEFAULT | 備考 |
| --- | --- | --- | :---: | --- | :---: | :---: | :---: | :---: | --- | --- |
| ID | id | INTEGER UNSIGNED | ○ |  |  |  | ○ |  |  |  |
| ゲームID | game | INTEGER UNSIGNED |  | game_histories.id | ○ |  |  |  |  |  |
| プレイヤーID | player | INTEGER UNSIGNED |  | players.id | ○ |  |  |  |  |  |
| 作成日 | created_at | DATETIME |  |  | ○ |  |  |  | CURRENT_TIMESTAMP |  |

### death_histories(死亡履歴)
| 論理カラム名 | 物理カラム名 | 型 | PK | FK | NN | UNIQUE | A_I | INDEX | DEFAULT | 備考 |
| --- | --- | --- | :---: | --- | :---: | :---: | :---: | :---: | --- | --- |
| ID | id | INTEGER UNSIGNED | ○ |  |  |  | ○ |  |  |  |
| ゲームID | game | INTEGER UNSIGNED | | game_histories.id |  |  |  |  |  |  |
| 死亡プレイヤーID | dead | INTEGER UNSIGNED |  | players.id | ○ |  |  |  |  | 死んだプレイヤーのplayers.id |
| キルプレイヤー | killer | INTEGER UNSIGNED |  | players.id |  |  |  |  |  | 死んだ原因が他のプレイヤーから殺された場合のみ、殺してきたプレイヤーのplayers.id |
| 作成日 | created_at | DATETIME |  |  | ○ |  |  |  | CURRENT_TIMESTAMP |  |
