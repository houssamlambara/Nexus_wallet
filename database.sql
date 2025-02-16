CREATE
DATABASE nexus;

\c
nexus;

CREATE TYPE transaction_type AS ENUM (
    'send',
    'buy',
    'sell'
);
CREATE TABLE IF NOT EXISTS cryptos (
                                       id SERIAL PRIMARY KEY,
                                       name VARCHAR(100) NOT NULL,
    symbol VARCHAR(100) NOT NULL,
    last_updated TIMESTAMP WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP
    );

CREATE TABLE IF NOT EXISTS users (
                                     id SERIAL PRIMARY KEY,
                                     first_name VARCHAR(50),
    last_name VARCHAR(50),
    birth_date DATE,
    nexus_id VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password_hash TEXT NOT NULL,
    usdt_balance NUMERIC(18,8) DEFAULT 0,
    created_at TIMESTAMP WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    is_verified BOOLEAN,
    otp_code VARCHAR(6),
    CONSTRAINT users_email_key UNIQUE (email),
    CONSTRAINT users_nexus_id_key UNIQUE (nexus_id)
    );

CREATE TABLE IF NOT EXISTS transactions (
                                            id SERIAL PRIMARY KEY,
                                            user_id INTEGER,
                                            crypto_id INTEGER,
                                            usdt_value NUMERIC(18,8) NOT NULL,
    recipient_id INTEGER,
    created_at TIMESTAMP WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    type transaction_type,
    CONSTRAINT transactions_user_id_fkey FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT transactions_crypto_id_fkey FOREIGN KEY (crypto_id) REFERENCES cryptos(id) ON DELETE CASCADE,
    CONSTRAINT transactions_recipient_id_fkey FOREIGN KEY (recipient_id) REFERENCES users(id) ON DELETE SET NULL
    );

CREATE TABLE IF NOT EXISTS watchlist (
                                         id SERIAL PRIMARY KEY,
                                         user_id INTEGER NOT NULL,
                                         crypto_id VARCHAR(255) NOT NULL,
    crypto_name VARCHAR(255) NOT NULL,
    coin_symbol VARCHAR(50) NOT NULL,
    coin_price NUMERIC(18,8) NOT NULL,
    coin_image TEXT NOT NULL,
    CONSTRAINT watchlist_user_id_fkey FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    );
CREATE TABLE IF NOT EXISTS wallets (
                                       user_id INTEGER NOT NULL,
                                       balance NUMERIC(18,8) DEFAULT 0,
    crypto_id VARCHAR(50),
    CONSTRAINT wallets_user_id_fkey FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT wallets_crypto_id_key UNIQUE (crypto_id)
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
