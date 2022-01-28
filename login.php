<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else{
      echo
      "<script> alert('Niepoprawne Hasło'); </script>";
    }
  }
  else{
    echo
    "<script> alert('nazwa'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="ikona.png">
    <title>LoonCraft.pl-Logowanie</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h2>Zaloguj Sie</h2>
    <div class="form-section">
    <form class="" action="" method="post" autocomplete="off">
      <label for="usernameemail">Nick</label>
      <input type="text" name="usernameemail" id = "usernameemail" required value=""> <br>
      <label for="password">Hasło </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <button type="submit" name="submit">Zaloguj</button>
    </form>
</div>
    <br>
    <a href="registration.php">Zarejestruj Się</a>
  </body>
</html>
