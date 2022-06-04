<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>XML</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <form method="post" action="">
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
        <input name="submit" type="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="index.php">Sign Up</a>
        </div>
      </form>

    </div>

  </body>
</html>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$ans=$_POST;

	if (empty($ans["username"]))  {
        	echo "Korisnicki račun nije unesen.";
		
    		}
	else if (empty($ans["password"]))  {
        	echo "Lozinka nije unesena.";
		
    		}
	else {
		$username= $ans["username"];
		$password= $ans["password"];
	
		provjera($username,$password);
	}
}



function provjera($username, $password) {
	

	$xml=simplexml_load_file("contact.xml");
	
	foreach ($xml->user as $user) {
  	$usrn = $user->username;
		$usrp = $user->password;
		$usrime=$user->ime;
		$usrprezime=$user->prezime;
		if($usrn==$username){
			if($usrp == $password){
				echo "Prijavljeni ste kao $usrime $usrprezime";
				return;
				}
			else{
				echo "Netocna lozinka";
				return;
				}
			}
		}
		
	echo "Korisnik ne postoji.";

	return;
}
  ?>
