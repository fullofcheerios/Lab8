<?php # Script 3.7 - index.php #2

// This function outputs theoretical HTML
// for adding ads to a Web page.

function create_ad() 
{
    echo '<div class="alert alert-info" role="alert"><p>';
    
    $ad_text = 'This is an annoying ad! ';
    for($x = 0; $x < 5; $x++) //FOR -loop for ad printing
    {
        echo $ad_text;
    }
    echo '</p></div>';
} // End of the function definition.

$page_title = 'Welcome to this Site!';
include('includes/header.html');

// Call the function:
// LAB 5: ADD BOOTSTRAP TABLE
create_ad();
?>

<div class="page-header"><h1>Database Applications</h1></div>
<p>The acromyn CRUD refers to all of the major functions that are implemented in relational database applications.
    Each letter in the acronym can map to a standard Structured Query Language (SQL) statement, Hypertext Transer Protocol (HTTP) method 
    (this is typically used to build RESTful APIs[4]) or Data Distribution Service(DDS) operation:</p>
<table class="table"> 
    <tr>
        <th>Operation</th>
        <th>SQL</th>
        <th>HTTP</th>
        <th>RESTful WS</th>
        <th>DDS</th>
    </tr>
    <tr>
        <td>Create</td>
        <td>INSERT</td>
        <td>PUT / POST</td>
        <td>POST</td>
        <td>write</td>
    </tr>
    <tr>
        <td>Read(Retrieve)</td>
        <td>SELECT</td>
        <td>GET</td>
        <td>GET</td>
        <td>read/take</td>
    </tr>
    <tr>
        <td>Update(Modify)</td>
        <td>UPDATE</td>
        <td>PUT / POST / PATCH</td>
        <td>PUT</td>
        <td>write</td>
    </tr>
    <tr>
        <td>Delete</td>
        <td>DELETE</td>
        <td>DELETE</td>
        <td>DELETE</td>
        <td>dispose</td>
    </tr>
</table>
 
<?php
// Call the function again:
create_ad();

include('includes/footer.html');
?>