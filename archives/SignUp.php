<!DOCTYPE html>
<html>
<head>
<title>SignUp</title>
<meta content="text/html; charset= utf-8" http-equiv="Content-Type">
<link href="css/Sign.css" media ="screen" rel="stylesheet">
</head>
<body>
<form name="contact_form" method="post" action="add.php" class="contact_form">
<ul>
<li>
<h1>SignUp</h1><br>
<span class ="required">* Denotes Required Field</span>
</li>

<li>
<label for ="username">* Username</label>
<input name="username" type="text" id="username" required></input>
</li>
<li>
<label for ="nom">* Nom</label>
<input name="nom" type="text" id="nom" required></input>
</li>
<li>
<label for ="prenom">* Prenom</label>
<input name="prenom" type="text" id="prenom" required></input>
</li>
<li>
<label for ="password">* Password</label>
<input name="password" type="password" id="Password" required></input>
</li>
<li>
<label for ="confirmPassword">* ConfirmPassword</label>
<input name="confirmPassword" type="password" id="confirmPassword" required></input>
</li>
<li>
<label for ="telephone">Telephone</label>
<input name="telephone" type="text" id="telephone"> </input>
</li>
<li>
<label for ="naissance"> Naissance</label>
<input name="naissance" type="text" id="naissance" ></input>
</li>
<li>
<label for ="email">* Email</label>
<input name="email" type="text" id="email" placeholder="name@something.com" required></input>
<span class="form_hint">Proper format "name@something.com"</span>
</li>
<li>
<label for ="adresse">Adresse</label>
<input name="adresse" type="text" id="adresse" class="ad"></input>
</li>
<li>
<label for ="postal">Postal</label>
<input name="postal" type="text" id="postal" ></input>
</li>
<li>
<label for ="ville">Ville</label>
<input name="ville" type="text" id="ville" ></input>
</li>
<li>
<label for ="pays">Pays</label>
<input name="pays" type="text" id="pays" ></input>
</li>
<li>
<label for ="desciption">Desciption</label>
<textarea name="desciption" cols ="60" rows ="8"></textarea>
</li>
<li>
<button name="SignUp" class="submit" type="submit"  value="SignUp">Submit Form</button>
</li>
</ul>
</form>
</body>
</html>