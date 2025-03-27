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
    include "koneksi.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = password_hash($_POST["passw"], PASSWORD_DEFAULT); // Hash password
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);




        if ($stmt->execute()) {
            echo "<h1>Registrasi berhasil!</h1>";
        } else {
            echo "<h1>Gagal mendaftar!</h1>";
        }
        $stmt->close();
        $conn->close();
    }
?>

<form method="POST">
<div class="container">
		<div class="w-50 mx-auto text-left mt-5">
			<div class="card bg-primary text-light">
				<div class="card-body">
				<h2 class="card-title">Form Register Data</h2>	
				<form method="post" action="">
					<div class="form-group">
						<label for="username">Username</label>
						<input class="form-control" type="text" name="username" id="username" autofocus required>
					</div>
					<div class="form-group">
						<label for="passw">Password</label>
						<input class="form-control" type="password" name="passw" id="passw" required>
					</div><br>			
					<div>		
						<button class="btn btn-success " type="submit"> Daftar</button>
					</div>
				</form>
				</div>
			</div>
		</div>	
	</div>



</form>

</body>