# Projet

## Objectif

Réaliser un site qui permet de créer des événements et de les afficher.

## Fonctionnalités

* Inscription
* Connexion
* Création/Modification d'événements
* Affichage des événements
* Mettre à jour son profil (photo)

## Aller plus loin

* Gestion des rôles
* Inscription à un événement
* Gestion calendrier
* Gestion du paiement

## Architecture

* Architecture MVC avec routing
* Utilisation du mini-framework développé en cours

## Base de données

* users (id, created_at, username, password, image, display_name)
* events (id, created_at, event_date, image, address, name, description, user_id)
* categories (id, name)
* event_category (category_id, event_id)

## Groupes

1. Cécile / Nour-Eddine / Samir
2. Laurent / Stéphane / Samy
3. Houssem / Nicolas / Luc
4. Maja / Karim