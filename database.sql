CREATE
DATABASE nexus;

\c
nexus;

CREATE TABLE users
(
    id            SERIAL PRIMARY KEY,
    first_name    VARCHAR(50),
    last_name     VARCHAR(50),
    birth_date    DATE,
    nexus_id      VARCHAR(20) UNIQUE  NOT NULL,
    email         VARCHAR(100) UNIQUE NOT NULL,
    password_hash TEXT                NOT NULL,
    actif         BOOLEAN        DEFAULT FALSE,
    usdt_balance  DECIMAL(18, 8) DEFAULT 0,
    created_at    TIMESTAMP      DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cryptos
(
    id                 SERIAL PRIMARY KEY,
    name               VARCHAR(100)       ,
    symbol             VARCHAR(100) UNIQUE ,

    last_updated       TIMESTAMP      DEFAULT CURRENT_TIMESTAMP
);

-- Création de la table watchlist (Liste des cryptos suivies par l'utilisateur)
CREATE TABLE watchlist
(
    id        SERIAL PRIMARY KEY,
    id   INT REFERENCES users (id) ON DELETE CASCADE,
    crypto_id INT REFERENCES cryptos (id) ON DELETE CASCADE,
    UNIQUE (id, crypto_id)
);

-- Création de la table wallets (Portefeuille des utilisateurs, tableau associatif)
CREATE TABLE wallets
(
    id   INT REFERENCES users (id) ON DELETE CASCADE,
    crypto_id INT REFERENCES cryptos (id) ON DELETE CASCADE,
    balance   DECIMAL(18, 8) DEFAULT 0,
    PRIMARY KEY (id, crypto_id)
);

-- Création de la tble transactions
CREATE TABLE transactions
(
    id               SERIAL PRIMARY KEY,
    id          INT REFERENCES users (id) ON DELETE CASCADE,
    crypto_id        INT REFERENCES cryptos (id) ON DELETE CASCADE,

                                                  NOT NULL,
    usdt_value       DECIMAL(18, 8)                                                      NOT NULL,
    recipient_id     INT                                                                 REFERENCES users (id) ON DELETE SET NULL,
    created_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE transaction(
    id SERIAL PRIMARY KEY ,
    crypto_id INT ,
   FOREIGN KEY (crypto_id) REFERENCES  cryptos(id),
   price float ,
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
