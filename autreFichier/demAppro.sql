CREATE TABLE demande_appro (
    id INT AUTO_INCREMENT PRIMARY KEY,
    agence VARCHAR(255),
    service VARCHAR(255),
    utilisateur VARCHAR(255),
    date_heure_enregistrement DATETIME,
    date_fin_souhaite DATE,
    type_demande VARCHAR(50),
    equipement VARCHAR(50),
    categorie VARCHAR(50),
    objet TEXT,
    fichier1 VARCHAR(255),
    fichier2 VARCHAR(255),
    fichier3 VARCHAR(255),
    detail TEXT
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


CREATE TABLE demande_appro_archive (
    id INT AUTO_INCREMENT PRIMARY KEY,
    agence VARCHAR(255),
    service VARCHAR(255),
    utilisateur VARCHAR(255),
    date_heure_enregistrement DATETIME,
    date_fin_souhaite DATE,
    type_demande VARCHAR(50),
    equipement VARCHAR(50),
    categorie VARCHAR(50),
    objet TEXT,
    fichier1 VARCHAR(255),
    fichier2 VARCHAR(255),
    fichier3 VARCHAR(255),
    detail TEXT
); 


