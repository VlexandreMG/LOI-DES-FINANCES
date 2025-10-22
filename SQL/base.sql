CREATE DATABASE LOI_DES_FINANCES;
USE LOI_DES_FINANCES;

--CREATION DE TABLES-- 

--PREVISION MACROECONOMIQUES

CREATE TABLE indicateurs_macroeconomiques (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    unite VARCHAR(50) NOT NULL,
    description TEXT
);

CREATE TABLE previsions_macroeconomiques (
    id INT AUTO_INCREMENT PRIMARY KEY,
    indicateur_id INT,
    annee YEAR,
    valeur DECIMAL(15,2),
    FOREIGN KEY (indicateur_id) REFERENCES indicateurs_macroeconomiques(id)
);

CREATE TABLE secteur_primaire(  
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(250)
);

CREATE TABLE SP_valeur(
    id INT AUTO_INCREMENT PRIMARY KEY,
    secp_id INT,
    taux_croissance DECIMAL(15,2),
    annee INT,
    Foreign Key (secp_id) REFERENCES secteur_primaire(id)
);

CREATE TABLE secteur_secondaire(  
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(250)
);

CREATE TABLE SS_valeur(
    id INT AUTO_INCREMENT PRIMARY KEY,
    secs_id INT,
    taux_croissance DECIMAL(15,2),
    annee INT,
    Foreign Key (secs_id) REFERENCES secteur_secondaire(id)
);

CREATE TABLE secteur_tertiaire(  
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(250)
);

CREATE TABLE ST_valeur(
    id INT AUTO_INCREMENT PRIMARY KEY,
    sect_id INT,
    taux_croissance DECIMAL(15,2),
    annee INT,
    Foreign Key (sect_id) REFERENCES secteur_tertiaire(id)
);


--RECETTE

CREATE TABLE categories_recettes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT
);

CREATE TABLE sous_categories_recettes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categorie_id INT,
    nom VARCHAR(150) NOT NULL,
    FOREIGN KEY (categorie_id) REFERENCES categories_recettes(id)
);

CREATE TABLE previsions_recettes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sous_categorie_id INT,
    annee YEAR,
    montant DECIMAL(15,1),
    FOREIGN KEY (sous_categorie_id) REFERENCES sous_categories_recettes(id)
);

CREATE TABLE sources_dons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type_don VARCHAR(50) NOT NULL,
    annee YEAR,
    montant DECIMAL(15,1)
);

--DEPENSES

CREATE TABLE categories_depenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT
);

CREATE TABLE ministeres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(150) NOT NULL,
    type ENUM('Institution', 'Ministère', 'Organe Constitutionnel') DEFAULT 'Ministère'
);

CREATE TABLE previsions_depenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categorie_id INT,
    annee YEAR,
    montant DECIMAL(15,1),
    FOREIGN KEY (categorie_id) REFERENCES categories_depenses(id)
);


CREATE TABLE depenses_soldes_detail (
    libellees VARCHAR(255),
    id INT AUTO_INCREMENT PRIMARY KEY,
    annee YEAR,
    masse_salariale DECIMAL(15,1),
    solde_pib DECIMAL(5,2),
    solde_recettes_fiscales DECIMAL(5,2),
    solde_depenses_total DECIMAL(5,2)
);

CREATE TABLE depenses_fonctionnement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    annee YEAR,
    type_depense VARCHAR(100),
    montant DECIMAL(15,1),
    observations TEXT
);

CREATE TABLE postes_budgetaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ministere VARCHAR(150),
    postes_autorises INT
);

CREATE TABLE budget_ministeres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ministere_id INT,
    annee YEAR,
    montant DECIMAL(15,1),
    FOREIGN KEY (ministere_id) REFERENCES ministeres(id)
);

--DEFICIT 

CREATE TABLE deficit_budgetaire (
    id INT AUTO_INCREMENT PRIMARY KEY,
    annee YEAR,
    recettes_total_dons DECIMAL(15,1),
    depenses_total DECIMAL(15,1),
    deficit DECIMAL(15,1)
);

CREATE TABLE financement_deficit (
    id INT AUTO_INCREMENT PRIMARY KEY,
    annee YEAR,
    type_financement ENUM('interieur', 'exterieur'),
    montant DECIMAL(15,1)
);

