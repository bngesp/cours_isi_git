<?php  include "src/include/header.php"; 

// if(isset($_GET['page']) &&  $_GET['page'] === 'inscription')
//     include "src/pages/inscription.php";
// else
//     include "src/pages/login.php";

include "src/class/Formulaire.php";
include "src/class/FormulaireLogin.php";

$form = new FormulaireLogin("src/controller/TraitementLogin.php", "post");
echo $form->buildLoginForm();
?>

<?php include "src/include/footer.php"; ?>