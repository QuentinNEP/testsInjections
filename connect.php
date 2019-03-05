<?php

$bdd = new PDO('mysql:host=localhost;dbname=injection;charset=utf8', 'root', '');

if(isset($_GET['submit']))
{
  $user = $_GET['user'];
  $pwd = $_GET['pwd']
	if(!empty($user) AND !empty($pwd))
	{
		$requser = $bdd->prepare("SELECT * FROM membres WHERE user = ? AND pwd = ?");
		$requser->execute(array($user, $pwd));
		$userexist = $requser->rowCount();
		if($userexist == 1)
		{
      echo"good";
		}
		else{
			echo ": Incorrect password or username";
		}
	}
	else{
		echo ": Veuillez remplir tous les champs";
	}
}
 ?>


<form action="connect.php" method="get">
  Login<br>
  <input type="text" placeholder="Username" name="user" value="<?php if(isset($user)){echo $user;}?>"/><br>
  Password<br>
  <input type="password" placeholder="Password" name="pwd" />
  <input type="submit" name="submit" value="Se connecter" />
</form>

<a href="index.php">enregistrer</a>
