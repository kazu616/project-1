<?php
function indexCharts()
{
    include_once 'connect/openDB.php';
    $year = date("Y");
    $sql = "SELECT MONTH(createdDate) AS month, YEAR(createdDate) AS year, SUM(od.amount) AS total_sales, SUM(od.sold_price * od.amount) AS total_money
    FROM order_detail AS od
    INNER JOIN `order` AS o ON od.idOrder = o.idOrder
    WHERE YEAR(createdDate) = '$year'
    GROUP BY MONTH(createdDate), YEAR(createdDate)
    ";
    $result = mysqli_query($connect, $sql);

    $sql_total = "SELECT 
    (SELECT COUNT(*) FROM authors) AS total_authors, 
    (SELECT COUNT(*) FROM products) AS total_products, 
    (SELECT COUNT(*) FROM genres) AS total_genres, 
    (SELECT COUNT(*) FROM accounts) AS total_accounts, 
    (SELECT COUNT(*) FROM `order`) AS total_orders
";
    $total = mysqli_query($connect, $sql_total);
    include_once 'connect/closeDB.php';

    $data = array();
    $data['chart'] = $result;
    $data['total_attributes'] = $total;
    return $data;
}

switch ($action) {
    case '':
        $data = indexCharts();
        break;
}
