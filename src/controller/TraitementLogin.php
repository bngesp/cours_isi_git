<?php 
// echo "<pre>";
// var_dump($_REQUEST);
// echo "<br>GET<br>";
// var_dump($_GET);
// echo "<br>POST <br>";
// var_dump($_POST);

// echo "</pre>";
// echo "Bonjour ".$_POST['login'];

// utilisateur qui a saisi ses informations de connections 
// $user_login = $_POST['login'];
// $user_pwd = $_POST['password'];

// /* Connexion à une base MySQL avec l'invocation de pilote */
// $dsn = 'mysql:dbname=tp_isi;host=127.0.0.1';
// $user = 'root';
// // $password = ''; // pour windows
// $password = 'root'; 

// try {
//     $db = new PDO($dsn, $user, $password);
//     $sql = $db->query("SELECT * from utilisateur");
//     $sql->execute();
//     $donnees = $sql->fetchAll(PDO::FETCH_ASSOC);
//     $currentUser = null;
//     //echo "<pre>";
//     foreach( $donnees as $key => $valeurs){
//         //echo "Element $key => ";
//         //var_dump($valeurs);
//         if($valeurs['login'] == $user_login && $valeurs['password'] == $user_pwd){
//             $currentUser = $valeurs;
//         }
//     }
//     if(is_null($currentUser)){
//         echo '<div class="alert alert-danger" role="alert">
//             Login et mot de passe incorrectes
//       </div>';
//     }else {
//         echo '<div class="alert alert-success" role="alert">
//             Connecté !!
//       </div>';
//       echo "Bienvenu Mr". $currentUser['nom'].' '. $currentUser['prenom'];
//     }
//     //echo "</pre>";
// } catch (PDOException $e) {
//     echo 'Connexion échouée : ' . $e->getMessage();
// }
$user_login = $_POST['login']; // bassirou or 1=1
$user_pwd = $_POST['password'];

/* Connexion à une base MySQL avec l'invocation de pilote */
$dsn = 'mysql:dbname=tp_isi;host=127.0.0.1';
$user = 'root';
// $password = ''; // pour windows
$password = 'root'; 

try {
    $db = new PDO($dsn, $user, $password);
    $sql = $db->prepare("SELECT * FROM utilisateur WHERE login = ? AND password = ? ");
    $sql->execute(
        array($user_login, $user_pwd)
    );
    $donnees = $sql->fetchAll(PDO::FETCH_ASSOC);
    $currentUser = null;
    if(count($donnees) === 1){
        $currentUser = $donnees[0];
    }
    //echo "<pre>";
    // foreach( $donnees as $key => $valeurs){
    //     //echo "Element $key => ";
    //     //var_dump($valeurs);
    //     if($valeurs['login'] == $user_login && $valeurs['password'] == $user_pwd){
    //         $currentUser = $valeurs;
    //     }
    // }
    if(is_null($currentUser)){
        echo '<div class="alert alert-danger" role="alert">
            Login et mot de passe incorrectes
      </div>';
    }else {
        echo '<div class="alert alert-success" role="alert">
            Connecté !!
      </div>';
      echo "Bienvenu Mr". $currentUser['nom'].' '. $currentUser['prenom'];
    }
    //echo "</pre>";
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}