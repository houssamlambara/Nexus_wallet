-- Création de la base de données
CREATE DATABASE nexus2;

\c nexus2;

-- Création de la table des utilisateurs
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    first_name VARCHAR(50) ,
    last_name VARCHAR(50) ,
    birth_date DATE ,
    nexus_id VARCHAR(20) UNIQUE ,
    email VARCHAR(100) UNIQUE ,
    actif boolean default 'false',
    password_hash TEXT ,
    usdt_balance DECIMAL(18,8) DEFAULT 0, -- Solde USDT de l'utilisateur
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Création de la table des cryptomonnaies
CREATE TABLE cryptos (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) ,
    symbol VARCHAR(10) UNIQUE ,
    slug VARCHAR(100) UNIQUE ,
    max_supply BIGINT,
    market_cap DECIMAL(18,2),
    volume_24h DECIMAL(18,2),
    circulating_supply DECIMAL(18,2),
    total_supply DECIMAL(18,2),
    price DECIMAL(18,8),
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Création de la table watchlist (Liste des cryptos suivies par l'utilisateur)
CREATE TABLE watchlist (
    id SERIAL PRIMARY KEY,
    user_id INT REFERENCES users(id) ON DELETE CASCADE,
    crypto_id INT REFERENCES cryptos(id) ON DELETE CASCADE,
    UNIQUE (user_id, crypto_id) -- Un utilisateur ne peut suivre une crypto qu'une seule fois
);

-- Création de la table wallets (Portefeuille des utilisateurs)
CREATE TABLE wallets (
    id SERIAL PRIMARY KEY,
    user_id INT REFERENCES users(id) ON DELETE CASCADE,
    crypto_id INT REFERENCES cryptos(id) ON DELETE CASCADE,
    balance DECIMAL(18,8) DEFAULT 0, -- Quantité détenue
    UNIQUE (user_id, crypto_id) -- Un utilisateur ne peut avoir qu'un seul wallet par crypto
);
