<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>The Whiskers DB</title>

<!-- BOOTSTRAP -->
<link type="text/css" href="../../css/bootstrap.min.css" rel="stylesheet">
<!-- SCRIPTS -->
<script src="../../js/jquery.js"></script>
<script src="./checktable.js"></script>

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
  font-size: 18px; 
  }
</style>
</head>

<body>
<div class="main-wrapper">
<!-- DATABASE TABLE -->
<table class="table">
	<thead>
		<tr style="background-color: #6E564D; color: white;">
		<th colspan="2" width="30%" style="border: none;">
		<img src="https://www.thewhiskers.club/images/logo-2x.png" alt="Whisker" />
		</th>
		<th colspan="3" style="text-align: center;";  width="auto" style="border: none;">
		<h3>Database</h3>
		</th>
		<th width="auto" style="border: none;">
        <form action="download.php" method="POST">
		<input style="float: right; margin-right: 20px;" type="submit" name="download" value="Export to XML" class="btn btn-primary">
		</form>
	    </th>
	</tr>
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
        require_once('../config/config.php'); // gets the configuration to connect to the db
        require_once('./function.php'); // 
		$rows = queryAll($table); // returns all the rows of the db
        while ($row = mysqli_fetch_object($rows))
        { // draw each row returned
        ?>
            <tr>
              <th scope="row" style="background-color:#fff;">
                  <label class="control control--checkbox">
                      <input type="checkbox" />
                  </label>
                  <div class="control__indicator"></div>
              </th>
			<td><?php echo $row->ID; ?></td>
			<td><?php echo $row->name; ?></td>
			<td><?php echo $row->email; ?></td>
			<td><?php echo $row->michis; ?></td>
			<td><?php echo $row->date; ?></td>
		</tr>
	<?php
        }
		?>
        </tbody>
</table>
</div>
</body>
</html>