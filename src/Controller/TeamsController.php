<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
class TeamsController extends AppController{
   private $connection;
   public function initialize()
   {
      parent::initialize();
      $this->connection = ConnectionManager::get('default');
      $this->viewBuilder()->layout("indexlayout");
      $this->loadModel("Teams");
      $this->loadModel("Players");
   }

   public function home()
   {
      $validator=new Validator;
      if($this->request->is('post')|| $this->request->is('put'))
      { 
         $data=$this->request->data;
         $validator
         ->requirePresence("tn","create","Team name is required")
         ->requirePresence("p1","create","Player1 name is required")
         ->requirePresence("p2","create","Player2 name is required")
         ->requirePresence("p3","create","Player3 name is required")
         ->requirePresence("p4","create","Player4 name is required");
         $y=$validator->errors($data);
         if(!empty($y))
         {
            echo "<h3>"."error"."</h3>"."<br/>";
            print_r($y);
         }
         else
         {
            $id1=1;
            $score=20;
            $this->connection->insert("teams",["teamname"=>$data["tn"],"g_id"=>$id1,"score"=>$score]);
            $data1=$this->connection->execute("select * from teams where teamname='".$data["tn"]."'")->fetchAll("assoc");
            $id1=$data1[0]["id"];
            $this->connection->insert("players",["playername"=>$data["p1"],"t_id"=>$id1]);
            $this->connection->insert("players",["playername"=>$data["p2"],"t_id"=>$id1]);
            $this->connection->insert("players",["playername"=>$data["p3"],"t_id"=>$id1]);
            $this->connection->insert("players",["playername"=>$data["p4"],"t_id"=>$id1]);
         }
      }
   }



   public function update()
	{

	}
   public function update1()
   {
      $validator=new Validator;
      if($this->request->is('post')|| $this->request->is('put'))
      { 
         $data=$this->request->data;
         $validator
         ->requirePresence("ID","create","IDis required")
         ->numeric("ID","ID should be numeric value","create");
         $y=$validator->errors($data);
         if(!empty($y))
         {
            $this->autoRender=false;
            echo "<h3>error</h3>"."<br/>";
            print_r($y);
          }
         else
         {
           $data1=$this->Teams->get($data["ID"])->toArray();
           $this->request->session()->write('id',$data["ID"]);
           $this->request->session()->write('teamname',$data1["teamname"]);
           $this->request->session()->write('score',$data1["score"]);
         }
      }
   }


   public function update2()
   {
      //$this->autoRender=false;
      $validator=new Validator;
      if($this->request->is('post')|| $this->request->is('put'))
      { 
         $data=$this->request->data;
         $validator
         ->requirePresence("tn","create","teamname is required")
         ->requirePresence("score","create","score is required")
         ->numeric("score","score should be numeric value","create");;
         $y=$validator->errors($data);
         if(!empty($y))
         {
            echo "<h3>error</h3>"."<br/>";
            print_r($y);
         }
         else
         {
            $this->connection->update("teams",["teamname"=>$data["tn"],"score"=>$data["score"]],["id"=>$this->request->session()->read('id')]);
            //echo "<h1>"."Successfully Updated"."</h1>";
         }
      }
   }



   public function delete(){
      $validator=new Validator;
      if($this->request->is('post')|| $this->request->is('put'))
      { 
         $data=$this->request->data;
         $x=$data["ID"];
         $validator
         ->requirePresence("ID","create","IDis required")
         ->numeric("ID","ID should be numeric value","create");
         $y=$validator->errors($data);
         if(!empty($y))
         {	
	    echo "<h3>error</h3>"."<br/>";
            print_r($y);
         }
         else
         {
            if($this->connection->delete("teams",["id"=>$data["ID"]]))
               echo "Record deleted successfully deleted";
            else
               echo "not deleted";
         }
      }
   }


   public function view()
   {	
      $validator=new Validator;
      if($this->request->is('post')|| $this->request->is('put'))
      { 
         $data=$this->request->data;
         $validator
         ->requirePresence("ID","create","ID is required")
         ->numeric("ID","ID should be numeric value","create");
         $y=$validator->errors($data);
         if(!empty($y))
         {	
            echo "<h3>error</h3>"."<br/>";
            print_r($y);
         }
         else
         {
            $data1=$this->Teams->get($data["ID"])->toArray();
            $data2=$this->Players->find("all")->where(["t_id"=>$data["ID"]])->toArray();
            echo "Team Name is ".$data1["teamname"]."<br/>";
            echo "Player Names are "."<br/>";
            $i=1;
            foreach($data2 as $x)
            {
               echo $i.") ".$x["playername"]."<br/>";
               $i=$i+1;
            }
         }
      }
   }
}
?>
