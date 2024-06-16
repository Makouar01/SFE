# SFE
# Géstion des Matérieles

## Description

Cette application web permet de gérer le matériel de manière efficace et sans recourir aux méthodes traditionnelles basées sur le papier. Elle facilite le suivi des emprunts et la demande de matériel, tout en permettant aux administrateurs de gérer les accès et de décider d'accepter ou de refuser les demandes.

## Fonctionnalités

- **Gestion des Utilisateurs** :
  - Les utilisateurs incluent des administrateurs, des professeurs et des étudiants.
  - Les administrateurs ajoutent  Les professeurs et les étudiants .
  - Les professeurs et les étudiants ne peuvent pas s'inscrire eux-mêmes.

- **Accès Utilisateur** :
  - **Administrateur** :
    - Email : `admin@exemple.com`
    - Mot de passe : `admin`
  - **Professeurs et Étudiants** :
    - L'email par défaut est la valeur du CNE  (Code National de l'Étudiant) pour l'étudiant.
    - Le mot de passe par défaut est la valeur du CNI (Carte Nationale d'Identité) pour l'étudiant.
    - Le CNI et le mot de pas et l'emial par défaut pour le professeur. 

- **Gestion du Matériel** :
  - Les utilisateurs peuvent demander du matériel.
  - Les administrateurs peuvent accepter ou refuser les demandes.

- **Suivi des Emprunts** :
  - Suivi des emprunts en temps réel.
  - Historique des emprunts.
  
- **Géneration d'un raporrt PDF**
  - Les admiistrateurs peut génerer raporrt PDF qui contiene des information de tous les empruntes efféctuer  
## Technologies Utilisées

- **Frontend** :
  - HTML
  - CSS
  - JavaScript

- **Backend** :
  - PHP

  ## Contributeurs

- [ABDERRAHIM MAKOUAR](https://github.com/Makouar01)

## Installation

1. Clonez le dépôt sur votre machine locale :
   ```sh
   git clone https://github.com/Makouar01/SFE.git

