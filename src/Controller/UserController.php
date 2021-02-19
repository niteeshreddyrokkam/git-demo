<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
class UserController extends AppController{
public function initialize(){
parent::initialize();
$connection = ConnectionManager::get('default');
$this->viewBuilder()->layout('userlayout');
}
public function index(){
$this->set("name","Niteesh");
$this->set("city","Nandyal");
$user=array("name"=>"Pavan","city"=>"Bangalore");
$this->set('data',$user);
}
}
?>
