<div id="edit-user" class="bg-white p-4 mt-4">
    <div class="container">

    <?php

        if(isset($_POST['action'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $img = $_FILES['image'];
            $image_atual = $_POST['image-atual'];
            $usuario = new Usuario();


            if($img['name'] != '') {
                if(Usuario::imagemValida($img)) {
                    Usuario::deleteFile($_SESSION['img']);
                    $img = Usuario::uptadeFile($img);
                    if($usuario->uptadeUser($name, $password, $img)) {
                        Painel::alertResponse('success','Perfil atualizado com sucesso!');
                    } else {
                        Painel::alertResponse('error', 'Error ao atualizar o usuario...');
                    } 
                } else {
                    Painel::alertResponse('error', 'O formato da imagem não é válido!');
                }
            } else {
                $img = $image_atual;
                if($usuario->uptadeUser($name, $password, $img)) {
                    Painel::alertResponse('success','Perfil atualizado com sucesso!');
                } else {
                    Painel::alertResponse('error', 'Error ao atualizar o usuario...');
                }
            }
        }
        
    ?>


        <h2><i class="fas fa-user-edit"></i></i> Editar Usuário</h2>

        <form action="" method="post" class="mt-4" enctype="multipart/form-data">

            <div class="form-group row col-12">
                    <label for="name" class="col-md-2">Nome: </label>
                    <input required  type="text" value="<?php echo $_SESSION['name'] ?>"name="name" id="name" class="col-md-10">
                </div>
                
                <div class="form-group row col-12">
                    <label for="password" class="col-md-2">Senha: </label>
                    <input required  type="password" value="<?php echo $_SESSION['password'] ?>" name="password" id="password" name="password"  class="col-md-10">
                </div>
                
                <div class="form-group row col-12">
                    <label for="image" class="col-md-2">Imagem: </label>
                    <input type="file" name="image" id="image" class="col-md-10 custom-file-control">
                    <input type="hidden" name="image-atual" value="<?php echo $_SESSION['img']?>">
                </div>
                
                <div class="form-group row col-12">
                    <label for="image" class="col-md-2"></label>
                    <input type="submit" value="Atualizar" class="btn-contact" name="action" class="col-md-10">
                </div>

            </div>
        </form>
    </div>
</div>