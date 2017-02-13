<?php use App\Models\User; ?>
<?php foreach($stories as $s) {?>

<a href="story/<?=$s->id?>">
    <div class="menu-histoire col-md-6 row">
        <div class="contenu">
            <img src="<?=$s->images->first()->url?>" />
            <div class="contenu-contenu">
                <h3><?=$s->titre?></h3>
                <h4><?=User::find($s->idUtilisateur)->username?></h4>
                <p><?=$s->texte?></p>
            </div>
            <div class="cache-opaque"></div>
        </div>
    </div>
</a>

<?php } ?>
