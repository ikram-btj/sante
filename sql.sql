-- Create the medecin (doctor) table
CREATE TABLE medecin (
    id_m INT AUTO_INCREMENT PRIMARY KEY,
    nom_m VARCHAR(255) NOT NULL,
    sex_m ENUM('Homme', 'Femme') NOT NULL,
    adresse_m VARCHAR(255) NOT NULL,
    telephone_m VARCHAR(20) NOT NULL,
    specialite VARCHAR(100) NOT NULL,
    mail VARCHAR(255) NOT NULL,
    login_m VARCHAR(50) NOT NULL UNIQUE,
    password_m VARCHAR(255) NOT NULL,
    INDEX idx_login_password (login_m, password_m)
);

-- Create the patient table
CREATE TABLE patient (
    id_p INT AUTO_INCREMENT PRIMARY KEY,
    sex ENUM('Homme', 'Femme') NOT NULL,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    date_n DATE NOT NULL,
    lieu_n VARCHAR(100) NOT NULL,
    ville VARCHAR(100) NOT NULL,
    adresse VARCHAR(255) NOT NULL,
    groupage VARCHAR(10) NOT NULL,
    tel VARCHAR(20) NOT NULL,
    medecin_f INT,
    nom_mere VARCHAR(255) NOT NULL,
    prenom_mere VARCHAR(255) NOT NULL,
    groupage_mere VARCHAR(10) NOT NULL,
    prenom_pere VARCHAR(255) NOT NULL,
    groupage_pere VARCHAR(10) NOT NULL,
    login_p VARCHAR(50) NOT NULL UNIQUE,
    password_p VARCHAR(255) NOT NULL,
    FOREIGN KEY (medecin_f) REFERENCES medecin(id_m),
    INDEX idx_login_password (login_p, password_p)
);

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Insert a default admin user (change the login and password!)
INSERT INTO admin (login, password) VALUES ('admin', 'adminpassword');

CREATE TABLE vaccin (
    id_vaccin INT AUTO_INCREMENT PRIMARY KEY,   -- Primary key with auto-increment for each vaccine record
    nom_vaccin VARCHAR(255) NOT NULL,           -- Vaccine name
    nb_injection INT NOT NULL,                  -- Number of injections
    date_1_injection DATE NOT NULL              -- Date of the first injection
);

CREATE TABLE hopital (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_h VARCHAR(255) NOT NULL,
    wilaya_h VARCHAR(255) NOT NULL,
    region_h TEXT NOT NULL
);

CREATE TABLE antecedents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type_antecedent ENUM('Personnel', 'Familiaux') NOT NULL,
    type_maladie ENUM('Chronique', 'Hereditaire', 'Allergie') DEFAULT NULL,
    nom_maladie VARCHAR(255) DEFAULT NULL,
    date_maladie DATE DEFAULT NULL,
    remarque_antecedent TEXT DEFAULT NULL,
    patient_id INT,
    FOREIGN KEY (patient_id) REFERENCES patient(id_p)
);

CREATE TABLE vaccinations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_patient INT,
    nom_vaccin VARCHAR(255),
    nbr_injection INT,
    num_injection VARCHAR(50),
    date_inj DATE,
    date_rappel DATE,
    FOREIGN KEY (id_patient) REFERENCES patient(id_p)  
);

CREATE TABLE consultation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date_cons DATE NOT NULL,
    medicament TEXT NOT NULL,
    commentaire_cons1 TEXT NOT NULL
);

CREATE TABLE analyse (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type_analyse VARCHAR(255) NOT NULL,
    nom_analyse VARCHAR(255),
    date_resultat_analyse DATE,
    image_path VARCHAR(255)
);
CREATE TABLE radiologie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type_rad VARCHAR(255) NOT NULL,
    partie_corps VARCHAR(255) NOT NULL,
    motif_radio TEXT,
    date_resultat_radio DATE,
    commentaires_radio TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
ALTER TABLE radiologie ADD COLUMN id_p INT(11);
ALTER TABLE radiologie 
ADD FOREIGN KEY (id_p) REFERENCES patient(id_p);


CREATE TABLE hospitalisation (
    id_hosp INT AUTO_INCREMENT PRIMARY KEY,
    id_p INT,
    date_hosp DATE,
    service VARCHAR(255),
    motif_hosp TEXT,
    duree_hosp VARCHAR(100),
    FOREIGN KEY (id_p) REFERENCES patient(id_p)
);

CREATE TABLE intervention (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date_intr DATE NOT NULL,
    partie_corps VARCHAR(255) NOT NULL,
    motif_intr VARCHAR(255) NOT NULL,
    typ_anst ENUM('Locale', 'Generale') NOT NULL,
    commentaire_intr TEXT
);

CREATE TABLE mode_de_vie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT, 
    tabac VARCHAR(10),
    age_comance_fum INT,
    nbr_cigr VARCHAR(20),
    arreter VARCHAR(10),
    fois_arreter INT,
    frq_alco VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

