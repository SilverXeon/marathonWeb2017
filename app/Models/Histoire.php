<?php
/**
 * Created by PhpStorm.
 * User: audemard
 * Date: 24/11/2016
 * Time: 14:14
 */

namespace App\Models;

use Nova\Database\ORM\Model as BaseModel;


class Histoire extends BaseModel {
    protected $table = "histoire";
    public $timestamps = false;
    protected $fillable = array("*");

    public function auteur() {
        return $this->belongsTo("App\Models\User", "idUtilisateur");
    }


    public function images() {
        return $this->hasMany("App\Models\Image", "idHistoire");
    }


    public function commentaires() {
        return $this->hasMany("App\Models\Commentaire", "idHistoire");
    }

    public function ilsaiment() {
        return $this->belongsToMany("App\Models\User", "aime", "idHistoire", "idUtilisateur");
    }
}