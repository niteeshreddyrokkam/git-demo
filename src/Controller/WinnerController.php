<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
class SemifinalsController extends AppController
{
   private $connection;
   public function initialize()
   {
      parent::initialize();
      $this->connection = ConnectionManager::get('default');
      $this->viewBuilder()->layout("indexlayout");
      $this->loadModel("Teams");
      $this->loadModel("Groups");
   }


   public function semis()
   {
      $i=0;
      $a=array();
      $group=array();
      $data=$this->Groups->find("all")->toArray();
      foreach($data as $x)
      {     
         $data1=$this->Teams->find("all")->where(["g_id"=>$x["id"]])->order(["score"=>"desc"])->limit(1)->toArray();
         $data2=$this->Teams->find("all")->where(["g_id"=>$x["id"]])->order(["score"=>"desc"])->toArray();
         $a[$i]=$data1;
         $group[$i]=$data2;
         $i=$i+1;
       }
      $this->set("winners",$a);
      $this->set("groups",$group);
   }
}
?>
