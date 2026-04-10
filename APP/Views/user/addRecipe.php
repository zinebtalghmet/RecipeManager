<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Recipes</title>
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

    <main class="flex-1 max-w-3xl w-full mx-auto px-6 py-10">
        <div class="bg-white rounded-xl border border-brand-border p-8 shadow-sm">

            <div class="mb-6">
                <h1 class="text-2xl font-extrabold text-[#2d1810]">Créer une nouvelle Recette</h1>
            </div>

            <div class="mb-6">
                <a href="category.php" class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-bold text-white bg-brand rounded-full hover:bg-brand-dark transition-colors">+ Ajouter une Categorie</a>
            </div>

            <form method="POST" action="" enctype="multipart/form-data">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold text-[#2d1810] mb-1">Titre</label>
                        <input type="text" name="title" placeholder="ex.Tagine" class="w-full px-3 py-2 text-sm border border-brand-border rounded-lg outline-none focus:border-brand transition-colors">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#2d1810] mb-1">Catégorie</label>
                        <select name="category_id" class="w-full px-3 py-2 text-sm border border-brand-border rounded-lg outline-none focus:border-brand transition-colors">
                            <option value="">Sélectionner une catégorie</option>
                            <?php foreach($cats as $c){ ?>
                                <option value="<?php echo $c['id']; ?>"><?php echo htmlspecialchars($c['name']); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="space-y-4 mb-6">
                    <div>
                        <label class="block text-sm font-semibold text-[#2d1810] mb-1">Ingrédients</label>
                        <textarea name="ingredients" rows="4" class="w-full px-3 py-2 text-sm border border-brand-border rounded-lg outline-none focus:border-brand transition-colors" placeholder="// Écrivez votre ingrédients ici..."></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#2d1810] mb-1">Instructions</label>
                        <input type="text" name="instructions" placeholder="// Écrivez votre instructions ici..." class="w-full px-3 py-2 text-sm border border-brand-border rounded-lg outline-none focus:border-brand transition-colors">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-[#2d1810] mb-1">Temps de préparation (min)</label>
                            <input type="number" name="prep_time" min="0" placeholder="ex: 15" class="w-full px-3 py-2 text-sm border border-brand-border rounded-lg outline-none focus:border-brand transition-colors">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-[#2d1810] mb-1">Temps de cuisson (min)</label>
                            <input type="number" name="cook_time" min="0" placeholder="ex: 45" class="w-full px-3 py-2 text-sm border border-brand-border rounded-lg outline-none focus:border-brand transition-colors">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#2d1810] mb-1">Portions</label>
                        <input type="text" name="portions" placeholder="// Écrivez votre Portions ici..." class="w-full px-3 py-2 text-sm border border-brand-border rounded-lg outline-none focus:border-brand transition-colors">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-[#2d1810] mb-1">Photo de la recette</label>
                    <input type="file" name="image" accept="image/*" class="w-full text-sm text-brand-muted file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-brand/10 file:text-brand hover:file:bg-brand/20 cursor-pointer">
                </div>

                <div class="flex items-center justify-end gap-3">
                    <a href="dashboard.php" class="px-5 py-2 text-sm font-semibold text-brand-muted border border-brand-border rounded-full hover:border-brand hover:text-brand transition-colors">Annuler</a>
                    <button type="submit" class="px-5 py-2 text-sm font-bold text-white bg-brand rounded-full hover:bg-brand-dark transition-colors">Ajouter</button>
                </div>

            </form>
        </div>
    </main>

    <footer class="text-center py-6 text-xs text-brand-muted">
        <span>&copy; 2026 DevGenius Architectural Blueprinting. All rights reserved.</span>
    </footer>

</body>
</html>