CREATE DATABASE eval3;
CREATE ROLE eval3_manager LOGIN PASSWORD '1234';
ALTER DATABASE eval3 OWNER TO eval3_manager;
\c eval3 eval3_manager


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
INSERT INTO patient(nom,prenom,date_naissance,id_sexe,remboursement) VALUES('ZERO', 'ZERO', '2023-05-05', 1, '0');

CREATE SEQUENCE sq_tp_act;
CREATE TABLE type_acte(
    id_type_acte VARCHAR(10) NOT NULL PRIMARY KEY DEFAULT 'tp_act_'||nextval('sq_tp_act'),
    nom VARCHAR(50),
    code VARCHAR(6),
    budget BIGINT

);

CREATE SEQUENCE sq_acte;
CREATE TABLE acte(
    id_acte VARCHAR(10) NOT NULL PRIMARY KEY DEFAULT 'act_'||nextval('sq_acte'),
    id_patient VARCHAR(10) REFERENCES patient(id_patient),
    date_acte DATE,
    tarif  BIGINT,
    etat INT DEFAULT 1
);
INSERT INTO acte(id_patient, date_acte, tarif) VALUES('ptnt_1', NULL, 0);

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
    code VARCHAR(6),
    budget BIGINT
);

CREATE SEQUENCE sq_depense;
CREATE TABLE depense(
    id_depense VARCHAR(10) NOT NULL PRIMARY KEY DEFAULT 'dp_'||nextval('sq_depense'),
    id_type_depense VARCHAR(10) REFERENCES type_depense(id_type_depense),
    date_depense DATE,
    detail TEXT,
    tarif BIGINT
);

CREATE OR REPLACE VIEW v_acte_list AS SELECT acte.id_acte, acte.id_patient, acte.date_acte, acte.tarif, acte.etat, patient.nom, patient.prenom FROM acte JOIN patient ON acte.id_patient = patient.id_patient;

CREATE OR REPLACE VIEW v_acte_list_fact AS SELECT acte_patient.id_acte, acte_patient.id_type_acte, acte_patient.tarif
, acte.id_patient, acte.tarif as total, acte.etat, type_acte.nom FROM acte_patient JOIN acte ON acte_patient.id_acte = acte.id_acte JOIN type_acte ON
acte_patient.id_type_acte = type_acte.id_type_acte;


CREATE OR REPLACE VIEW v_dash_recette AS SELECT acte_patient.id_acte, acte_patient.id_type_acte, acte_patient.tarif, type_acte.nom AS type_acte, type_acte.budget, acte.date_acte AS daty FROM 
acte_patient JOIN type_acte ON acte_patient.id_type_acte = type_acte.id_type_acte JOIN acte ON acte_patient.id_acte = acte.id_acte;

CREATE OR REPLACE VIEW v_dash_depense AS SELECT depense.id_type_depense, depense.tarif, depense.date_depense AS daty, type_depense.nom AS type_depense, type_depense.budget FROM depense JOIN type_depense ON 
depense.id_type_depense = type_depense.id_type_depense;

CREATE OR REPLACE VIEW v_dash_R AS SELECT id_acte, id_type_acte, type_acte, tarif, budget, (((tarif * 100)/ budget)::decimal(5,2)) as realisation FROM v_dash_recette;

CREATE OR REPLACE VIEW v_dash_D AS SELECT id_type_depense, tarif, type_depense, budget, (((tarif * 100)/ budget)::decimal(5,2)) as realisation FROM v_dash_depense;