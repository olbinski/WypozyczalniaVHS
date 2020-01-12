<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="News">
    <meta name="keywords" content="news,VHS">

    <title>Aktualności</title>

    <link rel="stylesheet" href="/css/main.css" />
    <link rel="stylesheet" href="/css/menu.css" />
</head>

<body>
<?php include '../components/login.php';
  
  login();

if( isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])):
  
  include '../components/user_info.php';
else:
include '../components/login_form.php';
return;
endif;
  ?>

        <nav>
                <ul>
                    <li><a href="#">Kat 1</a>
                        <ul>
                            <li><a href="#">Pod kat 1</a>
                                <ul>
                                    <li><a href="#">PodPod kat 1 1</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Pod kat 1.1</a>
                                <ul>
                                    <li><a href="#">PodPod kat 1 1</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Kat 2</a>
                        <ul>
                            <li><a href="#">Pod kat 2</a>
                                <ul>
                                    <li><a href="#">PodPod kat 2 2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Kat 3</a>
                        <ul>
                            <li><a href="#">Pod kat 3 3</a>
                                <ul>
                                    <li><a href="#">PodPod kat 3 3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

    <section>
        <h1>Aktualności</h1>
        <p>Zamieszczamy tutaj najświeższe aktualności odnośnie działania naszej wypożyczalni kaset VHS</p>

        <article>
            <h2>Dobra nowina</h2>
            <p>Dzisiaj do naszej wypożyczalnie trafiły <mark>nowe kasety</mark>.</p>
            <aside>Już teraz możesz wypożyczyć hity lat 90: Myszkę Miki i Kubusia Puchatka.</aside>
            <p>Zapraszamy!</p>
            <footer>
                <p>
                    Zamieszczony
                    <time datetime="2019-11-26 19:00">26 listopada</time>
                    przez Franka.
                </p>
            </footer>
        </article>

        <article>
            <h2>Ulubione filmy</h2>
            <p>W ramach Światowego Dnia Filmu przeprowadziliśmy ankietę wśród naszych klientów.</p>
            <p id="poll_title"><strong>Ulubione gatunki filmów naszych klientów:</strong></p>
            <ol>
                <li><meter value="0.42">42%</meter> Dramat<br /></li>
                <li><meter value="3" min="0" max="10">3 out of 10</meter> Komedia<br /></li>
                <li><meter value="0.28">28%</meter> Historyczny<br /></li>
            </ol>
            <footer>
                <p>
                    Zamieszczony
                    <time datetime="2019-12-06 13:00">6 grudnia</time>
                    przez Daniela.
                </p>
            </footer>
        </article>

        <article>
            <h2 class="important">Święta</h2>
            <p>Informujemy, że w związku z nadchodzącymi świętami nasza wypożyczalnia będzie czynna w specjalnych
                godzinach.</p>
            <details>
                <summary>Godziny otwarcia wypożyczalni podczas świąt</summary>
                <p> 22 grudnia - 10:00-14:00</p>
                <p> 23 grudnia - 8:00-20:00</p>
                <p> 24 grudnia - 8:00-13:00</p>
                <p> 25 grudnia - nieczynne</p>
                <p> 26 grudnia - 16:00-20:00</p>
            </details>
            <footer>
                <p>
                    Zamieszczony
                    <time datetime="2019-12-14 15:00">14 grudnia</time>
                    przez Agatę.
                </p>
            </footer>
        </article>


        <article>
            <h2 class="important">Upomnienie</h2>
            <p>Przypominamy, że wszystkie osoby zalegające z oddaniem kaset więcej niż miesiąc zobowiązane są je zwrócić
                do końca roku.</p>
            <footer>
                <p>
                    Zamieszczony
                    <time datetime="2019-12-27 13:00">27 grudnia</time>
                    przez Paulinę.
                </p>
            </footer>
        </article>

    </section>

    <section class="border">
        <h1>Kontakt</h1>
        <p>Możesz się z nami skontaktować poprzez numer telefonu: 123456789</p>


        <div>
            <table class="plain">
                <tr>
                    <th>Osoba</th>
                    <th>Dni w pracy</th>
                    <th>Numer telefonu</th>
                </tr>
                <tr>
                    <td>Paulina</td>
                    <td>poniedziałek</td>
                    <td>123456789</td>
                </tr>
                <tr>
                    <td>Agata</td>
                    <td>wtorek, środa</td>
                    <td>145859685</td>
                </tr>
                <tr>
                    <td>Franek</td>
                    <td>czwartek</td>
                    <td>859652658</td>
                </tr>
                <tr>
                    <td>Daniel</td>
                    <td>piątek, sobota</td>
                    <td>745852365</td>
                </tr>
            </table>
        </div>
    </section>

</body>

</html>