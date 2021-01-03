<?php
include "connection.php";
$id=$_GET["id"];

$lastname="";
$firstname="";
$accesslevel="";
$address="";
$password="";

$res=mysqli_query($link, "select * from table1 where id=$id");
while($row=mysqli_fetch_array($res))
{
	$firstname=$row["firstname"];
	$lastname=$row["lastname"];
	$accesslevel=$row["accesslevel"];
	$address=$row["address"];
	$password=$row["password"];
}
?>
<html lang="en">
<head>
  <title>REGISTRATION FORM-ADD USER</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
 	<h2>REGISTRATION FORM-ADD USER</h2>
	<p> Use this form to register a new user in the system.</p>
  <form action="" name="form1" method="post">
    <div class="form-group">
    <label for="firstname">FIRST NAME:</label>
    <input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="firstname" value="<?php echo $firstname; ?>">
    </div>
	
    <div class="form-group">
    <label for="lastname">LAST NAME:</label>
    <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" name="lastname" value="<?php echo $lastname; ?>">
    </div>
	
	<div class="form-group">
	<label for="accesslevel">ACCESS LEVEL:</label>
    <select class="form-control" id="accesslevel" name="accesslevel" value="<?php echo $accesslevel; ?>">
	<option value="ordinaryuser">ORDINARY USER</option>
	<option value="supervisoryuser">SUPERVISORY USER</option>
	<option value="superuser">SUPER USER</option>
	</select>
    </div>	
	<div class="form-group">
    <label for="address">ADDRESS:</label>
    <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address" value="<?php echo $address; ?>">
    </div>	
	<div class="form-group">
    <label for="password">PASSWORD</label>
    <input type="text" class="form-control" id="password" placeholder="Enter Password" name="password" value="<?php echo $password; ?>">
    </div>
	<button type="submit" name="update" class="btn btn-default">UPDATE</button>
  </form>
</div>
<div class="col-kg-12">
</div>
</body>
<?php
if(isset($_POST["update"]))
{
	mysqli_query($link,"update table1 set firstname='$_POST[firstname]',lastname='$_POST[lastname]',accesslevel='$_POST[accesslevel]',address='$_POST[address]',password='$_POST[password]' where id=$id");	
	?>
	<script type="text/javascript">
	window.location="index.php";
	</script>
	<?php
}
	?>
</html>