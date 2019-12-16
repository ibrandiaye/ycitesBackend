<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 10/12/2019
 * Time: 12:58
 */

namespace App\Repositories;


use App\Collectivite;

class CollectiviteRepository extends RessourceRepository{
    public function __construct(Collectivite $collectivite){
        $this->model = $collectivite;
    }
}