# CareerLink
Contexte du projet
🎯 Objectifs d’apprentissage
À travers ce projet, l’apprenant devra être capable de :

Adoption de l’architecture MVC pour une meilleure séparation des responsabilités
Utilisation du Repository Pattern pour isoler l’accès aux données
Utiliser PDO pour l’accès sécurisé à une base de données
Implémenter un système d’authentification avec gestion des rôles
Manipuler les sessions et les cookies
Gérer l’archivage des données (Soft Delete)
Utiliser AJAX pour des interactions dynamiques côté client
Upload des fichiers (CV/Images)
---

🧠 Contexte du projet
CareerLink est une plateforme destinée à faciliter la mise en relation entre candidats, recruteurs et administrateurs, dans différents secteurs d’activité.

L’application doit offrir :

une gestion efficace du contenu pour les administrateurs,
une interface claire et fonctionnelle pour les recruteurs,
une expérience fluide et intuitive pour les candidats à la recherche d’opportunités professionnelles.
---

⚙️ Fonctionnalités clés
🛠️ Back Office (Administrateurs & Recruteurs)
Gestion des catégories (Administrateurs)
Création, modification et suppression des catégories d’offres d’emploi (ex. : Technologie, Marketing, Finance).
Chaque offre d’emploi est associée à une seule catégorie.
Gestion des tags (Administrateurs)
Création, modification et suppression de tags représentant les compétences requises (ex. : PHP, Marketing Digital, Gestion de projet).
Association de plusieurs tags à une offre d’emploi afin d’améliorer la recherche.
Inscription des recruteurs
Inscription via un formulaire dédié avec : nom de l’entreprise, e-mail professionnel, mot de passe sécurisé.
Gestion des offres d’emploi (Recruteurs & Administrateurs)
Les recruteurs peuvent :

créer, modifier et supprimer leurs propres offres,
associer une catégorie et plusieurs tags,
renseigner les détails de l’offre (poste, salaire, qualifications, lieu).
Gestion des candidatures dans le système (Acceptation/Refus).
Les administrateurs peuvent :

archiver (soft delete) les offres inappropriées afin de garantir la qualité de la plateforme.
Les candidats peuvent :
Consulter la page « Jobs recommandés » basée sur ses compétences (skills) et ses prétentions salariales.
Postuler directement aux offres d’emploi.
Accès pour le recruteur à la liste des candidatures reçues et consultation des profils des candidats
Tableau de bord administrateur
Interface affichant des statistiques clés :
nombre d’offres par catégorie,
tags les plus utilisés,
recruteurs les plus actifs (basé sur le nombre d’offres publiées).
---

🌐 Front Office (Candidats & Visiteurs)
Authentification (Login / Register)
Inscription des utilisateurs avec nom, e-mail et mot de passe.
Connexion sécurisée.
Redirection selon le rôle :
administrateurs → tableau de bord admin,
recruteurs et candidats → espace personnel.
Recherche dynamique d’offres
Barre de recherche interactive utilisant AJAX.
Filtres disponibles :
mots-clés,
catégories,
tags.
Affichage du contenu
Dernières offres d’emploi : affichage des offres récentes avec poste, entreprise et localisation.
Catégories et tags : mise en avant des catégories et tags populaires ou récemment ajoutés.
Page dédiée à une offre :
description complète (poste, mission, salaire, lieu),
catégories et tags associés,
informations sur le recruteur (entreprise, site web, etc.).
- Pages des Jobs recommandés (Selon les compétences (skills) et ses prétentions salariales du candidat connecté)
---

🧪 Technologies requises
Frontend : HTML5, CSS (framework possible : Bootstrap), JavaScript (AJAX)
Backend : PHP 8 orienté objet
Base de données : MySQL avec PDO comme driver
Architecture: MVC + Repository Pattern.
