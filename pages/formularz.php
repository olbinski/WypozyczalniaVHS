<html>

<head>
    <title>Registration Form</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link rel="stylesheet" href="../css/formularz.css" />
</head>

<body>
    <di class="container">
        <form class="form" action="/laboratorium/pages/wyniki.php" method="POST">
            <h1>LOTTO</h1>
            <table class="inputs">
                <tr>
                    <td>Imię</td>
                    <td><input type="text" name="firstName"></td>
                </tr>
                <!-- <tr>
                    <td>Nazwisko</td>
                    <td><input type="text" name="lastname"></td>
                </tr> -->
                <tr>
                    <td>Telefon</td>
                    <td><input type="text" name="phoneNumber"></td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td>Rok urodzenia</td>
                    <td><input type="date" name="birthDate"></td>
                </tr>
                <tr>
                    <td>Płeć</td>
                    <td><input type="radio" name="gender" value="K">K
                        <input type="radio" name="gender" value="M">M</td>
                </tr>

            </table>

            <br />
            <br />
            <table class="numbers">
                <?php for ($i = 0; $i <= 4; $i++) { ?>
                    <tr>
                        <?php for ($j = 1; $j <= 10; $j++) { ?>
                            <td>
                                <?php if ($i * 10 + $j != 50) : ?>
                                    <?php echo $i * 10 + $j; ?> <input type="checkbox" name="numbers[]" value="<?php echo $i * 10 + $j ?>">
                                <?php endif; ?>
                            </td>

                        <?php } ?>
                    </tr>
                <?php } ?> 
            <table>


            <br/>
            <br/>

            <input type="hidden" name="form_submitted" value="1" />
            <input type="reset">
            <input type="submit">
        </form>

    </di>
</body>

</html>