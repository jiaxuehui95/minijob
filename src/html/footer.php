<!-- Footer -->
    <footer class="w3-container w3-padding-64 w3-opacity">
    
    <div class="w3-half w3-center">

        <!-- quote -->
        <div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
            <h1 class="w3-margin w3-xlarge">Quote of the day: live life</h1>
        </div>
        
        <!-- logo  -->
        <div class="w3-xlarge w3-padding-32">
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <i class="fa fa-instagram w3-hover-opacity"></i>
            <i class="fa fa-snapchat w3-hover-opacity"></i>
            <i class="fa fa-pinterest-p w3-hover-opacity"></i>
            <i class="fa fa-twitter w3-hover-opacity"></i>
            <i class="fa fa-linkedin w3-hover-opacity"></i>
        </div>


 <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </div>

    <!-- TODO faire une méthode de post-->
    <!-- Formulaire de contact -->

    <div class="w3-half" id="footer">
        <form class="w3-container" action="pourfooter.php" method="post" >
            <h2 class="w3-center">Formulaire de contact</h2>
            <div class="w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
                <div class="w3-rest">
                <input class="w3-input" type="text" name="nom" placeholder="Li Dinghao" required="">
                </div>
            </div>
            <div class="w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
                <div class="w3-rest">
                <input class="w3-input" type="email" name="email" placeholder="exemple@email.com" required="">
                </div>
            </div>
            <div class="w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-book"></i></div>
                <div class="w3-rest">
                <input class="w3-input" type="text" name="titre" placeholder="Titre : Contenu non conforme" required="">
                </div>
            </div>
            <div class="w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil"></i></div>
                <div class="w3-rest">
                <textarea class="w3-input" name="contenu" placeholder="Suggestions, Problèmes ..." required=""></textarea>
            </div>
            </div>
            
            <button type="submit" class="w3-button w3-left w3-section w3-red w3-ripple w3-padding">Envoyer</button>
        </form> 
    </div>
    
    
    <!-- aller tout en haut de la page -->
        <div style="position:relative;bottom:55px;" class="w3-tooltip w3-right">
            <span class="w3-text w3-theme-light w3-padding">en Haut</span>&nbsp;   
            <a class="w3-text-red" href="#myHeader"><span class="w3-xlarge">
            <i class="fa fa-chevron-circle-up"></i></span></a>
        </div>
</footer>