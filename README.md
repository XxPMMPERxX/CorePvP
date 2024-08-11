# CorePvP
気まぐれクッキング  
一周回ってレガシーなコード

# DB
### players(プレイヤー)
プレイヤー
| 論理カラム名 | 物理カラム名 | 型 | PK | FK | NN | UNIQUE | A_I | INDEX | DEFAULT | 備考 |
| --- | --- | --- | :---: | --- | :---: | :---: | :---: | :---: | --- | --- |
| ID| id | INTEGER UNSIGNED | ○ |  |  |  | ○ |  |  |  |
| プレイヤーUUID | uuid | BINARY(16) |  |  | ○ | ○ |  | ○ |  |  |
| プレイヤー名 | name | VARCHAR(16) |  |  | ○ | ○ |  | ○ |  |  |
| 所持金額 | money | INTEGER UNSIGNED |  |  | ○ |  |  |  | 0 |  |
| レベル | level | FLOAT UNSIGNED |  |  | ○ |  |  |  | 0 |  |
| 作成日 | created_at | DATETIME |  |  | ○ |  |  |  | CURRENT_TIMESTAMP |  |
| 更新日 | updated_at | DATETIME |  |  | ○ |  |  |  | CURRENT_TIMESTAMP | ON UPDATE CURRENT_TIMESTAMP |

### game_histories(ゲーム履歴)
| 論理カラム名 | 物理カラム名 | 型 | PK | FK | NN | UNIQUE | A_I | INDEX | DEFAULT | 備考 |
| --- | --- | --- | :---: | :---: | :---: | :---: | :---: | :---: | --- | --- |
| ID | id | INTEGER UNSIGNED | ○ |  |  |  | ○ |  |  |  |
| 開始日時 | began_at | DATETIME |  |  |  |  |  |  |  |  |
| 終了日時 | ended_at | DATETIME |  |  |  |  |  |  |  |  |

### join_destroying_core_histories(コア破壊参加履歴)
| 論理カラム名 | 物理カラム名 | 型 | PK | FK | NN | UNIQUE | A_I | INDEX | DEFAULT | 備考 |
| --- | --- | --- | :---: | --- | :---: | :---: | :---: | :---: | --- | --- |
| ID | id | INTEGER UNSIGNED | ○ |  |  |  | ○ |  |  |  |
| ゲームID | game | INTEGER UNSIGNED |  | game_histories.id | ○ |  |  |  |  |  |
| プレイヤーID | player | INTEGER UNSIGNED |  | players.id | ○ |  |  |  |  |  |
| チーム | team | INTEGER UNSIGNED | 

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

### 
