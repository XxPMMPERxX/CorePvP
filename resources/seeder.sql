PRAGMA foreign_keys = ON;

CREATE TABLE players (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    uuid BLOB NOT NULL UNIQUE,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE INDEX player_uuid_index ON players(uuid);

CREATE TABLE name_histories (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    player INTEGER NOT NULL,
    old_name VARCHAR(16) NOT NULL,
    new_name VARCHAR(16) NOT NULL,
    reason VARCHAR(50),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (player) REFERENCES players(id)
);

CREATE TABLE money_histories (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    player INTEGER NOT NULL,
    old_money INTEGER NOT NULL,
    new_money INTEGER NOT NULL,
    reason VARCHAR(50),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (player) REFERENCES players(id)
);

CREATE TABLE level_histories (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    player INTEGER NOT NULL,
    old_level REAL NOT NULL,
    new_level REAL NOT NULL,
    reason VARCHAR(50),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (player) REFERENCES players(id)
);

CREATE TABLE game_histories (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    began_at DATETIME,
    ended_at DATETIME,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE join_game_histories (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    game INTEGER NOT NULL,
    player INTEGER NOT NULL,
    team INTEGER NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (game) REFERENCES game_histories(id),
    FOREIGN KEY (player) REFERENCES players(id)
);

CREATE TABLE destroy_core_histories (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    game INTEGER NOT NULL,
    player INTEGER NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (game) REFERENCES game_histories(id),
    FOREIGN KEY (player) REFERENCES players(id)
);

CREATE TABLE death_histories (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    game INTEGER,
    dead INTEGER NOT NULL,
    killer INTEGER,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (game) REFERENCES game_histories(id),
    FOREIGN KEY (dead) REFERENCES players(id),
    FOREIGN KEY (killer) REFERENCES players(id)
);
