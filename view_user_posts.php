<?php 
// This script gets all the posts for a given user
// This new version allows the results to be sorted in different ways.

$page_title = 'View User Posts';
include('includes/header.html');
echo '<h1>View Forum Posts</h1>';

require('mysqli_connect.php');

// Number of records to show per page:
$display = 10;
echo "<pre>";
print_r($_GET);
echo "</pre>";



// Define the query:
$q = "SELECT users.username AS username,messages.subject AS subject,messages.body AS post FROM messages, users
 WHERE(( users.user_id = messages.user_id) AND (users.username = 'funny man'))";
$r = @mysqli_query($dbc, $q); // Run the query.

$num = @mysqli_num_rows($r);
if ($num > 0)
{
	// Table header:
	echo '<table class="table" width="60%">
	<thead>
	<tr>
		<th align="left">Name</strong></th>
		<th align="left"><strong>Subject</strong></th>
		<th align="left"><strong>Post</strong></th>
	</tr>
	</thead>
	<tbody>
	';
	
	// Fetch and print all the records....
	$bg = '#eeeeee';
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
			echo '<tr bgcolor="' . $bg . '">
			<td align="left">' . $row['username'] . '</td>
			<td align="left">' . $row['subject'] . '</td>
			<td align="left">' . $row['post'] . '</td>
		</tr>
		';
	} // End of WHILE loop.
	
	echo '</tbody></table>';
	mysqli_free_result($r);
}

else
{
	echo "<p>There are no posts in the forum.</p>";
}
mysqli_close($dbc);

// Make the links to other pages, if necessary.
if ($pages > 1) {

	echo '<br><p>';
	$current_page = ($start/$display) + 1;

	// If it's not the first page, make a Previous button:
	if ($current_page != 1) {
		echo '<a href="view_user_posts.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
	}

	// Make all the numbered pages:
	for ($i = 1; $i <= $pages; $i++) {
		if ($i != $current_page) {
			echo '<a href="view_user_posts.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
		} else {
			echo $i . ' ';
		}
	} // End of FOR loop.

	// If it's not the last page, make a Next button:
	if ($current_page != $pages) {
		echo '<a href="view_user_posts.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
	}

	echo '</p>'; // Close the paragraph.

} // End of links section.

include('includes/footer.html');
?>