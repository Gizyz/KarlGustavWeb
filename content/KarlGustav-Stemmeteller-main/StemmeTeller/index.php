<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stemmeTeller.css">
    <title>StemmeTeller</title>
</head>

<body>
    <h1>Stemme teller</h1>
    <div>
        <?php
        //Opprette kobling
        $kobling = new mysqli('localhost', 'root', '', 'partistemmer');
        
        //sjekk om kobling virker
        if($kobling->connect_error) {
            die("Noe gikk galt: " . $kobling->connect_error);
        }

        //Angi UTF-8 som tegnsett
        $kobling->set_charset("utf8");
        $sql = "SELECT * FROM votes";
        $resultat = $kobling->query($sql);
        
        echo '<div>';
        //Skriver ut innholdet i tabellen
        while($rad = $resultat->fetch_assoc()) {

            //lager variabler medresultatet fra spørringen
            $parti = $rad["parti"];
            $stemmer = $rad["stemmer"];

            
            //Skriver ut innholdet i variablene

            echo '<tr>';
            echo '<td><p>'.$parti .': '.'</td>';
                 
            echo '<td>'. $stemmer .'</p></td>';
            echo "<tr>";
        }
        echo '</div>';
    ?>
    </div>
    //lager end form som sender til DBSend siden
    <form id="parti_valg_form" name="parti_valg" method="post" action="DBSend.php">

        <label for="parti_valg">Velg parti:</label>
        <select name="parti_valg" id="parti_valg">
            <option></option>
            <option value="0">Ap</option>
            <option value="1">H</option>
            <option value="2">FrP</option>
            <option value="3">Sp</option>
            <option value="4">SV</option>
            <option value="5">V</option>
            <option value="6">KrF</option>
            <option value="7">MDG</option>
            <option value="8">R</option>
        </select>
        <input type="submit" onsubmit="setTimeout(function () { window.location.reload(); }, 1)" id="reg">Registrer
        stemme</input>
    </form>
    <h4>Laget av Karl-Gustav</h4>
</body>

</html>