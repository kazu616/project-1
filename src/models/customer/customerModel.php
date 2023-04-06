<?php

function index()
{
  $array = [];
  include_once 'connect/openDB.php';
  $sqlGenres = "SELECT * FROM genres LIMIT 5";
  $genres = mysqli_query($connect, $sqlGenres);
  $array['genres'] = $genres;
  include_once 'connect/closeDB.php';
  return $array;
}

switch ($action) {
  case '': {
      $array = index();
    }
    break;
}
