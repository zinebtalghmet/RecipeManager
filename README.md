# RecipeManager 
marouazouidi_46186
marouazouidi_46186
Online

Zinabo — 12:39 PM
https://lucid.app/lucidchart/0104bd3d-5eb4-4370-9570-f1cef66c767e/edit?view_items=4fRLJ~6eUlRY&page=0_0&invitationId=inv_6da11abf-7431-4b8a-83a0-a57ba3b53840
Zinabo — 03:36 PM
# 🍽️ Recipe Collection Manager

**Marrakech Food Lovers** — Plateforme de gestion et partage de recettes culinaires

> Projet développé par **DigitalBite Agency**

---

## 📋 Contexte du Projet

Les passionnés de cuisine dispersent leurs recettes dans des cahiers papier, des photos sur téléphone et des fichiers Word. Cette plateforme centralise tout : créer, organiser, retrouver et partager ses recettes en quelques clics.

---

## 🏗️ Architecture Technique

### Pattern MVC (Modèle-Vue-Contrôleur)

```
📁 recipe-collection-manager/
├── 📁 config/
│   └── database.php          # Connexion PDO (Singleton)
├── 📁 models/
│   ├── User.php              # Modèle Utilisateur
│   ├── Recipe.php            # Modèle Recette
│   └── Category.php          # Modèle Catégorie
├── 📁 controllers/
│   ├── AuthController.php    # Inscription & Connexion
│   ├── RecipeController.php  # CRUD Recettes
│   └── CategoryController.php# Gestion Catégories
├── 📁 views/
│   ├── 📁 auth/
│   │   ├── register.php
│   │   └── login.php
│   ├── 📁 recipes/
│   │   ├── index.php
│   │   ├── create.php
│   │   ├── edit.php
│   │   └── show.php
│   └── 📁 layouts/
│       ├── header.php
│       └── footer.php
├── 📁 public/
│   ├── index.php             # Point d'entrée (Front Controller)
│   ├── 📁 css/
│   └── 📁 js/
└── 📁 sql/
    └── schema.sql            # Script de création BDD
```

### Rôles MVC

| Composant | Métaphore | Responsabilité |
|-----------|-----------|----------------|
| **Modèle** | 🧑🍳 Le Cuisinier | Accès aux données, logique métier, requêtes SQL |
| **Vue** | 🍽️ La Salle à Manger | Affichage HTML, aucune logique métier |
| **Contrôleur** | 🤵 Le Serveur | Orchestration : reçoit la requête → appelle le modèle → envoie à la vue |

---

## 🔒 POO & Encapsulation

Toutes les classes utilisent des propriétés **private** avec accès via **getters/setters** :

```php
class Recipe {
    private int $id;
    private string $title;
    private string $ingredients;
    private string $instructions;
    private int $prepTime;
    private int $cookTime;
    private int $servings;
    private int $userId;
    private int $categoryId;

    // Getter
    public function getTitle(): string {
        return $this->title;
    }

    // Setter avec validation
    public function setTitle(string $title): void {
        if (empty(trim($title))) {
            throw new Exception("Le titre est obligatoire");
        }
        $this->title = htmlspecialchars($title);
    }
}
```

---

## 🗃️ Modélisation des Données (Merise)

### MCD (Modèle Conceptuel de Données)

```
┌──────────────┐          ┌──────────────┐          ┌──────────────┐
│  UTILISATEUR │          │    RECETTE    │          │  CATEGORIE   │
... (159 lines left)

message.txt
10 KB
﻿
Zinabo
_snowflake__zi_12556
 
# 🍽️ Recipe Collection Manager

**Marrakech Food Lovers** — Plateforme de gestion et partage de recettes culinaires

> Projet développé par **DigitalBite Agency**

---

## 📋 Contexte du Projet

Les passionnés de cuisine dispersent leurs recettes dans des cahiers papier, des photos sur téléphone et des fichiers Word. Cette plateforme centralise tout : créer, organiser, retrouver et partager ses recettes en quelques clics.

---

## 🏗️ Architecture Technique

### Pattern MVC (Modèle-Vue-Contrôleur)

```
📁 recipe-collection-manager/
├── 📁 config/
│   └── database.php          # Connexion PDO (Singleton)
├── 📁 models/
│   ├── User.php              # Modèle Utilisateur
│   ├── Recipe.php            # Modèle Recette
│   └── Category.php          # Modèle Catégorie
├── 📁 controllers/
│   ├── AuthController.php    # Inscription & Connexion
│   ├── RecipeController.php  # CRUD Recettes
│   └── CategoryController.php# Gestion Catégories
├── 📁 views/
│   ├── 📁 auth/
│   │   ├── register.php
│   │   └── login.php
│   ├── 📁 recipes/
│   │   ├── index.php
│   │   ├── create.php
│   │   ├── edit.php
│   │   └── show.php
│   └── 📁 layouts/
│       ├── header.php
│       └── footer.php
├── 📁 public/
│   ├── index.php             # Point d'entrée (Front Controller)
│   ├── 📁 css/
│   └── 📁 js/
└── 📁 sql/
    └── schema.sql            # Script de création BDD
```

### Rôles MVC

| Composant | Métaphore | Responsabilité |
|-----------|-----------|----------------|
| **Modèle** | 🧑‍🍳 Le Cuisinier | Accès aux données, logique métier, requêtes SQL |
| **Vue** | 🍽️ La Salle à Manger | Affichage HTML, aucune logique métier |
| **Contrôleur** | 🤵 Le Serveur | Orchestration : reçoit la requête → appelle le modèle → envoie à la vue |

---

## 🔒 POO & Encapsulation

Toutes les classes utilisent des propriétés **private** avec accès via **getters/setters** :

```php
class Recipe {
    private int $id;
    private string $title;
    private string $ingredients;
    private string $instructions;
    private int $prepTime;
    private int $cookTime;
    private int $servings;
    private int $userId;
    private int $categoryId;

