# --------------------------------------
# Doctrine Query Language
# --------------------------------------

# Sélections simples
# --------------------------------------

# Sélectionner **toutes les colonnes de tous les films**

	Résultat attendu
	+----+---------------------+------------+-------------------+
	| id | titre               | dateSortie | description       |
	+----+---------------------+------------+-------------------+
	| 1  | les dents de la mer | 1975-06-18 | À quelques jours… |
	| …  | …                   | …          | …                 |
	+----+---------------------+------------+-------------------+

# Sélectionner le **nom de tous les réalisateurs**

	Résultat attendu
	+-----------+
	| nom       | 
	+-----------+
	| spielberg |
	| kurosawa  |
	| besson    |
	| kubrick   |
	| hitchcock |
	| malick    |
	| leone     |
	| scorsese  |
	+-----------+

# Sélectionner le **titre** et la **description** de tous les films en utilisant des **alias**

	Résultat attendu
	+---------------------+-------------------+
	| t                   | d                 |
	+---------------------+-------------------+
	| les dents de la mer | À quelques jours… |
	| …                   | …                 |
	+---------------------+-------------------+

# Sélectionner le **titre** des films sortis à partir de **1980** et qui possède le mot **les** dans le titre

	Résultat attendu
	+-----------------------------------+
	| titre                             |
	+-----------------------------------+
	| les aventuriers de l’arche perdue |
	| les affranchis                    |
	+-----------------------------------+

# Jointures
# --------------------------------------

# Sélectionner le **titre** des films dont le réalisateur est **Akira Kurosawa**

	Résultat attendu
	+--------------------------------+
	| titre                          |
	+--------------------------------+
	| rashômon                       |
	| les sept samouraïs             |
	| kagemusha, l’ombre du guerrier |
	+--------------------------------+

# Sélectionner le **titre** et le **genre** des films de **Sergio Leone**

	Résultat attendu
	+----------------------------------------------------------------------------------------------------------+
	| titres                                                                                         | nom     |
	+------------------------------------------------------------------------------------------------+---------+
	| et pour quelques dollars de plus / pour une poignée de dollars                                 | action  |
	| et pour quelques dollars de plus / pour une poignée de dollars / le bon, la brute et le truand | western |
	+------------------------------------------------------------------------------------------------+---------+

# Sélectionner le **nom des acteurs français** ayant joué dans des films de **Steven Spielberg**

	Résultat attendu
	+----------+
	| nom      |
	+----------+
	| truffaut |
	+----------+

# Sélectionner le **titre**, la **date de sortie** et le **nom du réalisateur** des films sortis dans les années **1990**

	Résultat attendu
	+-----------------------------------+----------+
	| titre                | dateSortie | nom      |
	+----------------------+------------+----------+
	| le cinquième élément | 1997-05-07 | besson   |
	| la ligne rouge       | 1999-02-24 | malick   |
	| les affranchis       | 1990-09-12 | scorsese |
	| casino               | 1996-03-13 | scorsese |
	+----------------------+------------+----------+

# Tri
# --------------------------------------

# Sélectionner le **nom des acteurs** et les classer par **ordre alphabétique**

	Résultat attendu
	+----------+----------+
	| nom      | prenom   |
	+----------+----------+
	| adjani   | isabelle |
	| caviezel | jim      |
	| de niro  | robert   |
	| …        | …        |
	+----------+----------+

# Regroupement
# --------------------------------------

# Sélectionner le **nombre de films par réalisateur** et les classer par **ordre alphabétique**

	Résultat attendu
	+------------+---------+
	| nom        | compte  |
	+------------+---------+
	| besson     | 3       |
	| hitchcock  | 3       |
	| kubrick    | 3       |
	| …          | …       |
	+------------+---------+

# Sélectionner le **nombre de films** sortis en **1968**

	Résultat attendu
	+--------+---------+
	| sortie | compte  |
	+--------+---------+
	| 1968   | 2       |
	+--------+---------+

# Sélectionner le **film le plus récent**

	Résultat attendu
	+-------+------------+
	| titre | sortie     |
	+-------+------------+
	| lucy  | 2014-08-06 |
	+-------+------------+

# Fonctions MySQL
# --------------------------------------

# Sélectionner un **film au hasard**
	
	Résultat attendu
	+----+--------+------------+-------------+--------------+--------+---------+
	| id | titre  | dateSortie | description | realisateurs | genres | acteurs |
	+----+--------+------------+-------------+--------------+--------+---------+
	| …  | …      | …          | …           | …            | …      | …       |   
	+----+--------+------------+-------------+--------------+--------+---------+
