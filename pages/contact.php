<div class="mt-4 container" style="max-width: 600px;">
<?php
    if(isset($_POST['action'])) {

        if($_POST['action'] != "") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $sqlSend = Site::sendContact($name, $email, $message);
                Painel::alertResponse('success','Mensagem enviada com sucesso');
            } else {
                echo "<h3>Invalid email address</h3>";
            }

        } else {
            echo "<h3>The input is empty</h3>";
        }

    }
?>
</div>
<section class="contact container">
    <h2 class="mt-4 display-4">Contato</h2>
    <div class="img">
        <img src="<?php INCLUDE_PATH?>images/mesage.svg" alt="" width="100%">
    </div>
    <form action="" method="post" class="form-group row mt-5 mb-5">

        <div class="form-group row col-12">
            <label for="name" class="col-md-2">Nome: </label>
            <input type="text" name="name" id="name" class="col-md-10">
        </div>
        
        <div class="form-group row col-12">
            <label for="email" class="col-md-2">Email: </label>
            <input type="email" id="email" name="email"  class="col-md-10">
        </div>
        
        <div class="form-group row col-12">
            <label for="message" class="col-md-2">Mensagem: </label>
            <textarea required name="message" id="message" cols="30" rows="10"  class="col-md-10"></textarea>
        </div>
        
        <input type="submit" value="Enviar" class="btn-contact" name="action">

    </form>
</section>