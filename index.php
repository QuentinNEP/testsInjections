
<?php

$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

$list_nom = $bdd->query('SELECT user FROM membres');
$list_nom->fetch()['user'];

$new_name = false;

if (isset($_GET['submit']))
{
	$user = $_GET['user'];
	if(!empty($_GET['user']) AND !empty($_GET['pwd']))
	{

			if($_GET['pwd'] != $_GET['user'])
			{
				$longueurPwd = strlen($_GET['pwd']);

				$pwd = $_GET['pwd'];

				$longueurPseudo = strlen($user);
				if ($longueurPseudo <= 12)
				{
					if ($longueurPseudo >= 3)
					{
						if ($longueurPwd >= 2)
						{
							if ($longueurPwd <= 10)
							{
								$requser = $bdd->prepare("SELECT * FROM membres WHERE user = ?");
                $requser->execute(array($user));
                $userExist = $requser->rowCount();

								if($userExist == 0) {

									$insertmbr = $bdd->prepare("INSERT INTO membres(user, pwd) VALUES(?, ?)");
                	$insertmbr->execute(array($user, $pwd));
                	echo ": Votre compte a bien été créé ! <a href=\"login.php\">Me connecter</a>";
								}
								else{
									echo ": Username déja utilisé";
								}
							}
							else{
								echo ": Votre mot de passe est trop long";
							}
						}
						else{
							echo ": Votre mot de passe est trop court";
						}
					}
					else{
						echo ": Votre pseudo est trop court";
					}
				}
				else{
					echo ": Votre pseudo est trop long";
				}
			}
			else{
				echo ": Le mot de passe doit être différent du pseudo.";
			}
	}
	else {
		echo ": Veuillez remplir tous les champs";

	}
}
}

 ?>



<form action="index.php" method="get">
  Login<br>
  <input type="text" placeholder="Username" name="user" value="<?php if(isset($user)){echo $user;}?>"><br>
  Password<br>
  <input type="password" placeholder="Password" name="pwd"  />
  <input type="submit"  name="submit" value="S'inscrire" />
</form>

<a href="connect.php">connection</a>
