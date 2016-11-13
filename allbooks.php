<h3>Alle Bücher</h3>

<?php
$db =new PDO("mysql:host=localhost;dbname=ws16","root","root");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $sth = $db->query("select * from books");

        echo "<table border = 1 cellspacing = 0>";

        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {

            echo "<tr><td>" . $row['title'] . "</td><td> " . $row['author'] . "</td></tr>";

        }
        echo "</table>";

    } catch(PDOException $e){
        echo "Fehler:" . $e->getMessage();
    }

?>

