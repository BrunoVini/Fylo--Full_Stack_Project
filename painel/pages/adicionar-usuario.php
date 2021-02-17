<?php 
    if(!verifyPermission($_SESSION['office'])) {
        Painel::alertResponse('error','Você não tem permissão para acessar essa página');
        die();
    }

    $officeNum = Painel::startSection($_SESSION['user'],$_SESSION['password'])[0]['office'];

?>

<div id="edit-user" class="bg-white p-4 mt-4">
    <div class="container">

    <?php

        if(isset($_POST['action'])) {

            @$name = $_POST['name'];
            @$user = $_POST['user'];
            @$password = $_POST['password'];
            @$office = $_POST['office'];
            @$img = $_FILES['image'];
            @$usuario = new Usuario();

            if($name == '') {
                Painel::alertResponse('error', 'O nome está vazio!');
            } else if ($user == '') {
                Painel::alertResponse('error', 'O nome de usuário está vazio!');
            } else if ($office == '') {
                Painel::alertResponse('error', 'O cargo está vazio!');
            } else if ($password == '') {
                Painel::alertResponse('error', 'A senha está vazia!');
            } else if($office <= $officeNum) {
                Painel::alertResponse('error', 'Selecione um cargo menor que o seu');
            } else {
                
                if($img['name'] != '') {
                    if(Usuario::imagemValida($img)) {
                        $img = Usuario::uptadeFile($img);
                        Usuario::createUser($user, $password, $name, $img, $office);
                    } else {
                        Painel::alertResponse('error', 'O formato da imagem não é válido!');
                    }
                } else {
                    Usuario::createUser($user, $password, $name, '', $office);
                }

            }
        }
        
    ?>


        <h2><i class="fas fa-user-edit"></i></i> Adicionar Usuário</h2>

        <form action="" method="post" class="mt-4" enctype="multipart/form-data">

                <div class="form-group row col-12">
                    <label for="name" class="col-md-2">Nome: </label>
                    <input required type="text" value=""name="name" id="name" class="col-md-10">
                </div>
                
                <div class="form-group row col-12">
                    <label for="user" class="col-md-2">Nome de usuário: </label>
                    <input required type="text" value="" name="user" id="user" class="col-md-10">
                </div>

                <div class="radios pb-2 pt-2">
                    <h5 class="d-inline-block mr-3">Cargo:</h5>
                    <?php 
                        $offices = Painel::selectAll('tb_admin.offices');
                        foreach ($offices as $key => $value) {
                            if($value['numberOffice'] <= $officeNum) continue;
                    ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="office" id="inlineRadio1" value="<?php echo $value['numberOffice']?>">
                        <label class="form-check-label mr-3" for="inlineRadio1"><?php echo $value['name']?></label>
                    </div>
                    <?php }?>
                </div>
                
                <div class="form-group row col-12">
                    <label for="password" class="col-md-2">Senha: </label>
                    <input required type="password" value="" name="password" id="password" name="password"  class="col-md-10">
                </div>
                
                <div class="form-group row col-12">
                    <label for="image" class="col-md-2">Imagem: </label>
                    <input type="file" name="image" id="image" class="col-md-10 custom-file-control">
                </div>

                                
                <div class="form-group row col-12">
                    <label for="" class="col-md-2"></label>
                    <input type="submit" value="Criar" class="btn-contact" name="action" class="col-md-10">
                </div>
            

            </div>
        </form>
    </div>
</div>