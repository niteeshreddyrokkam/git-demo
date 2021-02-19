<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo isset($title)? $title: ""; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">
<h4> This is Niteesh</h4>
  <?=$this->fetch("content");?>
</div>

</body>
</html>

