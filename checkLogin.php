<?php	
	if (($_POST["txtUsername"] == '') && ($_POST["txtPassword"] == ''))
	{
		?>
			<script>
				alert("Username or password cannot be blank");
				location.assign("index.php");
			</script>
		<?php
	}
	else
	{

		$connection = pg_connect("host=ec2-35-168-54-239.compute-1.amazonaws.com user=xhdaujdrfpizfo password=51aeecb43f75e1d179d23ad86590ed983e0736c294fc4def86202706305d35b3 dbname=de05liamtl09iv");
		$username = $_POST["txtUsername"];
		$password = $_POST["txtPassword"];
		$sql = "SELECT * FROM tblAdmin WHERE _user = '".$username."' AND _password = '".$password."'";
		$result = pg_query($connection, $sql);
		$row = pg_num_rows($result);
		if ($row == 1)
		{
			?>
				<script>
					alert("Login success");
					location.assign("viewproduct.html");
				</script>
			<?php
		} 
		else
		{
			?>
				<script>
					alert("Login failed");
					location.assign("index.php");
				</script>
			<?php
		}
	}
?>