<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Validation\Validator;
class TestdataController extends AppController{
public function testdatavalidate(){
$this->autoRender=false;
$validator=new Validator;
$x=array("name"=>"",
"age"=>"abcd","email"=>"");
//concatination of conditions without using semi colon at end of ecah line
$validator
->requirePresence("name","create","Name is required")
//to check or validate whether length of name is >5 or not.
->add("name",["length"=>["rule"=>["minLength",6],"message"=>"Name should be of length>5"]])
//allows even if empty also
->allowEmpty("email")
->add("email",["email"=>["rule"=>["email"],"message"=>"Email is not valid"]])
//allows when it is not empty also
->notEmpty("email","email is required","create")
->numeric("age","age should be numeric value","create");

$y=$validator->errors($x);
//if name is filled it echoes "sucessfully inserted data" else it shows what is the error.
if(!empty($y)){
//errors
print_r($y);
}
else{
//sucess
echo "sucessfully inserted data";
}
}}
?>
