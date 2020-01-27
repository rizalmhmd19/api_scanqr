<!DOCTYPE html>
<html>
<head>
	<title><?= $title ;?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container">
		<h1>Hallo, <?=$user['username'];?></h1>
		<a href="<?=site_url('auth/logout');?>">Log Out</a>
		<h2>Login Log</h2>
		<div class="panel panel-default">
			<div class="panel-body">
				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th>IMEI</th>
							<th>Login Time</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($login as $l):?>
							<tr>
								<td><?=$l->imei;?></td>
								<td><?=$l->login_time;?></td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<h4>Menu About</h4>
				<span><?=$jml_ab;?></span>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>IMEI</th>
							<th>Time</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($about as $a):?>
							<tr>
								<td><?=$a->imei;?></td>
								<td><?=$a->time;?></td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
			<div class="col-md-6">
				<h4>Menu Profile</h4>
				<span><?=$jml_pr;?></span>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>IMEI</th>
							<th>Time</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($profile as $p):?>
							<tr>
								<td><?=$p->imei;?></td>
								<td><?=$p->time;?></td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</body>
</html>