<?php
$_SESSION['opisy'] = $db->Select('SELECT nazwa, opis FROM opisy WHERE id_interfejsu=:id', [':id' => $_GET['id']]);
header("Location:index.php?view=interfejs");
