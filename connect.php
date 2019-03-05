<?php

$bdd = mysqli_connect("localhost", "root", "", "injections");

$user = $_GET['user'];
$pwd = $_GET['pwd'];

if(isset($_GET['user']) && isset($_GET['pwd'])){
  $requser = $bdd->prepare("SELECT * FROM membres WHERE user = ? AND pwd = ?");
  $requser->bind_param("ss", $user, $pwd);
  $requser->execute();
  $userexist = $requser->num_rows();
  
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
