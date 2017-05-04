 <form>
     //Bouton pour lancer le jeu
     <input type="submit" value="Start the fucking game!" name="gamelcher">

     <?php
        if(<input type="submit" value="envoyer" name="gamelcher"/>){ //Détecte quand on appuye sur submit
            $GameState=1;
        }
     </?>
            <form action="index.php"></form>//là j'ai un peu de mal a voir où je dois la cassé cette ligne(toute à la fin,avant ou après chaque bouttons, dans mon cul...)

     //Boutton pour refresh
     <input type="submit" value="refresh">

     <?php
        if(<input type="submit" value="refresh" name="gamerestart"/>){ //Détecte quand on appuye sur submit
            $GameState=0;
        }
     </?>

</form>
