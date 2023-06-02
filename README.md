# RoadToArnold

## Description

[Description du Projet]

Ce dépôt contient le code source du site web développé pour mettre en relation des débutants en musculation avec des coachs.

## Fonctionnalités

- Prise de RDV
- Acceptation du RDV
- Liste des salles de sports

## Configuration et Installation

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
   importer le fichier SQL présent dans le dépôt GitHub avec comme nom de base "roadtoarnold"
   puis faite cette commande
   ```bash
   symfony console d:m:m
   
5. Lancez le serveur de développement :
   ```bash
   symfony console server:start
   
6. Accédez à l'application dans votre navigateur à l'adresse suivante :
   ```bash
   127.0.0.0:8000

## Auteurs

- Cavanne Antonin
- Harfouche Gabriel

