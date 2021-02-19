<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="img/image.css">
</head>
<head>
  <title><?php echo isset($title)? $title: ""; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">
  <?=$this->fetch("content");?>
</div>
</body>
</html>

