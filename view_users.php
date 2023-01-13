<?php # Script 9.4 - view_users.php
// This script retrieves all the records from the users table.

$page_title = 'View the Current Users';
include('includes/header.html');

// Page header:
echo '<h1>Registered Users</h1>';

require('../mysqli_connect.php'); // Connect to the db.

// Make the query:
$q = "SELECT last_name, first_name, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr, user_id FROM users ORDER BY registration_date ASC";
$r = @mysqli_query($dbc, $q); // Run the query.

$num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

	//Print num of users
	echo "<p> There are currently $num registered users.</php>\n";

	// Table header.
	echo '<table width="60%">
	<thead>
	<tr>
		<th align="left"><strong>Edit</strong></th>
		<th align="left"><strong>Delete</strong></th>
		<th align="left"><strong>Last Name</strong></th>
		<th align="left"><strong>First Name</strong></th>
		<th align="left"><strong>Date Registered</strong></th>
	</tr>
	</thead>
	<tbody>
';

	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr>
				<td align="left">
					<a href="edit_user.php?id=' . $row['user_id'] . '">Edit</a>
				</td>
				<td align="left">
					<a href="delete_user.php?id=' . $row['user_id'] . '">Delete</a>
				</td>
				<td align="left">' . $row['last_name'] . '</td>
				<td align="left">' . $row['first_name'] . '</td>
				<td align="left">' . $row['dr'] . '</td>
			</tr>';
	}

	echo '</tbody></table>'; // Close the table.

	mysqli_free_result ($r); // Free up the resources.

} else { // If it did not run OK.

	// Public message:
	echo '<p class="error">The are currently no registered users.</p>';

} // End of if ($r) IF.

mysqli_close($dbc); // Close the database connection.

include('includes/footer.html');
?>