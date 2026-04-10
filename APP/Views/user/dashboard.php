
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: { DEFAULT: '#8B4513', light: '#a0522d', dark: '#6d3410', bg: '#faf6f1', muted: '#7a6b63', border: '#e8ddd4' }
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<?php
require_once __DIR__ . '/../../Controllers/FavoriteController.php';
require_once __DIR__ . '/../../Controllers/RatingController.php';
$favController = new FavoriteController();
$userFavs = $favController->getUserFavorites($_SESSION['user_id']);
$ratingController = new RatingController();
$allAverages = $ratingController->getAllAverages();
$userRatings = $ratingController->getAllUserRatings($_SESSION['user_id']);
?>
<body class="bg-brand-bg min-h-screen flex flex-col">

    <nav class="flex items-center justify-between h-14 px-8 bg-white border-b border-brand-border sticky top-0 z-10 shadow-sm">
        <span class="text-brand font-extrabold text-lg">Marrakech Food Lovers</span>
        <a href="logout.php" class="text-brand-muted text-sm font-medium hover:text-brand">Logout</a>
    </nav>

    <main class="flex-1 max-w-6xl w-full mx-auto px-6 py-10">

        <div class="flex items-start justify-between mb-6">
            <div>
                <h1 class="text-4xl font-extrabold text-[#2d1810] tracking-tight">List of Recipes</h1>
                <p class="text-brand-muted text-sm mt-1">Curating the finest flavors of the Medina</p>
            </div>
            <a href="addRecipe.php" class="inline-flex items-center gap-1.5 px-5 py-2.5 text-sm font-bold text-white bg-brand rounded-full shadow-md hover:bg-brand-dark hover:-translate-y-0.5 transition-all">+ Ajouter une Recette</a>
        </div>

        <form method="GET" action="dashboard.php" class="flex items-center gap-3 mb-6">
            <input type="text" name="search" placeholder="Rechercher une recette..."
                value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>"
                class="px-4 py-2 text-sm border border-brand-border rounded-full outline-none focus:border-brand transition-colors w-64">
            <select name="cat" onchange="this.form.submit()" class="px-4 py-2 text-sm font-medium text-[#2d1810] bg-white border border-brand-border rounded-full cursor-pointer outline-none hover:border-brand focus:border-brand transition-colors">
                <option value="">Toutes les catégories</option>
                <?php
                $cats = [];
                foreach($recipes as $r){
                    if(!empty($r['categorie']) && !in_array($r['categorie'], $cats)){
                        $cats[] = $r['categorie'];
                    }
                }
                foreach($cats as $cat): ?>
                    <option value="<?= $cat ?>" <?= (isset($_GET['cat']) && $_GET['cat']==$cat) ? 'selected' : '' ?>><?= $cat ?></option>
                <?php endforeach; ?>
            </select>
            <select name="sort" onchange="this.form.submit()" class="px-4 py-2 text-sm font-medium text-[#2d1810] bg-white border border-brand-border rounded-full cursor-pointer outline-none hover:border-brand focus:border-brand transition-colors">
                <option value="">Trier par</option>
                <option value="rating_desc" <?= (isset($_GET['sort']) && $_GET['sort']=='rating_desc') ? 'selected' : '' ?>>Meilleures notes</option>
                <option value="rating_asc" <?= (isset($_GET['sort']) && $_GET['sort']=='rating_asc') ? 'selected' : '' ?>>Notes les plus basses</option>
            </select>
            <button type="submit" class="px-4 py-2 text-sm font-bold text-white bg-brand rounded-full hover:bg-brand-dark transition-colors">Rechercher</button>
            <a href="dashboard.php?fav=1" class="px-4 py-2 text-sm font-semibold rounded-full transition-colors <?= (isset($_GET['fav']) && $_GET['fav']=='1') ? 'bg-red-500 text-white' : 'bg-white text-red-500 border border-red-300 hover:bg-red-50' ?>">&#9829; Mes favoris</a>
        </form>

        <?php if(count($recipes) == 0): ?>
            <div class="text-center py-16 text-brand-muted">
                <p>Pas de recettes pour le moment <a href="addRecipe.php" class="text-brand font-semibold">Créez le premier !</a></p>
            </div>
        <?php else: ?>
        <?php
            // Tri par note si demandé
            if(isset($_GET['sort']) && in_array($_GET['sort'], ['rating_desc', 'rating_asc'])){
                usort($recipes, function($a, $b) use ($allAverages) {
                    $avgA = $allAverages[$a['id']] ?? 0;
                    $avgB = $allAverages[$b['id']] ?? 0;
                    return ($_GET['sort'] === 'rating_desc') ? $avgB <=> $avgA : $avgA <=> $avgB;
                });
            }
        ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            <?php
                $search = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
                foreach($recipes as $r):
                if(isset($_GET['cat']) && $_GET['cat'] !== '' && $r['categorie'] !== $_GET['cat']) continue;
                if($search && strpos(strtolower($r['title']), $search) === false) continue;
                if(isset($_GET['fav']) && $_GET['fav']=='1' && !in_array($r['id'], $userFavs)) continue;
                $isFav = in_array($r['id'], $userFavs);
                $avgRating = $allAverages[$r['id']] ?? 0;
                $myRating = $userRatings[$r['id']] ?? 0;
            ?>
            <div class="bg-white rounded-xl border border-brand-border overflow-hidden flex flex-col justify-between min-h-[220px] hover:-translate-y-1 hover:shadow-lg hover:border-[#d4b896] transition-all">
                <?php if(!empty($r['image'])): ?>
                    <img src="uploads/<?= htmlspecialchars($r['image']) ?>" class="w-full h-44 object-cover" alt="<?= htmlspecialchars($r['title']) ?>">
                <?php endif; ?>
                <div class="flex-1 p-5">
                    <div class="flex items-center justify-between mb-3">
                        <span class="inline-block px-2.5 py-1 text-[0.68rem] font-bold uppercase tracking-wider text-brand bg-brand/10 rounded-full"><?= htmlspecialchars($r['categorie']) ?></span>
                        <a href="toggleFavorite.php?recipe_id=<?= $r['id'] ?>" class="text-xl hover:scale-125 transition-transform" title="<?= $isFav ? 'Retirer des favoris' : 'Ajouter aux favoris' ?>"><?= $isFav ? '<span class="text-red-500">&#9829;</span>' : '<span class="text-gray-300">&#9829;</span>' ?></a>
                    </div>
                    <h2 class="text-base font-bold text-[#2d1810] mb-2 leading-tight"><?= htmlspecialchars($r['title']) ?></h2>
                    <div class="flex items-center gap-1 mb-2">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <a href="rateRecipe.php?recipe_id=<?= $r['id'] ?>&rating=<?= $i ?>" class="text-lg <?= $i <= $myRating ? 'text-yellow-400' : 'text-gray-300' ?> hover:text-yellow-400 transition-colors" title="Noter <?= $i ?>/5">&#9733;</a>
                        <?php endfor; ?>
                        <span class="text-xs text-brand-muted ml-1">(<?= $avgRating ?>/5)</span>
                    </div>
                    <?php
                        $prep = (int)($r['prep_time'] ?? 0);
                        $cook = (int)($r['cook_time'] ?? 0);
                        $total = $prep + $cook;
                    ?>
                    <div class="flex items-center gap-2 mb-1">
                        <p class="text-sm text-brand-muted">&#9201; <?= $prep ?>min prép. + <?= $cook ?>min cuisson = <strong><?= $total ?>min</strong></p>
                    </div>
                    <?php if($total > 0 && $total < 30): ?>
                        <span class="inline-block px-2 py-0.5 text-[0.65rem] font-bold uppercase tracking-wider text-green-700 bg-green-100 rounded-full mb-1">&#9889; Recette rapide</span>
                    <?php endif; ?>
                    <p class="text-sm text-brand-muted"><?= htmlspecialchars($r['created_at'])?></p>
                </div>
                <div class="flex items-center justify-end mt-4 pt-3 border-t border-brand-border gap-2 px-5 pb-5">
                    <?php if($_SESSION['user_id'] == $r['user_id']): ?>
                        <a href="updateRecipe.php?id=<?php echo $r['id'] ?>" class="px-3 py-1 text-xs font-semibold text-brand bg-brand/10 rounded hover:bg-brand/20 transition-colors">Modifier</a>
                        <a href="deleteRecipe.php?id=<?php echo $r['id'] ?>" class="px-3 py-1 text-xs font-semibold text-red-600 bg-red-50 rounded hover:bg-red-100 transition-colors"
                           onclick="return confirm('Voulez-vous vraiment supprimer cette recette ?')">Supprimer</a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>

            <a href="addRecipe.php" class="flex flex-col items-center justify-center min-h-[220px] border-2 border-dashed border-brand-border rounded-xl bg-[#fafbff] text-brand-muted hover:border-brand hover:text-brand hover:bg-brand/5 transition-all gap-2">
                <span class="text-3xl font-light">+</span>
                <p class="text-sm font-semibold">Créer une nouvelle recette</p>
            </a>
        </div>
        <?php endif; ?>

    </main>

    <footer class="text-center py-6 text-xs text-brand-muted">
        <span>&copy; 2023 Marrakech Food Lovers. Digital Riad Experience.</span>
    </footer>

</body>
</html>