--ACRONYMES
CREATE TABLE acronymes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    acronymes VARCHAR(20) NOT NULL UNIQUE,
    signification TEXT NOT NULL
);

--GLOSSAIRES
CREATE TABLE glossaire (
    id INT AUTO_INCREMENT PRIMARY KEY,
    terme VARCHAR(100) NOT NULL UNIQUE,
    definition TEXT NOT NULL
);

--INSERTION DE DONNEES--

--PREVISION MACROECONOMIQUES
INSERT INTO indicateurs_macroeconomiques (nom, unite, description) VALUES
('PIB nominal', 'milliards d''Ariary', 'Produit Intérieur Brut nominal'),
('Taux de croissance économique', '%', 'Taux de croissance du PIB réel'),
('Indice des prix à la consommation (fin de période)', '%', 'Inflation en fin de période'),
('Ratio de dépenses publiques', '% PIB', 'Dépenses publiques en pourcentage du PIB'),
('Solde global (base caisse)', '% PIB', 'Solde budgétaire global'),
('Solde primaire (base caisse)', 'milliards d''Ariary', 'Solde budgétaire hors intérêts de la dette'),
('Taux de change Dollars/Ariary', 'Ariary', 'Taux de change moyen USD/MGA'),
('Taux de change Euro/Ariary', 'Ariary', 'Taux de change moyen EUR/MGA'),
('Taux d''investissement public', '% PIB', 'Investissement public en pourcentage du PIB'),
('Taux d''investissement privé', '% PIB', 'Investissement privé en pourcentage du PIB'),
('Taux de pression fiscale', '% PIB', 'Recettes fiscales en pourcentage du PIB');

-- Pour 2024
INSERT INTO previsions_macroeconomiques (indicateur_id, annee, valeur) VALUES
(1, 2024, 78945.4), (2, 2024, 4.4), (3, 2024, 8.2),
(4, 2024, 16.2), (5, 2024, -4.3), (6, 2024, 214.2),
(7, 2024, 4508.6), (8, 2024, 4905.5), (9, 2024, 6.1),
(10, 2024, 14.6), (11, 2024, 10.6);

-- Pour 2025  
INSERT INTO previsions_macroeconomiques (indicateur_id, annee, valeur) VALUES
(1, 2025, 88851.6), (2, 2025, 5.0), (3, 2025, 7.1),
(4, 2025, 18.4), (5, 2025, -4.1), (6, 2025, 1097.6),
(7, 2025, 4688.8), (8, 2025, 5275.2), (9, 2025, 9.6),
(10, 2025, 12.0), (11, 2025, 11.2);

-- Pour 2026
INSERT INTO previsions_macroeconomiques (indicateur_id, annee, valeur) VALUES
(1, 2026, 99826.3), (2, 2026, 5.2), (3, 2026, 7.2),
(4, 2026, 17.8), (5, 2026, -4.1), (6, 2026, 866.0),
(7, 2026, 4853.2), (8, 2026, 5532.7), (9, 2026, 8.3),
(10, 2026, 13.7), (11, 2026, 11.8);

--SECTEUR PRIMAIRE 
INSERT INTO secteur_primaire (nom) VALUES
('Agriculture'),
('Élevage et pêche'),
('Sylviculture');

-- Données 2024
INSERT INTO SP_valeur (secp_id, taux_croissance, annee) VALUES
(1, 6.0, 2024),    -- Agriculture
(2, 3.9, 2024),    -- Élevage et pêche
(3, 1.0, 2024);    -- Sylviculture

-- Données 2025
INSERT INTO SP_valeur (secp_id, taux_croissance, annee) VALUES
(1, 9.5, 2025),    -- Agriculture
(2, 4.0, 2025),    -- Élevage et pêche
(3, 1.1, 2025);    -- Sylviculture

--SECTEUR SECONDAIRE
INSERT INTO secteur_secondaire (nom) VALUES
('Industrie extractive'),
('Alimentaire, boisson, tabac'),
('Textile'),
('Bois, papiers, imprimerie'),
('Matériaux de construction'),
('Industrie métallique'),
('Machine, matériels électriques'),
('Industries diverses'),
('Électricité, eau, gaz'),
('Secteur Secondaire Total');