    // Getter
    public function getTitle(): string {
        return $this->title;
    }

    // Setter avec validation
    public function setTitle(string $title): void {
        if (empty(trim($title))) {
            throw new Exception("Le titre est obligatoire");
        }
        $this->title = htmlspecialchars($title);
    }
}
```

---

## 🗃️ Modélisation des Données (Merise)

### MCD (Modèle Conceptuel de Données)

```
┌──────────────┐          ┌──────────────┐          ┌──────────────┐
│  UTILISATEUR │          │    RECETTE    │          │  CATEGORIE   │
├──────────────┤          ├──────────────┤          ├──────────────┤
│ id           │          │ id           │          │ id           │
│ username     │ 1,N      │ title        │    1,1   │ name         │
│ email        │────Ajouter────│ ingredients  │──Appartenir──│              │
│ password     │          │ instructions │          │              │
│              │          │ prep_time    │          │              │
│              │          │ cook_time    │          │              │
│              │          │ servings     │          │              │
│              │          │ created_at   │          │              │
└──────────────┘          └──────────────┘          └──────────────┘
                                                          │
                                                     1,N  │  1,1
                                                          │
                                               ┌──────────────┐
                                               │  UTILISATEUR │
                                               │───Créer──────│
                                               └──────────────┘
```

**Cardinalités :**
- Utilisateur **(1,N)** — Ajouter — **(1,1)** Recette
- Recette **(1,1)** — Appartenir — **(1,N)** Catégorie
- Utilisateur **(1,N)** — Créer — **(1,1)** Catégorie

### MLD (Modèle Logique de Données)

```
users (id PK, username VARCHAR(50), email VARCHAR(100) UNIQUE, password VARCHAR(255), created_at TIMESTAMP)

categories (id PK, name VARCHAR(50), user_id FK → users.id)

recipes (id PK, title VARCHAR(150), ingredients TEXT, instructions TEXT, prep_time INT, cook_time INT, servings INT, created_at TIMESTAMP, user_id FK → users.id, category_id FK → categories.id)
```

---

## 🗄️ Structure SQL

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

INSERT INTO categories (name, user_id) VALUES
('Entrées', 1), ('Plats', 1), ('Desserts', 1), ('Boissons', 1);

CREATE TABLE recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    ingredients TEXT NOT NULL,
    instructions TEXT NOT NULL,
    prep_time INT NOT NULL,
    cook_time INT DEFAULT 0,
    servings INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT NOT NULL,
    category_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);
```

**Relations 1-N :**
- `users` → `recipes` : Un utilisateur possède plusieurs recettes
- `categories` → `recipes` : Une catégorie contient plusieurs recettes
- `users` → `categories` : Un utilisateur peut créer plusieurs catégories

---

## 📌 User Stories

### Sprint 1 — Fondations (36 pts)

| US | Description | Story Points |
|----|-------------|:------------:|
| US1 | Inscription Utilisateur (username, email, password) | 5 |
| US2 | Connexion Utilisateur (email + password, sessions PHP) | 5 |
| US3 | Afficher Mes Recettes (liste avec titre, temps, date) | 3 |
| TECH | Conception Merise — MCD & MLD | 5 |
| TECH | Architecture MVC — Structure du Projet | 8 |
| TECH | POO — Encapsulation (private/getters/setters) | 5 |
| TECH | SQL — Création BDD & Relations 1-N | 5 |

### Sprint 2 — CRUD & Catégories (21 pts)

| US | Description | Story Points |
|----|-------------|:------------:|
| US4 | Créer une Recette (titre, ingrédients, instructions, temps, portions) | 8 |
| US5 | Modifier une Recette existante | 5 |
| US6 | Supprimer une Recette | 3 |
| US7 | Catégories de Recettes (Entrées, Plats, Desserts, Boissons) | 5 |

### Sprint 3 — Filtrage & Bonus (21 pts)

| US | Description | Story Points |
|----|-------------|:------------:|
| US8 | Filtrer par Catégorie | 3 |
| BONUS | Recherche de Recettes (par titre ou ingrédients) | 5 |
| BONUS | Recettes Favorites | 5 |
| BONUS | Temps Total Automatique (badge "recette rapide" < 30 min) | 3 |
| BONUS | Notes/Évaluations (5 étoiles) | 5 |

> ⚠️ **Bonus** : Choisir UNE extension par binôme

---

## 🛠️ Technologies

- **Backend** : PHP 8+ (POO, MVC)
- **Base de données** : MySQL / MariaDB
- **Frontend** : HTML5, CSS3, JavaScript
- **Gestion de projet** : Jira (Scrum)
- **Modélisation** : Lucidchart (Merise)

---

## 🚀 Installation

```bash
# Cloner le projet
git clone https://github.com/votre-repo/recipe-collection-manager.git
cd recipe-collection-manager

# Importer la base de données
mysql -u root -p < sql/schema.sql

# Configurer la connexion BDD
cp config/database.example.php config/database.php
# Éditer config/database.php avec vos identifiants

# Lancer le serveur
php -S localhost:8000 -t public/
```

---

## 👥 Équipe

- **Client** : Marrakech Food Lovers
- **Agence** : DigitalBite Agency
- **Méthodologie** : Scrum (3 Sprints)
- **Board Jira** : [Recipe Collection Manager](https://zouidimaroua.atlassian.net/jira/software/projects/RCM/boards/2)

---

## 📄 Licence

Projet académique — Tous droits réservés.
