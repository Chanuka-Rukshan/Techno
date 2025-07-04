<?php

include "connection.php";

$rs = Database::search("SELECT product.id,category.cat_name,SUM(invoice.product_qty) AS sold_category FROM invoice
INNER JOIN product ON invoice.product_id = product.id
INNER JOIN category ON product.cat_id = category.cat_id
GROUP BY product.id,category.cat_name ORDER BY sold_category DESC LIMIT 5");

$num = $rs->num_rows;

$labels = array();
$data = array();

for ($i=0; $i < $num; $i++) { 
    $d = $rs->fetch_assoc();

    $labels[] = $d["cat_name"];
    $data[] = $d["sold_category"];


}

$json = array();
$json["labels"] = $labels;
$json["data"] = $data;

echo json_encode($json);
