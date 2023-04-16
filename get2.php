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

    $category_id = $_GET['category'];

    try {
        $sqlSelect = "SELECT items.name, items.price, vendors.v_name 
                    FROM items
                    JOIN vendors ON items.FID_Vendor = vendors.ID_Vendors
                    WHERE items.FID_Category = ?";

        $stmt = $dbh->prepare($sqlSelect);

        $stmt->bindValue(1, $category_id);
        $stmt->execute();
        $res = $stmt->fetchAll();

        echo "<table border='1'>";
        echo "<thead><tr><th>Название товара</th><th>Цена</th><th>Производитель</th></tr></thead>";
        echo "<tbody>";

        foreach($res as $row)
        {
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
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