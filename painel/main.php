<script>
    var bg = localStorage.getItem('bg') != (null) ? localStorage.getItem('bg') : 'blue';
</script>
<?php 
    $user = $_SESSION['user'];
    $password = $_SESSION['password'];

    $info = Painel::startSection($user, $password);

    $_SESSION['img'] = $info[0]['img'];
    $_SESSION['name'] = $info[0]['name'];
    $cargoNum = $info[0]['office'];

    $emails = Painel::selectAll('tb_site.email');

    $url = isset($_GET['url']) ? $_GET['url'] : 'home';

    $_SESSION['office'] = Painel::getOffice($cargoNum);

    if($url == 'logout'){
        Painel::logout();
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Painel de Controle</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>styles/button.css">
    <link href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css" rel="stylesheet" />
    <link href="<?php echo INCLUDE_PATH_PAINEL ?>css/dashboard.css" rel="stylesheet" />

<link
  rel="stylesheet"
  href="https://unpkg.com/simplebar@latest/dist/simplebar.css"
/>
<script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
<!-- or -->
<link
  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css"
/>
<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>


</head>

<body>

    <header class="menu-aside">

        <aside>
            <div class="logo col-12 col-md-3 stick-top">
                <a href="<?php INCLUDE_PATH_PAINEL?>home">
                    <h2 class="ml-2 text-white">Painel</h2>
                </a>
            </div>
        <div class="scroll" data-simplebar>
            <div class="perfil pl-2 mb-3">
                <div class="perfil-logo">
                    <?php
                        if($_SESSION['img'] == '' ) {
                    ?>
                        <i class="fas fa-user"></i>
                    <?php  } else { ?>
                        <img alt="" src="<?php echo INCLUDE_PATH_PAINEL.'uploads/'.$_SESSION['img']?>">
                    <?php }?>

                </div>
                <div class="perfil-data">
                    <h3><?php echo $_SESSION['name'] ?></h3>
                    <h4 style="font-size: 0.8em"><?php echo $_SESSION['office']?></h4>
                </div>
            </div>
            <nav>
                <div class="links">

                <a <?php menuSelected(''); menuSelected('home')?> href="<?php echo INCLUDE_PATH_PAINEL ?>">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                </a>

                <div class="main-nav">
                    <h3>Navegação Principal</h3>
                </div>

                    <a <?php menuSelected('cadastrar-depoimento')?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-depoimento">
                        <i class="fas fa-file-medical"></i>
                        <span>Cadastrar Depoimento</span>
                    </a>
                    <a <?php menuSelected('cadastrar-servico')?> href="<?php echo INCLUDE_PATH_PAINEL ?> cadastrar-servico">
                        <i class="fas fa-file-medical"></i>
                        <span>Cadastrar Serviço</span>
                    </a>
                    <a <?php menuSelected('cadastrar-slides')?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-slides">
                        <i class="fas fa-file-medical"></i>
                        <span>Cadastrar Slides</span>
                    </a>

                    <div class="main-nav">
                        <h3>Gestão</h3>
                    </div>

                    <a <?php menuSelected('listar-depoimentos')?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimentos">
                        <i class="fas fa-bullhorn"></i>
                        <span>Listar Depoimentos</span>
                    </a>
                    <a <?php menuSelected('listar-servicos')?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos">
                        <i class="fas fa-list-ol"></i>
                        <span>Listar Serviços</span>
                    </a>
                    <a <?php menuSelected('listar-slides')?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides">
                        <i class="far fa-file-image"></i>
                        <span>Listar Slides</span>
                    </a>
                    <a <?php menuSelected('inbox')?> href="<?php echo INCLUDE_PATH_PAINEL ?>inbox">
                        <i class="fas fa-inbox"></i>
                        <span>
                            <span><?php echo Painel::getMessages('count')?></span>
                            Inbox
                        </span>
                    </a>
                    

                    <div class="main-nav">
                        <h3>Administração do Painel</h3>
                    </div>

                    <a <?php menuSelected('editar-usuario')?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-usuario">
                        <i class="fas fa-users"></i>
                        <span>Editar Usuário</span>
                    </a>
                    <a <?php menuSelected('adicionar-usuario')?> 
                        class="<?php echo verifyPermission($_SESSION['office']) === (true) ? '' : 'd-none' ;?>"  
                        href="<?php echo INCLUDE_PATH_PAINEL ?>adicionar-usuario">
                        
                        <i class="fas fa-user-plus"></i>
                        <span>Adicionar Usuário</span>
                    </a>

                </div>
                
                </nav>

            </div>
        </aside>

    </header>

    <div class="topo">
        <div class="top-bar">

            <button class="nav-painel menu-btn closed" id="blue">
                <div>
                    <i></i>
                </div>
            </button>

            <div class="button d-inline-block">
                <button onclick="window.location = '<?php echo INCLUDE_PATH_PAINEL?>inbox '" class="messages">
                    <i class="far fa-envelope"></i> 
                    <span><?php echo Painel::getMessages('count')?></span>
                </button>
                <div class="info">
                    <?php echo Painel::getMessages('count')?> novas mesagens no site
                </div>
            </div>

            <div class="button d-inline-block">
                <button class="notifications">
                    <i class="far fa-bell"></i>
                </button>
            </div>
            
            <div class="button d-inline-block">
                <button class="tasks">
                    <i class="far fa-flag"></i>
                    <span><?php echo count($emails)?></span>
                </button>
                <div class="info" style="left: -80px">
                    <?php  echo count($emails)?> emails enviados pro site
                </div>
            </div>
            
            <button class="settings">
                <i class="fas fa-cogs"></i>
            </button>
            
            <a onclick="localStorage.clear()" class="out" href="<?php echo INCLUDE_PATH_PAINEL?>logout">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </div>


    <div id="config">
        <h4 class="text-center">Configurações</h4>

        <div class="skins">
            <h5 class="ml-2">Skins</h5>

            <div class="boxes">

                <div class="box" id="blue">
                    <div>
                        <span class="top-left"></span>
                        <span class="top-right"></span>

                        <span class="navE"></span>
                        <span class="contentE"></span>
                    </div>
                    <h5>Azul</h5>
                </div>

                <div class="box" id="black">
                    <div>
                        <span class="top-left"></span>
                        <span class="top-right"></span>

                        <span class="navE"></span>
                        <span class="contentE"></span>
                    </div>
                    <h5>Preto</h5>
                </div>

                <div class="box" id="purple">
                    <div>
                        <span class="top-left"></span>
                        <span class="top-right"></span>

                        <span class="navE"></span>
                        <span class="contentE"></span>
                    </div>
                    <h5>Roxo</h5>
                </div>

                <div class="box" id="green">
                    <div>
                        <span class="top-left"></span>
                        <span class="top-right"></span>

                        <span class="navE"></span>
                        <span class="contentE"></span>
                    </div>
                    <h5>Verde</h5>
                </div>

                <div class="box" id="yellow">
                    <div>
                        <span class="top-left"></span>
                        <span class="top-right"></span>

                        <span class="navE"></span>
                        <span class="contentE"></span>
                    </div>
                    <h5>Amarelo</h5>
                </div>

                <div class="box" id="blueLight">
                    <div>
                        <span class="top-left"></span>
                        <span class="top-right"></span>

                        <span class="navE"></span>
                        <span class="contentE"></span>
                    </div>
                    <h5>Azul Light</h5>
                </div>

            </div>
        </div>
    </div>

    <div class="content">

        <?php Painel::loadPage()?>
        <div class="ajax"></div>
    </div>



    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.mask.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL ?>js/configPainel.js"></script>


</body>

</html>