-- 2024
INSERT INTO SS_valeur (secs_id, taux_croissance, annee) VALUES
(1, -20.8, 2024), (2, 0.9, 2024), (3, 31.6, 2024), (4, 0.4, 2024),
(5, 7.9, 2024), (6, 7.2, 2024), (7, 3.1, 2024), (8, 0.5, 2024),
(9, 3.9, 2024), (10, -3.3, 2024);

-- 2025
INSERT INTO SS_valeur (secs_id, taux_croissance, annee) VALUES
(1, 4.0, 2025), (2, 2.4, 2025), (3, 4.0, 2025), (4, 0.7, 2025),
(5, 8.0, 2025), (6, 7.3, 2025), (7, 3.2, 2025), (8, 0.6, 2025),
(9, 4.0, 2025), (10, 3.4, 2025);

--SECTEUR TERTIAIRE 
INSERT INTO secteur_tertiaire (nom) VALUES
('BTP'),
('Commerce, entretiens, réparations'),
('Hôtel, restaurant'),
('Transport'),
('Poste et télécommunication'),
('Banque, assurance'),
('Services aux entreprises'),
('Administration'),
('Éducation'),
('Santé'),
('Services rendus aux ménages'),
('Secteur Tertiaire Total');

-- Données 2024
INSERT INTO ST_valeur (sect_id, taux_croissance, annee) VALUES
(1, 3.2, 2024),
(2, 4.2, 2024),
(3, 14.7, 2024),
(4, 7.0, 2024),
(5, 13.4, 2024),
(6, 5.3, 2024),
(7, 2.3, 2024),
(8, 1.7, 2024),
(9, 1.7, 2024),
(10, 1.8, 2024),
(11, 1.3, 2024),
(12, 5.0, 2024);

-- Données 2025
INSERT INTO ST_valeur (sect_id, taux_croissance, annee) VALUES
(1, 3.6, 2025),
(2, 4.3, 2025),
(3, 14.9, 2025),
(4, 7.2, 2025),
(5, 13.7, 2025),
(6, 6.1, 2025),
(7, 2.4, 2025),
(8, 1.9, 2025),
(9, 1.8, 2025),
(10, 1.9, 2025),
(11, 1.4, 2025),
(12, 5.4, 2025);

--RECETTE 
INSERT INTO categories_recettes (nom, description) VALUES
('Recettes fiscales intérieures', 'Impôts perçus à l''intérieur du pays'),
('Recettes douanières', 'Droits et taxes perçus aux frontières'),
('Recettes non fiscales', 'Revenus non issus de l''impôt'),
('Dons', 'Aides financières extérieures');

INSERT INTO sous_categories_recettes (categorie_id, nom) VALUES
(1, 'Impôt sur les revenus'),
(1, 'Impôt sur les revenus Salariaux et Assimilés'),
(1, 'Impôt sur les revenus des Capitaux Mobiliers'),
(1, 'Impôt sur les plus-values Immobilières'),
(1, 'Impôt Synthétique'),
(1, 'Droit d''Enregistrement'),
(1, 'Taxe sur la Valeur Ajoutée (y compris Taxe sur les transactions Mobiles)'),
(1, 'Impôt sur les marchés Publics'),
(1, 'Droit d''Accise (y compris Taxe environnementale)'),
(1, 'Taxes sur les Assurances'),
(1, 'Droit de Timbres'),
(1, 'Autres');

INSERT INTO sous_categories_recettes (categorie_id, nom) VALUES
(2, 'Droit de douane'),
(2, 'TVA à l''importation'),
(2, 'Taxe sur les produits pétroliers'),
(2, 'TVA sur les produits pétroliers'),
(2, 'Droit de navigation'),
(2, 'Autres');

INSERT INTO sous_categories_recettes (categorie_id, nom) VALUES
(3, 'Dividendes'),
(3, 'Productions immobilières financières'),
(3, 'Redevance de pêche'),
(3, 'Redevance minières'),
(3, 'Autres redevance'),
(3, 'Produits des activités et autres'),
(3, 'Autres');

