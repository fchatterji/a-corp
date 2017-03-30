# a-corp
A website to manage reservations of meeting rooms

## Instructions d’installation
Pour installer le projet , il faut d’abord télécharger les fichiers sources et les déposer dans le dossier root du serveur (dossier htdocs sur XAMPP).

### Installation des dépendances
Installer php composer
Installer les dépendences avec la commande composer install

### Configuration du serveur
- il est nécessaire d'autoriser les requêtes de type cross site sur le serveur pour faire fonctionner le site. Sur XAMPP, il suffit d'indiquer la ligne suivante dans le fichier httpd.conf:
Header set Access-Control-Allow-Origin "*"
- le fichier htaccess est fourni avec la configuration demandée par 00webhost. Il est peut-être nécessaire de l'adapter en fonction de l'environnement de développement (il fonctionne sur XAMPP).
- avant d'utiliser le site en local, il faut configurer le fichier a-corp/Tools/connexion.php, et enregister les informations de connexion 
- XAMPP doit être configuré pour que le dossier root du serveur pointe directement sur les fichiers du site
### Connexion au site
- deux profils de connection sont mis à votre disposition:
profil utilisateur :
mail: test.test@gmail.com
mot de passe: test
profil administrateur :
mail: admin.admin@gmail.com
mot depasse: admin
Il est bien sûr possible de créer d'autres comptes par le biais du site. En revanche, si l'on souhaite créer un autre compte administrateur, il faut créer un nouveau compte puis modifier la colonne isAdmin de la table users (dans phpmyadmin par exemple).
### Utilisation du site
J’ai essayé de rendre le site relativement instinctif. Quelques points :
- il faut cliquer en haut à droite pour se connecter/se déconnecter
- la page « salle » n’est accessible que pour les administrateurs
- sur la page réservation, la date peut être choisie en cliquant sur le bouton ou avec les flèches
- sur la page réservation, les réservations peuvent être créées en cliquant sur une case vide de la table. 
- l’indication du titre de la réservation est optionnelle
- les réservations peuvent être modifiées soit en cliquant sur une réservation, soit en glissant-déposant ou en redimensionnant les réservations
- j'ai testé le site sur chrome, firefox et internet explorer (dernières versions) sur deux ordinateurs différents, et tout fonctionne, que ce soit en local ou en remote. Si vous rencontrez un problème, merci de m'en informer, il s'agit peut-être d'un simple problème de configuration. Il est possible que le site hébergé soit lent ou parfois indisponible, normalement cela revient rapidement à la normale 
