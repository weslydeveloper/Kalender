<?php

include "config.php";

$select = 'SELECT *';
$from = ' FROM events';
$wherecity= ' WHERE ';
$whereschool = ' AND ';
$whereevent = ' AND ';
$wheremaand = ' AND ';
$options = isset($_POST['filterOptions'])? $_POST['filterOptions'] : array('');

$sql = 'SELECT * FROM schoolfilter';
$query = $pdo->query($sql);
$res = $query->fetchAll();

if (in_array("allschools", $options)){
    $whereschool .= ' TRUE ';
}

foreach ($res as $value){
    if (in_array($value['schoolfilter'], $options)){
        $whereschool .= ' school = "'.$value['schoolfilter'].'" ';
    }
}

$sql = 'SELECT * FROM cityfilter';
$query = $pdo->query($sql);
$res = $query->fetchAll();

if (in_array("allcities", $options)){
    $wherecity .= ' TRUE ';
}

foreach ($res as $value){
    if (in_array($value['cityfilter'], $options)){
        $wherecity .= ' city = "'.$value['cityfilter'].'" ';
    }
}

$sql = 'SELECT * FROM eventfilter';
$query = $pdo->query($sql);
$res = $query->fetchAll();

if (in_array("allevents", $options)){
    $whereevent .= ' TRUE ';
}

foreach ($res as $value){
    if (in_array($value['eventfilter'], $options)){
        $whereevent .= ' name = "'.$value['eventfilter'].'" ';
    }
}

$sql = 'SELECT * FROM maandfilter';
$query = $pdo->query($sql);
$res = $query->fetchAll();

if (in_array("allmaanden", $options)){
    $wheremaand .= ' TRUE ';
}

foreach ($res as $value){
    if (in_array($value['maandfilter'], $options)){
        $wheremaand .= ' maand = "'.$value['maandfilter'].'" ';
    }
}


$sql = $select . $from . $wherecity. $whereschool . $whereevent . $wheremaand . 'AND date >= CURDATE() ORDER BY date ASC' ;
$statement = $pdo->prepare($sql);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
echo($json);

?>