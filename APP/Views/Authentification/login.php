<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="auth-body">

    <nav class="auth-nav">
        <span class="auth-nav-brand">Marrakech Food Lovers</span>
        <a href="register.php" class="auth-nav-link">S'inscrire</a>
    </nav>

    <div class="auth-container">
        <div class="auth-card">

            <h1> Connexion</h1>

            <?php if($error != ""): ?>
                <div class="error-box"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST">
                <label>Email </label>
                <input type="email" name="email" placeholder="votre@email.com" required>

                <label>Mot de passe</label>
                <input type="password" name="password" placeholder="••••••••" required>

                <button type="submit">Se connecter</button>

                <p class="text-center">
                    Nouveau ici ? <a href="register.php">Créer un compte</a>
                </p>
            </form>

        </div>
    </div>

    <footer class="auth-footer">
        <p style="margin-top:.4rem;">© 2026 DevGenius. All rights reserved.</p>
    </footer>

</body>
</html>