CREATE TABLE demande_appro (
    id INT AUTO_INCREMENT PRIMARY KEY,
    agence VARCHAR(255),
    service VARCHAR(255),
    utilisateur VARCHAR(255),
    date_heure_demande TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_fin_souhaite DATE,
    type_demande VARCHAR(50),
    equipement VARCHAR(50),
    categorie VARCHAR(50),
    objet TEXT,
    fichier1 VARCHAR(255),
    fichier2 VARCHAR(255),
    fichier3 VARCHAR(255),
    detail TEXT,
); 

CREATE TABLE agence (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

CREATE TABLE service (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL
);

CREATE TABLE agence_service (
    id INT AUTO_INCREMENT PRIMARY KEY,
    agence_id INT,
    service_id INT,
    FOREIGN KEY (agence_id) REFERENCES agence(id),
    FOREIGN KEY (service_id) REFERENCES service(id)
);

CREATE TABLE categorie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

CREATE TABLE application(
    id INT AUTO_INCREMENT PRIMARY KEY,
    code_appli VARCHAR(50) UNIQUE,
    nom_appli VARCHAR(100),
    date_creation DATE
);

INSERT INTO application(code_appli, nom_appli, date_creation)
VALUES ('APPRO', 'DEMANDE D''APPROVISIONNEMENT', '2024-07-22');

CREATE TABLE statut_demande (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_application INT,
    code_stat VARCHAR(50),
    description VARCHAR(255),
    date_creation date,
    date_modification date,
    FOREIGN KEY (id_application) REFERENCES application(id)
);

INSERT INTO statut_demande(id_application, code_stat, description, date_creation, date_modification)
VALUES((SELECT id FROM application WHERE code_appli = 'APPRO'), 'OUVRT', 'OUVERT', '2024-07-22', '2024-07-22'),
       ((SELECT id FROM application WHERE code_appli = 'APPRO'), 'APPROUV', 'A APPROUVER', '2024-07-22', '2024-07-22'),
       ((SELECT id FROM application WHERE code_appli = 'APPRO'), 'ENCOURS APPR', 'ENCOURS APPRO STOCK', '2024-07-22', '2024-07-22'),
       ((SELECT id FROM application WHERE code_appli = 'APPRO'), 'STOCK INSUF', 'STOCK INSUFFISANT', '2024-07-22', '2024-07-22'),
       ((SELECT id FROM application WHERE code_appli = 'APPRO'), 'ENCOURS ACHAT', 'ENCOURS ACHAT DIRECT', '2024-07-22', '2024-07-22'),
       ((SELECT id FROM application WHERE code_appli = 'APPRO'), 'LIVR', 'LIVRER', '2024-07-22', '2024-07-22'),
       ((SELECT id FROM application WHERE code_appli = 'APPRO'), 'INCOMPL', 'INCOMPLET', '2024-07-22', '2024-07-22')
;

ALTER TABLE demande_appro 
ADD COLUMN id_statut INT DEFAULT 1,
ADD CONSTRAINT fk_demande_appro_statut FOREIGN KEY (id_statut) REFERENCES statut_demande(id);

UPDATE statut_demande
SET description = 'OUVERT'
WHERE id = 1;


CREATE TABLE user_login(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom_user VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
     date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE admin(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom_admin VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ALTER TABLE admin
-- CHANGE COLUMN nom_user nom_admin VARCHAR(50) NOT NULL;

INSERT INTO admin(nom_admin, password)
VALUES ('RAKOTOBE Jean', 'admin@Hff');   


ALTER TABLE admin 
ADD UNIQUE(nom_admin);

DROP TABLE IF EXISTS admin;

CREATE TABLE utilisateur (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    password VARCHAR(255),
    email_adress VARCHAR(255),
    agence VARCHAR(255),
    service VARCHAR(255),
    role VARCHAR(255),
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE validateur (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    password VARCHAR(255),
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


UPDATE statut_demande
SET description = 'STOCK INSUFFISANT',
 code_stat = 'STOCK INSUF'
WHERE id = 4;

UPDATE statut_demande
SET description = 'ENCOURS ACHAT DIRECT',
 code_stat = 'ENCOURS ACHAT'
WHERE id = 5;

UPDATE statut_demande
SET description = 'LIVRER',
code_stat = 'LIVR'
WHERE id = 6;

INSERT INTO statut_demande(id_application, code_stat, description, date_creation, date_modification)
      VALUES ((SELECT id FROM application WHERE code_appli = 'APPRO'), 'INCOMPL', 'INCOMPLET', '2024-07-22', '2024-07-22');

ALTER TABLE validateur 
ADD COLUMN code_stat INT,
ADD CONSTRAINT fk_validateur_statut_dem FOREIGN KEY (id_statut) REFERENCES statut_demande(id);

ALTER TABLE validateur 
DROP COLUMN id_statut;

ALTER TABLE validateur 
ADD COLUMN code_statut VARCHAR(50),
ADD CONSTRAINT fk_statut_code
FOREIGN KEY (code_statut) REFERENCES statut_demande(code_stat);

ALTER TABLE demande_appro 
DROP COLUMN id_validateur;

CREATE TABLE validateur_stat_dem (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
demande_id INT,
validateur_id INT,
statut_id INT,
date_validation_dem TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (demande_id) REFERENCES demande_appro(id),
FOREIGN KEY (validateur_id) REFERENCES validateur(id),
FOREIGN KEY (statut_id) REFERENCES statut_demande(id)
);


    ALTER TABLE demande_appro
    MODIFY COLUMN date_heure_demande TIMESTAMP DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE agence_service 
ADD agence_nom VARCHAR(100) NOT NULL;

ALTER TABLE agence_service 
ADD service_nom VARCHAR(255) NOT NULL;

ALTER TABLE utilisateur 
ADD email_adress VARCHAR(255);

ALTER TABLE validateur 
ADD email_adress VARCHAR(255);

ALTER TABLE admin 
ADD email_adress VARCHAR(255);


CREATE TABLE demande_appro_archive (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- Identifiant unique pour chaque enregistrement
    agence VARCHAR(255),                -- Information sur l'agence
    service VARCHAR(255),               -- Information sur le service
    utilisateur VARCHAR(255),           -- Information sur le demandeur
    date_heure_demande DATETIME,        -- Date et heure de la demande
    date_fin_souhaite DATE,             -- Date souhaitée de fin
    type_demande VARCHAR(50),           -- Type de demande
    entretient_equip VARCHAR(50),       -- Entretien de l'équipement
    categorie VARCHAR(50),              -- Catégorie de la demande
    objet TEXT,                         -- Objet de la demande
    fichier1 VARCHAR(255),              -- Pièce jointe
    detail TEXT,                        -- Détails supplémentaires
    id_statut INT,                      -- Statut de la demande (si pertinent pour l'archive)
    date_suppression TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- Date et heure de suppression, par défaut actuelle
);

ALTER TABLE utilisateur 
ADD role VARCHAR(255);

ALTER TABLE validateur 
ADD role VARCHAR(255);

ALTER TABLE admin 
ADD role VARCHAR(255);

ALTER TABLE admin 
ADD nom VARCHAR(255),
ADD prenom VARCHAR(255);

CREATE TABLE admin(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    password VARCHAR(255) NOT NULL,
    email_adress VARCHAR(255),
    role VARCHAR(255),
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE validateur_archive (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    password VARCHAR(255),
    date_creation date,
    code_statut VARCHAR(50),
    email_adress VARCHAR(255),
    role VARCHAR(255),
    date_suppression TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE utilisateur_archive (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    password VARCHAR(255),
    date_creation date,
    email_adress VARCHAR(255),
    agence VARCHAR(255),
    service VARCHAR(255),
    role VARCHAR(255),
    date_suppression TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE admin_archive(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    password VARCHAR(255) NOT NULL,
    email_adress VARCHAR(255),
    role VARCHAR(255),
    date_creation date,
    date_suppression TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE utilisateur 
ADD agence VARCHAR(255),
ADD service VARCHAR(255);

ALTER TABLE utilisateur_archive 
ADD  agence VARCHAR(255),
ADD  service VARCHAR(255);

ALTER TABLE validateur 
ADD agence VARCHAR(255),
ADD service VARCHAR(255);

ALTER TABLE validateur_archive 
ADD  agence VARCHAR(255),
ADD  service VARCHAR(255);

ALTER TABLE demande_appro 
ADD token CHAR(32);
ALTER TABLE demande_appro 
ADD CONSTRAINT unique_token UNIQUE (token);


