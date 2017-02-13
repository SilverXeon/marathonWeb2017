<?php
/**
 * Created by PhpStorm.
 * User: pierre.sacre
 * Date: 14/12/16
 * Time: 10:46
 */

namespace app\Modules\Story\Controllers;


use App\Core\Controller;
use App\Models\Histoire;
use Auth;
use Nova\Database\ORM\Collection;
use Nova\Support\Facades\Input;
use Nova\Support\Facades\Redirect;
use App\Models\Image;
use Error;
use View;

class Sacre extends Controller
{

    public function ajoutHistoire(){
        return $this->getView()->shares('title', 'Ajout d\'une histoire');
    }

    public function postAjoutHistoire(){

        if(Input::has('titre') && Input::has('pitch')) {
            $story = new Histoire();
            $story->titre = Input::get('titre');
            $story->texte = Input::get('pitch');
            $story->idUtilisateur = Auth::id();
            $story->creation = date("Y-m-d H:i:s");
            $story->save();

            $i = 1;
            $ajout = false;
            while (Input::has('titrephoto'.$i) && Input::has('legende'.$i) && Input::hasFile('photo'.$i)) {
                if(Input::file('photo'.$i)->getSize() > 0 ) {
                    $image = new \App\Models\Image();

                    $image->titre = Input::get('titrephoto' . $i);
                    $image->texte = Input::get('legende' . $i);
                    $image->url = "histoire" . $story->id . "_" . $i . "." . Input::file('photo' . $i)->getClientOriginalExtension();

                    Input::file('photo' . $i)
                        ->move(APPDIR . "Modules/Story/Assets/uploads/histoire" . $story->id, $image->url);
                    $image->url = APPDIR . "Modules/Story/Assets/uploads/histoire" . $story->id . "/histoire" . $story->id . "_" . $i . "." . Input::file('photo' . $i)->getClientOriginalExtension();
                    $image->idHistoire = $story->id;
                    $image->save();
                    $i++;
                    $ajout = true;
                }
            }

            if($ajout){
                return Redirect::to('story/'.$story->id);
            }
            else{
                return Redirect::to('mystory');
            }
        }
        return Redirect::to('mystory')->with('messages', "Verifier vos parametres");
    }

    public function editeHistoire($id)
    {
        $hist = Histoire::find($id);
        if ($id == Auth::id()) {

        $tab = array();
        $tab['titre'] = $hist->titre;
        $tab['texte'] = $hist->texte;
        return $this->getView()->shares('title', 'Edition d\'une histoire');
        }
        else
            Return Error(403);
    }

    public function supprimeHistoire($id){
        $hist = Histoire::find($id);
        if($hist->idUtilisateur != Auth::id()){
            return Error(403);
        }
        return $this->getView()->shares('title', 'Suppression d\'une histoire')->with('hist', $hist);
    }

    public function postSupprimeHistoire($id){
        $img = Image::all();
        foreach ($img as $i){
            if($i->idHistoire == $id)
                $i->delete();
        }
        $hist = Histoire::find($id);
        $hist->delete();
        return Redirect::to('');
    }

    public function recherche(){
        $hist = Histoire::All();
        $list = new Collection();
        foreach ($hist as $h){
            if(strpos($h->titre, Input::get('search')) !== false){
                $list[] = $h;
            }
        }

        return View::make('Marie/Index', [], 'Story')
            ->shares('title', 'Recherche')
            ->with('stories',$list)
            ->with('nb', count($list));
    }

    public function myStory(){
        $stories = Histoire::all()->sortBy('id desc');
        $mystories = new Collection();
        foreach ($stories as $s){
            if($s->idUtilisateur == Auth::id())
                $mystories[] = $s;
        }

        return View::make('Sacre/AjoutHistoire', [], 'Story')
                ->shares('title', 'GoldenBook')
                ->with('stories',$mystories)
                ->with('nb', count($mystories));
    }

    public function random(){
        $hist = Histoire::all();
        $rand = 1;
        foreach ($hist as $h){
            if($h->id > $rand){
                $rand = $h->id;
            }
        }
        $user = null;
        while(!isset($user)){
            $user = Histoire::find(rand(1, $rand));
        }

        return Redirect::to('story/'.$user->id);
    }
}