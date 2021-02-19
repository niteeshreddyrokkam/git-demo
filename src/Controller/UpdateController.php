<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
class UpdateController extends AppController{
private $connection;
public function initialize(){
parent::initialize();
$this->connection = ConnectionManager::get('default');
//$this->viewBuilder()->layout('userlayout');
}
public function updatedata(){

$this->connection->update("users",["name"=>"Raghu"],["city"=>"vizag"]);

}
//delete method
public function deletedata(){

$this->connection->delete("users",["name"=>"Raghu"]);

}

}?>
