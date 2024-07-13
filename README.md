# CorePvP
気まぐれクッキング  
一周回ってレガシーなコード

# DB
### accounts
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

### game_join_histories
| カラム名 | 型 | PK | FK | NN | UNIQUE | A_I | INDEX | DEFAULT | 備考 |
| --- | --- | :---: | --- | :---: | :---: | :---: | :---: | --- | --- |
| id | INTEGER UNSIGNED | ○ |  |  |  | ○ |  |  |  |
| game_id | INTEGER UNSIGNED |  | game_histories.id | ○ |  |  |  |  |  |
| account_id | INTEGER UNSIGNED |  | accounts.id | ○ |  |  |  |  |  |

### death_histories
| カラム名 | 型 | PK | FK | NN | UNIQUE | A_I | INDEX | DEFAULT | 備考 |
| --- | --- | :---: | --- | :---: | :---: | :---: | :---: | --- | --- |
| id | INTEGER UNSIGNED | ○ |  |  |  | ○ |  |  |  |
| dead | INTEGER UNSIGNED |  | accounts.id | ○ |  |  |  |  | 死んだプレイヤーのaccounts.id |
| killer | INTEGER UNSIGNED |  | accounts.id |  |  |  |  |  | 死んだ原因が他のプレイヤーから殺された場合のみ、殺してきたプレイヤーのaccounts.id |
| created_at | DATETIME |  |  | ○ |  |  |  | CURRENT_TIMESTAMP |  |
