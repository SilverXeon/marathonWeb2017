<?php
/**
 * Created by PhpStorm.
 * User: audemard
 * Date: 24/11/2016
 * Time: 14:15
 */

namespace App\Models;

use Nova\Database\ORM\Model as BaseModel;


class Commentaire extends BaseModel {
    protected $table = "commentaire";

    public $timestamps = false;
    protected $fillable = array("*");


    public function auteur() {
        return $this->belongsTo("App\Models\User", "idUtilisateur");
    }

    public function histoire() {
        return $this->belongsTo("App\Models\Histoire", "idHistoire");
    }

}