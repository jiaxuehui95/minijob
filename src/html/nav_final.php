<!-- usage require("html/nav_final.php")-->
<div class="w3-top">
    <!-- Aligner à gauche -->
  <div class="w3-bar w3-opacity w3-dark w3-card-2 w3-left-align w3-large" style="opacity:0.90">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-dark" href="javascript:void(0);" onclick="menu_portable()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="mainPage2.php" class="w3-bar-item w3-button w3-padding-large w3-white"><i class="fa fa-home w3-text-red"></i></a>
    <a href="demandePage.php"class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-dark w3-hover-white">Proposer une demande</a>
    <a href="#footer" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Contact</a>
 
      <!-- Aligner à droite -->
      <?php
      ///////authen/////////

      session_start();
      if (isset($_SESSION['username'])) {
          echo '<a href="persoPage2.php" class="w3-bar-item w3-button w3-right w3-padding-large w3-hover-white"><i class="fa fa-user-circle"></i></a>
          <a href="logOut.php" class="w3-bar-item w3-button w3-right w3-hide-small  w3-padding-large w3-hover-white" title="My Account">Déconnexion</a>';
      } else {
            echo '<a href="SignupPage.php" class="w3-bar-item w3-button w3-right w3-hide-small w3-padding-large w3-hover-white">Inscription</a>
          <button onclick="document.getElementById(\'id01\').style.display=\'block\'"   class="w3-bar-item w3-button w3-right w3-padding-large  w3-hover-white">Connexion</button>';
        }
      //////authen//////
        ?>
      </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
        <?php
      ///////authen/////////

        if (isset($_SESSION['username'])) {
            echo '<a href="logOut.php" class="w3-bar-item w3-button w3-padding-large">Déconnexion</a>';
        } else {
            echo '<a href="SignupPage.php" class="w3-bar-item w3-button w3-padding-large">Inscription</a>
          <button onclick="document.getElementById(\'id01\').style.display=\'block\'"   class="w3-bar-item w3-button w3-padding-large">Connexion</button>';
        }
      //////authen//////
        ?>
        
        <!--TODO diriger vers la page de la fin? -->
        <a href="demandePage.php" class="w3-bar-item w3-button w3-padding-large">Proposer une Demande</a>
        <a href="#end" class="w3-bar-item w3-button w3-padding-large">Contact</a>
    </div>
</div>

<!-- Modal -->
<div id="id01" class="w3-modal" style="display: none;">
    <div class="w3-modal-content w3-card-4 w3-animate-top">
      <header class="w3-container w3-dark w3-opacity"> 
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">×</span>
        <h3 >Connectez-vous à MINIJOB</h3>
        <h5>Because we can <i class="fa fa-smile-o"></i></h5>
      </header>
      <div class="w3-padding">
        <!-- connexion --------->
            <form action="authen.php" method="post">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <span id="user" class="error"> </span>
                    <input type="text" class="form-control" name="email"
                    id="email" placeholder="E-mail" onblur='checkName()' required/>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <span id="psword" class="error"> </span>
                    <input type="password" class="form-control" name="password"
                    id="password" placeholder="Mot de passe" onblur='checkPassword()' required/>
                </div>
                <input type="submit" class="button button-glow button-border button-rounded button-primary" value="Connexion"  />
                <br/>
            </form>
        
        </div>
      <footer class="w3-container w3-white">
        <p class="text-success" ><a href="SignUp.html">>>Pas encore membre ? Inscrivez-vous !</a></p>
      </footer>
    </div>
</div>
