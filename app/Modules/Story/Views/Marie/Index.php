<?php use App\Models\User; ?>

<div id="titre">
    <h2 id="bvn">Bienvenue sur GoldenBook</h2>
</div>
<div class="content container-fluid">
    <div class="container">
    <p>
        <a href="">
        <button class="btn" type="button">Trier par date</button>
        </a>
        <a href="triAuteurs">
        <button class="btn" type="button">Trier par auteur</button>
        </a>
        <a href="triTitres">
        <button class="btn" type="button">Trier par titre</button>
        </a>
    </p>

    <?php
    if(!isset($tri)) {

        for ($i = 0; $i < 6; $i++) {
            if (isset($stories[$nb - $i - 1])) { ?>
                <div class="menu-histoire col-md-6 row">
                    <a href="story/<?= $stories[$nb - $i - 1]->id ?>">
                        <div class="contenu">
                            <img src="<?= $stories[$nb - $i - 1]->images->first()->url ?>" alt="image de presentation"/>
                            <div class="contenu-contenu">
                                <h3><?= $stories[$nb - $i - 1]->titre ?></h3>
                                <h4><?= User::find($stories[$nb - $i - 1]->idUtilisateur)->username ?></h4>
                                <p><?= $stories[$nb - $i - 1]->texte ?></p>
                            </div>
                            <div class="cache-opaque"></div>
                        </div>
                    </a>
                </div>
                <?php
            }
        }
    }
    else {
        foreach($stories as $story){
        ?>
            <div class="menu-histoire col-md-6 row">
                <a href="story/<?=$story->id?>">
                    <div class="contenu">
                        <img src="<?=$story->images->first()->url?>" alt="Image de presentation" />
                        <div class="contenu-contenu">
                            <h3><?=$story->titre?></h3>
                            <h4><?=User::find($story->idUtilisateur)->username?></h4>
                            <p><?=$story->texte?></p>
                        </div>
                        <div class="cache-opaque"></div>
                    </div>
                </a>
            </div>
        <?php
        }
    }


    ?>

           

    <?php  ?>
    </div>
</div>
