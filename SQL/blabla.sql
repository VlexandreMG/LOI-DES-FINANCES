--Tableau 1 : Prévisions macroéconomiques 

SELECT PMA24.indicateur AS Indicateur, 
       PMA24.valeur AS Prevision_2024, 
       PMA25.valeur AS Prevision_2025, 
       PMA26.valeur AS Prevision_2026
FROM PMA24 
JOIN PMA25 ON PMA24.indicateur = PMA25.indicateur
JOIN PMA26 ON PMA24.indicateur = PMA26.indicateur;

--Tableau 2 : Taux de croissance sectorelle 
SELECT SP24.nom AS Secteur, 
       SP24.taux_croissance AS Taux_Croissance_2024, 
       SP25.taux_croissance AS Taux_Croissance_2025
FROM SP24
JOIN SP25 ON SP24.nom = SP25.nom

SELECT SS24.nom AS Secteur, 
       SS24.taux_croissance AS Taux_Croissance_2024, 
       SS25.taux_croissance AS Taux_Croissance_2025
FROM SS24
JOIN SS25 ON SS24.nom = SS25.nom

SELECT ST24.nom AS Secteur, 
       ST24.taux_croissance AS Taux_Croissance_2024, 
       ST25.taux_croissance AS Taux_Croissance_2025
FROM ST24
JOIN ST25 ON ST24.nom = ST25.nom;

SELECT 
cat.nom,prev.annee,prev.montant
FROM categories_depenses AS cat JOIN previsions_depenses AS prev
ON cat.id=prev.categorie_id; 

SELECT 
R24.nom ,R24.montant AS LFR2024,R25.montant AS LFR2025
FROM depenses_rubrique_24 as R24 JOIN
depenses_rubrique_25 as R25 ON R24.nom=R25.nom  ;

SELECT SUM(dep.LFR2024) AS total2024,SUM(dep.LFR2025) AS total2025
FROM 
depenses_rubrique AS dep;

SELECT * FROM depenses_soldes_detail WHERE annee='2024';

SELECT SUM(montant) as total FROM  depenses_fonctionnement_2024;
SELECT * FROM depenses_ivestissement WHERE annee='2024';
SELECT * FROM depenses_ivestissement WHERE annee='2025';

SELECT * FROM deficit_budgetaire;