INSERT INTO previsions_recettes (sous_categorie_id, annee, montant) VALUES
(1, 2024, 1179.0), (1, 2025, 1411.4),
(2, 2024, 848.2), (2, 2025, 889.9),
(3, 2024, 78.2), (3, 2025, 93.7),
(4, 2024, 14.0), (4, 2025, 18.3),
(5, 2024, 132.3), (5, 2025, 164.7),
(6, 2024, 49.0), (6, 2025, 62.8),
(7, 2024, 1400.2), (7, 2025, 1742.2),
(8, 2024, 148.7), (8, 2025, 250.0),
(9, 2024, 754.1), (9, 2025, 955.4),
(10, 2024, 17.2), (10, 2025, 20.6),
(11, 2024, 14.1), (11, 2025, 16.8),
(12, 2024, 1.5), (12, 2025, 2.7);

INSERT INTO previsions_recettes (sous_categorie_id, annee, montant) VALUES
(13, 2024, 847.5), (13, 2025, 1010.7),
(14, 2024, 1768.3), (14, 2025, 2148.3),
(15, 2024, 308.0), (15, 2025, 326.0),
(16, 2024, 842.8), (16, 2025, 879.0),
(17, 2024, 1.2), (17, 2025, 1.9),
(18, 2024, 0.2), (18, 2025, 0.1);

INSERT INTO previsions_recettes (sous_categorie_id, annee, montant) VALUES
(19, 2024, 89.5), (19, 2025, 120.2),
(20, 2024, 0.5), (20, 2025, 2.1),
(21, 2024, 10.0), (21, 2025, 15.0),
(22, 2024, 84.9), (22, 2025, 331.2),
(23, 2024, 9.7), (23, 2025, 10.0),
(24, 2024, 11.1), (24, 2025, 8.1),
(25, 2024, 140.1), (25, 2025, 5.2);

INSERT INTO sources_dons (type_don, annee, montant) VALUES
('Courants', 2024, 0.3), ('Courants', 2025, 31.0),
('Capital', 2024, 1086.0), ('Capital', 2025, 2445.6);

--DEPENSES 
INSERT INTO categories_depenses (nom, description) VALUES
('Intérêts de la dette', 'Paiement des intérêts de la dette publique'),
('Dépenses courantes de solde (hors indemnités)', 'Salaires des fonctionnaires'),
('Dépenses courantes hors solde', 'Fonctionnement des administrations'),
('Indemnités', 'Indemnités diverses'),
('Biens/Services', 'Achats de biens et services'),
('Transferts et subventions', 'Subventions aux institutions et collectivités'),
('Dépenses d''investissement', 'Investissements publics'),
('PIP sur financement interne', 'Programmes d''investissement financés localement'),
('PIP sur financement externe', 'Programmes d''investissement financés par l''extérieur'),
('Autres opérations nettes du trésor', 'Autres opérations financières');

INSERT INTO previsions_depenses (categorie_id, annee, montant) VALUES
(1, 2024, 672.0), (1, 2025, 756.5),
(2, 2024, 3814.5), (2, 2025, 3846.4),
(3, 2024, 3069.0), (3, 2025, 2304.3),
(4, 2024, 244.8), (4, 2025, 244.8),
(5, 2024, 573.2), (5, 2025, 504.7),
(6, 2024, 2251.0), (6, 2025, 1554.8),
(7, 2024, 4836.8), (7, 2025, 8537.2),
(8, 2024, 1262.5), (8, 2025, 2377.3),
(9, 2024, 3574.3), (9, 2025, 6159.9),
(10, 2024, 390.2), (10, 2025, 860.6);

INSERT INTO depenses_soldes_detail (annee, masse_salariale, solde_pib, solde_recettes_fiscales, solde_depenses_total) VALUES
(2024, 3814.5, 4.8, 47.9, 29.9),
(2025, 3846.4, 4.3, 40.5, 23.6);

