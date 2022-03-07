<?php
    $url = isset($_GET['url']) ? $_GET['url'] : '';

    if(@explode('/', $url)[1] == null) {
        include('list-news.php');
    } else if(@explode('/', $url)[1] == "noticia" || @explode('/', $url)[2] != null) {
        include('edit-new.php');
    } else {
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-noticias');
    }
?>