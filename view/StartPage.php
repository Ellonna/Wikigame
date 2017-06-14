<form action='functions/redirect.php' method="get">
    <input type="hidden" value="start" name="RedirPage">
    Peudo :
    <input type="text" value="Pedro" name="Pseudo">
    </br>
    Nombre de liens séparant les deux pages :
    <select name="clickmax">
        <option value="0">Jouer sans l'option</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
    </select>
    </br>
    <input type="submit" value="Play">
</form>
<form action="functions/redirect.php" method="get">
    <input type="hidden" value="refresh" name="RedirPage">
    <input type="submit" value="Refresh">
</form>
