<style>
.error {color: #FF0000;}
</style>
<h3>Add Task</h3>
<?php 
	$name = '';
	$nameErr = '';
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["name"])) {
			$nameErr = "Name is required";
		} 
		else {
			$name = test_input($_POST["name"]);
		}
	}
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
	Task Name: <input type="text" name="name" value="<?php echo $name;?>">
	<span class="error">* <?php echo $nameErr;?></span>
	<br>
	<br>
	<input type="submit" name="submit" value="Submit"> 
</form>

<?php
	$user = 'root';
	$pass = '';
	$db = 'list';
	
	$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
	
	$sql = "INSERT INTO tasks (taskName) VALUE (\"" . $name . "\");";
	
	if ($name != '') 
	{
		if ($conn->query($sql) === TRUE) {
			echo "'" . $name . "' was successfully added";
		} else {
			echo $conn->error;
		}
	}
	
	$conn->close();
?>
<form action="ToDoList.php">
    <input type="submit" value="Main Menu" />
</form>