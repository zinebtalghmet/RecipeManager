
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dash-body">

    <nav class="dash-nav">
        <span class="dash-nav-brand">Marrakech Food Lovers</span>
        <div class="dash-nav-right">
            <a href="logout.php" class="dash-nav-link">Logout</a>
        </div>
    </nav>

    <main class="dash-main">

        <div class="dash-header">
            <div>
                <h1 class="dash-title">List of Recipes</h1>
            </div>
            <a href="addRecipe.php" class="btn-add">+ Ajouter une Recette</a>

        </div>


        <!-- ===== CARD GRID ===== -->
        <?php if(count($recipes) == 0): ?>
            <div class="dash-empty">
                <p>Pas de recettes pour le moment <a href="addRecipe.php">Créez le premier !</a></p>
            </div>
        <?php else: ?>
        <div class="prompt-grid">
            <?php foreach($recipes as $r): ?>
            <div class="prompt-card">
                <div class="prompt-card-top">
                    <span class="category-badge"><?= htmlspecialchars($r['categorie']) ?></span>
                    <h2 class="prompt-card-title"><?= htmlspecialchars($r['title']) ?></h2>
                    <p class="prompt-card-content"><?= htmlspecialchars($r['time'])?></p>
                    <p class="prompt-card-content"><?= htmlspecialchars($r['created_at'])?></p>
                </div>
                <div class="prompt-card-footer">
                    <div class="prompt-actions">
                        <?php if($_SESSION['user_id'] == $r['user_id']): ?>
                            <a href="editRecipe.php?id=<?php echo $r['id'] ?>" class="action-btn edit-btn">Modifier</a>
                            <a href="deleteRecipe.php?id=<?php echo $r['id'] ?>" class="action-btn delete-btn"
                               onclick="return confirm('Voulez-vous vraiment supprimer cette recette ?')">Supprimer</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <!-- Create new recipe CTA card -->
            <a href="addRecipe.php" class="prompt-card prompt-card-new">
                <span class="new-card-plus">+</span>
                <p>Créer une nouvelle recette</p>
            </a>
        </div>
        <?php endif; ?>

    </main>

</body>
</html>