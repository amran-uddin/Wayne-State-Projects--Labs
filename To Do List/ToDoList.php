<h3>Main Menu</h3>
<?php
	$user = 'root';
	$pass = '';
	$db = 'list';
	
	$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

?>
<br>

<form action="viewList.php">
    <input type="submit" value="View List" />
</form>

<br>

<form action="addTask.php">
    <input type="submit" value="Add Task" />
</form>

<br>

<form action="deleteTask.php">
    <input type="submit" value="Delete Task" />
</form>