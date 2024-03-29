<?php
namespace App\Repositories;

class RessourceRepository {
    protected $model;

    public function getPaginate($n)
    {
        return $this->model->paginate($n);
    }
    public  function getAll(){
        return $this->model->get();
    }

    public function store(Array $inputs)
    {
        return $this->model->create($inputs);
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update($id, Array $inputs)
    {
        $this->getById($id)->update($inputs);
    }

    public function destroy($id)
    {
        $this->getById($id)->delete();
    }


}