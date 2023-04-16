<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
		* {
			font-size: 20px;
		}
	</style>
</head>
<body>
<?php
    include('connect.php');

    $min_price = $_GET['min_price'];
    $max_price = $_GET['max_price'];

    try {
        $sqlSelect = "SELECT * FROM items WHERE price >= ? AND price <= ?";

        $stmt = $dbh->prepare($sqlSelect);

        $stmt->bindValue(1, $min_price);
        $stmt->bindValue(2, $max_price);
        $stmt->execute();
        $res = $stmt->fetchAll();

        echo "<table border='1'>";
        echo "<thead><tr><th>ID_Items</th><th>name</th><th>price</th><th>quantity</th><th>quality</th><th>FID_Vendor</th><th>FID_Category</th></tr></thead>";
        echo "<tbody>";

        foreach($res as $row)
        {
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td></tr>";
        }
        
        echo "</tbody>";
        echo "</table>";
    }
    catch(PDOException $ex) {
        echo $ex->GetMessage();
    }
    $dbh = null;
?>
</body>
</html>