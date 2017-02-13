<?php use App\Models\User; ?>

<div id="titre">
    <h2 id="bvn">Bienvenue sur GoldenBook</h2>
</div>
<div class="content container-fluid">

    <?php for($i = 0;$i<6;$i++){ if(isset($stories[$i])){ ?>
        <a href="story/<?=$stories[$i]->id?>">
            <div class="menu-histoire col-md-6 row">
                <div class="contenu">
                    <img src="<?=$stories[$i]->images->first()->url?>" />
                    <div class="contenu-contenu">
                        <h3><?=$stories[$i]->titre?></h3>
                        <h4><?=User::find($stories[$i]->idUtilisateur)->username?></h4>
                        <p><?=$stories[$i]->texte?></p>
                    </div>
                    <div class="cache-opaque"></div>
                </div>
            </div>
        </a>
    <?php }} ?>
</div>