INSERT INTO depenses_fonctionnement (annee, type_depense, montant, observations) VALUES
(2024, 'Indemnités', 244.8, ''),
(2025, 'Indemnités', 244.8, 'Aucune hausse sur les enveloppes globales de fonctionnement'),
(2024, 'Biens et Services', 573.2, ''),
(2025, 'Biens et Services', 504.7, 'Rationalisation des allocations budgétaires: exclusion des crédits aux fêtes et cérémonies'),
(2024, 'Transferts et subventions', 2251.0, ''),
(2025, 'Transferts et subventions', 1554.8, 'Maintien du financement des secteurs sociaux prioritaires');

INSERT INTO postes_budgetaires (ministere, postes_autorises) VALUES
('Ministère des Forces Armées', 1000),
('Ministère de la Santé Publique', 300),
('Ministère de la Sécurité Publique', 1000),
('Ministère de l''Éducation Nationale', 3000),
('Ministère de l''Enseignement Technique et de la Formation Professionnelle', 250),
('Ministère de l''Enseignement Supérieur et de la Recherche Scientifique', 100),
('Ministère délégué en charge de la Gendarmerie Nationale', 1000);

INSERT INTO ministeres (nom, type) VALUES
('Présidence de la République', 'Institution'),
('Sénat', 'Institution'),
('Assemblée Nationale', 'Institution'),
('Haute Cour Constitutionnelle', 'Institution'),
('Primature', 'Institution'),
('Conseil du Famphavanana Malagasy', 'Institution'),
('Commission Électorale Nationale Indépendante', 'Institution'),
('Ministère de la Défense Nationale', 'Ministère'),
('Ministère des Affaires Étrangères', 'Ministère'),
('Ministère de la Justice', 'Ministère'),
('Ministère de l''Intérieur', 'Ministère'),
('Ministère de l''Économie et des Finances', 'Ministère'),
('Ministère de la Sécurité Publique', 'Ministère'),
('Ministère de l''Industrialisation et du Commerce', 'Ministère'),
('Ministère de la Décentralisation et de l''Aménagement du Territoire', 'Ministère'),
('Ministère du Travail, de l''Emploi et de la Fonction Publique', 'Ministère'),
('Ministère du Tourisme et de l''Artisanat', 'Ministère'),
('Ministère de l''Enseignement Supérieur et de la Recherche Scientifique', 'Ministère'),
('Ministère de l''Environnement et du Développement Durable', 'Ministère'),
('Ministère de l''Éducation Nationale', 'Ministère'),
('Ministère des Transports et de la Météorologie', 'Ministère'),
('Ministère de la Santé Publique', 'Ministère'),
('Ministère de la Communication et de la Culture', 'Ministère'),
('Ministère des Travaux Publics', 'Ministère'),
('Ministère des Mines et des Ressources Stratégiques', 'Ministère'),
('Ministère de l''Énergie et des Hydrocarbures', 'Ministère'),
('Ministère de l''Eau, de l''Assainissement et de l''Hygiène', 'Ministère'),
('Ministère de l''Agriculture et de l''Élevage', 'Ministère'),
('Ministère de la Pêche et de l''Économie Bleue', 'Ministère'),
('Ministère de l''Enseignement Technique et de la Formation Professionnelle', 'Ministère'),
('Ministère de l''Artisanat et des Métiers', 'Ministère'),
('Ministère du Développement Numérique, des Postes et des Télécommunications', 'Ministère'),
('Ministère de la Population et des Solidarités', 'Ministère'),
('Ministère de la Jeunesse et des Sports', 'Ministère'),
('Secrétariat d''État en charge des Nouvelles Villes et de l''Habitat', 'Ministère'),
('Ministère délégué chargé de la Gendarmerie', 'Ministère'),
('Secrétariat d''État en charge de la Souveraineté Alimentaire', 'Ministère'),
('Haut Conseil pour la Défense de la Démocratie et de l''État de Droit (HCDDED)', 'Organe Constitutionnel'),
('Commission Nationale Indépendante des Droits de l''Homme (CNIDH)', 'Organe Constitutionnel'),
('Haute Cour de Justice', 'Organe Constitutionnel');

