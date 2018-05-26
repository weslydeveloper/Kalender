<?php

include "../config.php";
if ($_GET['action'] == "event") {
    $sql = "DELETE FROM events WHERE id= " . $_GET['id'];
    $pdo->exec($sql);
    header('Location: index.php?action=evenementen');
}

if ($_GET['action'] == "activiteit") {
    $sql = "DELETE FROM eventfilter WHERE id= " . $_GET['id'];
    $pdo->exec($sql);
    header('Location: index.php?action=activiteiten');
}

if ($_GET['action'] == "school") {
    $sql = "DELETE FROM schoolfilter WHERE id= " . $_GET['id'];
    $pdo->exec($sql);
    header('Location: index.php?action=scholen');
}

if ($_GET['action'] == "city") {
    $sql = "DELETE FROM cityfilter WHERE id= " . $_GET['id'];
    $pdo->exec($sql);
    header('Location: index.php?action=steden');
}