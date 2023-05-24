CREATE TABLE boutiques (
    id_boutique INT PRIMARY KEY NOT NULL, 
    nom VARCHAR,
    id_adresse INT,
    id_utilisateur INT
);

CREATE TABLE utilisateurs(
    id_utilisateur INT PRIMARY KEY NOT NULL,
    nom VARCHAR, 
    prenom VARCHAR, 
    role VARCHAR, 
    mail VARCHAR(200),
    password CHAR(60)
);

CREATE TABLE commandes(
    id_commande INT PRIMARY KEY NOT NULL,
    id_utilisateur VARCHAR,
    id_adresse VARCHAR, 
    id_article VARCHAR,
    quantite VARCHAR, 
    statut TEXT
);

CREATE TABLE article(
    id_article INT PRIMARY KEY NOT NULL,
    nom VARCHAR,
    type VARCHAR,
    unit VARCHAR,
    prix NUMBER, 
    description TEXT
);

CREATE TABLE adresses(
    id_adresse INT PRIMARY KEY NOT NULL,
    numero VARCHAR,
    complement VARCHAR,
    nom VARCHAR,
    CP VARCHAR,
    ville VARCHAR
);

CREATE TABLE stock(
    id_article INT,
    id_boutique INT,
    quantite NUMBER,
    visible BOOLEAN
);




