<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Recipes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="add-body">

    <nav class="dash-nav">
        <span class="dash-nav-brand">Marrakech Food Lovers</span>
        <a href="logout.php" class="dash-nav-link">Logout</a>
    </nav>

    <main class="add-main">
        <div class="add-card">

            <div class="add-card-header">
                <h1 class="add-title">Créer une nouvelle Recette</h1>
            </div>

            <div class="dash-header">
                <a href="category.php" class="btn-add">+ Ajouter une Categorie</a>
            </div>

            <form method="POST" class="add-form" action="">

                <div class="add-row">
                    <div class="add-field">
                        <label class="add-label">titre</label>
                        <input type="text" name="title" placeholder="ex.Tagine" class="add-input">
                    </div>
                    <div class="add-field">
                        <label class="add-label">Catégorie</label>
                        <select name="category_id" class="add-select">
                            <option value="">Sélectionner une catégorie</option>
                            <?php foreach($cats as $c){ ?>
                                <option value="<?php echo $c['id']; ?>"><?php echo htmlspecialchars($c['name']); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <!-- Prompt content textarea -->
                <div class="add-field add-field-full">
                    <label class="add-label">Ingrédients</label>
                    <textarea name="ingredients" class="add-textarea" placeholder="// Écrivez votre ingrédients ici..."></textarea>
                    <label class="add-label">Instructions</label>
                    <input type="text" name="instructions" placeholder="// Écrivez votre instructions ici..." class="add-input">
                    <label class="add-label">Tempte de préparation</label>
                    <input type="text" name="time" placeholder="// Écrivez votre Tempte de préparation ici..." class="add-input">
                    <label class="add-label">Portions</label>
                    <input type="text" name="portions" placeholder="// Écrivez votre Portions ici..." class="add-input">
                </div>

                <!-- Actions: Cancel + Save -->
                <div class="add-actions">
                    <a href="dashboard.php" class="btn-cancel">Annuler</a>
                    <button type="submit" class="btn-save">Ajouter</button>
                </div>

            </form>
        </div>

    </main>


    <!-- Footer -->
    <footer class="add-footer">
        <span>© 2026 DevGenius Architectural Blueprinting. All rights reserved.</span>
    </footer>

</body>
</html>