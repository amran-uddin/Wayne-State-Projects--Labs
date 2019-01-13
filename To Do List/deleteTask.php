<style>
table, th, td {
  border: 1px solid black;
}
.error {color: #FF0000;}
</style>
<h3>Delete Task</h3>
<?php 
	$task = '';
	$nameErr = '';
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["task"])) {
			$nameErr = "Task Number is required";
		} 
		else {
			$task = test_input($_POST["task"]);
		}
	}
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>

	<br>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
			Task Number: <input type="text" name="task" value="<?php echo $task ;?>">
			<span class="error">*<?php echo $nameErr ;?></span>
			<br>
			<br>
			<input type="submit" name="submit" value="Submit"> 
		</form>
	<br>

<?php
	$user = 'root';
	$pass = '';
	$db = 'list';
	
	$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
	$sql = "DELETE FROM tasks WHERE taskNumber = " . $task . ";";
	
	if ($task != '') 
	{
		if ($conn->query($sql) === TRUE) {
		} else {
			echo $conn->error;
		}
	}
	
	$table = "SELECT * FROM tasks";
	$result = $conn->query($table);

	if ($result->num_rows > 0) {
    // output data of each row
		echo "<table><tr><th>Task Number</th><th>Task Name</th></tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>". $row["taskNumber"]. "</td><td>". $row["taskName"] . "</td></tr>";
		}
		echo "</table>";
	}
	else{
		echo "No Tasks<br>";
	}
	
	$conn->close();
?>
<br>
<form action="ToDoList.php">
    <input type="submit" value="Main Menu" />
</form>