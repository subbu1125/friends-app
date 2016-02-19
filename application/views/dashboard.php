<html>
<head>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<title></title>
</head>
<body>
	Hello, <?= $users['name'] ?>.
	<a href="/mains/logout" class="col-sm-offset-8"> Log out </a>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Alias
			<th>Action
		</tr>
	</thead>
	<tbody>
		<?php 
		if(empty($friends))
		{
			echo "<td>You don't have friends yet.";
		}
		for($i=0; $i<count($friends); $i++)
		{
			?>
		<tr>
			<td><?= $friends[$i]['alias']; ?>
			<td><a href="profile/<?= $id[$i]['friend_id']?>">View Profile</a> <a href="delete/<?= $id[$i]['friend_id']?>">Remove as Friend</a>
		</tr>
		<?php } ?>
	</tbody>
</table>

<h4>Other users not on your friend's list:</h4>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
		<th>Alias
		<th>Action
		</tr>
	</thead>
	<tbody>
		<?php
		for($i=0; $i<count($nonfriends); $i++)
		{
			?>
		<tr>
			<td><a href="/mains/profile/<?= $nonfriends[$i]['id']?>"><?= $nonfriends[$i]['alias'];?></a>
			<td><a href="/mains/add_friend/<?= $nonfriends[$i]['id']?>">Add as Friend</a>
		</tr>
		<?php } ?>

	</tbody>
</table>
</body>
</html>
