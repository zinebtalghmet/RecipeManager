
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
        <a href="index.php" class="auth-nav-link">Connexion</a>
    </nav>

    <div class="auth-container">
        <div class="auth-card">

            <h1>Créer un compte</h1>
            <?php if($error ?? '' != ""): ?>
                <div class="error-box"><?= $error ?></div>
            <?php endif; ?>

            <form action="" method="POST">
                <label>Nom et Prénom</label>
                <input type="text" name="name" placeholder="Nom et Prenom" >

                <label>Adresse email</label>
                <input type="email" name="email" placeholder="nom@gmail.com" >

                <label>Mot de passe</label>
                <input type="password" name="password" placeholder="••••••••" >


                <button type="submit">Créer un compte</button>

                <p class="text-center">
                    Déjà un compte ? <a href="index.php">Log In</a>
                </p>
            </form>

        </div>
    </div>

    <footer class="auth-footer">
        <p style="margin-top:.4rem;">© 2026 DevGenius. All rights reserved.</p>
    </footer>

</body>
</html>