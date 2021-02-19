<html>
<style>
#div1{
            width: 450px;
            height:210px;
            background-color:#666666;
            position: relative;
            top:130px;
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
#ID{
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
  top:383px;
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
     <h1>UPDATE PLAYER </h1>
</div><?php ?>
<?=$this->Form->create('Player', array('action' => 'updateplayer1'))?> 
<br/><?=$this->Form->input('',["id"=>"ID","name"=>"ID","placeholder"=>"Enter id"])?>
<br/><?=$this->Form->submit('Submit',["id"=>"sbm","name"=>"sbm"])?>
<?=$this->Form->end()?>
</div>
<ul>
  <li><a href="/Player/home">Home</a></li>
  <li><a href="/Player/viewplayer">View</a></li>
  <li><a href="/Player/deleteplayer">Delete</a></li>
   <li><a class="active" href='/Player/updateplayer'>Update</a></li>
</ul>
</body>
</html>


