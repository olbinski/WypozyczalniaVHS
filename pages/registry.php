<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <title> formularz rejestracyjny</title>

</head>

<body>

    <?php

    if (!isset($_POST["form_submitted"])) :
    ?>


        <form action="" method="post" autocomplete="on">

            <table>
                <tr>
                    <td>
                        Imię
                    </td>
                    <td>
                        <input type="text" name="name" autofocus ><br />
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
    ?>


        Tu trzeba dorobic zapis do bazy danych :)

        dsa
    <?php


    endif;
    ?>

</body>

</html>