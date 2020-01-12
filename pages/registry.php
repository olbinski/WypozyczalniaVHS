<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <title>Formularz rejestracyjny</title>

</head>

<body>

    <?php

    if (!isset($_POST["form_submitted"])) :
    ?>
        <h2>Formularz rejestracyjny</h2>
        <form action="" method="post" autocomplete="on">
            <table>
                <tr>
                    <td>
                        Imię
                    </td>
                    <td>
                        <input type="text" name="name" autofocus><br />
                    </td>
                </tr>
                <tr>
                    <td>
                        Nazwisko
                    </td>
                    <td>
                        <input type="text" name="surname" required><br />
                    </td>
                </tr>
                <tr>
                    <td>
                        Miesiąc urodzin
                    </td>
                    <td>
                        <input list="month" name="birthmonth"><br />
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
                        <input type="tel" name="phone" pattern="[0-9]{9}"><br />
                    </td>
                </tr>
                <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        <input type="email" name="email" required> <br />
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
        </form>

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
        $user["password"] = sha1($_POST["name"]);


        
        $query = "" .
        sprintf("INSERT INTO `users` (`id`, `name`, `last_name`, `birth_month`, `phone`, `email`, `password`)
         VALUES (NULL, '%s', '%s', '%s', '%s', '%s', '%s')",$user["name"],$user["surname"],$user["birthmonth"],$user["phone"],$user["email"],$user["password"] );

        
        echo $query;
        if (mysqli_query($conn, $query)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
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