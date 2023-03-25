<!--Error page incase of errors -->
<?php include('view/header.php'); ?>

<h2 class="text-primary">There was an error</h2>

<br>

<p><?= $error_message ?></p>

<br>

<p><a href=".">Go back to the Home page</a></p>


<?php include('view/footer.php'); ?>