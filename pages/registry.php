<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <title>Formularz rejestracyjny</title>

</head>

<body>

    <?php
    session_start();

    if (!isset($_POST["form_submitted"])) :
        $user["name"] = "";
        $user["surname"] = "";
        $user["birthmonth"] = "";
        $user["phone"] = "";
        $user["email"] = "";
        $user["login"] = "";
        $user["password"] = "";
        $user["id"] = "";


        if (isset($_SESSION["logged_in"])) {
            include "../components/database_connection.php";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $query = "SELECT * FROM `users` WHERE `login` = '{$_SESSION['login']}'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
            }
            mysqli_close($conn);
        }

    ?>

        <?php if (!isset($_SESSION['logged_in']) || empty($_SESSION['logged_in'])) : ?>
            <h2>Formularz rejestracyjny</h2>
        <?php else : ?>
            <h2>Mój profil</h2>
        <?php endif; ?>


        <form action="" method="post">
            <table>
                <tr>
                    <td>
                        Imię
                    </td>
                    <td>
                        <input type="text" name="name" autofocus value=<?php echo $user["name"] ?>><br />
                    </td>
                </tr>
                <tr>
                    <td>
                        Nazwisko
                    </td>
                    <td>
                        <!-- <input type="text" name="surname" required value=<?php echo $user["surname"] ?>><br /> -->
                        <input type="text" name="surname" value=<?php echo $user["surname"] ?>><br />
                    </td>
                </tr>
                <tr>
                    <td>
                        Miesiąc urodzin
                    </td>
                    <td>
                        <input list="month" name="birthmonth" value=<?php echo $user["birthmonth"] ?>><br />
                        <datalist id="month">
                            <option value="styczeń">
                            <option value="luty">
                            <option value="marzec">
                            <option value="kwiecień">
                            <option value="maj">
                            <option value="czerwiec">
                            <option value="lipiec">
                            <option value="sierpień">
                            <option value="wrzesień">
                            <option value="październik">
                            <option value="listopad">
                            <option value="grudzień">
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <td>
                        Telefon
                    </td>
                    <td>
                        <!-- <input type="tel" name="phone" pattern="[0-9]{9}" value=<?php echo $user["phone"] ?>><br /> -->
                        <input type="text" name="phone" value=<?php echo $user["phone"] ?>><br />
                    </td>
                </tr>
                <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        <!-- <input type="email" name="email" required value=<?php echo $user["email"] ?>> <br /> -->
                        <input type="text" name="email" value=<?php echo $user["email"] ?>> <br />
                    </td>
                </tr>
                <tr>
                    <td>
                        Login
                    </td>
                    <td>
                        <!-- <input type="text" name="login" required value=<?php echo $user["login"] ?>> <br /> -->
                        <input type="text" name="login" value=<?php echo $user["login"] ?>> <br />
                    </td>
                </tr>
                <tr>
                    <td>
                        Hasło
                    </td>
                    <td>
                        <!-- <input type="password" name="password" required><br /> -->
                        <input type="password" name="password"><br />
                    </td>
                </tr>

            </table>

            <input type="reset" value="Wyczyść">
            <input type="submit" value="Wyślij">
            <input type="hidden" name="form_submitted" value="1" />
            <input type="hidden" name="id" value=<?php echo $user["id"] ?>>
        </form>
        <br />
        <button type="button" onclick="window.location.href='../index.php'">Powrót do strony głównej</button>

    <?php
    else :

        $error = false;

        if (!isset($_POST["surname"]) || empty($_POST["surname"]))  {
            promptMessage("Brak nazwiska");
            $error = true;
        }

        if (!isset($_POST["login"]) || empty($_POST["login"]))  {
            promptMessage("Brak login");
            $error = true;
        }

        if (!isset($_POST["password"]) || empty($_POST["password"]))  {
            promptMessage("Brak hasła");
            $error = true;
        }

        if (isset($_POST["phone"]) && !empty($_POST["phone"]))  {
            $phone = $_POST["phone"];
            $pattern = '/^[0-9]{9}$/';
            if (preg_match($pattern, $phone) != 1) {
                promptMessage("Numer telefonu jest niepoprawny");
                $error = true;
            }
        }

        if (isset($_POST["email"]) && !empty($_POST["email"])) {
            $email = $_POST["email"];
            $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
            if (preg_match($pattern, $email) != 1) {
                promptMessage("Email jest niepoprawny");
                $error = true;
            }
        }

        // if (empty($_POST["surname"]) || empty($_POST["email"]) || empty($_POST["login"]) || empty($_POST["password"])) {
        //         promptMessage("Puste pola");
        //         $error = true;
                
        // }


        if ($error) {
            ?> <button type="button" onclick="window.location.href='registry.php'">Powrót do formularza</button> <?php
            $error = false;
            die;
            promptMessage("a co tu sie stanelo");
        }

        include "../components/database_connection.php";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $user["name"] = quotemeta($_POST["name"]);
        $user["surname"] = quotemeta($_POST["surname"]);
        $user["birthmonth"] = quotemeta($_POST["birthmonth"]);
        $user["phone"] = quotemeta($_POST["phone"]);
        $user["email"] = quotemeta($_POST["email"]);
        $user["login"] = quotemeta($_POST["login"]);
        $user["password"] = sha1($_POST["password"]);
        $user["id"] = $_POST["id"];

        



        if (isset($_POST["id"]) && empty($_POST["id"])) {
            $query = "" .
                sprintf("INSERT INTO `users` (`id`, `name`, `surname`, `birthmonth`, `phone`, `email`, `login`, `password`)
             VALUES (NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $user["name"], $user["surname"], $user["birthmonth"], $user["phone"], $user["email"], $user["login"], $user["password"]);
        } else {
            $query = sprintf("UPDATE `users` SET `name` = '%s', `surname` = '%s', `birthmonth` = '%s', `phone` = '%s', `email` = '%s', `login` = '%s', `password` = '%s' 
            WHERE `users`.`id` = %d", $user["name"], $user["surname"], $user["birthmonth"], $user["phone"], $user["email"], $user["login"], $user["password"], $user["id"]);
        }



    ?> 
    <button type="button" onclick="window.location.href='../index.php'">Powrót do strony głównej</button>
    <?php

                                // echo $query;
                                if (mysqli_query($conn, $query)) {
                                    if (!isset($_SESSION['logged_in']) || empty($_SESSION['logged_in'])) {
                                        promptMessage("Nowy użytkownik został dodany");
                                    } else {
                                        promptMessage("Dane zostały zaktualizowane");
                                        // echo $query;
                                    }
                                } else {
                                    // echo "Błąd: " . $query . "<br>" . mysqli_error($conn);
                                    if (strpos(mysqli_error($conn), 'Duplicate') !== false) {
                                        promptMessage("Użytkownik o podanym loginie istnieje");
                                    }
                                    
                                    
                                }

                                // while ($row = mysqli_fetch_row($result)) {
                                //     printf("%s (%s)\n", $row[0], $row[1]);
                                // }

                                mysqli_close($conn);



                                ?>


    <?php

    endif;
    ?>

</body>

</html>



<?php
function promptMessage($message)
{
    echo "
            <script>
                alert('{$message}');
            </script>
        ";
}
?>