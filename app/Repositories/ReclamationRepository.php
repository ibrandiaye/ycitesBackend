<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 07/11/2019
 * Time: 09:43
 */

namespace App\Repositories;


use App\Reclamation;

class ReclamationRepository extends RessourceRepository{
    public function __construct(Reclamation $reclamation){
        $this->model = $reclamation;
    }
    public function listeReclamationForOneCitoyen($id){
        return Reclamation::with(['categorie'])
            ->where('citoyen_id',$id)
            ->orderBy('id','desc')
            ->get();
    }
    public function oneReclamationForOneCitoyen($id){
        return Reclamation::with(['categorie'])
            ->where('id',$id)
            ->first();
    }
    public function listeReclamation(){
        return Reclamation::with(['categorie','citoyen'])
            ->orderBy('id','desc')
            ->get();
    }



}