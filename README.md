# CorePvP
気まぐれクッキング  
一周回ってレガシーなコード

# DB
### players
| カラム名 | 型 | PK | FK | NN | UNIQUE | A_I | INDEX | DEFAULT | 備考 |
| --- | --- | :---: | --- | :---: | :---: | :---: | :---: | --- | --- |
| id | INTEGER UNSIGNED | ○ |  |  |  | ○ |  |  |  |
| uuid | BINARY(16) |  |  | ○ | ○ |  | ○ |  |  |
| name | VARCHAR(16) |  |  | ○ | ○ |  | ○ |  |  |
| money | INTEGER UNSIGNED |  |  | ○ |  |  |  | 0 |  |
| level | FLOAT UNSIGNED |  |  | ○ |  |  |  | 0 |  |
| created_at | DATETIME |  |  | ○ |  |  |  | CURRENT_TIMESTAMP |  |
| updated_at | DATETIME |  |  | ○ |  |  |  | CURRENT_TIMESTAMP | ON UPDATE CURRENT_TIMESTAMP |

### game_histories
| カラム名 | 型 | PK | FK | NN | UNIQUE | A_I | INDEX | DEFAULT | 備考 |
| --- | --- | :---: | :---: | :---: | :---: | :---: | :---: | --- | --- |
| id | INTEGER UNSIGNED | ○ |  |  |  | ○ |  |  |  |
| began_at | DATETIME |  |  |  |  |  |  |  |  |
| ended_at | DATETIME |  |  |  |  |  |  |  |  |

### join_destroying_core_histories
| カラム名 | 型 | PK | FK | NN | UNIQUE | A_I | INDEX | DEFAULT | 備考 |
| --- | --- | :---: | --- | :---: | :---: | :---: | :---: | --- | --- |
| id | INTEGER UNSIGNED | ○ |  |  |  | ○ |  |  |  |
| game | INTEGER UNSIGNED |  | game_histories.id | ○ |  |  |  |  |  |
| player | INTEGER UNSIGNED |  | players.id | ○ |  |  |  |  |  |

### destroy_core_histories
| カラム名 | 型 | PK | FK | NN | UNIQUE | A_I | INDEX | DEFAULT | 備考 |
| --- | --- | :---: | --- | :---: | :---: | :---: | :---: | --- | --- |
| id | INTEGER UNSIGNED | ○ |  |  |  | ○ |  |  |  |
| game | INTEGER UNSIGNED |  | game_histories.id | ○ |  |  |  |  |  |
| player | INTEGER UNSIGNED |  | players.id | ○ |  |  |  |  |  |
| created_at | DATETIME |  |  | ○ |  |  |  | CURRENT_TIMESTAMP |  |

### death_histories
| カラム名 | 型 | PK | FK | NN | UNIQUE | A_I | INDEX | DEFAULT | 備考 |
| --- | --- | :---: | --- | :---: | :---: | :---: | :---: | --- | --- |
| id | INTEGER UNSIGNED | ○ |  |  |  | ○ |  |  |  |
| game | INTEGER UNSIGNED | | game_histories.id | | | | | | |
| dead | INTEGER UNSIGNED |  | players.id | ○ |  |  |  |  | 死んだプレイヤーのplayers.id |
| killer | INTEGER UNSIGNED |  | players.id |  |  |  |  |  | 死んだ原因が他のプレイヤーから殺された場合のみ、殺してきたプレイヤーのplayers.id |
| created_at | DATETIME |  |  | ○ |  |  |  | CURRENT_TIMESTAMP |  |
