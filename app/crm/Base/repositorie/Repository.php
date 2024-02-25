<?php
namespace App\crm\Base\repositorie;
use App\crm\Base\repositorie\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface{
    protected Model $model;

    public function setModel(Model $model){
        $this->model=$model;
    }

    public function getModel(){
        return $this->model;
    }

    public function all(){
        return $this->model->all();
    }

    public function view($id){
        return $this->model->find($id);
    }

    public function create(Array $data){
        foreach($data as $fields=>$val){
            $this->model->{$fields}=$val;
        }
        $this->model->save();
        return $this->model;
    }

    public function update(Array $data){
        $model=$this->model->find($data['id']??0);
        if(!$model){
            return null;
        }else{
            foreach($data as $fields=>$val){
                $this->model->{$fields}=$val;
            }
            $this->model->save();
            return $this->model;
        }
    }

    public function delete($id){
        $this->model=$this->model->find($data['id']??0);
        return $this->model->delete();
    }
}
