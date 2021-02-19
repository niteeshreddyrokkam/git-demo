<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
class RegisteryController extends AppController{
//initialize a variable for table registery
private $table;
public function initialize(){
parent::initialize();
//$this->connection = ConnectionManager::get('default');
//here we can directly specify table name instead of "default"
$this->table=TableRegistry::get("users");
//creating a model that is nothing but table
$this->loadModel("Fruits");
}
public function updatemodel(){
//using model created in fruits table page
$this->autoRender=false;
$x=$this->Fruits->get(2);
$x->name="saketh";
$this->Fruits->save($x);
//using "Query builder"
$data=$this->Fruits->query();
$data->set(["name"=>"Raja"])->where(["id"=>2])->execute();
}
public function deletemodel(){
//using model created in fruits table page
$this->autoRender=false;
$x=$this->Fruits->get(2);
$this->Fruits->delete($x);
//using "Query builder"
/*$data=$this->Fruits->query();
$data->delete()->where(["id"=>2])->execute();*/
}

public function insertmodel(){
//using model created in fruits table page
$this->autoRender=false;
$x=$this->Fruits->newEntity();
$x->name="Niteesh";
$this->Fruits->save($x);
//using "Query builder"
$y=$this->Fruits->query();
$y->insert(["name"])->values(["name"=>"jaswanth"])->execute();
}
public function getdatamodel(){
$this->autoRender=false;
//we can perform operations similar to registery like filtering,ordering
$data=$this->Fruits->find()->toArray();
print_r($data);
foreach($data as $x){
echo "<br/>".$x['name']."<br/>";}
$data1=$this->Fruits->find("all")->order(["id"=>"desc"])->toArray();
print_r($data1);
foreach($data1 as $x){
echo "<br/>".$x['name']."<br/>";
}}
public function insertdata(){
//$this->autoRender=false;
$x=$this->table->newEntity();
$x->name="jaswanth";
$x->city="nandyal";
$this->table->save($x);
}
public function updatedata(){
$this->autoRender=false;
//get the row which you want to update data
//update the value of that row
//save that
$data=$this->table->get(2);
$data->name="jaswanth";
$this->table->save($data);
if($this->table->save($data))
echo "record updated";
else
echo "updation failed";
echo $data->name;
}
public function deletedata(){
$this->autoRender=false;
//get the row which you want to update data
//delete
$data=$this->table->get(2);
$this->table->delete($data);
if($this->table->delete($data))
echo "deleted successfully";
else
echo "deletion failed";
}

public function selectdata(){
$this->autoRender=false;
$data2=$this->table->find("all")->toArray();
//using where condition
$data=$this->table->find("all")->where(["id"=>2])->toArray();
//filtering column wise
$data1=$this->table->find("all")->select(["name"])->toArray();
print_r($data);
print_r($data1);
echo "<br/>".$data2[0]['name']."<br>";
//fetching name of using $data
foreach($data2 as $x){
echo "<br/>".$x['name']."<br>";}
}

}?>
