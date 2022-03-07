<?php
    $indiceAtual = "<script>document.write(indiceAtual)</script>";
    $Allmessages = Painel::getMessages('Allmessages');
    
    $url = isset($_GET['url']) ? $_GET['url'] : 'inbox/1';

    if( $url != 'inbox' && explode('/', $url)[1] == 'delete') {
        $index = explode('/', $url)[2];
        Painel::getContactSpecify('delete', $index);
    }

    if($url != "inbox") {
        $numero =  explode('/', $url)[1];
        $_SESSION['contactIndex'] = $numero;
    } 
?>

<section id="inbox">

    <h2 class="d-inline-block">Inbox</h2>

    <div class="inbox-box">
        <div class="emails-list">

            <div class="emails-headers">

            <?php 
                foreach ($Allmessages as $key => $value) {
            ?>

                <a class="email" href="<?php echo INCLUDE_PATH_PAINEL?>inbox/<?php echo $value['id']?>" id="<?php if($value['id'] == $numero) echo 'email-atual'?>">
                    <div class="date">
                        <?php echo date('d/m/Y', strtotime($value['date']))?>
                    </div>
                    <div class="name">
                        <?php echo $value['name']?>
                    </div>
                    <div class="address">
                        <?php echo $value['email']?>
                    </div>
                </a>

            <?php } ?>

            </div>

            <div class="email-body <?php echo $url == ("inbox") ? 'email-body-none' : null ?>">
                <?php 
                    if($url != "inbox") {
                        $message = Painel::getContactSpecify('get', explode('/', $url)[1]);    
                        if($message != null) { 
                        ?>

                        <button class="delete btn" onclick="deleteMessage()">
                            <span>Deletar essa mensagem</span>
                            <i class="far fa-trash-alt"></i>
                        </button>
                        
                        <button class="close btn" onclick="closeMessage()">
                            <i class="fa fa-times"></i>
                        </button>

                        <div class="date">
                            <?php echo date('d/m/Y', strtotime($message[0]['date']))?>
                        </div>
                        <div class="name">
                            <strong>Nome:</strong> <?php echo $message[0]['name']?>
                        </div>
                        <div class="adresss">
                            <strong>Email:</strong> <a id="gmail" target= "_blank" rel="noreferrer noopener" href="mailto:<?php echo $message[0]['email']?>"><?php echo $message[0]['email']?></a>
                        </div>
                        <div class="body">
                            <strong>Mensagem:</strong>
                            <p>
                                <?php echo $message[0]['body']?>
                            </p>
                        </div>

                    <?php } else { ?>

                        <h3 class="mt-4">Esse email não existe</h3>
                    <?php }  } else { ?>
                        <div class="inbox-start">
                        <button class="close btn" onclick="closeMessage()">
                            <i class="fa fa-times"></i>
                        </button>
                            <h4 class="mt-4">Confira aqui as mensagens enviadas do site</h4>
                            <img src="<?php echo INCLUDE_PATH_PAINEL?>images/inbox.svg" alt="">    
                        </div>    
                    <?php }?>
            </div>

            </div>

        </div>
    </div>
</section>

<script>

    const closeMessage = () => {
        $('.email-body').css('display','none');
    }

    const deleteMessage = () => {
        $.ajax({
            type: "POST",
            url: "<?php echo INCLUDE_PATH_PAINEL?>ajax/delete.php",
        }).done(function(data) {
            document.location='<?php echo INCLUDE_PATH_PAINEL?>inbox';
        })
        
    }

</script>