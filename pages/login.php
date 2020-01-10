<?php 
session_start();
$uzytkownicy = [
    array('login' => 'user1', 'haslo' => sha1('ppp')),
    array('login' => 'user2', 'haslo' => sha1('ddd')),
    array('login' => 'user3', 'haslo' => sha1('fff'))
    ];
    $msg = '';
function l(){
    global $uzytkownicy;
    global $msg;

        if(!isset($_SESSION['logged_in']) || empty($_SESSION['logged_in'])){
            if(isset($_POST['submit'])){
                if((!isset($_POST['login']) || empty($_POST['login'])) || (!isset($_POST['password']) || empty($_POST['password']))) {
                    $msg = "Błąd logowania: Puste dane.";      
                    // return false;
                }
                foreach($uzytkownicy as $user){
                    if($user['login'] === $_POST['login'] && $user['haslo'] === sha1($_POST['password'])){
                        $msg = "Witaj, {$user['login']}";
                        $_SESSION['logged_in'] = true;
                        $_SESSION['login'] = $user['login'];
                    return;
                    }
                }
                $msg = "Błąd logowania: Nieprawidlowe dane";
                // return false;
            }
        }  elseif(isset($_POST['logout'])){
            $_SESSION['logged_in'] = false;
            $_SESSION['login'] = '';
            $msg = "Wylogowano!";
            // return false;
        }
    }
    l();
    echo("<h2>{$msg}</h2>");
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && isset($_SESSION['login'])):
        echo( "Witaj, ".$_SESSION['login']);
        echo ('<form action="" method="POST"><button type="submit" name="logout">Wyloguj</button></form>');
    else:  ?>
    <form action="" method="POST">
    <input type="text" name="login" placeholder="Login"><input type="password" name="password" placeholder="Hasło">
    <button type="submit" name="submit">Zaloguj</button>
    </form>
<?php endif;?>
