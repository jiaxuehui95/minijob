<?php 
            include_once("Vue.php");  
            include_once ("Modele.php");
            function changer_information($id_client)
    {
            $db = db_connect();
            $query= "select * from client where id_client=".$id_client;
            $result = db_query($db, $query);
            while ($row = db_fetch($result)) 
    {
            echo "&nbsp; &nbsp;<form name='contact_form' method='post' class='contact_form'><ul>";
            echo "&nbsp; &nbsp;<li><label for ='username'> Username</label><input name='username' type='text' id='username' value ={$row['username']} required></input></li>";
            echo "&nbsp; &nbsp;<li><label for ='nom'> Nom</label><input name='nom' type='text' id='nom' value={$row['nom']} required></input></li>";
            echo "&nbsp; &nbsp;<li><label for ='prenom'> Prenom</label><input name='prenom' type='text' id='prenom' value={$row['prenom']} required></input></li>";
            
			      echo "&nbsp; &nbsp;<li><label for ='telephone'>Telephone</label><input name='telephone' type='text' id='telephone' value={$row['telephone']} > </input></li>";
			      echo "&nbsp; &nbsp;<li><label for ='naissance'> Naissance</label><input name='naissance' type='text' id='naissance' value={$row['naissance']} ></input></li>";
			      echo "&nbsp; &nbsp;<li><label for ='email'> Email</label><input name='email' type='text' id='email' placeholder='name@something.com' value={$row['email']} required></input></li>";
		      	echo "&nbsp; &nbsp;<li><label for ='adresse'>Adresse</label><input name='adresse' type='text' id='adresse' class='ad' value={$row['adresse']} ></input></li>";
		      	echo "&nbsp; &nbsp;<li><label for ='postal'>Postal</label><input name='postal' type='text' id='ville' value={$row['postal']} ></input></li>";
			      echo "&nbsp; &nbsp;<li><label for ='ville'>Ville</label><input name='ville' type='text' id='ville' value={$row['ville']} ></input></li>";
			      echo "&nbsp; &nbsp;<li><label for ='pays'>Pays</label><input name='pays' type='text' id='pays' value={$row['pays']} ></input></li>";
			      echo "&nbsp; &nbsp;<li><label for ='q_type'>type de votre qualification</label><input name='q_type' type='text' id='q_type' ></input></li>";
			     
			      echo "&nbsp; &nbsp;<li><label for ='qualification'>Contenu de la qualification</label><input name='qualification' type='text' id='qualification'  ></input>";

			      echo "</li>";
			     
			      echo "&nbsp; &nbsp;<li><label for ='desciption'>Desciption</label><textarea name='desciption' cols ='60' rows ='8'>".$row['desciption']."</textarea></li>";
			      echo "&nbsp; &nbsp;<li><button  class='submit' type='submit'  value='SignUp'>modifier</button></li>";
			      echo "&nbsp; &nbsp;</ul></form>";
			       
			
    }
    }
    
	
     
    function a($id_client){
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$username1 = $_POST["username"];
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $naissance = $_POST["naissance"];
            $telephone = $_POST["telephone"];
            $email1 = $_POST["email"];
            $adresse = $_POST["adresse"];
            $postal = $_POST["postal"];
            $ville = $_POST["ville"];
            $pays = $_POST["pays"];
            $desciption = $_POST["desciption"];
            $qualification=$_POST["qualification"];
            $q_type=$_POST["q_type"];
            if (Check_Username($username1) &&  Check_Email($email1) && New_Check_Exist($username1, $email1, $id_client))
            {
                 $db = db_connect();
               
                 $sql ="INSERT INTO qualification(id_client,q_type,description) VALUES (".$id_client.",'$q_type','$qualification')";
                $query = "UPDATE client SET username='$username1', nom='$nom', prenom='$prenom', naissance='$naissance', telephone='$telephone',
                email='$email1', adresse='$adresse', postal='$postal', ville='$ville', pays='$pays', desciption='$desciption' WHERE id_client='$id_client' ";
               $result=db_query($db,$query);
                if($q_type!=''&&$qualification!='')
                {
               $res2=db_query($db,$sql);
                }
                if($result){
                    echo "<script>alert(\"Modification avec succès!\");</script>";
              }
                else
                    echo "<script>alert(\"Echec de modification!\");</script>";
                    
                    
                db_close($db);
            }
		
          
		}
    }

    
    
?>
                        
                        