<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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

    <nav class="flex items-center justify-between h-14 px-8 bg-white border-b border-brand-border shadow-sm">
        <span class="text-brand font-extrabold text-lg">Marrakech Food Lovers</span>
        <a href="register.php" class="text-brand-muted text-sm font-medium hover:text-brand">S'inscrire</a>
    </nav>

    <div class="flex-1 flex items-center justify-center px-4">
        <div class="w-full max-w-md bg-white rounded-xl border border-brand-border p-8 shadow-sm">

            <h1 class="text-2xl font-extrabold text-[#2d1810] mb-6 text-center">Connexion</h1>

            <?php if($error != ""): ?>
                <div class="mb-4 px-4 py-3 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST" class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-[#2d1810] mb-1">Email</label>
                    <input type="email" name="email" placeholder="votre@email.com" required class="w-full px-3 py-2.5 text-sm border border-brand-border rounded-lg outline-none focus:border-brand transition-colors">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#2d1810] mb-1">Mot de passe</label>
                    <input type="password" name="password" placeholder="••••••••" required class="w-full px-3 py-2.5 text-sm border border-brand-border rounded-lg outline-none focus:border-brand transition-colors">
                </div>

                <button type="submit" class="w-full py-2.5 text-sm font-bold text-white bg-brand rounded-full hover:bg-brand-dark transition-colors">Se connecter</button>

                <p class="text-center text-sm text-brand-muted">
                    Nouveau ici ? <a href="register.php" class="text-brand font-semibold hover:underline">Créer un compte</a>
                </p>
            </form>

        </div>
    </div>

    <footer class="text-center py-4 text-xs text-brand-muted">
        <p>&copy; 2026 DevGenius. All rights reserved.</p>
    </footer>

</body>
</html>