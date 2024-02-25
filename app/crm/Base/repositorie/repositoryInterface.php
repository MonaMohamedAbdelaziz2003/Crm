<?php
namespace App\crm\Base\repositorie;
interface RepositoryInterface {
    public function all();
    public function view($id);
    public function create(Array $data);
    public function update(Array $data);
    public function delete($id);
}
