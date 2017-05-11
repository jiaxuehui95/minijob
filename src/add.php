<?php
include_once("Modele.php");

$username1 = test_input($_POST["username"]);
$password1 = test_input($_POST["password"]);
$confirmpassword = test_input($_POST["confirmPassword"]);
$nom = test_input(pg_escape_string(utf8_encode($_POST["nom"])));
$prenom = test_input(pg_escape_string(utf8_encode($_POST["prenom"])));
$naissance = $_POST["naissance"];
$telephone = test_input(pg_escape_string(utf8_encode($_POST["telephone"])));
$email1 = $_POST["email"];
$adresse = test_input(pg_escape_string(utf8_encode($_POST["adresse"])));
$postal = $_POST["postal"];
$ville = test_input(pg_escape_string(utf8_encode($_POST["ville"])));
$pays = test_input(pg_escape_string(utf8_encode($_POST["pays"])));
$desciption = test_input(pg_escape_string(utf8_encode($_POST["desciption"])));


if (Check_Username($username1) && Check_Password($password1) && Check_Email($email1) && Check_ConfirmPassword($password1, $confirmpassword)
    && Check_Exist($username1, $email1)) {  //0000000000000
    
        $password = md5($_POST['password']); //加密密码

        $token = md5($username1.$password); //创建用于激活识别码
        if($naissance==''){
            $naissance='01/01/1000';
        }
        $query = "INSERT INTO client (nom,username,password,prenom,telephone,naissance,email,adresse,postal,ville,pays,desciption,niveau,token,status,image) VALUES 
		('$nom','$username1','$password1','$prenom','$telephone','$naissance','$email1','$adresse','$postal','$ville','$pays','$desciption',0,'$token',0,'')" ;
        $db = db_connect();
        $result = db_query($db, $query);
    
        
    if ($result) {
        echo'<script>alert("Inscription réussie");</script>';
        $smtpemailto = $email1;
        $emailsubject = "Activation de votre compte MiniJobs";
        $emailbody = "Cher".$username1."：<br/>Merci de votre inscription.<br/>Veuillez cliquer sur le lien ci-dessous pour activer votre compte.<br/><a href='https://ensiie-tp-web-p8-mok0na.c9users.io/active.php?token=".$token."'  target='blank'>
			https://ensiie-tp-web-p8-mok0na.c9users.io/active.php?token=".$token."</a><br/>Si la page ne s'ouvre pas toute seule, copiez le lien dans votre navigateur.<br/>Si vous ne nous êtes pas inscrit, veuillez ignorer ce mail.<br/>Cordialement.<p style='text-align:right'>-------- MiniJobs</p>";
        $rs = sendMail($smtpemailto, $emailsubject, $emailbody);

        if ($rs) {
            echo 'Votre inscription s\'est achévé avec succès!<br/>Veuillez activez votre compte avec le code reçu par mail！';
        } else {
            echo 'mail error';
        }
    } else {
        echo 'Désolé! votre inscription a échouée.<br />';
    }
} else {
    echo 'error:';
    echo 'return <a href="javascript:history.back(-1)">return </a>';
}
?>