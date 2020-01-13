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

        <?php if(!isset($_SESSION['logged_in']) || empty($_SESSION['logged_in'])) : ?>
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
                        <input type="text" name="surname" required value=<?php echo $user["surname"] ?>><br />
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
                        <input type="tel" name="phone" pattern="[0-9]{9}" value=<?php echo $user["phone"] ?>><br />
                    </td>
                </tr>
                <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        <input type="email" name="email" required value=<?php echo $user["email"] ?>> <br />
                    </td>
                </tr>
                <tr>
                    <td>
                        Login
                    </td>
                    <td>
                        <input type="text" name="login" required value=<?php echo $user["login"] ?>> <br />
                    </td>
                </tr>
                <tr>
                    <td>
                        Hasło
                    </td>
                    <td>
                        <input type="password" name="password" required><br />
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



        ?> <button type="button" onclick="window.location.href='../index.php'">Powrót do strony głównej</button> <?php

        // echo $query;
        if (mysqli_query($conn, $query)) {
            if(!isset($_SESSION['logged_in']) || empty($_SESSION['logged_in'])) {            
                promptMessage("Nowy użytkownik został dodany");
            } else {
                promptMessage("Dane zostały zaktualizowane");
                // echo $query;
            }
        } else {
            echo "Błąd: " . $query . "<br>" . mysqli_error($conn);
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