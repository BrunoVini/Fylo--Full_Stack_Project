<section id="home">

    <div id="bg">

    <div class="container">

        <div class="first">
            <div class="image">
                <img src="<?php echo INCLUDE_PATH ?>images/illustration-intro.png" alt="">
            </div>
                <div class="txt mb-5">
                    <h1 class="mb-5">
                    Todos os seus arquivos em um local seguro, acessível em qualquer lugar
                    </h1>
                    <p>
                        O Fylo armazena todos os seus arquivos mais importantes em um local seguro.
                            Acesse-os onde você precisar, compartilhe e colabore com amigos, familiares e colegas de trabalho.
                    </p>
                    <button>
                       Começar
                    </button>
                </div>
        </div>

    </div>

    <div id="bg-2">

        <div class="container">
            <div class="second">

                <div class="box">
                    <img src="<?php echo INCLUDE_PATH ?>images/icon-access-anywhere.svg" alt="Laptop">
                    <h2>
                        Acesse seus arquivos em qualquer lugar
                    </h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit, consectetur odit corporis possimus.
                    </p>
                </div>

                <div class="box">
                    <img src="<?php echo INCLUDE_PATH ?>images/icon-security.svg" alt="Security">
                    <h2>
                        Segurança em que você pode confiar
                    </h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit, consectetur odit corporis possimus.
                    </p>
                </div>

                <div class="box">
                    <img src="<?php echo INCLUDE_PATH ?>images/icon-collaboration.svg" alt="Collaboration">
                    <h2>
                        Colaboração em tempo real
                    </h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit, consectetur odit corporis possimus.
                    </p>
                </div>

                <div class="box">
                    <img src="<?php echo INCLUDE_PATH ?>images/icon-any-file.svg" alt="Laptop">
                    <h2>
                        Armazene qualquer tipo de arquivo
                    </h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit, consectetur odit corporis possimus.
                    </p>
                </div>

                </div>

            </div>
       

        </div>

    </div>

    <div class="third pt-5 pb-5">

        <div class="container">
            
            <div class="row">

            <div class="img col-md-6">
                <img src="<?php echo INCLUDE_PATH ?>images/illustration-stay-productive.png" alt="Productive" width="100%"> 
            </div>

            <div class="txt col-md-6 p-4">
                <h1 class="mb-4">
                    Fique produtivo, onde quer que esteja
                </h1>
                <p>
                    Nunca deixe a localização ser um problema ao acessar seus arquivos. Fylo protege você em todos os seus meeds de armazenamento de arquivos.
                    <br>
                    <br>
                    Compartilhe arquivos e pastas com segurança com amigos, familiares e colegas para colaboração ao vivo. Não são necessários anexos eletrônicos                </p>

                    <div class="button">
                    <button>
                        Veja como o Filo funciona
                    </button>
                    <img src="<?php echo INCLUDE_PATH ?>images/icon-arrow.svg" alt="">
                    </div>

                </div>
            </div>

            </div>

        </div>

    </div>

    <div class="fourty pb-5">
        <div class="container">

            <div class="row">

                <?php 
                    $depoiments = Painel::selectAllOrderAsc('site_depoiments', 'id_changer' ,0,3);

                    foreach ($depoiments as $key => $value) {
                ?>

                <div class="box col-md-4">
                    <p>
                        <?php echo $value['depoiment']?>
                    </p>
                    <div class="perfil">
                        <img src="<?php echo INCLUDE_PATH_PAINEL."uploads/".$value['img'] ?>" alt="">
                        <div>
                            <h3><?php echo $value['name']?></h3>
                            <p><?php echo $value['office']?></p>
                        </div>
                    </div>
                </div>

                <?php } ?>

              
            </div>

        </div>
    </div>

    <div id="email">
        
        <div class="dark"></div>

        
        <div class="container">
            <div class="form">
                <h2>
                    Obtenha acesso antecipado hoje
                </h2>
                <p>
                    Leva apenas um minuto para inscrever-se e nosso nível inicial gratuito é extremamente generoso. Se você tiver alguma dúvida, nossa equipe de suporte ficará feliz em ajudá-lo.                </p>
                </p>
                <?php
                    if(isset($_POST['action'])) {

                        if($_POST['action'] != "") {
                            $email = $_POST['email'];
                            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                $sql = Site::sendEmail($email);
                            } else {
                                echo "<h3>Invalid email address</h3>";
                            }

                        } else {
                            echo "<h3>The input is empty</h3>";
                        }

                    }
                ?>

                <form action="" method="post">
                    <input required type="email" name="email" placeholder="email@exemplo.com" class="mb-3">
                    <input type="submit" value="Comece de graça" name="action">
                </form>
            </div>
        </div>

    </div>

</section>