<?php # Script 3.7 - index.php #2

// This function outputs theoretical HTML
// for adding ads to a Web page.
function create_ad() {
  echo '<div class="alert alert-info" role="alert"><p>This is an annoying ad! This is an annoying ad! This is an annoying ad! This is an annoying ad!</p></div>';
} // End of the function definition.

$page_title = 'Welcome to this Site!';
include('includes/header.html');

// Call the function:
// create_ad();
?>

<div class="page-header"><h1>Meet Wallee, Your Wallet's Best Friend</h1></div>
<p>Wallee works with your wallet to track bills, card benefits, and more so you can maximize your
  financial freedom!</p>
</p>

<a href="register.php" class="btn btn-primary">Register</a>
<a href="login.php" class="btn btn-primary">Log In</a>


<?php
// Call the function again:
// create_ad();

include('includes/footer.html');
?>