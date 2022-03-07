<?php

    include("../config.php");

    if(!Painel::logado()){
		include('login.php');
		}else{
			include('main.php');
		}

?>