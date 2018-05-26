<?php

include "../config.php";

if(!isset( $_GET['action'])){$_GET['action']="evenementen";}
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

    if (isset($_POST['submit'])) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
    }


    $loggedIn = false;

    $sql = 'SELECT * FROM login';
    $query = $pdo->query($sql);
    $res = $query->fetch();


    if (isset ($_SESSION['username'])){
        if (sha1($_SESSION['username']) == $res[1] && sha1($_SESSION['password'] == $res[2])){

            $loggedIn = true;

            if ($_GET['action'] == "evenementen") {
                ?>

                <div class="cmsevents">
                    <a href="create.php?action=event"><div class="create">create event</div></a>
                    <div class="update">
                        <?php
                        $sql = 'SELECT * FROM events';
                        $query = $pdo->query($sql);
                        $res = $query->fetchAll();

                        foreach ($res as $value) {
                            echo '<div class="eventitem">
                                  <form action="sqlupdate.php?id=' . $value['id'] . '" method="post">
                                    <input value="' . $value['name'] . '" name="activiteit" type="text" style="width: 140px;">
                                    <input value="' . $value['city'] . '" name="city" type="text" style="width: 90px;">
                                    <input value="' . $value['school'] . '" name="school" type="text" style="width: 130px;">
                                    <input value="' . $value['href'] . '" name="href" type="text">
                                    <input value="' . $value['dag'] . '" name="dag" type="text" style="width: 17px;">
                                    <input value="' . $value['maand'] . '" name="maand" type="text" style="width: 70px;">
                                    <input value="' . $value['jaar'] . '" name="jaar" type="text" style="width: 35px;">
                                    <input value="' . $value['tijd'] . '" name="tijd" type="text" style="width: 35px;">
                                    <input value="' . $value['date'] . '" name="date" type="text" style="width: 70px;">
                                    <a href="sqldelete.php?action=event&id=' . $value['id'] . '"><input type="button" value="delete"></a>
                                     <input type="submit" name="updatesubmitevent" value="update">
                                    </form>
                                   
                                  </div>';
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
            if ($_GET['action'] == "activiteiten") {
                ?>

                <div class="cmsevents">
                    <a href="create.php?action=activiteit"><div class="create">create activiteit filter</div></a>
                    <div class="update">
                        <?php
                        $sql = 'SELECT * FROM eventfilter';
                        $query = $pdo->query($sql);
                        $res = $query->fetchAll();

                        foreach ($res as $value) {
                            echo '<div class="eventitem">
                                    <input value="' . $value['eventfilter'] . '" name="activiteit" type="text" style="width: 140px;">
                                    <a href="sqldelete.php?action=activiteit&id=' . $value['id'] . '"><input type="button" value="delete"></a>
                                    </form>
                                   
                                  </div>';
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
            if ($_GET['action'] == "scholen") {
                ?>

                <div class="cmsevents">
                    <a href="create.php?action=school"><div class="create">create school filter</div></a>
                    <div class="update">
                        <?php
                        $sql = 'SELECT * FROM schoolfilter';
                        $query = $pdo->query($sql);
                        $res = $query->fetchAll();

                        foreach ($res as $value) {
                            echo '<div class="eventitem">
                                    <input value="' . $value['schoolfilter'] . '" name="school" type="text" style="width: 140px;">
                                    <a href="sqldelete.php?action=school&id=' . $value['id'] . '"><input type="button" value="delete"></a>
                                    </form>
                                   
                                  </div>';
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
            if ($_GET['action'] == "steden") {
                ?>

                <div class="cmsevents">
                    <a href="create.php?action=city"><div class="create">create city filter</div></a>
                    <div class="update">
                        <?php
                        $sql = 'SELECT * FROM cityfilter';
                        $query = $pdo->query($sql);
                        $res = $query->fetchAll();

                        foreach ($res as $value) {
                            echo '<div class="eventitem">
                                    <input value="' . $value['cityfilter'] . '" name="school" type="text" style="width: 140px;">
                                    <a href="sqldelete.php?action=city&id=' . $value['id'] . '"><input type="button" value="delete"></a>
                                    </form>
                                   
                                  </div>';
                        }
                        ?>
                    </div>
                </div>
                <?php
            }

        }
    }

    if ($loggedIn == false){

        echo '<div class="login">
        <form name="login" method="post">
            <input type="text" name="username" placeholder="Gebruikersnaam">
            <input type="password" name="password" placeholder="Wachtwoord">
            <input type="submit" name="submit">
        </form>
        <br>
        <form name="pin" method="post" action="WWupdate.php">
            <input type="text" name="pin" placeholder="pin">
            <input type="submit" name="wachtwoord vergeten">
        </form>
    </div>';
    }


    ?>
</div>
</body>
<script>
</script>
</html>