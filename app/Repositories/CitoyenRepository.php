<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 07/11/2019
 * Time: 09:46
 */

namespace App\Repositories;


use App\Citoyen;

class CitoyenRepository extends RessourceRepository{
    public function __construct(Citoyen $citoyen){
        $this->model = $citoyen;
    }
}