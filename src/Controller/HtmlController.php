<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
class HtmlController extends AppController{
private $connection;
public function initialize(){
parent::initialize();
$this->connection = ConnectionManager::get('default');
$this->viewBuilder()->layout("indexlayout");
$this->loadModel("Teams");
}

public function index(){
}
public function home()
{
$validator=new Validator;
//$this->autoRender=false;
if($this->request->is('post')|| $this->request->is('put'))
        { 
$data=$this->request->data;
/*echo "<br/>".$data["tn"];
echo "<br/>".$data["p1"];
echo "<br/>".$data["p2"];
echo "<br/>".$data["p3"];
echo "<br/>".$data["p4"]."<br/>";
print_r($data);*/
$validator
->requirePresence("tn","create","Team name is required")
->requirePresence("p1","create","Player1 name is required")
->requirePresence("p2","create","Player2 name is required")
->requirePresence("p3","create","Player3 name is required")
->requirePresence("p4","create","Player4 name is required");
$y=$validator->errors($data);
if(!empty($y)){
echo "<h3>"."error"."</h3>"."<br/>";
print_r($y);
}
else{
//Using Model Insertion
/*$x=$this->Teams->newEntity();
$x->teamname=$data["tn"];
$x->player1=$data["p1"];
$x->player2=$data["p2"];
$x->player3=$data["p3"];
$x->player4=$data["p4"];
$this->Teams->save($x);*/
$id1=1;
$score=45;
$this->connection->insert("teams",["teamname"=>$data["tn"],"g_id"=>$id1,"score"=>$score]);
$data1=$this->connection->execute("select * from teams where teamname='".$data["tn"]."'")->fetchAll("assoc");
$id1=$data1[0]["id"];
$this->connection->insert("players",["playername"=>$data["p1"],"t_id"=>$id1]);
$this->connection->insert("players",["playername"=>$data["p2"],"t_id"=>$id1]);
$this->connection->insert("players",["playername"=>$data["p3"],"t_id"=>$id1]);
$this->connection->insert("players",["playername"=>$data["p4"],"t_id"=>$id1]);
//echo "<h1>"."you are registered successfully"."<h1>";
}}}



public function update()
	{

	}
public function update1(){
//$this->autoRender=false;
$validator=new Validator;
if($this->request->is('post')|| $this->request->is('put'))
{ 
$data=$this->request->data;
$validator
->requirePresence("ID","create","IDis required")
->numeric("ID","ID should be numeric value","create");
$y=$validator->errors($data);
if(!empty($y)){
$this->autoRender=false;
echo "<h3>error</h3>"."<br/>";
print_r($y);
}
else{
$data1=$this->connection->execute("select * from teams where id='".$data["ID"]."'")->fetchAll("assoc");
//print_r($data1);
$this->request->session()->write('id',$data["ID"]);
$this->request->session()->write('teamname',$data1[0]["teamname"]);
$this->request->session()->write('score',$data1[0]["score"]);}}}


public function update2(){
$this->autoRender=false;
$validator=new Validator;
if($this->request->is('post')|| $this->request->is('put'))
{ 
$data=$this->request->data;
$validator
->requirePresence("tn","create","teamname is required")
->requirePresence("score","create","score is required")
->numeric("score","score should be numeric value","create");;
$y=$validator->errors($data);
if(!empty($y)){
echo "<h3>error</h3>"."<br/>";
print_r($y);
}
else{
$this->connection->update("teams",["teamname"=>$data["tn"],"score"=>$data["score"]],["id"=>$this->request->session()->read('id')]);
/*$this->connection->execute("update teams set teamname='".$this->request->session()->read('teamname')."' score='".$this->request->session()->read('score')."' where id='".$this->request->session()->read('id')."'")->fetchAll("assoc");*/
echo "<h1>"."Successfully Updated"."</h1>";}}}



public function delete(){
$validator=new Validator;
//$this->autoRender=false;
if($this->request->is('post')|| $this->request->is('put')){ 
$data=$this->request->data;
$x=$data["ID"];
$validator
->requirePresence("ID","create","IDis required")
->numeric("ID","ID should be numeric value","create");
$y=$validator->errors($data);
    if(!empty($y)){	
	  echo "<h3>error</h3>"."<br/>";
          print_r($y);}
else{
if($this->connection->delete("teams",["id"=>$data["ID"]]))
echo "Record deleted successfully deleted";
else
echo "not deleted";}}}




public function view(){	
$validator=new Validator;
if($this->request->is('post')|| $this->request->is('put')){ 
    $data=$this->request->data;
    $validator
    ->requirePresence("ID","create","ID is required")
    ->numeric("ID","ID should be numeric value","create");
    $y=$validator->errors($data);
    if(!empty($y)){	
	  echo "<h3>error</h3>"."<br/>";
          print_r($y);
          //$this->autoRender=false;
}
    else{
         $data1=$this->connection->execute("select * from teams where id='".$data["ID"]."'")->fetchAll("assoc");
         $data2=$this->connection->execute("select  * from players where t_id='".$data["ID"]."'")->fetchAll("assoc");
         //print_r($data2);
         echo "Team Name is ".$data1[0]["teamname"]."<br/>";
         echo "Player Names are "."<br/>";
         $i=1;
foreach($data2 as $x){
         echo $i.") ".$x["playername"]."<br/>";
        $i=$i+1;}}}}}
?>
