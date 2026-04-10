<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>
<body class="add-body">
    

    <nav class="dash-nav">
        <span class="dash-nav-brand">Marrakech Food Lovers</span>
        <a href="logout.php" class="dash-nav-link">Logout</a>
    </nav>

    <main class="add-main">
    <div class="admin-cols">

            <div class="admin-col-main">
                <div class="admin-section-card">
                    <div class="admin-section-header">
                        <h2 class="admin-section-title">Gestion des Catégories</h2>

                            <a href="dashboard.php" class="btn-save">Annuler</a>

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
                                            <a href="category.php?delete_cat=<?= $c['id'] ?>"
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