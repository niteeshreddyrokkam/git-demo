<html>
<style>
table,th,td{
border:1px solid black;
}
</style>
<body>
<h1>Players Score</h1>
<table>
<tr>
<th>
P ID
</th>
<th>
NAME
</th>
<th>
SCORE
</th>
<th>
TEAM ID
</th>
</tr>
<?php for($i=0;$i<sizeof($players);$i++){?>
<tr>
<td><?php echo $players[$i][0]["id"];?></td>
<td><?php echo $players[$i][0]["playername"];?></td>
<td><?php echo $score[$i]["score"]?></td>
<td><?php echo $players[$i][0]["t_id"];}?></td>
</tr>
</table>
</body>
</html>

