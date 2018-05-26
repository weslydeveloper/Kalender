<?php

include "../config.php";
if (isset($_POST['updatesubmitevent'])) {



    $activiteit = $_POST['activiteit'];
    $city = $_POST['city'];
    $school = $_POST['school'];
    $href = $_POST['href'];
    $dag = $_POST['dag'];
    $maand = $_POST['maand'];
    $jaar = $_POST['jaar'];
    $tijd = $_POST['tijd'];
    $datum = $_POST['date'];


    $sql = "UPDATE events SET name='".$activiteit."', city='".$city."', school='".$school."', href='".$href."', dag='".$dag."', maand='".$maand."', jaar='".$jaar."', tijd='".$tijd."', date='".$datum."' WHERE id=" . $_GET['id'];

    $stmt = $pdo->prepare($sql);


    $stmt->execute();

    header('Location:index.php?action=evenementen');



}
