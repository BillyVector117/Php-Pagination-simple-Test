<?php
require './functions.php';
$connection = connection('databasethree', 'root', '');

// If URL-params is set, take the page number, else store page 1 (default)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$paginationRange = 5; // Number of documents to store
$init = ($page > 1) ? ($page * $paginationRange - $paginationRange) : 0;

// Found and extract documents from 'articles' table calculating Num. rows and set a limit
$articles = $connection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articles LIMIT $init, $paginationRange"); // LIMIT (0,5), (5,10), etc.
$articles->execute();
$articles = $articles->fetchAll(); // To get all documents (Array)
// print_r(($articles)); // Store founded articles (prepared query in array form)

// If no documyents in database, redirect to Home page
if (!$articles) {
    header('location: index.php');
}

// Capture total rows as 'total'
$totalArticles = $connection->query('SELECT FOUND_ROWS() as total');
$totalArticles = $totalArticles->fetch()['total']; // Only fetch() because returns a result (int)
// echo "Total articles: " . $totalArticles;

// Calculate paginations number ( round-up the result in case (1,2,3,4 documents) )
$paginationNumber = ceil($totalArticles / $paginationRange);
// echo "Total paginations number: " . $paginationNumber;
require 'index.view.php';
