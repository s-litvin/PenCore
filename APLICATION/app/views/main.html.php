<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="<?php echo FT::prepUrl('public/css/normalize.css');?>">
	<link rel="stylesheet" href="<?php echo FT::prepUrl('public/css/foundation.min.css');?>">
	<link rel="stylesheet" href="<?php echo FT::prepUrl('public/css/foundation-icons.css');?>">
	<link rel="stylesheet" href="<?php echo FT::prepUrl('public/css/app.css');?>">
	<script src="<?php echo FT::prepUrl('public/js/vendor/modernizr.js');?>"></script>
</head>
<body>

<?php echo HtmlTopBar::show();?>

<div class="row">
	{@view@}
</div>

<?php echo HtmlModal::placeModal();?>

<script src="<?php echo FT::prepUrl('public/js/vendor/jquery.js');?>"></script>
<script src="<?php echo FT::prepUrl('public/js/foundation.min.js');?>"></script>
<script src="<?php echo FT::prepUrl('public/js/app.js');?>"></script>
<script>
	$(document). foundation();
</script>
</body>
</html>