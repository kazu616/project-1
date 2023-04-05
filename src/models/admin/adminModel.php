<?php
function indexCharts()
{
    $year = date("Y");
    $sql_year = "SELECT MONTH(createdDate) AS month, YEAR(createdDate) AS year, SUM(od.amount) AS total_sales, SUM(od.sold_price) AS total_prices FROM order_detail AS od INNER JOIN `order` AS o ON od.idOrder = o.idOrder WHERE YEAR(createdDate) = '$year' GROUP BY MONTH(createdDate), YEAR(createdDate)";
    include_once 'connect/openDB.php';
    $result =  mysqli_query($connect, $sql_year);

    $sql_total = "SELECT (SELECT COUNT(*) FROM authors) AS total_authors, (SELECT COUNT(*) FROM products) AS total_products, (SELECT COUNT(*) FROM genres) AS total_genres, (SELECT COUNT(*) FROM accounts) AS total_accounts";
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
