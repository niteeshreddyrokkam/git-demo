<html>
<style>
table,th,td{
border:1px solid black;
}
</style>
<body>
<?php for($j=0;$j<sizeof($groups);$j++){
if($j==0)
echo "<h1>"."Group A"."</h1>";
else
echo "<h1>"."Group B"."</h1>";
?>
<table>
<tr>
<th>
Team Name
</th>
<th>
Score
</th>
</tr>
<?php for($i=0;$i<sizeof($groups[0]);$i++){?>
<tr>
<td><?php echo $groups[$j][$i]["teamname"];?></td>
<td><?php echo $groups[$j][$i]["score"];}?></td>
</tr>
</table>
<br>
<?php }?>
<h1>Semi Finals</h1>
<table>
<tr>
<th>
GROUP A
</th>
<th>
GROUP B
</th>
</tr>
<tr>
<td><?php echo $winners[0][0]["teamname"]." with score of ".$winners[0][0]["score"];?></td>
<td><?php echo $winners[1][0]["teamname"]." with score of ".$winners[1][0]["score"];?></td>
</tr>
</table>
</body>
</html>

