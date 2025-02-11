-- Création de la base de données
CREATE
DATABASE nexus;

\c
nexus;

-- Création de la table des utilisateurs
CREATE TABLE users
(
    id            SERIAL PRIMARY KEY,
    first_name    VARCHAR(50),                  -- Peut être NULL si l'utilisateur ne fournit pas son prénom
    last_name     VARCHAR(50),                  -- Peut être NULL aussi
    birth_date    DATE,                         -- Peut être NULL, utile pour la flexibilité
    nexus_id      VARCHAR(20) UNIQUE  NOT NULL, -- Identifiant unique obligatoire
    email         VARCHAR(100) UNIQUE NOT NULL, -- Email obligatoire pour connexion
    password_hash TEXT                NOT NULL, -- Obligatoire pour la sécurité
    actif         BOOLEAN        DEFAULT FALSE, -- Statut actif/désactivé
    usdt_balance  DECIMAL(18, 8) DEFAULT 0,     -- Solde USDT (0 par défaut)
    created_at    TIMESTAMP      DEFAULT CURRENT_TIMESTAMP
);

-- Création de la table des cryptomonnaies
CREATE TABLE cryptos
(
    id                 SERIAL PRIMARY KEY,
    name               VARCHAR(100)        NOT NULL, -- Toujours requis
    symbol             VARCHAR(10) UNIQUE  NOT NULL, -- Requis car unique
    slug               VARCHAR(100) UNIQUE NOT NULL, -- Requis car unique
    max_supply         BIGINT         DEFAULT NULL,  -- Peut être inconnu
    market_cap         DECIMAL(18, 2) DEFAULT NULL,  -- Peut être NULL
    volume_24h         DECIMAL(18, 2) DEFAULT NULL,  -- Peut être NULL
    circulating_supply DECIMAL(18, 2) DEFAULT NULL,  -- Peut être NULL
    total_supply       DECIMAL(18, 2) DEFAULT NULL,  -- Peut être NULL
    price              DECIMAL(18, 8) DEFAULT NULL,  -- Peut être NULL si pas encore coté
    last_updated       TIMESTAMP      DEFAULT CURRENT_TIMESTAMP
);

-- Création de la table watchlist (Liste des cryptos suivies par l'utilisateur)
CREATE TABLE watchlist
(
    id        SERIAL PRIMARY KEY,
    user_id   INT REFERENCES users (id) ON DELETE CASCADE,
    crypto_id INT REFERENCES cryptos (id) ON DELETE CASCADE,
    UNIQUE (user_id, crypto_id) -- Un utilisateur ne peut suivre une crypto qu'une seule fois
);

-- Création de la table wallets (Portefeuille des utilisateurs, tableau associatif)
CREATE TABLE wallets
(
    user_id   INT REFERENCES users (id) ON DELETE CASCADE,
    crypto_id INT REFERENCES cryptos (id) ON DELETE CASCADE,
    balance   DECIMAL(18, 8) DEFAULT 0, -- Quantité détenue
    PRIMARY KEY (user_id, crypto_id)    -- Clé primaire composite
);

-- Création de la table transactions
CREATE TABLE transactions
(
    id               SERIAL PRIMARY KEY,
    user_id          INT REFERENCES users (id) ON DELETE CASCADE,
    crypto_id        INT REFERENCES cryptos (id) ON DELETE CASCADE,
    transaction_type VARCHAR(10) CHECK (transaction_type IN ('buy', 'sell', 'transfer')) NOT NULL,
    amount           DECIMAL(18, 8)                                                      NOT NULL,                                 -- Montant en crypto
    usdt_value       DECIMAL(18, 8)                                                      NOT NULL,                                 -- Montant équivalent en USDT
    recipient_id     INT                                                                 REFERENCES users (id) ON DELETE SET NULL, -- Pour les transferts entre utilisateurs
    created_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
