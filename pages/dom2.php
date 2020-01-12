<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title> dom</title>

    <script src="../js/dom2.js"></script>

</head>

<body onkeydown="keys(event)">
    <div id="rootdiv" style="margin-left : 20%; margin-right: 20%; text-align: justify;">

        <p id="screen-log"></p>

        <div>
            <input id="colorPicker" type="color">
            <button id="button1" onClick='changeColor("background")'> Zmień kolor tła</button>
            <button onClick='changeColor("color")'> Zmień kolor tekstu</button>


            <select id="textSelect" onChange="changeTextFont(this.value)">
                <option value="Times New Roman">Times </option>
                <option value="Calibri"> Calibri</option>
            </select>
        </div>



        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id elit ante. Etiam malesuada sagittis
            interdum. Aliquam maximus felis vitae lectus pretium, vel volutpat mi malesuada. Cras vitae dictum metus,
            eget laoreet risus. Donec scelerisque neque suscipit condimentum dignissim. Nunc mollis felis hendrerit leo
            congue mollis. Nunc gravida gravida elit, nec porttitor metus accumsan ut. Aenean tincidunt massa ut nisl
            blandit vulputate.

            Morbi nec odio sit amet nibh ullamcorper placerat. Suspendisse mollis sapien tempus, rhoncus enim eu,
            sollicitudin urna. Donec aliquam ipsum eu consectetur blandit. Praesent dignissim semper eros, vel convallis
            mauris suscipit a. Praesent in leo vitae nibh finibus tristique. Aenean vel sodales arcu. Interdum et
            malesuada fames ac ante ipsum primis in faucibus. Praesent malesuada porta odio, congue viverra turpis
            volutpat sed. Vivamus nisi arcu, blandit non commodo nec, placerat non urna. Quisque ultrices maximus tellus
            non vulputate. Donec sodales auctor est, mollis efficitur turpis consequat quis.

            Ut in ipsum eget orci lobortis vestibulum eget ut lacus. Pellentesque pulvinar fringilla cursus. Proin sem
            turpis, venenatis et mattis vel, lobortis in tortor. Donec placerat, sem et pretium euismod, arcu nisi
            dictum turpis, eget ultricies tellus ipsum id lacus. Etiam sollicitudin nulla ut commodo rutrum. Cras rutrum
            interdum libero ultricies suscipit. Morbi lorem diam, lobortis quis blandit in, ultricies vitae sem. Morbi
            sed porta risus. Sed mauris lectus, facilisis quis leo eu, venenatis cursus est. Aliquam ligula risus,
            placerat id ligula eget, lacinia facilisis nisi. In sed euismod augue.

            Maecenas vel diam egestas, accumsan lorem nec, sagittis eros. Quisque a semper elit. Pellentesque felis
            nulla, sagittis luctus nunc sed, dapibus dapibus ipsum. Pellentesque sagittis ipsum non tortor efficitur
            accumsan. Proin auctor nisi ligula, in pharetra purus bibendum quis. Nulla pellentesque volutpat risus,
            vitae euismod velit malesuada vel. In vel pretium velit. Quisque lacinia ante non metus dictum, sit amet
            tempus metus cursus. Sed quis venenatis ante. Maecenas molestie odio sit amet nisl pellentesque ornare. Nam
            a tempus lacus. Nulla facilisi. Nulla eget venenatis libero, eu rutrum velit. Vestibulum varius convallis
            ipsum vel elementum. Vestibulum ullamcorper euismod ipsum, eget tincidunt nulla dignissim nec. Vivamus id
            ligula porttitor, elementum quam ac, ornare orci.

            Vivamus a mauris venenatis, facilisis tellus eu, malesuada nisl. Class aptent taciti sociosqu ad litora
            torquent per conubia nostra, per inceptos himenaeos. Pellentesque non diam dictum, sagittis urna id, egestas
            ex. Proin convallis enim at leo porttitor, vitae porta leo tincidunt. Ut dapibus gravida neque non interdum.
            Pellentesque imperdiet semper ligula, eget sollicitudin magna ornare a. Suspendisse potenti. Proin finibus,
            velit id pretium semper, arcu arcu aliquam sem, ut blandit risus nunc vitae justo.
        </p>

    </div>
    <script>
        document.getElementById("colorPicker").value = "#1234aa"
    </script>


    <!-- <script src="../js/dom4.js"></script> -->
    <?php

    if (isset($_COOKIE["background"])) {
        echo "<script> 
document.getElementById('rootdiv').style['background'] = '#{$_COOKIE['background']}'
</script>";
    }

    if (isset($_COOKIE["color"])) {
        echo "<script> 
    document.getElementById('rootdiv').style['color'] = '#{$_COOKIE['color']}'
    </script>";
    }

    if (isset($_COOKIE["fontFamily"])) {
        echo "<script> 
        document.getElementById('rootdiv').style['fontFamily'] = '{$_COOKIE['fontFamily']}'
        document.getElementById('textSelect').value= '{$_COOKIE['fontFamily']}'

        

    </script>";
    }


    ?>
</body>

</html>