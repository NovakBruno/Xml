<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>XML</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <div class="center">
      <h1>Sign Up</h1>
      <form method="post" action="">
      <div class="txt_field">
          <input name="ime" type="text" required>
          <span></span>
          <label>Ime</label>
        </div>
        <div class="txt_field">
          <input name="prezime" type="text" required>
          <span></span>
          <label>Prezime</label>
        </div>
        <div class="txt_field">
          <input name="username" type="text" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input name="password" type="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="txt_field">
          <input name="password2" type="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <input name="submit" type="submit" value="Sign Up">
        <div class="signup_link">
          Already member? <a href="index2.php">Login</a>
        </div>
      </form>
    </div>

  </body>
</html>

<?php
session_start();
if (isset($_POST["ime"]) AND isset($_POST["prezime"]) AND isset($_POST["username"]) AND isset($_POST["password"])){
    $ime= $_POST["ime"];
    $prezime= $_POST["prezime"];
    $username= $_POST["username"];
    $password= $_POST["password"];

    $_SESSION['username'] = $username;
    $_SESSION['prezime'] = $prezime;
    $_SESSION['ime'] = $ime;
    
    registracija($ime, $prezime, $username, $password);
}

function registracija($ime, $prezime, $username, $password) {
    
  $xml = simplexml_load_file('contact.xml');
  $user = $xml->addChild('user');
  $user->addChild('username', $username, );
  $user->addChild('password', $password, );
  $user->addChild('ime', $ime, );
  $user->addChild('prezime', $prezime, );
  file_put_contents('contact.xml', $xml->asXML());

  exit;
  return;
}
?>