INSERT INTO budget_ministeres (ministere_id, annee, montant) VALUES
(1, 2024, 177.1), (1, 2025, 224.7),
(2, 2024, 22.1), (2, 2025, 21.3),
(3, 2024, 87.4), (3, 2025, 85.9),
(8, 2024, 557.0), (8, 2025, 543.2),
(12, 2024, 2848.0), (12, 2025, 2332.7),
(20, 2024, 1532.8), (20, 2025, 1562.0),
(22, 2024, 716.6), (22, 2025, 921.0),
(24, 2024, 1217.3), (24, 2025, 2327.5),
(26, 2024, 407.9), (26, 2025, 1332.0),
(27, 2024, 306.1), (27, 2025, 600.2),
(28, 2024, 469.8), (28, 2025, 795.5);

--DEFICIT 
INSERT INTO deficit_budgetaire (annee, recettes_total_dons, depenses_total, deficit) VALUES
(2025, 12962.7, 16304.9, 3642.2);

INSERT INTO financement_deficit (annee, type_financement, montant) VALUES
(2025, 'exterieur', 3147.6),
(2025, 'interieur', 494.6);

--ACRONYMES
INSERT INTO acronymes (acronymes, signification) VALUES
('BAD', 'Banque Africaine pour le Développement'),
('CRCM', 'Caisse de Retraite Civile et Militaire'),
('HT', 'Hors Taxe'),
('IFPB', 'Impôt Foncier sur la Propriété Bâtie'),
('IFT', 'Impôt Foncier sur le Terrain'),
('IMP', 'Impôt sur les Marchés Publics'),
('IR', 'Impôt sur les Revenus'),
('IRCM', 'Impôt Sur les Revenus des Capitaux Mobiliers'),
('KW', 'Kilowatt'),
('LF', 'Loi de Finances'),
('LFI', 'Loi de Finances Initiale'),
('LFR', 'Loi de Finances Rectificative'),
('MW', 'Mégawatt'),
('OGT', 'Opérations Globales du Trésor'),
('PIB', 'Produit Intérieur Brut'),
('PIP', 'Programme d''Investissements Publics'),
('PLF', 'Projet de Loi de Finances'),
('PTF', 'Partenaires Technique et Financier'),
('SADC', 'Southern African Development Community'),
('TAFPB', 'Taxe Annexe à l''IFPB'),
('TTM', 'Taxe sur les Transactions Mobiles'),
('TVA', 'Taxe sur la Valeur Ajoutée');

--GLOSSAIRES 
INSERT INTO glossaire (terme, definition) VALUES
('Souveraineté alimentaire', 'Capacité d''un pays à produire suffisamment de nourriture pour répondre aux besoins de sa population, en réduisant sa dépendance vis-à-vis des importations.'),
('Transition énergétique', 'Processus de passage des énergies polluantes (charbon, pétrole) vers des énergies renouvelables (solaire, éolien), afin de réduire l''impact sur l''environnement et de garantir une production énergétique durable.'),
('Zones Économiques Spéciales (ZES)', 'Zones où des conditions spéciales (avantages fiscaux, simplifications administratives) sont mises en place pour attirer les investisseurs et stimuler le développement économique.'),
('Transition écologique', 'Ensemble des actions visant à protéger l''environnement, comme la réduction des émissions de carbone, le recyclage, ou l''utilisation d''énergies propres.'),
('Soutenabilité des finances publiques', 'Capacité d''un pays à gérer ses finances de manière responsable, en évitant un endettement excessif tout en finançant des investissements nécessaires pour le développement durable.'),
('Fonds de Contre–Valeur (FCV)', 'Fonds issus de dons ou d''aides financières, utilisés pour financer des projets spécifiques, comme le développement d''infrastructures ou le soutien à des secteurs prioritaires.'),
('Indicateurs macroéconomiques', 'Données chiffrées, comme le taux de croissance ou l''inflation, qui permettent d''évaluer la santé économique d''un pays.'),
('Taxe sur les Transactions Mobiles (TTM)', 'Impôt appliqué aux transferts d''argent, paiements et autres transactions effectués via des téléphones mobiles.'),
('Taux de Pression Fiscale', 'Pourcentage des impôts collectés par rapport à la richesse totale produite dans le pays (PIB). Ce taux mesure l''effort fiscal supporté par les contribuables.'),
('Déficit budgétaire', 'Situation où les dépenses de l''État sont supérieures à ses recettes sur une année.'),
('Investissement public', 'Dépenses de l''État destinées à créer ou à améliorer des infrastructures (routes, écoles, hôpitaux) pour le long terme.'),
('Masse salariale', 'Montant total des salaires versés par l''État à ses fonctionnaires.'),
('Programme d''Investissements Publics (PIP)', 'Ensemble des projets d''investissement planifiés et financés par l''État.'),
('Recettes fiscales', 'Argent perçu par l''État grâce aux impôts et taxes.'),
('Dette publique', 'Ensemble des emprunts contractés par l''État pour financer son déficit.'),
('Solde primaire', 'Solde budgétaire qui exclut le paiement des intérêts de la dette.'),
('PIB nominal', 'Valeur totale de tous les biens et services produits dans un pays, calculée aux prix courants du marché.'),
('Inflation', 'Augmentation générale et durable des prix des biens et services dans une économie.'),
('Taux de change', 'Prix d''une devise par rapport à une autre.'),
('Assiette fiscale', 'Base sur laquelle un impôt est calculé.');

