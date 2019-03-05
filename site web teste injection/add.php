
<?php 
// On commence par récupérer les champs 
if(isset($_POST['nom']))      $nom=$_POST['nom'];
else      $nom="";

if(isset($_POST['prenom']))      $prenom=$_POST['prenom'];
else      $prenom="";

if(isset($_POST['email']))      $email=$_POST['email'];
else      $email="";

// On vérifie si les champs sont vides 
if(empty($nom) OR empty($prenom) OR empty($email)) 
    { 
    echo '<font color="red">Attention, vous avez oubliée les champs !</font>'; 
    } 

// Aucun champ n'est vide, on peut enregistrer dans la table 
else      
    { 
       // connexion à la base
$db = mysqli_connect('localhost', 'root', '')  or die('Erreur de connexion '.mysqli_error());
// sélection de la base  

    mysqli_select_db($db, 'infos_tbl')  or die('Erreur de selection '.mysqli_error()); 
     
    // on écrit la requête sql 
    $sql = "Select * from infos_tbl where id=".$nom .$email; 
     // L'exemple au dessus est que pour mathias faire une injection avec cette exemple fonctionne mieux :)
     //** $sqli = "INSERT INTO infos_tbl(id, nom, prenom, email) VALUES('','$nom','$prenom','$email')"; pour que le code fonctionne avec la base de donnée */
    // on insère les informations du formulaire dans la table 
    $res = mysqli_query($db, $sql) or die('Erreur SQL !'.$sql.'<br>'.mysqli_error($db)); 

    // on affiche le résultat pour le visiteur 
     $result = $res->fetch_row();
     var_dump($result);

    mysqli_close($db);  // on ferme la connexion 
    }  
    return("<div></div>");
?>

<!--  math.com'); A = (1 + 1
SELECT id, username FROM users WHERE username = 'foo' AND password = 'bar'