 <form>
     //Bouton pour lancer le jeu
     <input type="submit" value="Start the fucking game!" name="gamelcher">

     <?php
        if(<input type="submit" value="envoyer" name="gamelcher"/>){ //Détecte quand on appuye sur submit PLOT TWIST : NON.
            $GameState=1;
        }
     </?>
            <form action="index.php"></form>//là j'ai un peu de mal a voir où je dois la cassé cette ligne(toute à la fin,avant ou après chaque bouttons, dans mon cul...) ALORS OUI DANS TON CUL.

     //Boutton pour refresh MDR COMME Y'A AUCUNE CHANCE POUR QUE CE TRUC FONCTIONNE OMG.
     <input type="submit" value="refresh">

     <?php
        if(<input type="submit" value="refresh" name="gamerestart"/>){ //Détecte quand on appuye sur submit NON PLUS DOMMAGE.
            $GameState=0;
        }
     </?>

</form>
