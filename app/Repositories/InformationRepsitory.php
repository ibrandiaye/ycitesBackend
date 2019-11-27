<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 07/11/2019
 * Time: 09:40
 */

namespace App\Repositories;


use App\Informations;

class InformationRepsitory extends RessourceRepository{

    public function __construct(Informations $informations){
        $this->model = $informations;
    }

}