<?php
    try {
        include('../../config.php');
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $table = isset($_POST['table']) ? $_POST['table'] : '';

        $info = Painel::selectById($table, $id);
        $img = $info[0]['img'];

        if($img != null)
            Painel::delete($table, $id, $img);
        else 
            Painel::delete($table, $id);
        

    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>