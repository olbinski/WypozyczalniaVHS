<form action="" method="POST">

<table>
<tr>
<th>Id</th>
<th>Name</th>
<th>Surname</th>
<th>Birthmonth</th>
<th>Phone</th>
<th>Email</th>
<th>Login</th>
</tr>

<tr>
    <td>  <input type="text" name="id" ><br /></td>
    <td>  <input type="text" name="name" ><br /></td>
    <td>  <input type="text" name="surname" ><br /></td>
    <td>  <input type="text" name="birthmonth" ><br /></td>
    <td>  <input type="text" name="phone" ><br /></td>
    <td>  <input type="text" name="email" ><br /></td>
    <td>  <input type="text" name="login" ><br /></td>
    <td>  <button type="submit"> Filtruj</button><br /></td>
</tr>
</table>
<input type="hidden" name="FORM" value="1"/>

</form>

<?php

$zmienna = "zmienna2";
${$zmienna} = "wartosc";

echo $zmienna2;

echo "<br/><br/><br/>";


include "components/database_connection.php";
$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$sql =  "SELECT * FROM `users`";


$where = "";


if(isset($_POST["id"]) && strlen($_POST["id"]) > 0){
    if(strlen($where) > 0 ){
        $where .= " AND ";
    }
    $where .= " id=" . $_POST["id"] . "";
}


if(isset($_POST["name"]) && strlen($_POST["name"]) > 0){
    if(strlen($where) > 0 ){
        $where .= " AND ";
    }
    $where .= " name like '%" . $_POST["name"] . "%'";
}


if(isset($_POST["surname"]) && strlen($_POST["surname"]) > 0){

    if(strlen($where) > 0 ){
        $where .= " AND ";
    }
    $where .= " surname='" . $_POST["surname"] . "'";
}

if(isset($_POST["birthmonth"]) && strlen($_POST["birthmonth"]) > 0){

    if(strlen($where) > 0 ){
        $where .= " AND ";
    }
    $where .= " birthmonth='" . $_POST["birthmonth"] . "'";
}
if(isset($_POST["phone"]) && strlen($_POST["phone"]) > 0){

    if(strlen($where) > 0 ){
        $where .= " AND ";
    }
    $where .= " phone='" . $_POST["phone"] . "'";
}
if(isset($_POST["email"]) && strlen($_POST["email"]) > 0){

    if(strlen($where) > 0 ){
        $where .= " AND ";
    }
    $where .= " email='" . $_POST["email"] . "'";
}

if(isset($_POST["login"]) && strlen($_POST["login"]) > 0){

    if(strlen($where) > 0 ){
        $where .= " AND ";
    }
    $where .= " login='" . $_POST["login"] . "'";
}




if(strlen($where) > 0 ){
    $sql .= " where " . $where;
}

// $sql = "Select * FROM users where name='Misia'";
$result = mysqli_query($mysqli, $sql);
 echo $sql;


echo "<table>
<tr>
<th>Id</th>
<th>Name</th>
<th>Surname</th>
<th>Birthmonth</th>
<th>Phone</th>
<th>Email</th>
<th>Login</th>
</tr>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['surname'] . "</td>";
    echo "<td>" . $row['birthmonth'] . "</td>";
    echo "<td>" . $row['phone'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['login'] . "</td>";
    echo "</tr>";
}
echo "</table>";

$mysqli->close();



// else:
?>




<?php
// endif;
?>