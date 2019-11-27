<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 07/11/2019
 * Time: 09:42
 */

namespace App\Repositories;


use App\Categorie;

class CategorieRepository extends RessourceRepository{

    public function __construct(Categorie $categorie){
        return $this->model =$categorie;
    }
}