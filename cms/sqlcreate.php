<?php

include "../config.php";
if (isset($_POST['createsubmitevent'])) {
    if ($_GET['action'] == "event") {
        $activiteit = $_POST['activiteit'];
        $city = $_POST['city'];
        $school = $_POST['school'];
        $href = $_POST['href'];
        $dag = $_POST['dag'];
        $maand = $_POST['maand'];
        $jaar = $_POST['jaar'];
        $tijd = $_POST['tijd'];

        if ($maand == "januari") {
            $md = "01";
        }
        if ($maand == "februari") {
            $md = "02";
        }
        if ($maand == "maart") {
            $md = "03";
        }
        if ($maand == "april") {
            $md = "04";
        }
        if ($maand == "mei") {
            $md = "05";
        }
        if ($maand == "juni") {
            $md = "06";
        }
        if ($maand == "juli") {
            $md = "07";
        }
        if ($maand == "augustus") {
            $md = "08";
        }
        if ($maand == "september") {
            $md = "09";
        }
        if ($maand == "oktober") {
            $md = "10";
        }
        if ($maand == "november") {
            $md = "11";
        }
        if ($maand == "december") {
            $md = "12";
        }

        $datum = $jaar . '-' . $md . '-' . $dag;

        $sql = "INSERT INTO events (name, city, school, href, dag, maand, jaar, tijd, date)
    VALUES ('" . $activiteit . "', '" . $city . "', '" . $school . "','" . $href . "','" . $dag . "','" . $maand . "','" . $jaar . "','" . $tijd . "','" . $datum . "')";

        $pdo->exec($sql);

        header('Location:index.php?action=evenementen');
    }
    if ($_GET['action'] == "activiteit") {

        $activiteit = $_POST['activiteit'];

        $sql = "INSERT INTO eventfilter (eventfilter)
    VALUES ('" . $activiteit . "')";

        $pdo->exec($sql);

        header('Location:index.php?action=activiteiten');
    }
    if ($_GET['action'] == "school") {

        $schoolfilter = $_POST['school'];

        $sql = "INSERT INTO schoolfilter (schoolfilter)
    VALUES ('" . $schoolfilter . "')";

        $pdo->exec($sql);

        header('Location:index.php?action=scholen');
    }
    if ($_GET['action'] == "city") {

        $cityfilter = $_POST['city'];

        $sql = "INSERT INTO cityfilter (cityfilter)
    VALUES ('" . $cityfilter . "')";

        $pdo->exec($sql);

        header('Location:index.php?action=steden');
    }
}