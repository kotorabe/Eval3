CREATE DATABASE eval3;
CREATE ROLE eval3_manager LOGIN PASSWORD '1234';
ALTER DATABASE eval3 OWNER TO eval3_manager;

CREATE SEQUENCE sq_usr;
CREATE TABLE utilisateur(
    id_user VARCHAR(10) NOT NULL PRIMARY KEY DEFAULT 'user_'||nextval('sq_usr'),
    nom VARCHAR(50),
    prenom VARCHAR(50),
    email VARCHAR(50),
    password TEXT
);

CREATE TABLE admins(
    id_ad SERIAL NOT NULL PRIMARY KEY,
    pseudo VARCHAR(50),
    password TEXT
);
INSERT INTO admins (pseudo, password) VALUES ('admin', 'admin');

CREATE TABLE sexe(
    id_sexe SERIAL PRIMARY KEY NOT NULL,
    genre CHAR(1)
);
INSERT INTO sexe(genre) VALUES('m'),('f');

CREATE SEQUENCE sq_ptnt;
CREATE TABLE patient(
    id_patient VARCHAR(10) NOT NULL PRIMARY KEY DEFAULT 'ptnt_'||nextval('sq_ptnt'),
    nom VARCHAR(50),
    prenom VARCHAR(50),
    date_naissance DATE,
    id_sexe INT REFERENCES sexe(id_sexe),
    remboursement BOOLEAN,
    date_inscription TIMESTAMP DEFAULT NOW(),
    etat INT DEFAULT 0
);

CREATE SEQUENCE sq_tp_act;
CREATE TABLE type_acte(
    id_type_acte VARCHAR(10) NOT NULL PRIMARY KEY DEFAULT 'tp_act_'||nextval('sq_tp_act'),
    nom VARCHAR(50),
    code VARCHAR(5)
);
INSERT INTO type_acte(nom,code) VALUES('Consultation','COS'),('Operation', 'OPER'),('Analyse', 'ANA'),('Medicament','MED'),('Autres', 'AUT');

CREATE SEQUENCE sq_bugd_act;
CREATE TABLE budget_acte(
    id_type_acte VARCHAR(10) REFERENCES type_acte(id_type_acte),
    budget BIGINT,
    annee DATE
);

CREATE SEQUENCE sq_acte;
CREATE TABLE acte(
    id_acte VARCHAR(10) NOT NULL PRIMARY KEY DEFAULT 'act_'||nextval('sq_acte'),
    id_patient VARCHAR(10) REFERENCES patient(id_patient),
    date_acte TIMESTAMP DEFAULT NOW(),
    tarif  BIGINT,
    etat INT DEFAULT 1
);
CREATE SEQUENCE sq_acte_patient;
CREATE TABLE acte_patient(
    id_acte VARCHAR(10) REFERENCES acte(id_acte),
    id_type_acte VARCHAR(10) REFERENCES type_acte(id_type_acte),
    tarif BIGINT DEFAULT 0
);

CREATE SEQUENCE sq_tp_dp;
CREATE TABLE type_depense(
    id_type_depense VARCHAR(10) NOT NULL PRIMARY KEY DEFAULT 'tp_dp_'||nextval('sq_tp_dp'),
    nom VARCHAR(50),
    code VARCHAR(5)
);
INSERT INTO type_depense(nom,code) VALUES('Loyer', 'LOY');

CREATE SEQUENCE sq_bugd_dep;
CREATE TABLE budget_depense(
    id_type_depense VARCHAR(10) REFERENCES type_depense(id_type_depense),
    budget BIGINT,
    annee DATE
);

CREATE SEQUENCE sq_depense;
CREATE TABLE depense(
    id_depense VARCHAR(10) NOT NULL PRIMARY KEY DEFAULT 'dp_'||nextval('sq_depense'),
    id_type_depense VARCHAR(10) REFERENCES type_depense(id_type_depense),
    date_depense TIMESTAMP DEFAULT NOW(),
    detail TEXT,
    tarif BIGINT
);

CREATE OR REPLACE VIEW v_acte_list AS SELECT acte.id_acte, acte.id_patient, acte.tarif, acte.etat, patient.nom, patient.prenom FROM acte JOIN patient ON acte.id_patient = patient.id_patient;

CREATE OR REPLACE VIEW v_acte_list_fact AS SELECT acte_patient.id_acte, acte_patient.id_type_acte, acte_patient.tarif
, acte.id_patient, acte.tarif as total, acte.etat, type_acte.nom FROM acte_patient JOIN acte ON acte_patient.id_acte = acte.id_acte JOIN type_acte ON
acte_patient.id_type_acte = type_acte.id_type_acte;



