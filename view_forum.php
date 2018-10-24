<?php # Script 9.6 - view_users.php #2
// This script retrieves all the records from the users table.
// SORT ALPHABETTICALLY

$page_title = 'View the PHP Forum';
include('includes/header.html');

// Page header:
echo '<h1>PHP Forum</h1>';

require('mysqli_connect.php'); // Connect to the db.

// Make the query:
$q = "SELECT subject AS subject, body AS body FROM messages";
$r = @mysqli_query($dbc, $q); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

	// Print how many users there are:
	echo "<p>There are currently $num forum members.</p>\n";

	// Table header.
	echo '<table width="60%">
	<thead>
	<tr>
		<th align="left">Subject</th>
		<th align="left">Body Message</th>
	</tr>
	</thead>
	<tbody>
';

	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr><td align="left">' . $row['subject'] . '</td><td align="left">' . $row['body'] . '</td></tr>
		';
	}

	echo '</tbody></table>'; // Close the table.

	mysqli_free_result ($r); // Free up the resources.

} else { // If no records were returned.

	echo '<p class="error">There are currently no forum messages.</p>';

}

mysqli_close($dbc); // Close the database connection.

include('includes/footer.html');
?>