<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>The Whiskers DB</title>
<meta name="viewport" content="width=device-width, initial-scale=0.5">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./sorttable.js"></script>
<script src="./checktable.js"></script>
<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;600&display=swap" rel="stylesheet">
<style>
@media screen and (max-width: 640px)
{
	html, body
	{
		font-size: 12px;
	}
    h1, h2, h3, h4
    {
        font-size: 18px;
    }
    p, b, a
    {
        font-size: 12px;
    }
    .btn, label, button, span, input
    {
        font-size: 12px;
    }
}
html, body
{
	width: 100%;
    height: 100%;
    overflow: auto;
    margin: 0 0 0 0;
    padding: 0 0 0 0;
	background-color: rgba(30, 30, 30, 1.00);
    font-family:"Source Sans Pro";
}
.main-wrapper
{
    width: 99%;
    margin: 0 auto auto auto;
	padding: 10px;
}
table
{
	min-width: 480px;
	width: 100%;
}
</style>
</head>

<body>
<div class="main-wrapper">
<table class="table table-dark" style="margin-top: 0px; margin-bottom: 0px;">
<thead style="color: #CCCCCC;">
<tr>
<th width="10%">
<img style="min-width: 100px; width: 150%;" src="https://www.thewhiskers.club/images/logo-2x.png" alt="Whisker" />
</th>
<th width="80%" style="text-align: center;">
<h2>Data Base</h2>
</th>
<th width="10%">
<form action="download.php" method="post">
<input style="float: right;" type="submit" id="download" name="download" class="btn btn-success" value="Export to XML" />
</form>
</th>
</tr>
</thead>
<tbody>
<tr>
	<table class="table table-dark table-hover sortable" style="margin-top: 0px; margin-bottom: 0px;">
	<thead style="color: #ADB697;">
	<tr>
	<th><strong>ID</strong></th>
	<th><strong>Nombre</strong></th>
	<th><strong>E-Mail</strong></th>
	<th><strong>Michis</strong></th>
	<th><strong>Fecha</strong></th>
	</tr>
	</thead>
	<tbody style="color: #CCCCCC;">
	<?php
	include("function.php");
	$sql = "SELECT * FROM kittysdb ORDER BY name";
	$resultado = db_query($sql);
	while($row = mysqli_fetch_object($resultado))
	{
	?>
	<tr class="item">
	<td><?php echo $row->ID;?></td>
	<td><?php echo $row->name;?></td>
	<td><?php echo $row->email;?></td>
	<td><?php echo $row->michis;?></td>
	<td><?php echo $row->date;?></td>
	</tr>
	<?php
    }
	?>
	</tbody>
	</table>
</tr>
</tbody>
</table>
</div>
</body>
</html>