# CorePvP
気まぐれクッキング  
一周回ってレガシーなコード

# DB
### accounts
| カラム名 | 型 | PK | NN | A_I | 備考 |
| --- | --- | :---: | :---: | :---: | --- |
| id | INTEGER | ○ | ○ | ○ | |
| uuid | BINARY(16) | × | ○ | × | |
| name | VARCHAR(16) | × | ○ | × | |
| money | INTEGER | × | ○ | × | |
| level | FLOAT | × | ○ | × | |
| play_count | INTEGER | × | ○ | × | |
| kill_count | INTEGER | × | ○ | × | |
| death_count | INTEGER | × | ○ | × | |
| break_count | INTEGER | × | ○ | × | |

### game_histories
| カラム名 | 型 | PK | NN | A_I | 備考 |
| --- | --- | :---: | :---: | :---: | --- |
| id | INTEGER | ○ | ○ | ○ | |

### death_histories
| カラム名 | 型 | PK | NN | A_I | 備考 |
| --- | --- | :---: | :---: | :---: | --- |
| id | INTEGER | ○ | ○ | ○ | |
| death | INTEGER | × | ○ | × | 死んだプレイヤーのaccounts.id |
| kill | INTEGER | × | × | × | 死んだ原因が他プレイヤーの場合は他プレイヤーのaccounts.id |
| created_at | DATETIME | × | ○ | × | |
