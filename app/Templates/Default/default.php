<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title><?= $title .' - ' .Config::get('app.name', SITETITLE); ?></title>
<?php
echo isset($meta) ? $meta : ''; // Place to pass data / plugable hook zone

Assets::css([
    vendor_url('dist/css/bootstrap.min.css', 'twbs/bootstrap'),
    template_url('css/style.css', 'Default'),
    template_url('css/accueil.css', 'Default'),
    template_url('css/isa.css', 'Default')
]);
$url = PATH."templates/default/assets/images/";
echo isset($css) ? $css : ''; // Place to pass data / plugable hook zone
?>
</head>
<body>

<header class="header">
   <div class="logo">
       <img id="logo" alt="logo" src="<?= $url; ?>logo.png"/>
    </div>
    <div class="menu">
            <form method="post" action="recherche">
                <input id="search" type="search" placeholder="rechercher" name="search">
                <input id="submit" type="submit" style="visibility: hidden;" />
            </form>
        
    <div class="nav-bar  .col-xs-6 .col-md-4">
      <a href="<?=PATH?>" class="link">Accueil</a>
      <a href="<?=PATH?>mystory" class="link">Mes histoires</a>
        <a href="<?=PATH?>random" class="link">Histoire aléatoire</a>
        <?php
// Le menu login...
if(\Nova\Support\Facades\Auth::check()) {
    echo "<a href='".PATH."/logout' class='link'>Déconnexion</a>";
} else {
    echo "<a href='".PATH."/login' class='link'>login</a>&nbsp;<a href='".PATH."/register' class='link'>Inscription</a>"/*."</div>"*/;
}

?>
    </div>
    </div>

</header>
 
<?php
if(\Nova\Support\Facades\Auth::check()) {
    echo "<div id='perso'><span>".\Nova\Support\Facades\Auth::user()->username."</span></div>";}
?>

<?php // Le rendu des vues est donné par la variable $content, A GARDER ABSOLUMENT !!!!;?>
    <?= $content; ?>

<footer class="footer">
    <h3>GoldenBook©</h3>
</footer>

<?php
Assets::js([
    vendor_url('dist/js/bootstrap.min.js', 'twbs/bootstrap'),
    template_url('js/jquery-3.1.1.min.js', 'Default'),
]);

echo isset($js) ? $js : ''; // Place to pass data / plugable hook zone

echo isset($footer) ? $footer : ''; // Place to pass data / plugable hook zone
?>

<!-- DO NOT DELETE! - Forensics Profiler -->

</body>
</html>
