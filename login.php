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
    include "koneksi.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["passw"]);
        $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user["password"])) {
               
                $_SESSION["user_id"] = $user["id"]; 
                if (isset($_POST["remember"]) ){
                   setcookie("username", $user["username"], time() + (86400 * 7), "/");
                }
                
                if($user["username"]=="admin"){
                    $_SESSION["role"] = "admin";
                                
                }
                else{
                    $_SESSION["role"] = "user";

                }
       
                header("Location: dashboard.php");
                exit();
            } else {
                echo "Password salah!";
            }
        } else {
            echo "Username tidak ditemukan!";
        }
        
        $stmt->close();
        $conn->close();
    }
?>
<form method="POST">

   <div class="container">
		<div class="w-25 mx-auto text-center mt-5">
			<div class="card bg-dark text-light">
				<div class="card-body">
				<h2 class="card-title">LOGIN</h2>	
				<form method="post" action="">
					<div class="form-group">
						<label for="username">Username</label>
						<input class="form-control" type="text" name="username" id="username" autofocus required>
					</div>
					<div class="form-group">
						<label for="passw">Password</label>
						<input class="form-control" type="password" name="passw" id="passw" required>
					</div>
                    <div> 
                        <input type="checkbox" name="remember"> Remember Me<br>		</div>	
					<div>		
						<button class="btn btn-info" type="submit"><i class="bi bi-box-arrow-in-right"> Login</i></button>
					</div>
				</form>
				</div>
			</div>
		</div>	
	</div>

    

</form>

</body>