--CREATION DE VUES
--PMA 2024
CREATE OR REPLACE VIEW PMA24 AS (
SELECT 
    ima.nom AS indicateur,
    pma.annee as annee,
    pma.valeur AS valeur
FROM indicateurs_macroeconomiques ima 
JOIN previsions_macroeconomiques pma ON pma.indicateur_id = ima.id
WHERE pma.annee = 2024);

--PMA 2025
CREATE OR REPLACE VIEW PMA25 AS (
SELECT 
    ima.nom AS indicateur,
    pma.annee as annee,
    pma.valeur AS valeur
FROM indicateurs_macroeconomiques ima 
JOIN previsions_macroeconomiques pma ON pma.indicateur_id = ima.id
WHERE pma.annee = 2025);

--PMA 2026
CREATE OR REPLACE VIEW PMA26 AS (
SELECT 
    ima.nom AS indicateur,
    pma.annee as annee,
    pma.valeur AS valeur
FROM indicateurs_macroeconomiques ima 
JOIN previsions_macroeconomiques pma ON pma.indicateur_id = ima.id
WHERE pma.annee = 2026);

--SP24
CREATE OR REPLACE VIEW SP24 AS (
SELECT SP.nom nom,
         SV.taux_croissance,
         SV.annee
FROM secteur_primaire SP
JOIN SP_valeur SV ON SP.id = SV.secp_id
WHERE SV.annee = 2024);

--SP25
CREATE OR REPLACE VIEW SP25 AS (
SELECT SP.nom nom,
         SV.taux_croissance,
         SV.annee
FROM secteur_primaire SP
JOIN SP_valeur SV ON SP.id = SV.secp_id
WHERE SV.annee = 2025);

--SS24
CREATE OR REPLACE VIEW SS24 AS (
SELECT SP.nom nom,
         SV.taux_croissance,
         SV.annee
FROM secteur_secondaire SP
JOIN SS_valeur SV ON SP.id = SV.secs_id
WHERE SV.annee = 2024);

--SS25
CREATE OR REPLACE VIEW SS25 AS (
SELECT SP.nom nom,
         SV.taux_croissance,
         SV.annee
FROM secteur_secondaire SP
JOIN SS_valeur SV ON SP.id = SV.secs_id
WHERE SV.annee = 2025);     

--ST24
CREATE OR REPLACE VIEW ST24 AS (
SELECT SP.nom nom,
         SV.taux_croissance,
         SV.annee
FROM secteur_tertiaire SP
JOIN ST_valeur SV ON SP.id = SV.sect_id
WHERE SV.annee = 2024);

--ST25
CREATE OR REPLACE VIEW ST25 AS (
SELECT SP.nom nom,
         SV.taux_croissance,
         SV.annee
FROM secteur_tertiaire SP
JOIN ST_valeur SV ON SP.id = SV.sect_id
WHERE SV.annee = 2025);

--rfi_categorie
CREATE OR REPLACE VIEW rfi_categorie AS (
SELECT cr.nom categorie,
       scr.nom nom,
       cr.id cr_id,
       scr.id scr_id
FROM categories_recettes cr
JOIN sous_categories_recettes scr ON cr.id = scr.categorie_id
WHERE cr.nom = 'Recettes fiscales intérieures');

