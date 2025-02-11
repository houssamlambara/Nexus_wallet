-- Création de la base de données
CREATE
DATABASE nexus;

\c
nexus;

-- Création de la table des utilisateurs
CREATE TABLE users
(
    id            SERIAL PRIMARY KEY,
    first_name    VARCHAR(50)         NOT NULL,
    last_name     VARCHAR(50)         NOT NULL,
    birth_date    DATE,
    nexus_id      VARCHAR(20) UNIQUE  NOT NULL,
    email         VARCHAR(100) UNIQUE NOT NULL,
    password_hash TEXT                NOT NULL,
    actif boolean default 'false',
    usdt_balance  DECIMAL(18, 8) DEFAULT 0, -- Solde USDT de l'utilisateur
    created_at    TIMESTAMP      DEFAULT CURRENT_TIMESTAMP
);

-- Création de la table des cryptomonnaies
CREATE TABLE cryptos
(
    id                 SERIAL PRIMARY KEY,
    name               VARCHAR(100)        NOT NULL,
    symbol             VARCHAR(10) UNIQUE  NOT NULL,
    slug               VARCHAR(100) UNIQUE NOT NULL,
    max_supply         BIGINT,
    market_cap         DECIMAL(18, 2),
    volume_24h         DECIMAL(18, 2),
    circulating_supply DECIMAL(18, 2),
    total_supply       DECIMAL(18, 2),
    price              DECIMAL(18, 8),
    last_updated       TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Création de la table watchlist (Liste des cryptos suivies par l'utilisateur)
CREATE TABLE watchlist
(
    id        SERIAL PRIMARY KEY,
    user_id   INT REFERENCES users (id) ON DELETE CASCADE,
    crypto_id INT REFERENCES cryptos (id) ON DELETE CASCADE,
    UNIQUE (user_id, crypto_id) -- Un utilisateur ne peut suivre une crypto qu'une seule fois
);

-- Création de la table wallets (Portefeuille des utilisateurs)
CREATE TABLE wallets
(
    id        SERIAL PRIMARY KEY,
    user_id   INT REFERENCES users (id) ON DELETE CASCADE,
    crypto_id INT REFERENCES cryptos (id) ON DELETE CASCADE,
    balance   DECIMAL(18, 8) DEFAULT 0, -- Quantité détenue
    UNIQUE (user_id, crypto_id)         -- Un utilisateur ne peut avoir qu'un seul wallet par crypto
);
CREATE TABLE transactions
(
    id               SERIAL PRIMARY KEY,
    user_id          INT REFERENCES users (id) ON DELETE CASCADE,
    crypto_id        INT REFERENCES cryptos (id) ON DELETE CASCADE,
    transaction_type VARCHAR(10) CHECK (transaction_type IN ('buy', 'sell', 'transfer')),
    amount           DECIMAL(18, 8) NOT NULL,                                 -- Montant en crypto
    usdt_value       DECIMAL(18, 8) NOT NULL,                                 -- Montant équivalent en USDT
    recipient_id     INT            REFERENCES users (id) ON DELETE SET NULL, -- Uniquement pour les transferts
    created_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
