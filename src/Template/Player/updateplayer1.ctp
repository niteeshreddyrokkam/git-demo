<html>
<style>
#div1{
            width: 450px;
            height:260px;
            background-color:#666666;
            position: relative;
            top:80px;
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
            left:60px;
            width:200px
            word-spacing: 5px;
        }
#pn,#score{
            width:350px;
            height:10px;
            font-size: 30px;
            position: relative;
            top:0px;
            left:25px;
            border-radius: 35px;
            padding:20px;
        }
 #update{
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
 #update:hover{
            text-shadow: 2px 2px 4px black;}
ul {
  list-style-type: none;
  position:relative;
  top:333px;
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
     <h1>EDIT PLAYER </h1>
</div>
<?php ?>
<?=$this->Form->create('Player', array('action' => 'updateplayer2'))?> 
<br/><?=$this->Form->input('',["id"=>"pn","name"=>"pn","placeholder"=>"Player Name","value"=>$this->request->session()->read('playername')])?>
<br/><?=$this->Form->input('',["id"=>"score","name"=>"score","placeholder"=>"Score","value"=>$this->request->session()->read('p_score')])?>
<br/><?=$this->Form->submit('Update',["id"=>"update","name"=>"update"])?>
<?=$this->Form->end()?>
</div>
<ul>
  <li><a href="/Player/home">Home</a></li>
  <li><a href="/Player/viewplayer">View</a></li>
  <li><a href='/Player/deleteplayer'>Delete</a></li>
   <li><a class="active" href='/Player/updateplayer'>Update</a></li>
</ul>
</body>
</html>



