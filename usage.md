# simulation-reseau

## Les usages: 

1) Création d'un vagrant
2) Création d'une database
3) Récupérer le fichier dump.sql, l'executer.
4) Modifier dans DB.php les constantes, Nom de la database, Identifiant, password avec ceux de la database créer précedemment
5) Lancer la vagrant et ce rendre sur l'addresse ip rentrée dans le Vagrantfile

## le Projet: 

- Dans ce ce site on peut poster des commentaires, l'administrateur peut gérer les publications ainsi que les utilisateurs. les utilisateurs ne peuvent modifier que leurs publications.
- Pour modifier toutes interactions avec la DB ce rendre dans le fichier: 'db.php'
- Il existe 4 pages:
    1) 'index.php' qui fait office d'accueil
    2) Deux ont atterit sur 'home.php' une fois registrer
    3) Une page de recherche des utilisateurs 'generic.php'
    4) Une page '404.php' pour certaines erreurs.

