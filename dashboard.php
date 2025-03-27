<!DOCTYPE html>
<html>
<head>
    <title>Tugas PWL Minggu 3 - CRUD PHP MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<?php
    

    session_start();
    if (!isset($_SESSION["user_id"])) {
       
            header("Location: login.php");
            exit();
     
    }

?>

<div class="container">
    <?php echo "<h2>Selamat datang  <br>di <b>" .$username. $_SESSION["role"] . " </b>Dashboard!</h2>";?>
   
    <div>		
		 <a class="btn btn-danger" href="logout.php"><i class="bi bi-box-arrow-right">Logout</i></a>  
	</div>
</div>
</body>