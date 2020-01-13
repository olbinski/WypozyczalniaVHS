<?php

include "components/database_connection.php";

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$sql = mysqli_query($mysqli, "SELECT * FROM `users`");

// if ($result = $mysqli -> query($sql)) {
//   while ($row = $result -> fetch_row()) {
//     printf ("id %s, name %s, surname %s, birthmonth %s, phone %s, email %s, login %s \n", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
//     echo $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6];
//   }
//   $result -> free_result();
// }

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

while ($row = mysqli_fetch_array($sql)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
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
