<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
class InsertController extends AppController{
private $connection;
public function initialize(){
parent::initialize();
$this->connection = ConnectionManager::get('default');
$this->viewBuilder()->layout('userlayout');
}
public function insertdata(){

$this->connection->insert("users",["name"=>"bharath","city"=>"vizag"]);

}
}
?>
