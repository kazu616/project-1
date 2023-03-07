<?php
$connect = mysqli_connect("localhost", "root", "", "store_test");
if ($connect == false) {
    die("ERROR: COULD NOT CONNECT." . mysqli_connect_error());
}
