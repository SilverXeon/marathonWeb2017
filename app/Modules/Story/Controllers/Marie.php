<?php
/**
 * Created by PhpStorm.
 * User: pierre.sacre
 * Date: 14/12/16
 * Time: 10:46
 */

namespace app\Modules\Story\Controllers;


use App\Core\Controller;
use App\Models\Commentaire;
use App\Models\Histoire;
use App\Models\User;
use View;
use Redirect;
use Input;
use Auth;

class Marie extends Controller
{
    //protected $template = 'Caroussel';
    public function index(){
        /*$page = View::make('../Modules/Story/Views/Marie/Index');

        return View::makeTemplate('caroussel')
            ->shares('title', 'Accueil')
            ->withContent($page);*/
        //$template = 'Caroussel';

        //$rch = 0;
        if (!isset($tri)) {
            $stories = Histoire::all()->sortBy('id desc'); //sortBy useless

        }
        $nb = count($stories);


        /*
        $stories = Histoire::all()->sortBy(function($h));
        return $h->auteur->username;*/

        return $this->getView()
            ->shares('title', 'GoldenBook')
            ->with('stories',$stories)
            ->with('nb',$nb);
            //->with('rch',$rch);
    }

    public function trierAuteurs(){
        $stories = Histoire::all()->sortBy('idUtilisateur');

        $tri = 1;
        return View::Make('Marie/Index', [], 'Story')
            ->shares('title', 'Tri par auteur')
            ->with('stories',$stories)
            ->with('tri',$tri)
            ->with('nb', count($stories));
        //return count($stories->commentaires()); //affichage inversé
    }

    public function trierTitres(){
        $stories = Histoire::all()->sortBy('titre');
    //return $stories;
        $tri = 1;
        return View::Make('Marie/Index', [], 'Story')
            ->shares('title', 'Tri par titre')
            ->with('stories',$stories)
            ->with('tri',$tri)
            ->with('nb', count($stories));
        //return count($stories->commentaires()); //affichage inversé
    }



    public function filtrerParUser(){
        $data = $_POST;
        $user = $data["texte"];
        $idUser = User::where('username ? ',$user)->get(); //approximatif
        $stories = $idUser->histoires(); //approximatif
        return $this->getView()->shares('title', 'Resultats')->with('stories',$stories);
    }

    public function filtrerParNom(){ //mot cle
        $data = $_POST;
        $mot = "%".$data["texte"]."%";
        $stories = Histoire::whereRaw('texte : ?',array($mot))->get();
        return $this->getView()->shares('title', 'Resultats')->with('stories',$stories);
    }

    public function send($story)
    {
        if (Input::has('texte')) {

            $user = Auth::id();
            $date = date("Y-m-d H:i:s");
            $comment = new Commentaire();
            $comment->texte = Input::get('texte');
            $comment->datePost = $date;
            $comment->idUtilisateur = $user;
            $comment->idHistoire = $story;

            $comment->save();
        }
        return Redirect::to('story/'.$story);
    }
}