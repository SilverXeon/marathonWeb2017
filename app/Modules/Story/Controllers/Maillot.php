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
use App\Models\User;
use App\Models\Aime;
use Nova\Support\Facades\Auth;
use Redirect;

class Maillot extends Controller
{
    public function random()
    {
        $hist = Histoire::all();
        $tab = $hist->toArray();
        $rand = count($tab);
        return $this->getView()
            ->shares('title', 'Affichage d\'une histoire random')
            ->with('random', Histoire::find(rand(1, $rand)))
            ->with('story', Histoire::find($rand))
            ->with('likes', $this->getLike($rand));
    }

    public function histoire($id)
    {
        if (count(Histoire::find($id))>0) {
            return $this->getView()
                ->shares('title', 'Affichage d\'une histoire')
                ->with('id', $id)
                ->with('story', Histoire::find($id))
                ->with('likes', $this->getLike($id));
        }
        else
            return Redirect::to('');
    }

    public function addLike($id){
        $idHistoire=-1;
        $likes = Aime::all();
        $trouve = false;
        foreach ($likes as $l){
            if($l->idUtilisateur == Auth::id()){
                if($l->idHistoire == $id){
                    $trouve = true;
                    $idHistoire=$l->id;
                }
            }
        }
        if(!$trouve) {
            $like = new Aime();
            $like->idUtilisateur = Auth::id();
            $like->idHistoire = $id;
            $like->save();
        }
        else{
            $like = Aime::find($idHistoire);
            $like->delete();
        }
        return Redirect::to('story/'.$id);
    }


    public function getLike($id)
    {
        $likes = Aime::whereRaw('idHistoire = ?',array($id))->get();
        return count($likes);
    }
}

