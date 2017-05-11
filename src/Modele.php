<?php

session_start();
include_once("config.php");
include_once("db.php");

function verif_authent()
{
    if (isset($_SESSION['id_client'])) 
    {
        return $id_client = $_SESSION['id_client'];
    } 
    else 
    {
        echo "<script>
        alert(\"Vous n'êtes pas connecté\");
        </script>";
        $url="mainPage2.php";
        Header("Location: $url");
    }
}

function config()
{
    global $nom_hote, $nom_user, $nom_base, $mdp;
    $_SESSION['nomhote'] = $nom_hote;
    $_SESSION['nombase'] = $nom_base;
    $_SESSION['nomuser'] = $nom_user;
    $_SESSION['mdp'] = $mdp;
}



/*une nouvelle application à un minijob*/



function option_region()
{
    if ($db = db_connect()) {
        $req = "SELECT region_id, region_nom FROM region ORDER BY region_id;"; /*test*/
        $result = pg_query($db, $req);
        db_close($db);
        return $result;
    } else {
        print "ERREUR DB";
        return false;
    }
}

function option_department($region_id)
{
    if ($db = db_connect()) {
        $req = "SELECT departement_nom FROM departement WHERE region_id={$region_id} ORDER BY departement_nom;"; /*test*/
        echo $req;
        $result = pg_query($db, $req);
        db_close($db);
        return $result;
    } else {
        print "ERREUR DB";
        return false;
    }
}

function option_ville($departement_id)
{
    if ($db = db_connect()) {
        $req = "SELECT ville_nom, code_postal FROM  ville WHERE departement_id='{$departement_id}' ORDER BY code_postal;"; /*test*/
        echo $req;
        $result = pg_query($db, $req);
        db_close($db);
        return $result;
    } else {
        print "ERREUR DB";
        return false;
    }
}

function getClient($id_client)
{
    if ($db = db_connect()) {
        pg_query("set names utf8"); 
        $req = "select * from client where id_client=".$id_client.";";
        $result = db_query($db, $req);
        $client=db_fetch($result);
        return $client;
    } else {
        print "ERREUR DB";
        return false;
    }
}



function detruire_session()
{
    session_destroy();
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


/*variable data du type str*/
function test_length($data, $min, $max)
{
    $len = strlen($data);
    if ($len >= $min && $len <= $max) {
        return true;
    } else {
        return false;
    }
}

/*下为宋芮德添加内容*/

//发出邮件功能
function sendMail($to, $title, $content)
{
    require_once("phpmailer/class.phpmailer.php");
    require_once("phpmailer/class.smtp.php");

    //实例化PHPMailer核心类
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->SMTPDebug = 0;

    $mail->Host = 'smtp.gmail.com';  //域名
    $mail->SMTPSecure = 'ssl';

    //设置ssl连接smtp服务器的远程服务器端口号
    $mail->Port = 465;

    //设置发件人的主机域
    $mail->Hostname = 'localhost';
    $mail->CharSet = 'UTF-8';
    $mail->FromName = 'Mini job';

    $mail->Username = 'srd0817@gmail.com';
    $mail->Password = 'nsly2022335';
    $mail->From = 'srd0817@gmail.com';

    $mail->isHTML(true);
    $mail->addAddress($to, '在线通知');
    $mail->Subject = $title;

    $mail->Body = $content;
    $status = $mail->send();

    //简单的判断与提示信息
    if ($status) {
        return true;
    } else {
        return false;
    }
}


//注册判断用户名函数
function Check_Username($UserName)
{
    $Max_UserName = 16;
    $Min_UserName = 4;
    if($UserName=='')
        return false;
    if (! preg_match('/^[\w\x80-\xff]{4,16}$/', $UserName)) {//正则表达式匹配检查
        echo '<script language="javascript">alert("error")</script>';
        return false;
    }
    if (strlen($UserName) < $Min_UserName || strlen($UserName) > $Max_UserName) {
        echo "用户名字长度检测不正确<br/>";
        return false;
    }
    return true;
}

//注册判断密码函数
function Check_Password($Password)
{
    $Max_Password = 16;//密码最大长度
    $Min_Password = 4;//密码最短长度
    if (! preg_match('/^[\w\x80-\xff]{4,16}$/', $Password)) {
        echo "密码字符串检测不正确<br/>";
        return false;
    }
    if (strlen($Password) < $Min_Password || strlen($Password) > $Max_Password) {
        echo "密码长度检测不正确<br/>";
        return false;
    }
    return true;
}

//注册判断邮箱函数
function Check_Email($email)
{

    if (! preg_match('/^(\w)+(\.\w+)*@(\w)+((\.\w{2,3}){1,3})$/', $email)) {
        echo "Veuillez entrer un mail valid<br/>";
        return false;
    }
    return true;
}

// vérifier que les mots de passes sont identiques
function Check_ConfirmPassword($Password, $ConfirmPassword)
{
    if ($Password <> $ConfirmPassword) {
        echo $Password;
        echo "</br>";
        echo $ConfirmPassword;
        echo "Veuillez saisir le même mot de passe.<br/>";
        return false;
    } else {
        return true;
    }
}

//Vérifier si les le nom d'utilisateur et l'email n'existe pas déjà
function Check_Exist($username, $email)
{
    $db = db_connect();
    $query = "select * from client where username='$username' or email='$email'";
    $result = db_query($db, $query);
    $row = db_fetch($result);
    while ($row) {
        if ($row["username"] == $username) {
            echo "Le nom d'utilisateur existe déjà<br/>";
            return false;
        }
        if ($row["email"] == $email) {
            echo "Le mail a été utilisé pour un autre compte<br/>";
            return false;
        }
    }
    return true;
}

//
function New_Check_Exist($username, $email, $id_client)
{
    $db = db_connect();
    $query = "select * from client where (username='$username' or email='$email') and id_client!='$id_client'";
    $result = db_query($db, $query);
    $row = db_fetch($result);
    while ($row) {
        if ($row["username"] == $username) {
            echo "Le nom d'utilisateur existe déjà<br/>";
            return false;
        }
        if ($row["email"] == $email) {
            echo "Le mail a été utilisé pour un autre compte<br/>";
            return false;
        }
        
    }
    return true;
}

	//添加用户头像
function showimage($id_client)
{
    $uptypes=array(
    'image/jpg',
    'image/jpeg',
    'image/png',
    'image/bmp'
    );
    echo "<form enctype='multipart/form-data' method='post' name='upform'>upload:";
    echo "<input name='upfile' type='file'>";
    echo "<input type='submit' value='upload'><br>";
    echo "type de file:</form>";
    echo implode(" " ,$uptypes);
    
}	

function addimage($id_client)
{   
     $uptypes=array(
    'image/jpg',
    'image/jpeg',
    'image/png',
    'image/bmp'
    );
    $max_file_size=2000000; //上传文件大小限制, 单位BYTE
    $destination_folder="image/"; //上传文件路径
    if ($_SERVER['REQUEST_METHOD'] == 'POST' )   
    {
    if (!is_uploaded_file($_FILES["upfile"]["tmp_name"]))
    //是否存在文件
    {}
    else{
    $file = $_FILES["upfile"];
    if($max_file_size < $file["size"])
    //检查文件大小
    {
    echo "size error!";
    }

     else if(!in_array($file["type"], $uptypes))
    //检查文件类型
    {
    echo "type error!".$file["type"];
    }

     else if(!file_exists($destination_folder))
    {
    mkdir($destination_folder);
    }
    else{
    $filename=$file["tmp_name"];
    $image_size = getimagesize($filename);
    $pinfo=pathinfo($file["name"]);
    $ftype=$pinfo['extension'];
    $destination = $destination_folder.$id_client.".".$ftype;

    if(!move_uploaded_file ($filename, $destination))
    {
    echo "error";
    }

    $pinfo=pathinfo($destination);
    $fname=$pinfo["basename"];

    $query = "UPDATE client SET image='$destination' WHERE id_client=".$id_client;
    $db = db_connect();
    if($result = db_query($db, $query)){
    
    }  
    }
    }
}
}
function appli2($id_client)
{
 $conn = db_connect();
    pg_query("set names utf8");
    $sql = "select * from qualification where id_client=$id_client ";
    $result = pg_query($sql);
    echo '<table class="w3-table-all">
    <thead>
      <tr class="w3-red">
        <th>qualités</th>
        <th>description<th>
      
      </tr>
    </thead>  ';
     while ($row2 = pg_fetch_array($result)) {
           echo '<tr>
      <td>'.$row2['q_type'].'</td>
      <td>'.$row2['description'].'</td>
     </tr>';
 }
    
            echo '</table><br>';
    pg_close($conn);         
}
function appli($id_demande)
{
  //  $id_demande=$_GET['id_demende'];
    $conn = db_connect();
    pg_query("set names utf8");
    $sql = "select * from application where id_demande=$id_demande ";
    $result = pg_query($sql);
    while ($row = pg_fetch_array($result)) 
    {
        $a_client = $row['a_client'];
       //  echo $a_client ;
        $sql2 = "select * from qualification natural join client where id_client=$a_client";
       // $sql3 = "select * from application where a_client=$a_client and id_demande=$id_demande";
       $sql3 = "select * from demande where id_demande=$id_demande";
        $result2 = pg_query($sql2);
        $result3 = pg_query($sql3);
        $row3 = pg_fetch_array($result3);
        echo "<p>texte:&nbsp".$row['texte']."</p>";
        echo '<table class="w3-table-all">
                <thead>
                    <tr class="w3-red">
                    <th>username</th>
                    <th>niveau</th>
                    <th>type de la qualité</th>
                    <th>qualité</th>
                    </tr>
                </thead>  ';
        while ($row2 = pg_fetch_array($result2)) 
        {
            echo '<tr>
                    <td>'.$row2['username'].'</td>
                    <td>'.$row2['niveau'].'</td>
                    <td>'.$row2['q_type'].'</td>
                    <td>'.$row2['description'].'</td>
               
                 </tr>';
        }
            echo '</table><br>';
            echo "<a class=\"w3-tag w3-red w3-round\" href=https://ensiie-tp-web-p8-mok0na.c9users.io/commande.php?a_client=".$row['a_client']."&id_demande=".$id_demande."&id_client=".$row3['d_client'].">choissiez cette application</a><hr>";
      
    }
    pg_close($conn);
}
?>
