
<?php

$bdd = mysqli_connect("localhost", "root", "", "injections");

$user = $_GET['user'];
$pwd = $_GET['pwd'];

$insertmbr = $bdd->prepare("INSERT INTO membres (user, pwd) VALUES (?, ?)");
$insertmbr->bind_param("ss", $user, $pwd);
$insertmbr->execute();


 ?>



<form action="index.php" method="get">
  Login<br>
  <input type="text" placeholder="Username" name="user" value="<?php if(isset($user)){echo $user;}?>"><br>
  Password<br>
  <input type="password" placeholder="Password" name="pwd"  />
  <input type="submit"  name="submit" value="S'inscrire" />
</form>
