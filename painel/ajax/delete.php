<?php

    include('../../config.php');

    if($_SESSION['contactIndex'] != null) {
        Painel::getContactSpecify('delete', $_SESSION['contactIndex']);
    } 

?>