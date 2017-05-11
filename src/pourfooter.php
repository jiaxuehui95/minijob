<?php
include_once("Modele.php");

        $nom=$_POST["nom"];
        $email=$_POST["email"];
        $titre=$_POST["titre"];
        $contenu=$_POST["contenu"];
        $smtpemailto = "nsly2022335@gmail.com";
        $emailsubject = $nom."用户意见：".$titre;
        $emailbody = "来自亲爱的用户".$nom." </br>其意见如下：<br/>".$contenu."<br/>
        待回复邮箱：".$email."<br/><p style='text-align:right'>-------- Mini Job 敬上</p>";
        $rs = sendMail($smtpemailto, $emailsubject, $emailbody);

        if ($rs) {
            echo '恭喜您，发送成功';
        } else {
            echo '发送失败';
        }

?>