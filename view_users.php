<?php 
// This script retrieves all the records from the users table.
// This new version allows the results to be sorted in different ways.

$page_title = 'View Users';
include('includes/header.html');
echo '<h1>View User Handles</h1>';

require('mysqli_connect.php');

// Number of records to show per page:
$display = 10;

// Define the query:
$q = "SELECT username AS handle, CONCAT(first_name,' ',last_name) AS name FROM users";
$r = @mysqli_query($dbc, $q); // Run the query.
// Display the number of users
$num = mysqli_num_rows($r);
if ($num > 0)
{
	echo "<p>There are currently $num users in the database.</p>\n";

	// Table header:
	echo '<table class="active" width="60%">
	<thead>
	<tr>
		<th align="left"><strong>User Handle</strong></th>
		<th align="left"><strong>See Users Posts</strong></th>
	</tr>
	</thead>
	<tbody>
	';
	
	// Fetch and print all the records....
	$bg = '#eeeeee';
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
			echo '<tr bgcolor="' . $bg . '">
			<td align="left">' . $row['handle'] . '</td>
			<td align="left"><a href="view_user_posts.php?id='. $row['handle'] . '"><strong>View User\'s Posts</strong></a></td>
		</tr>
		';
	} // End of WHILE loop.
	
	echo '</tbody></table>';
	mysqli_free_result($r);
}
else
{
	echo "<p>There are no users in the database.</p>";
}
mysqli_close($dbc);


include('includes/footer.html');
?>