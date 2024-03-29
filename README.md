# RoadToArnold

## Description

Ce dépôt contient le code source du site web développé pour mettre en relation des débutants en musculation avec des coachs. Les coachs et les débutants peuvent s'inscrire (2 formulaires différents). Les coachs rentrent leurs tarifs horaires. Les débutants leurs objectifs. Les débutants peuvent demander un RDV avec un coach pour s'entrainer. Et les coachs sont libres d'accepter ou non le RDV. 
Une partie administrateur est disponible, l'administrateur peur gérer la base de donnéees de tout le site et il possède une barre de recherche.

## Fonctionnalités

- S'inscrire en tant que coach ou débutant sur la plateforme
- Se connecter
- Faire une demande de RDV avec un coach
- Acceptation du RDV
- Liste des salles de sports
- Consultation des demandes de RDV et de leurs status
- Dashboard Admin pour gérer les enseignes, les villes, les salles de sport et les comptes des coach/débutant
- Barre de recherche dans le dashboard pour retrouver des enseignes, des villes, des salles de sport ou les comptes des coach/débutant plus facilement.

## Configuration et Installation

VERSION :
   Php : >=8.1
   Symfony : v4.28.1
   Composer : v2.1.9

1. Clonez le dépôt GitHub :

   ```bash
   git clone https://github.com/37anton/road-to-arnold.git
   
2. Accédez au répertoire du projet :

   ```bash
   cd road-to-arnold
   
3. Installez les dépendances :
   ```bash
   composer install

4. Configurez le fichier .env avec vos paramètres spécifiques (nom et mot de passe de votre bdd).
   Crée une bdd 'roadtoarnold' et importer le fichier sql présent dans le dépôt pour avoir les comptes coach, débutant, admin et les autres données du site
   
5. Lancez le serveur de développement :
   ```bash
   symfony console server:start
   
6. Accédez à l'application dans votre navigateur à l'adresse suivante :
   ```bash
   127.0.0.0:8000

## Comptes

- Coach : coach@coach : coach
- Débutant : debutant@debutant : debutant
- Administrateur : admin@rta.com : 123456

## Auteurs

- Cavanne Antonin
- Harfouche Gabriel

