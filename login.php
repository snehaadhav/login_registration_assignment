
<?php
    session_start();
    include('database.php');
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            echo '<p class="error">Username password combination is wrong!</p>';
        } else {
            if (password_verify($password, $result['password'])) {
                $_SESSION['username'] = $result['username'];
                echo '<p class="success">Congratulations, you are logged in!</p>';
                header('Location: dashboard.php');

            } else {
                echo '<p class="error">Username password combination is wrong!</p>';
            }
        }
    }
?>
<?php include('layouts/app.php'); ?>
   <form method="post" action="" name="signin-form">
   <h1><strong>Login</strong></h1>
  <div class="form-element">
    <label>Username</label>
    <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
  </div>
  <div class="form-element">
    <label>Password</label>
    <input type="password" name="password" required />
  </div>
  <button type="submit" name="login" value="login">Sign In</button>
</form>
<a href="login.php" class="btn btn-link">Already Signed in</a>
          <a href="registration.php" class="">Register here </a>
        
</body>
</html>