--rfi24
CREATE OR REPLACE VIEW rfi24 AS (
SELECT
       rc.nom,
       pr.montant,
       pr.annee
FROM previsions_recettes pr
JOIN rfi_categorie rc ON rc.scr_id = pr.sous_categorie_id
WHERE pr.annee = 2024

UNION 

SELECT 
       'TOTAL' nom,
       SUM(pr.montant) montant,
       2024 annee
FROM previsions_recettes pr 
JOIN rfi_categorie rc ON rc.scr_id = pr.sous_categorie_id
WHERE pr.annee = 2024);

--rfi25
CREATE OR REPLACE VIEW rfi25 AS (
SELECT
       rc.nom,
       pr.montant,
       pr.annee
FROM previsions_recettes pr
JOIN rfi_categorie rc ON rc.scr_id = pr.sous_categorie_id
WHERE pr.annee = 2025

UNION 

SELECT 
       'TOTAL' nom,
       SUM(pr.montant) montant,
       2025 annee
FROM previsions_recettes pr 
JOIN rfi_categorie rc ON rc.scr_id = pr.sous_categorie_id
WHERE pr.annee = 2025);

--rd-categorie 
CREATE OR REPLACE VIEW rd_categorie AS (
SELECT cr.nom categorie,
       scr.nom nom,
       cr.id cr_id,
       scr.id scr_id
FROM categories_recettes cr
JOIN sous_categories_recettes scr ON cr.id = scr.categorie_id
WHERE cr.nom = 'Recettes douanières');

-- rd24
CREATE OR REPLACE VIEW rd24 AS (
SELECT
       rc.nom,
       pr.montant,
       pr.annee
FROM previsions_recettes pr
JOIN rd_categorie rc ON rc.scr_id = pr.sous_categorie_id
WHERE pr.annee = 2024

UNION 

SELECT 
       'TOTAL' nom,
       SUM(pr.montant) montant,
       2024 annee
FROM previsions_recettes pr 
JOIN rd_categorie rc ON rc.scr_id = pr.sous_categorie_id
WHERE pr.annee = 2024);

-- rd25
CREATE OR REPLACE VIEW rd25 AS (
SELECT
       rc.nom,
       pr.montant,
       pr.annee
FROM previsions_recettes pr
JOIN rd_categorie rc ON rc.scr_id = pr.sous_categorie_id
WHERE pr.annee = 2025

UNION 

SELECT 
       'TOTAL' nom,
       SUM(pr.montant) montant,
       2025 annee
FROM previsions_recettes pr 
JOIN rd_categorie rc ON rc.scr_id = pr.sous_categorie_id
WHERE pr.annee = 2025);

CREATE OR REPLACE VIEW rnf_categorie AS (
SELECT cr.nom categorie,
       scr.nom nom,
       cr.id cr_id,
       scr.id scr_id
FROM categories_recettes cr
JOIN sous_categories_recettes scr ON cr.id = scr.categorie_id
WHERE cr.nom = 'Recettes non fiscales');

-- rnf24
CREATE OR REPLACE VIEW rnf24 AS (
SELECT
       rc.nom,
       pr.montant,
       pr.annee
FROM previsions_recettes pr
JOIN rnf_categorie rc ON rc.scr_id = pr.sous_categorie_id
WHERE pr.annee = 2024

UNION 

SELECT 
       'TOTAL' nom,
       SUM(pr.montant) montant,
       2024 annee
FROM previsions_recettes pr 
JOIN rnf_categorie rc ON rc.scr_id = pr.sous_categorie_id
WHERE pr.annee = 2024);

-- rnf25
CREATE OR REPLACE VIEW rnf25 AS (
SELECT
       rc.nom,
       pr.montant,
       pr.annee
FROM previsions_recettes pr
JOIN rnf_categorie rc ON rc.scr_id = pr.sous_categorie_id
WHERE pr.annee = 2025

UNION 

SELECT 
       'TOTAL' nom,
       SUM(pr.montant) montant,
       2025 annee
FROM previsions_recettes pr 
JOIN rnf_categorie rc ON rc.scr_id = pr.sous_categorie_id
WHERE pr.annee = 2025);
