<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="0.1; URL=index.php" />
    <title>Document</title>

</head>

<body>
    <h1>Stemme sendt!</h1>
    <?php
        //Opprette kobling
        $kobling = new mysqli('localhost', 'root', '', 'partistemmer');
        
        //sjekk om kobling virker
        if($kobling->connect_error) {
            die("Noe gikk galt: " . $kobling->connect_error);
        }

        //Angi UTF-8 som tegnsett
        $kobling->set_charset("utf8");

        if(NULL!==($_POST["parti_valg"]) && $_POST['parti_valg']!=''){



            $parti_valg = $_POST["parti_valg"];
            //Opdaterer votes databasen, og gir en stemme til valgte partiID
            $sql = "UPDATE votes 
                    SET 
                        stemmer = stemmer + 1
                    WHERE
                        partiID = $parti_valg";
                    
            if ($kobling->query($sql)) {
                echo "      Spørringen $sql ble gjennomført. ";
            }else{
                echo "Noe gikk galt med spørringen $sql ($kobling->error).";
                echo $stemmer;
            }
        }
    ?>
</body>

</html>