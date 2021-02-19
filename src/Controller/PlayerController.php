<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
class PlayerController extends AppController
{
   private $connection;
   public function initialize()
   {
      parent::initialize();
      $this->connection = ConnectionManager::get('default');
      $this->viewBuilder()->layout("indexlayout");
      $this->loadModel("Teams");
      $this->loadModel("Players");
      $this->loadModel("Scores");
   }


   public function deleteplayer()
   {
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
            if($this->connection->delete("players",["id"=>$data["ID"]]))
               echo "Record deleted successfully deleted";
            else
               echo "not deleted";
         }
      }
   }


   public function home()
   {
   }

   public function updateplayer()
   {
   }
   public function updateplayer1(){
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
            $this->autoRender=false;
            echo "<h3>error</h3>"."<br/>";
            print_r($y);
         }
         else   
         {
            $data1=$this->Players->get($data["ID"])->toArray();
            $this->request->session()->write('id',$data["ID"]);
            $this->request->session()->write('playername',$data1["playername"]);
            $data2=$this->Scores->find("all")->where(["p_id"=>$data["ID"]])->toArray();
            $this->request->session()->write('p_score',$data2[0]["score"]);
         }
       }
   }



   public function updateplayer2(){
      $validator=new Validator;
         if($this->request->is('post')|| $this->request->is('put'))
         { 
         $data=$this->request->data;
         $validator
         ->requirePresence("pn","create","teamname is required")
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
            $this->connection->update("players",["playername"=>$data["pn"]],["id"=>$this->request->session()->read('id')]);
            $this->connection->update("scores",["score"=>$data["score"]],["p_id"=>$this->request->session()->read('id')]);
         } 
      }
   }



   public function viewplayer()
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
            echo "<h3>error</h3>"."<br/>";
            print_r($y);
         }
         else
         {
            $data1=$this->Players->get($data["ID"])->toArray();
            echo "<br>"."Player Name is ".$data1["playername"]."<br/>";
            echo "Player belongs to team ".$data1["t_id"]."<br/>";
            $data2=$this->Scores->find("all")->where(["p_id"=>$data["ID"]])->toArray();
            echo "Player score is ".$data2[0]["score"]."<br/>";
         }
      }
   }
}
?>
