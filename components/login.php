<?php
session_start();
$uzytkownicy = [
    array('login' => 'user1', 'haslo' => sha1('ppp')),
    array('login' => 'user2', 'haslo' => sha1('ddd')),
    array('login' => 'user3', 'haslo' => sha1('fff'))
];
$msg = '';
function login()
{
    global $uzytkownicy;
    global $msg;

    if (!isset($_SESSION['logged_in']) || empty($_SESSION['logged_in'])) { // jezeli nie jestes zalogowany

        if (isset($_POST['submit'])) { // jezeli kliknales zaloguj czyli wejscie przez formularz logowania

            if ((!isset($_POST['login']) || empty($_POST['login'])) || (!isset($_POST['password']) || empty($_POST['password']))) { // jezeli nie podales danych
                $msg = "Błąd logowania: Puste dane.";
                promptMessage($msg);
                return false;
            }


            include "database_connection.php";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $query = "SELECT * FROM `users` WHERE `login` = '{$_POST['login']}'";
            $result = mysqli_query($conn, $query);
            promptMessage($query);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                if ($row["password"] === sha1($_POST['password'])) {
                    $msg = "Witaj, {$row['login']}";
                    $_SESSION['logged_in'] = true;
                    $_SESSION['login'] = $row['login'];
                    promptMessage($msg);
                    return true;
                }
            } 
                $msg = "Błąd logowania: Nieprawidlowe dane";
                promptMessage($msg);
                return false;
            mysqli_close($conn);
        }
    } elseif (isset($_POST['logout'])) {
        $_SESSION['logged_in'] = false;
        $_SESSION['login'] = '';
        $msg = "Wylogowano!";
        promptMessage($msg);
        return false;
    }

    return false;
}

function promptMessage($message)
{
    echo "
            <script>
                alert('{$message}');
            </script>
        

        ";
}
