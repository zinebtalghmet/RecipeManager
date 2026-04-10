<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Catégories</title>
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
<body class="bg-brand-bg min-h-screen flex flex-col">

    <nav class="flex items-center justify-between h-14 px-8 bg-white border-b border-brand-border sticky top-0 z-10 shadow-sm">
        <span class="text-brand font-extrabold text-lg">Marrakech Food Lovers</span>
        <a href="logout.php" class="text-brand-muted text-sm font-medium hover:text-brand">Logout</a>
    </nav>

    <main class="flex-1 max-w-5xl w-full mx-auto px-6 py-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="md:col-span-2">
                <div class="bg-white rounded-xl border border-brand-border p-6 shadow-sm">
                    <div class="flex items-center justify-between mb-5">
                        <h2 class="text-xl font-extrabold text-[#2d1810]">Gestion des Catégories</h2>
                        <a href="addRecipe.php" class="px-4 py-2 text-sm font-bold text-white bg-brand rounded-full hover:bg-brand-dark transition-colors">Annuler</a>
                    </div>

                    <form method="GET" action="" class="flex gap-2 mb-5">
                        <input type="text" name="search" placeholder="Rechercher une catégorie"
                            class="flex-1 px-3 py-2 text-sm border border-brand-border rounded-lg outline-none focus:border-brand transition-colors"
                            value="<?php echo isset($_GET['search'])? htmlspecialchars($_GET['search']) : '' ;?>">
                        <button type="submit" class="px-4 py-2 text-sm font-bold text-white bg-brand rounded-lg hover:bg-brand-dark transition-colors">Recherche</button>
                    </form>

                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-brand-border">
                                <th class="text-left py-3 px-2 font-semibold text-[#2d1810]">Nom de la Catégorie</th>
                                <th class="text-right py-3 px-2 font-semibold text-[#2d1810]">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $search = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
                                foreach ($cats as $c) :
                                    if($search && strpos(strtolower($c['name']),$search)===false) continue;
                            ?>
                                <tr class="border-b border-brand-border/50 hover:bg-brand-bg transition-colors">
                                    <td class="py-3 px-2 font-semibold"><?= htmlspecialchars($c['name']) ?></td>
                                    <td class="py-3 px-2 text-right">
                                        <a href="category.php?delete_cat=<?= $c['id'] ?>"
                                            onclick="return confirm('Voulez-vous vraiment supprimer cette catégorie ?')"
                                            class="text-red-600 text-xs font-semibold hover:text-red-800 transition-colors">Supprimer</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div>
                <div class="bg-white rounded-xl border border-brand-border p-6 shadow-sm">
                    <h3 class="text-base font-bold text-[#2d1810] mb-4">Ajouter une catégorie</h3>
                    <form method="POST" class="space-y-3">
                        <div>
                            <label class="block text-sm font-semibold text-[#2d1810] mb-1">Nom de la Catégorie</label>
                            <input type="text" name="cat_name" placeholder="ex: Entrées" class="w-full px-3 py-2 text-sm border border-brand-border rounded-lg outline-none focus:border-brand transition-colors">
                        </div>
                        <button type="submit" name="add_category" class="w-full px-4 py-2 text-sm font-bold text-white bg-brand rounded-lg hover:bg-brand-dark transition-colors">+ Ajouter</button>
                    </form>
                </div>
            </div>

        </div>
    </main>

    <footer class="text-center py-6 text-xs text-brand-muted">
        <span>&copy; 2026 DevGenius Architectural Blueprinting. All rights reserved.</span>
    </footer>

</body>
</html>