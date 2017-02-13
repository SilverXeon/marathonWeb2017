<script>
    var cpt = 1;
</script>
<?php if(isset($messages)) {
        echo "<h1>".$messages."</h1>";
}?>

<section class="creehist">
    <h1 class="title"> Crée une Histoire</h1>
    
<div class="trait">
</div>
<form class="catego" method='post' enctype="multipart/form-data">
    <div class="input">
   <label>Titre</label><input type="text" name="titre" id="title"><br>
    </div>
    <div class="textarea">
        <label>Pitch</label><textarea class="hist align" type="text" name="pitch" ></textarea> <br><br>
    </div>
    <div id="partPhoto">
        <div class="input">
        <label>Fichier</label><input  type="file" accept="image/*" name="photo1"><br>
        </div>
        <div class="input">
        <label>Titre de la photo</label><input class="hist" type="text" name="titrephoto1"><br>
        </div>
        <div class="textarea">
        <label class="align">Texte</label><textarea class="hist align" type="text" name="legende1"> </textarea><br>
        <br>
        </div>
    </div>

    <a class="part" onclick="ajoutPhoto()">Ajouter une partie</a>
    <script>
        function ajoutPhoto() {
            cpt = cpt+1;
            var d = '<div id="partPhoto"> \
                <label>Fichier</label><input type="file" accept="image/*" name="photo'+cpt+'"><br><br> \
                <label>Titre de la photo</label><input class="hist" type="text" name="titrephoto'+cpt+'"><br> \
                <div class="textarea"> \
                    <label class="align" >Texte</label><textarea class="align hist" type="text" name="legende'+cpt+'"> </textarea> <br>\
                </div>\
                </div>\
                </div>';
            if(cpt<=12) {
                document.getElementById("partPhoto").innerHTML = document.getElementById("partPhoto").innerHTML + d;
            }
            else{
                alert("Nombre maximal de partie");
            }
        }
    </script>
     
    <input class="btn" id="submit" type="submit" value="Submit">
    
</form>
</section>


<section class="hist2">
    
<h1 class="title"> Mes Histoires </h1>
<div class="content container-fluid">
<?php use App\Models\User; ?>

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
</div>
</section>