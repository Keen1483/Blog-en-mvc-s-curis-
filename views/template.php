<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $t ?></title>
    </head>
    
    <body>
        <header>
            <h1><a href="<?= URL ?>">Mon Blog</a></h1>
            <p>Bienvenue sur mon Blog</p>
        </header>
        
        <?= $content ?>
        
        <footer>
            <p>Crée par Bernard Geraud Dongmo</p>
        </footer>
    </body>
</html>