
<div class="histoires">
    
    <div class="histoires-item ">
        <div class="short-text">
<!--<h1>Histoire <? $id;?></h1>-->

<!--<h2> <?php echo $title; ?></h2>-->

<h3 class="title"><?php echo $story->titre; ?> </h3>
            
            <p class="auteur-histoire">
               <?php
echo $story->auteur->username; if(Auth::id() == $story->auteur->id) echo "<div class='btn btn-like btn-supprimer'><a href='../del/".$story->id."'>Supprimer</a></div>";
?>
               </p>

<p><?php echo $story->texte; ?> </p>
        </div>
        <div class="histoires-text">



<div class="histoire-conteneur">
<?php foreach ($story->images as $image){ ?>
            <div class="histoire histoire-text">
                 <div class="histoire-part">
<!--                     <span><?php echo $image->titre ?></span>-->
                        <img src="<?php echo $image->url; ?>" class="histoires-img"/> 
                </div>
                <div class="histoire-part">
                    <p><?php echo $image->texte; ?></p>
                </div>
            </div>
<?php } ?>
        </div>
        </div>
</div>
</div>

<?php if (Auth::check()){ ?>
    <div class="btn btn-like">
        <a href="addlikes/<?=$id?>" >Likes : <?=$likes?></a>
</div>
<?php } ?>

<div class="commentaires">
    <div class="commentaires-ajoutés">
<?php
foreach($story->commentaires as $c) {
    ?>
    <p>
<?php
    echo "<b><span class='auteur'>".$c->auteur->username."</span></b>" ?><?php 
    echo "<b><span class='date'>".$c->datePost."</span></b>" ?>
    <?php
    echo "<br />";
    echo $c->texte;
    ?></p><?php
}


if(Auth::check()) {
    // Display form commentaire
    ?>
    <div class="ajout-commentaire">
    <h3>Laisser un commentaire</h3>
    <form method="post">
        <input type="text" name="texte" placeholder="votre commentaire"/>
        <input type="submit" value="Envoyer" class="btn">
    </form>
</div>
    </br></br>

</div>
    <?php }?>

