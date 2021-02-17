<?php
    try {
        include('../../config.php');
        $_SESSION['bg'] = isset($_POST['bg']) ? $_POST['bg'] : '';
        echo $_SESSION['bg'];
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>