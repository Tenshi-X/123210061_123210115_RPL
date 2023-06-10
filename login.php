<?php
	include 'koneksi.php';
	session_start();
	if (isset($_SESSION['username'])) {
	    header("location: homepage.php");
	}

	if (isset($_POST['submit'])) {
		$username = $_POST ['username'];
	    $password = $_POST ['password'];

	    $query = mysqli_query($konek, "SELECT * FROM user WHERE username='$username' AND password='$password'");

	    $cek = mysqli_num_rows($query);

	    if($cek > 0){
	        $_SESSION['username'] = $username;
	        $_SESSION['password'] = $password;
	        header("location:homepage.php");
	    }
	    else{
	        echo "<p><center class='alert alert-danger'>Username atau Password Salah</center></p>";
	    }
	}
?><html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body style="background-color: #0274BC";>
       <div class="container py-10 h-200" style="padding: 20px;">
    <div class="row d-flex justify-content-center align-items-center h-80">
     <div class="col col-xl-12">
      <div class="card" style="border-radius: 1rem;">
       <div class="row g-0">
        <div class="col-md-6 col-lg-5 d-flex align-items-center" >
         <img src="img/illustration.svg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
        </div>
        <div class="col-md-6 col-lg-7 d-flex align-items-center">
         <div class="card-body p-4 p-lg-5 text-black">
          <form method="post" action="">
           <div class="d-flex align-items-center mb-3 pb-1">
            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
            <span class="h1 fw-bold mb-0"><img src="img/logo2.svg" alt="Logo DeliVer"></span>
           </div>
           <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
           <div class="form-outline mb-4">
            <input type="text" id="username" class="form-control form-control-lg" placeholder="123xxxxxx" name="username" />
            <label class="form-label" for="form2Example17">Username</label>
           </div>
           <div class="form-outline mb-4">
            <input type="password" id="password" class="form-control form-control-lg" placeholder="xxxxxxxx" name="password" />
            <label class="form-label" for="form2Example27">Password</label>
           </div>
           <div class="pt-1 mb-4">
            <button class="btn btn-dark btn-lg btn-block" type="submit" name="submit" value="log in">Login</button>
           </div>
           <a class="small text-muted" href="login_admin.php">Login as Admin?</a>
           <br>
           <a class="small text-muted" href="signup.php">Sign Up?</a>
           <br>
           <a href="#!" class="small text-muted">Terms of use.</a>
           <a href="#!" class="small text-muted">Privacy policy</a>
           
          </form>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>

       <footer style="position: absolute;"> &copy; 2023 DeliVer. All rights reserved.</footer>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
 
     <script src="script.js"></script>

 </body>

 </html>