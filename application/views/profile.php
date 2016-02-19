<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<title></title>
</head>
<body>
<a href="/mains/dashboard" class="col-sm-offset-9"> Home</a><a href="/mains/logout" class="col-sm-offset-1"> Log out </a>
<h4><?= $info['alias']?>'s Profile</h4>
<h4><?= $info['name']?></h4>
<h4>Email Address: <?= $info['email']?></h4>
</body>
</html>