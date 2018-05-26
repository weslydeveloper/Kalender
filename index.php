<?php

include "config.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <title>Kalender</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    </head>
    <body>
    <div class="selfwrapper">
        <div class="header">
            <div class="logo"> </div>
            <b><p>Welkom op de <a>MBO activiteiten</a> kalender.</p></b>
        </div>
        <div class="navbar">

            <div id="eventfilter">
                <div class="actbutton button"><p>activiteiten<img src="arrow.png" class="actarrow"></p></div>
                <ul class="filtertab actfilter ">
                    <label><input type="checkbox" class="all_checkbox" name="allevents" id="allevents">all</label>
                    <?php
                    $sql = 'SELECT * FROM eventfilter';
                    $query = $pdo->query($sql);
                    $res = $query->fetchAll();

                    foreach ($res as $value){
                    echo '<li><label><input type="checkbox" class="checkboxes" name="'.$value['eventfilter'].'" id="'.$value['eventfilter'].'"><p class="p_filter">'.$value['eventfilter'].'</p></label></li>';
                    }
                    ?>
                </ul>
            </div>

            <div id="schoolfilter">
                <div class="schoolbutton button"><p>scholen<img src="arrow.png" class="schoolarrow"></p></div>
                <ul class="filtertab schoolfilter ">
                    <label><input type="checkbox" class="all_checkbox" name="allschools" id="allschools">all</label>
                    <?php
                    $sql = 'SELECT * FROM schoolfilter';
                    $query = $pdo->query($sql);
                    $res = $query->fetchAll();

                    foreach ($res as $value){
                        echo '<li><label><input type="checkbox" class="checkboxes" name="'.$value['schoolfilter'].'" id="'.$value['schoolfilter'].'"><p class="p_filter">'.$value['schoolfilter'].'</p></label></li>';
                    }
                    ?>
                </ul>
            </div>

            <div id="cityfilter">
                <div class="stadbutton button"><p>steden<img src="arrow.png" class="stadarrow"></p></div>
                <ul class="filtertab stadfilter ">
                    <label><input type="checkbox" class="all_checkbox" name="allcities" id="allcities">all</label>
                    <?php
                    $sql = 'SELECT * FROM cityfilter';
                    $query = $pdo->query($sql);
                    $res = $query->fetchAll();

                    foreach ($res as $value){
                        echo '<li><label><input type="checkbox" class="checkboxes" name="'.$value['cityfilter'].'" id="'.$value['cityfilter'].'"><p class="p_filter">'.$value['cityfilter'].'</p></label></li>';
                    }
                    ?>
                </ul>
            </div>

            <div id="maandfilter">
                <div class="maandbutton button"><p>maanden<img src="arrow.png" class="maandarrow"></p></div>
                <ul class="filtertab maandfilter ">
                    <label><input type="checkbox" class="all_checkbox" name="allmaanden" id="allmaanden">all</label>
                    <li><label><input type="checkbox" class="checkboxes" name="januari" id="januari"><p class="p_filter">januari</p></label></li>
                    <li><label><input type="checkbox" class="checkboxes" name="februari" id="februari"><p class="p_filter">februari</p></label></li>
                    <li><label><input type="checkbox" class="checkboxes" name="maart" id="maart"><p class="p_filter">maart</p></label></li>
                    <li><label><input type="checkbox" class="checkboxes" name="april" id="april"><p class="p_filter">april</p></label></li>
                    <li><label><input type="checkbox" class="checkboxes" name="mei" id="mei"><p class="p_filter">mei</p></label></li>
                    <li><label><input type="checkbox" class="checkboxes" name="juni" id="juni"><p class="p_filter">juni</p></label></li>
                    <li><label><input type="checkbox" class="checkboxes" name="juli" id="juli"><p class="p_filter">juli</p></label></li>
                    <li><label><input type="checkbox" class="checkboxes" name="augustus" id="augustus"><p class="p_filter">augustus</p></label></li>
                    <li><label><input type="checkbox" class="checkboxes" name="september" id="september"><p class="p_filter">september</p></label></li>
                    <li><label><input type="checkbox" class="checkboxes" name="oktober" id="oktober"><p class="p_filter">oktober</p></label></li>
                    <li><label><input type="checkbox" class="checkboxes" name="november" id="november"><p class="p_filter">november</p></label></li>
                    <li><label><input type="checkbox" class="checkboxes" name="december" id="december"><p class="p_filter">december</p></label></li>
                </ul>
            </div>
        </div>
        <div id="content">

<!--            <div class="eventblock">-->
<!--                <div class="event">-->
<!--                    <a href ="#">-->
<!--                    <div class="eventheader">-->
<!---->
<!--                    </div>-->
<!--                    <div class="eventtitle">-->
<!--                        <h1>Opendag</h1>-->
<!--                    </div>-->
<!--                    <div class="eventinfo">-->
<!--                        <div class="eventdate">-->
<!--                            <p class="day"><b>30</b></p>-->
<!--                            <p class="month"><b>FEB</b></p>-->
<!--                        </div>-->
<!--                        <div class="eventsubinfo">-->
<!--                            <p class="firstp">ROC van Amsterdam</p>-->
<!--                            <p>vanaf <b>12:00</b></p>-->
<!--                            <p>in Amsterdam</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="eventblock"><div class="event"><a href="#"><div class="eventheader"></div><div class="eventtitle"><h1>Opendag</h1></div><div class="eventinfo"><div class="eventdate"><p class="day"><b>30</b></p><p class="month"><b>FEB</b></p></div><div class="eventsubinfo"><p class="firstp">ROC van Amsterdam</p><p>vanaf <b>12:00</b></p><p>in Amsterdam</p></div></div></a></div></div>-->

        </div>
    </div>
    </body>
    <script src="script/classes.js"></script>
    <script src="script/checkboxes.js"></script>
</html>
