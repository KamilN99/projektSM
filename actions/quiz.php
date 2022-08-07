<?php
$_SESSION['pytania'] = $db->Select('SELECT id, pytanie, odp1, odp2, odp3, odp4 FROM pytania');

header("Location:index.php?view=quiz");
