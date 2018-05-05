<?php
session_start();

include "classes.php";

$conn = PDOConnect::getPDOInstance();

// SUBMIT RATING
if (isset($_POST['submit'])){

    $personID = $_SESSION['u_id'];
    $PageID = $_POST['pageID'];
    $rating = $_POST['rating'];

    $pageName = $_POST['pageNameID'];

    //NEW USER RATING
    //$query = $conn->prepare("INSERT INTO ratingscore (personID, PageID, rating)");

    //UPDATE USER RATING
    $query = $conn->prepare("UPDATE ratingscore SET ratingscore.rating = :rating WHERE personID = :personID AND PageID = :PageID");

    $query->bindParam(':personID', $personID);
    $query->bindParam(':PageID', $PageID);
    $query->bindParam(':rating', $rating);

    $query->execute();
    header("Location: pornSite.php?site=$pageName");

}

