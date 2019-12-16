<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 16/12/2019
 * Time: 10:50
 */

namespace App\Repositories;


use App\Elu;

class EluRepository extends RessourceRepository{
    public function __construct(Elu $elu){
        $this->model = $elu;
    }
}