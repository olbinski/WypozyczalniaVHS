<?php   

include 'components/login.php';




login();

if( isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])):
  
  include 'components/user_info.php';
else:
include 'components/login_form.php';

endif;

?>
<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="VHS rental">
  <meta name="keywords" content="VHS,rental,comedy,drama,historic">

  <title>Pierwsza strona</title>

<!-- 2. Rules -->
  <style>
    a {
      color: cornflowerblue;
    }
    nav {
      background-color: mistyrose;
      font-size: 1.1em;
    }
  </style>

  <link rel="stylesheet" href="css/main.css" />
</head>

<body>
  <nav>
    <a href="pages/news.php">Aktualności</a> |
    <a href="pages/graphics.php">Kasety</a> |
    <a href="pages/top_films.php">TOP filmy</a> | 
    <a href="pages/price_list.php">Cennik</a> | 
    <a href="pages/hyperlink.html">Etykiety</a> | 
    <a href="pages/download.html">Do pobrania</a> |
    <a href="pages/form.html">Napisz do nas</a> |
    <a href="pages/poll.html">Ankieta</a> |
    <a href="pages/print.html">Print</a> |
    <a href="pages/menu.html">M E N U</a> 
  </nav>


  <h1>Wypożyczalnia kaset VHS</h1>
  <h2>U nas wypożyczysz każdą kasetę !!!</h2>

  <ul style="border: 5px solid rebeccapurple;">
    <li>
      <ins> Jesteś fanem starej technologii?</ins>
    </li>
    <li>
      <i> Tęsknisz za czasami bez Internetu? </i>
    </li>
    <li>
      <del>Boisz się, że rząd Cię namierza?</del>
    </li>
    <li>
      <b> Tylko u nas możesz tego uniknąć!</b>
    </li>
    <li>
      <mark> &frac14; <sub>2</sub> użytkowników Internetu lubi to! &trade; &#174; </mark>
    </li>
  </ul>

  <p class="intro">Działamy od poniedziałku do piątku w godzinach 10<sup>00</sup> - 18<sup>38</sup> </p>

  <a href="https://pl.wikipedia.org/wiki/Kaseta_wideo"><b>Czym jest kaseta VHS?</b></a> <br /> <br />

  <a href="pages/graphics.html">Przykładowe kasety (grafika)</a><br />
  <a href="pages/top_films.html">Najpopularniejsze filmy na VHS (listy)</a> <br />
  <a href="pages/price_list.html">Cennik (tabele)</a><br />
  <a href="pages/hyperlink.html">Etykiety (odnosniki)</a> <br />
  <a href="pages/download.html">Do pobrania (odnosniki)</a> <br>
  <a href="pages/form.html">Wyślij zapytanie (formularz)</a><br />


  <a href="https://en.wikipedia.org/wiki/Videotape"><img
      src="https://2.allegroimg.com/s512/030e36/7d8a6d8142ebbbc617a2d61e4222/PROFESJONALNY-ADAPTER-KASETA-MATKA-VHS-C-DO-VHS"
      title="Otwarta kaseta VHS" alt="Tutaj powinna być otwarta kaseta VHS" /></a> <br />
  <br />


  <section class="zad2">
    <h2>Zagadnienia:</h2>

    <ol>
      <li>W jaki sposób przebiega walidacja formularzy? Czy wszystkie dane są automatycznie walidowane? W jaki sposób
        wymusić brak walidacji?</li>
      <li>Czy typ elementu wejściowego <i>date</i> w każdej przeglądarce jest wyświetlany tak samo? Jeśli nie, to
        proszę podać, jakie są różnice.</li>
      <li>Czy atrybut <i>placeholder</i> można zastosować do wszystkich typów elementów wejściowych? Jeśli nie, proszę
        wymienić przynajmniej 3 typy.
      </li>
    </ol>

    <h3>Ad. 1</h3>
    <p>
      Dane są najpierw walidowane po stronie klienta - sprawdzane, czy ich format jest poprawny. <br />
      Następnie dane są wysyłane na serwer i tam sprawdzane, aby odrzucić niewłaściwe dane. <br />
      <a href="https://developer.mozilla.org/en-US/docs/Learn/HTML/Forms/Form_validation">O to chodzi?</a>
    </p>

    <h3>Ad. 2</h3>
    <table style="border:1px solid black">
      <caption>Element <i>date</i></caption>
      <tr>
        <th>Przeglądrka </th>
        <th>Działanie</th>
      </tr>
      <tr>
        <td>Chrome</td>
        <td>| ok</td>
      </tr>
      <tr>
        <td>Internet Explorer wersja 11</td>
        <td>| nie działa (zwykłe pola tekstowe)</td>
      </tr>
      <tr>
        <td>Edge</td>
        <td>| działa, ale dziwnie. Wyświetla się mm/dd/rrrr a wpisuje się dd.mm.rrrr. <br />
          | Wyświetla się lista dni, miesięcy i lat zamiast kalendarza miesięcznego</td>
      </tr>
      <tr>
        <td>Firefox</td>
        <td>| tak samo jak Chrome czyli ok. Okienko ma trochę inny design</td>
      </tr>
      <tr>
        <td>Safari</td>
        <td>| mam Windowsa</td>
      </tr>
      <tr>
        <td>Opera</td>
        <td>| nie mam zainstalowanej</td>
      </tr>
    </table>
    <ul>
      <li>Chrome - ok</li>
      <li>Internet Explorer wersja 11 - nie działa (zwykłe pola tekstowe)</li>
      <li>Edge - działa, ale dziwnie. Wyświetla się mm/dd/rrrr a wpisuje się dd.mm.rrrr. Wyświetla się lista dni,
        miesięcy i lat zamiast kalendarza miesięcznego</li>
      <li>Firefox - tak samo jak Chrome czyli ok. Okienko ma trochę inny design</li>
      <li>Safari - mam Windowsa</li>
      <li>Opera - nie mam zainstalowanej</li>
    </ul>

    <h3>Ad. 3</h3>
    Nope:
    <ul>
      <li>color</li>
      <li>month</li>
      <li>range</li>
      <li>radio</li>
      <li>checkbox</li>
      <li>submit</li>
      <li>reset</li>
    </ul>



  </section>


</body>

</html>