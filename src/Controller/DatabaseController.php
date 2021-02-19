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
print_r($data);
}

}?>
