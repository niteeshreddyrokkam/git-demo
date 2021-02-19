<?php
namespace App\Controller;
use App\Controller\AppController;
class TestController extends AppController{
public function initialize(){
parent::initialize();
$this->viewBuilder()->layout('indexlayout');
}
public function index(){
$this->set("name","Niteesh");
$this->set("city","Nandyal");
$user=array("name"=>"Pavan","city"=>"Bangalore");
$this->set('data',$user);
}
public function add(){
//$this->autoRender=false;
$a=1;
$b=2;
$c=$a+$b;
echo $c;}
}
?>
