<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
class SelectController extends AppController{
private $connection;
public function initialize(){
parent::initialize();
$this->connection = ConnectionManager::get('default');
}
public function selectdata(){
//To display data without using view file
$this->autoRender=false;
$data=$this->connection->execute("select * from users")->fetchAll();
$data1=$this->connection->execute("select * from users")->fetchAll("assoc");
print_r($data);
print_r($data1);
foreach($data1 as $a){
echo "<br/>".$a['name']." ".$a['city']."<br/>";
}}
public function selectfilterdata(){
//To display data without using view file
$this->autoRender=false;
$data=$this->connection->execute("select * from users where city=\"bangalore\"")->fetchAll("assoc");
print_r($data);
echo "<br/>".$data[0]['name'];
}
}?>
