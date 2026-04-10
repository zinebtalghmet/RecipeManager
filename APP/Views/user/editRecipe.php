<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la Recette</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="add-body">

    <nav class="dash-nav">
        <span class="dash-nav-brand">Marrakech Food Lovers</span>
        <a href="logout.php" class="dash-nav-link">Logout</a>
    </nav>

    <main class="add-main">
        <div class="add-card">

            <!-- Card header -->
            <div class="add-card-header">
                <h1 class="add-title">Modifier la Recette</h1>
            </div>

            <form method="POST" class="add-form">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($recipe['id']);?> ">
                <div class="add-row">
                    <div class="add-field">
                        <label class="add-label">Titre</label>
                        <input type="text" name="title"
                               value="<?php echo htmlspecialchars($recipe['title']); ?>"
                               placeholder="le titre"
                               class="add-input">
                    </div>
                    <div class="add-field">
                        <label class="add-label">Catégorie</label>
                        <select name="category_id" class="add-select">
                            <option value="">Selectionner une catégorie</option>
                            <?php foreach ($cats as $c) { ?>
                                <option value="<?php echo htmlspecialchars($c['id']); ?>"
                                    <?php if($c['id']== $recipe['cat_id']) echo 'selected';?>>
                                    <?php echo htmlspecialchars($c['name']); ?> 
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="add-field add-field-full">
                    <label class="add-label">Ingrédients</label>
                    <textarea name="ingredients" class="add-textarea" placeholder="// Écrivez votre ingrédients ici..."><?php echo htmlspecialchars($recipe['ingredients']); ?></textarea>
                    <label class="add-label">Instructions</label>
                    <input type="text" name="instructions" placeholder="// Écrivez votre instructions ici..." class="add-input" value="<?php echo htmlspecialchars($recipe['instructions']); ?>">
                    <label class="add-label">Tempte de préparation</label>
                    <input type="text" name="time" placeholder="// Écrivez votre time ici..." class="add-input" value="<?php echo htmlspecialchars($recipe['time']); ?>">
                    <label class="add-label">Portions</label>
                    <input type="text" name="portions" placeholder="// Écrivez votre portions ici..." class="add-input" value="<?php echo htmlspecialchars($recipe['portions']); ?>">
                </div>

                <!-- Actions -->
                <div class="add-actions">
                    <a href="dashboard.php" class="btn-cancel">Annuler</a>
                    <button type="submit" class="btn-save">Sauvegarder la Recette</button>
                </div>

            </form>
        </div>

    </main>

   
    

</body>
</html>