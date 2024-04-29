# Application pour la gestion des documents numériques de la Commission Nationale des TIPPEE créé avec Symfony 7.0

_1_ Comment accéder en local à mon code de développement

1- Clonez le référentiel du projet avec git clone :
https://github.com/Jery2022/bibliotippee.git

2- Installez les dépendances en exécutant « npm » dans le dossier du projet
Il s’agit de pour l’essentiel :
● Installer composer
● lancer "npm install" pour les dépendances nécessaires pour le fonctionnement de l'application
○ https://getcomposer.org/download/
● Installer symfony cli
○ https://symfony.com/download
● Vérifier les requirements
○ symfony check:requirement
● Pour compiler en dev
○ npm run dev
● Pour compiler en prod
○ npm run build
● lancer composer require symfony/webpack-encore-bundle
● lancer npm install file-loader --save-dev
● lancer l'installation du bundle easyadmin
● Lancer un serveur
○ symfony server:start
• bootstrap

_2_ Comment accéder en ligne à mon code en production dès la levé du bug Apache
Il faut cliquer sur le lien :
https://bibliotippee-e7f5c196e9b3.herokuapp.com/

## Scripts disponibles

Dans le dossier projet, lancer la commande suivate pour faire tourner l'application en local après avoir installé toutes les dépendances indiquées plus haut :

### `symfony `

Lancer l'application en mode development
ouvrir avec le lien : [https://localhost:8000/](http://localhost:8000)

ou symfony open:local

afin de voir le site à partir d'un navigateur en local.

### Près requis techniques

Serveur :
● Heroku.com
● Version PHP 8.2
● PostgreSQL (version 14)

Les langages et/ou frameworks cités ci-dessous ont été employés pour le développement du site.

Pour le front :
● HTML 5
● CSS 3
● Bootstrap
● Sass
● JavaScript

Pour le back :
● PHP 8.2 sous PDO
● Symfony 7.0
● PostgreSQL (version 14)

### Sites inspirations :

- https://www.editions-eni.fr/
- https://www.editions-eyrolles.com/

## Apprendre plus sur Symfony

Vous pouvez en apprendre plus en consultant la document officielle à travers le lien : https://symfony.com/.

## Apprendre plus sur Heroku

https://devcenter.heroku.com/start

### Informations utiles sur le front-end

TO DO :

- Mise en conformité du design des interfaces par rapport aux différentes maquettes
- Résolution du bug de la page d'authentification
- Création de la page d'inscription
- Correction et finalisation des Fixtures
- Création de la page de contact et soumission
- Finalisation de la soumission des commentaires sur une document numérique
- Finalisation des filtres et recherche en front-end
- Mise en place de la soumission du status favori

### Deployment

Le site est déployé sur la plateforme Heroku. Mais, difficulté d'affichage de l'application (Erreur 404 : Forbiten) liée à Appache sur le serveur de production. Traitement du bug en cours.

Enjoy You !
