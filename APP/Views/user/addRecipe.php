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

            <form method="POST" class="add-form" action="">

                <!-- Title + Category side by side -->
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
                    <a href="index.php" class="btn-cancel">Annuler</a>
                    <button type="submit" class="btn-save">Ajouter</button>
                </div>

            </form>
        </div>

        <div class="admin-cols">

            <div class="admin-col-main">
                <div class="admin-section-card">
                    <div class="admin-section-header">
                        <h2 class="admin-section-title">Gestion des Catégories</h2>
                    </div>
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Nom de la Catégorie</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cats as $c): ?>
                                <tr>
                                    <td><strong><?= htmlspecialchars($c['name']) ?></strong></td>
                                    <td>
                                        <div class="admin-row-actions">
                                            <a href="addRecipe.php?delete_cat=<?= $c['id'] ?>"
                                                onclick="return confirm('Voulez-vous vraiment supprimer cette catégorie ?')"
                                                class="admin-action-delete">Supprimer</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="admin-col-side">

                <!-- Add category form -->
                <div class="admin-section-card">
                    <h3 class="admin-form-title">Ajouter une catégorie</h3>
                    <form method="POST" class="admin-add-form">
                        <label class="admin-add-label">Nom de la Catégorie</label>
                        <input type="text" name="cat_name" placeholder="ex: Entrées" class="admin-add-input">
                        <button type="submit" name="add_category" class="admin-add-btn">+ Ajouter</button>
                    </form>
                </div>


            </div>
        </div>

    </main>


    <!-- Footer -->
    <footer class="add-footer">
        <span>© 2026 DevGenius Architectural Blueprinting. All rights reserved.</span>
    </footer>

</body>
</html>