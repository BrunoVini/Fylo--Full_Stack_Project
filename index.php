<?php

    include('config.php');
    $url = isset($_GET['url']) ? $_GET['url'] : 'home';

    Site::updateUserOnline();
    Site::counter();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYLO</title>

    <link rel="shortcut icon" href="<?php echo INCLUDE_PATH?>images/favicon-32x32.png" type="image/x-icon">

    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link rel="stylesheet" href="<?php echo INCLUDE_PATH?>styles/button.css"> 
    
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH?>styles/style.css"> 

    <?php 
        if ($url == "home") {
    ?>
        <link rel="stylesheet" href="<?php echo INCLUDE_PATH?>styles/home.css">
    <?php 
    } else if ($url == "contact") {
    ?>
        <link rel="stylesheet" href="<?php echo INCLUDE_PATH?>styles/contact.css">
    <?php }?>

</head>
<body>

    <nav id="mobile">
        <ul>
            <li>
                <a href="<?php echo INCLUDE_PATH?>Feature">Destaques</a>
                <span></span>
            </li>
            <li>
                <a href="<?php echo INCLUDE_PATH?>contact">Contato</a>
                <span></span>
            </li>
            <li>
                <a href="<?php echo INCLUDE_PATH?>Singin">Logar</a>
                <span></span>
            </li>
        </ul>
    </nav>


    <div class="w-100-b">
        <div class="container">
            <header>

            <div class="logo">
               <a href="<?php echo INCLUDE_PATH?>">
               <img src="<?php echo INCLUDE_PATH?>images/logo.svg" alt="Fylo">
               </a>
            </div>
            <nav id="desktop">
                <ul>
                    <li>
                        <a href="<?php echo INCLUDE_PATH?>Feature">Destaques</a>
                        <span></span>
                    </li>
                    <li>
                        <a href="<?php echo INCLUDE_PATH?>contact">Contato</a>
                        <span></span>
                    </li>
                    <li>
                        <a href="<?php echo INCLUDE_PATH?>Singin">Logar</a>
                        <span></span>
                    </li>
                </ul>
            </nav>

            <button id="mobile-close" class="closed">
                <i></i>
            </button>

            </header>
        </div>
    </div>


    <?php

        if(file_exists("pages/$url.php")) {
            include("pages/$url.php");
        } else {
            include("pages/404.php");        
        }

    ?>


    <footer>
        <div class="container mb-4">
            <div class="logo">
                <img src="<?php echo INCLUDE_PATH?>images/logo.svg" alt="Fylo" height="45px">
            </div>
        </div>
        <div class="container">
        <div class="row">

        <div class="local col-md-4 mb-4">
            <img src="<?php echo INCLUDE_PATH?>images/icon-location.svg" alt="#">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore voluptate molestiae, blanditiis aliquid deserunt fugiat assumenda sapiente id.
        </div>

        <div class="contact col-md-3 mb-4">
            <div>
                <img src="<?php echo INCLUDE_PATH?>images/icon-phone.svg" alt="#">
                +55 71 98291-2912
            </div>
            <div>
            <img src="<?php echo INCLUDE_PATH?>images/icon-email.svg" alt="#">
                exemplo@gmail.com
            </div>
        </div>

        <div class="links col-md-1 mb-4">
                <li>
                    <a href="<?php echo INCLUDE_PATH?>about">Sobre</a>
                </li>
                <li>
                    <a href="<?php echo INCLUDE_PATH?>jobs">Jobs</a>
                </li>
                <li>
                    <a href="<?php echo INCLUDE_PATH?>press">Press</a>
                </li>
                <li>
                    <a href="<?php echo INCLUDE_PATH?>blog">Blog</a>
                </li>
        </div>

        <div class="terms col-md-1 mb-4">
                <li>
                    <a href="<?php echo INCLUDE_PATH?>contact">Contato</a>
                </li>
                <li>
                    <a href="<?php echo INCLUDE_PATH?>terms">Termos</a>
                </li>
                <li>
                    <a href="<?php echo INCLUDE_PATH?>press">Privacidade</a>
                </li>
            </ul>
        </div>

        <div class="socials col-md-6 col-lg-2">
                <li>
                    <a href="<?php echo INCLUDE_PATH?>">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo INCLUDE_PATH?>">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo INCLUDE_PATH?>">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
        </div>

        </div>
        </div>
    </footer>




    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <script src="<?php echo INCLUDE_PATH;?>js/main.js"></script>

</body>
</html>