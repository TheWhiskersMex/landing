<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>The Whiskers DB</title>
<link type="text/css" href="./bootstrap.min.css" rel="stylesheet">
<style>
body
{
	width: 100%;
	height: 100%;
	background:#444038;
}
table {
    border-collapse: collapse;
    width: 100%;
}
th, td {
    text-align: left;
    padding: 4px;
}

td {	
	background-color:#fff;
	color: #444038;
}
.main-wrapper{
	width:100%;
	min-width: 600px;
	padding:25px;
}
hr {
    margin-top: 5px;
    margin-bottom: 5px;
    border: 0;
    border-top: 1px solid #eee;
}
label {
  display: inline-block;
  margin-bottom: 0.5rem;
}
.control {
  display: block;
  position: relative;
  margin-bottom: 5px;
  cursor: pointer;
  font-size: 18px; }



</style>
</head>

<body>
<div class="main-wrapper">
<table style="max-width:50px">
	<tr style="background-color: #6E564D; color: white;">
		<th width="10%" height="20">
		<img src="https://www.thewhiskers.club/images/logo-2x.png" alt="Whisker" />
		</th>
		<th style="text-align: center;";  width="15%" height="20">
		<h3>Database</h3>
		</th>
		<th width="15%" height="20">
        <form action="download.php" method="POST">
		<input style="float: right; margin-right: 20px;" type="submit" name="download" value="Export to XML" class="btn btn-primary">
		</form>
                </th>
	</tr>
</table>
<table class="table table-bordered">
	<thead>
		<tr style="background-color:#D9D9D9">
			<th width="1%">
            <label class="control control--checkbox">
            <input type="checkbox" class="js-check-all" />
            </label>
			<div class="control__indicator"></div>
			</th>
			<th width="5%"><strong>ID</strong></th>
			<th width="15%"><strong>Nombre</strong></th>
			<th width="15%"><strong>E-Mail</strong></th>
			<th width="15%"><strong>Michis</strong></th>
			<th width="15%"><strong>Fecha</strong></th>
		</tr>
	</thead>
	<tbody>
        <?php
		include("function.php");
		while($row = queryAll($table))
		{
        ?>
            <tr>
              <th scope="row" style="background-color:#fff;">
                  <label class="control control--checkbox">
                      <input type="checkbox" />
                  </label>
                  <div class="control__indicator"></div>
                
              </th>
			<td><?php echo $row->ID;?></td>
			<td><?php echo $row->name;?></td>
			<td><?php echo $row->email;?></td>
			<td><?php echo $row->michis;?></td>
			<td><?php echo $row->date;?></td>
		</tr>
	<?php } ?>
        </tbody>
        
</table>
</div>
<script src="./jquery.js"></script>
<script src="./checktable.js"></script>
</body>
</html>