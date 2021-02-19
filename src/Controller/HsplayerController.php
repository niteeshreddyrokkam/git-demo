<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
class HsplayerController extends AppController
{
   private $connection;
   public function initialize()
   {
      parent::initialize();
      $this->connection = ConnectionManager::get('default');
      $this->viewBuilder()->layout("indexlayout");
      $this->loadModel("Players");
      $this->loadModel("Scores");
   }

   public function player()
   {
      $player_data=array();
      $i=0;
      $data=$this->Scores->find("all")->order(["score"=>"desc"])->toArray();
      foreach($data as $x)
      { 
         $data2=$this->Players->find("all")->where(["id"=>$x["p_id"]])->toArray();
         $player_data[$i]=$data2;
         $i=$i+1;
      }
      $this->set("players",$player_data);
      $this->set("score",$data);
   }
}
?>
