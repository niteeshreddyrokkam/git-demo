<html>
<style>
#div1{
            width: 450px;
            height:500px;
            background-color:#666666;
            position: relative;
            top:30px;
            left:400px;
        }
        #div2{
            width: 450px;
            height:45px;
            background-color: #F2F3F4;
            font-size: 20px;
        }
        #div2 h1{
            position: relative;
            left:40px;
            width:200px
            word-spacing: 5px;
        }
#p1,#p2,#p3,#p4,#tn{
            width:350px;
            height:10px;
            font-size: 30px;
            position: relative;
            top:0px;
            left:25px;
            border-radius: 35px;
            padding:20px;
        }
 #sbm{
            width:120px;
            height:40px;
            position: relative;
            top:0px;
            left:165px;
            background-color: #2ECC71;
            border: none;
            border-radius: 35px;
            font-size: 25px;
            color: white;
        }
 #sbm:hover{
            text-shadow: 2px 2px 4px black;}
ul {
  list-style-type: none;
  position:relative;
  top:93px;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}
li {
  float: left;
}
li a {
  display: block;
  color: white;
  text-align: center;
   padding: 14px 140.12px;
  text-decoration: none;
}
a{
font-size:12px;
}
li a:hover:not(.active) {
  background-color: #111;
}
.active {
  background-color: #669999;
}
</style>
<body>
<div id="div1">
    <div id="div2">
     <h1>REGISTRATION</h1>
   </div>
<?php ?>
<?=$this->Form->create('Teams', array('action' => 'home'))?> 
            <br/><?=$this->Form->input('',["id"=>"tn","name"=>"tn","placeholder"=>"Team Name"])?>
            <br/><?=$this->Form->input('',["id"=>"p1","name"=>"p1","placeholder"=>"Player1"])?>
            <br/><?=$this->Form->input('',["id"=>"p2","name"=>"p2","placeholder"=>"Player2"])?>
            <br/><?=$this->Form->input('',["id"=>"p3","name"=>"p3","placeholder"=>"Player3"]) ?>
            <br/><?=$this->Form->input('',["id"=>"p4","name"=>"p4","placeholder"=>"Player4"]) ?>
            <br/><?=$this->Form->submit('Submit',["id"=>"sbm","name"=>"sbm"])?>
<?=$this->Form->end()?>
</div>
<ul>
  <li><a class="active" href="/Teams/home">Home</a></li>
  <li><a href='/Teams/view'>View</a></li>
  <li><a href='/Teams/delete'>Delete</a></li>
   <li><a href='/Teams/update'>Update</a></li>
</ul>
</body>
</html>



