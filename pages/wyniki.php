<html>

<head>
    <title>Registration Form</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link rel="stylesheet" href="../css/formularz.css" />
</head>

<body>
    <di class="container">
   

        <?php 
        define("amount", 6);
    
        $dane;
            $error = false;
            if (isset($_POST['firstName'])){
                $name = $_POST['firstName'];
            }
            else{
                echo '<p>Nie podałeś imienia</p>';
                $error = true;
            }

            if(isset($_POST["phoneNumber"])){
                $phoneNumber = $_POST["phoneNumber"];
            }else{
                echo '<p>Nie podałeś numeru telefonu</p>';
                $error = true;
            }

            if(isset($_POST["email"])){
                $email = $_POST["email"];
                $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
                if(preg_match($pattern,$email) != 1){
                    echo '<p>Taki mail nie istnieje</p>';
                    $error = true;
                }
            }else{
                echo '<p>Nie podałeś email</p>';
                $error = true;
            }

            if(isset($_POST["birthDate"])){
                $birthDate = $_POST["birthDate"];
                $birthDate = new DateTime($birthDate); // cast string to date
                $interval =  date_diff( $birthDate, new DateTime(),true)->format('%R%a'); 
                $interval = ((int)$interval); //cast string to int

            if($interval < 365 * 18){
                echo '<p>Nie masz ukończonych 18 lat</p>';
            }

            }else{
                echo '<p> Nie podałeś daty urodzenia</p>';
                $error = true;
            }

            if(isset($_POST["gender"])){
                $gender = $_POST["gender"];
            }else{
                echo '<p>Nie podałeś płci</p>';
                $error = true;
            }

            if(isset($_POST["numbers"])){
                $numbers = $_POST["numbers"];

                if (count($numbers) != constant("amount")){
                    echo '<p>Nie wybrałeś 6 liczb</p>';
                    $error = true;
                }

            }else{
                echo '<p>Nie wybrałeś liczb</p>';
                $error = true;
            }

        ?>
     <?php if (isset($_POST['form_submitted']) && !$error): ?>

    
        <?php
        $drawn = [];
        while(count($drawn) < 6){
            $num = rand(1,49);
            if(!in_array($num, $drawn) ){
             $drawn[] = $num;
            }
        }

        $score = 0;
        foreach($numbers as $value){
            $score += in_array($value, $drawn);
        }
        sort($drawn);
        sort($numbers);
        // echo implode(" ", $drawn);
        echo "Wylosowane liczby ";
        echo current($drawn) . " ";
        for($i = 1 , $cnt = count($drawn); $i < $cnt; $i++  ){
            echo next($drawn) . " ";
        }
        reset($drawn);
        echo nl2br("\r\n");
        echo "Twoje liczby: ";
        echo implode(" ", $numbers);
        echo nl2br("\r\n");

        // https://www.php.net/manual/en/language.operators.precedence.php
        ?>

        <p> losowanie </p>
        <?php echo"<p>Umiem napisać \" :) </p>" ; 
        echo gettype($gender);
        echo strcasecmp($gender, "K") == 0;
        echo $gender == "K";


        $output = [];
        $output["title"] = $gender == "K" ? "Pani" : "Pan";
        $output["name"] = $name;
        $output["email"] = $email;
        $output["number"] = $phoneNumber;
        $output["score"] = $score;
        
        
        echo "<h1> Trafiłeś ". end($output) ." </h1>";


        echo "<h3>" . reset($output) ." ". next($output) . " trafił " . end($output) . "<h3>";
        echo "<h3> Nagroda zostanie wysłana na" . $output["email"] . " oraz " . $output["number"] . "</h3>";
        echo "<h3> Wygrana nastąpiła na komputerze o ip " . $_SERVER['REMOTE_ADDR'] . "</h3>";

        // print_r($_SERVER);

?>








    <?php else : ?>
        <p>Próbujesz oszukać. Aby zagrać w lotto, wejdź w <a href ="/laboratorium/pages/formularz.php">link</a></p>
    <?php endif; ?>

    



    </di>
</body>

</html>