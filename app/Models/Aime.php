<?php
/**
 * Created by PhpStorm.
 * User: maxime.maillot
 * Date: 14/12/16
 * Time: 18:31
 */

namespace App\Models;

use Nova\Database\ORM\Model as BaseModel;


class Aime extends BaseModel {
    protected $table = "aime";

    public $timestamps = false;
    protected $fillable = array("*");

    public function like(){
        return $this->belongsTo("App\Models\User", "idUtilisateur");
    }

}