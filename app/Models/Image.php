<?php
/**
 * Created by PhpStorm.
 * User: audemard
 * Date: 24/11/2016
 * Time: 14:15
 */

namespace App\Models;

use Nova\Database\ORM\Model as BaseModel;


class Image extends BaseModel {
    protected $table = "image";

    public $timestamps = false;
    protected $fillable = array("*");

    public function histoire() {
        return $this->belongsTo("App\Models\Histoire", "idHistoire");
    }
}