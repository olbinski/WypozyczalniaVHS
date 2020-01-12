<?php 
session_start();
$uzytkownicy = [
    array('login' => 'user1', 'haslo' => sha1('ppp')),
    array('login' => 'user2', 'haslo' => sha1('ddd')),
    array('login' => 'user3', 'haslo' => sha1('fff'))
    ];
    $msg = '';
function login(){
    global $uzytkownicy;
    global $msg;

        if(!isset($_SESSION['logged_in']) || empty($_SESSION['logged_in'])){
            if(isset($_POST['submit'])){
                if((!isset($_POST['login']) || empty($_POST['login'])) || (!isset($_POST['password']) || empty($_POST['password']))) {
                    $msg = "Błąd logowania: Puste dane.";  
                        promptMessage($msg);
                    return false;
                }
                foreach($uzytkownicy as $user){
                    if($user['login'] === $_POST['login'] && $user['haslo'] === sha1($_POST['password'])){
                        $msg = "Witaj, {$user['login']}";
                        $_SESSION['logged_in'] = true;
                        $_SESSION['login'] = $user['login'];
                        promptMessage($msg);
                    return true;
                    }
                }
                $msg = "Błąd logowania: Nieprawidlowe dane";
                promptMessage($msg);
                return false;
            }
        }  elseif(isset($_POST['logout'])){
            $_SESSION['logged_in'] = false;
            $_SESSION['login'] = '';
            $msg = "Wylogowano!";
            promptMessage($msg);
            return false;
        }

        return false;
    }
    // login();

    function promptMessage($message){
        echo"
            <script>
                alert('{$message}');
            </script>
        

        ";
    }
?>
