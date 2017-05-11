<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>mini job</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	 <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	  <link href="css/button.css" rel="stylesheet">
	  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
     <link href="css/login.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
	<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  </head>
  <body>
      <div class="container-fluid">
		    <!--row 1     -->
		<div class="row">
			<div class="col-md-12">
			<?php
                    ///////authen/////////
                session_start();
            if ($_SESSION['status'] != 2) {
                $url = "mainPage.php";
                Header("Location: $url");
            } else {
                $id_client = $_GET['id_client'];
                $conn = pg_connect("host=localhost dbname=tp_web user=tp_web password=tp_web");
                pg_query("set names utf8");

                $sql = "DELETE FROM client WHERE id_client = {$id_client} ;";
                $result = pg_query($sql);
                if ($result) {
                    echo 'Delete successful <br/>';
                    echo '<a href="../admin.php">retour a admin</a>';
                } else {
                    echo 'error <br/>';
                    echo '<a href="../admin.php">retour a admin</a>';
                }
            }
                //////authen//////
            ?>
            </div>
        </div>
        
        
    </div>
    </body>
</html>