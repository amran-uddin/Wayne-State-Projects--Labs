<style>
table, th, td {
  border: 1px solid black;
}
</style>
<h3>List of Tasks</h3>
<?php
	$user = 'root';
	$pass = '';
	$db = 'list';
	
	$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
	
	$sql = "SELECT * FROM tasks";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
		echo "<table><tr><th>Task Number</th><th>Task Name</th></tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>". $row["taskNumber"]. "</td><td>". $row["taskName"] . "</td></tr>";
		}
		echo "</table>";
		} else {
		echo "No Tasks <br>";
	}

	$conn->close();

?>
<br>
<form action="ToDoList.php">
    <input type="submit" value="Main Menu" />
</form>