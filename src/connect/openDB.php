<?php
$connect = mysqli_connect("localhost", "root", "", "book_store");
if ($connect == false) {
    die("ERROR: COULD NOT CONNECT." . mysqli_connect_error());
}
