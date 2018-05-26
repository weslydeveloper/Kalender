<?php

include "../config.php";

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <title>Kalender</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>
<div class="selfwrapper">
    <div class="header">
        <p class="item"><a href="index.php?action=evenementen">Evenementen</a></p>
        <p class="item"><a href="index.php?action=activiteiten">Activiteiten</a></p>
        <p class="item"><a href="index.php?action=scholen">Scholen</a></p>
        <p class="item"><a href="index.php?action=steden">Steden</a></p>
        <p class="item" style="float: right; padding-right: 20px;"><a href="logout.php">Logout</a></p>
    </div>

    <?php
    session_start();

    $sql = 'SELECT * FROM login';
    $query = $pdo->query($sql);
    $res = $query->fetch();

    if (isset ($_SESSION['username'])){
        if (sha1($_SESSION['username']) == $res[1] && sha1($_SESSION['password'] == $res[2])){
            if ($_GET['action'] == "event") {
                ?>
                <div class="createform">

                    <form action="sqlcreate.php?action=event" method="post">
                        <select name="activiteit">
                            <?php
                            $sql = 'SELECT * FROM eventfilter';
                            $query = $pdo->query($sql);
                            $res = $query->fetchAll();

                            foreach ($res as $value) {
                                echo '<option value="' . $value['eventfilter'] . '">' . $value['eventfilter'] . '</option>';

                            } ?>
                        </select>
                        <select name="city">
                            <?php
                            $sql = 'SELECT * FROM cityfilter';
                            $query = $pdo->query($sql);
                            $res = $query->fetchAll();

                            foreach ($res as $value) {
                                echo '<option value="' . $value['cityfilter'] . '">' . $value['cityfilter'] . '</option>';
                            }
                            ?>
                        </select>
                        <select name="school">
                            <?php
                            $sql = 'SELECT * FROM schoolfilter';
                            $query = $pdo->query($sql);
                            $res = $query->fetchAll();

                            foreach ($res as $value) {
                                echo '<option value="' . $value['schoolfilter'] . '">' . $value['schoolfilter'] . '</option>';

                            } ?>
                        </select>
                        <input type="text" name="href" placeholder="link">
                        <select name="dag">
                            <?php
                            $sql = 'SELECT * FROM dagenfilter';
                            $query = $pdo->query($sql);
                            $res = $query->fetchAll();

                            foreach ($res as $value) {
                                echo '<option value="' . $value['dagen'] . '">' . $value['dagen'] . '</option>';

                            } ?>
                        </select>
                        <select name="maand">
                            <?php
                            $sql = 'SELECT * FROM maandfilter';
                            $query = $pdo->query($sql);
                            $res = $query->fetchAll();

                            foreach ($res as $value) {
                                echo '<option value="' . $value['maandfilter'] . '">' . $value['maandfilter'] . '</option>';

                            } ?>
                        </select>
                        <select name="jaar">
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </select>
                        <input type="text" name="tijd" placeholder="20:00">
                        <input type="submit" name="createsubmitevent">
                    </form>
                </div>
                <?php
            }
            if ($_GET['action'] == "activiteit") {
                ?>
                <div class="createform">

                    <form action="sqlcreate.php?action=activiteit" method="post">
                        <input type="text" name="activiteit">
                        <input type="submit" name="createsubmitevent">
                    </form>
                </div>
                <?php
            }
            if ($_GET['action'] == "school") {
                ?>
                <div class="createform">

                    <form action="sqlcreate.php?action=school" method="post">
                        <input type="text" name="school">
                        <input type="submit" name="createsubmitevent">
                    </form>
                </div>
                <?php
            }
            if ($_GET['action'] == "city") {
                ?>
                <div class="createform">

                    <form action="sqlcreate.php?action=city" method="post">
                        <input type="text" name="city">
                        <input type="submit" name="createsubmitevent">
                    </form>
                </div>
                <?php
            }
        }
    }

    ?>
</div>
</body>
</html>