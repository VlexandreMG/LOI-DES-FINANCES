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
JOIN ST25 ON ST24.nom = ST25.nom

--Recette fiscale intérieurses.
SELECT rfi24.nom nature_impots,
       rfi24.montant LFR2024,
       rfi25.montant LFR2025
FROM rfi24 
JOIN rfi25 ON rfi24.nom = rfi25.nom;