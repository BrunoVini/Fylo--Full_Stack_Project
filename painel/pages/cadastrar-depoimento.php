
<div id="add-user" class="bg-white p-4 mt-4">
    <div class="container">

    <?php

        $index = count(Painel::selectAll('site_depoiments')) + 1;

        $bg = isset($_SESSION['bg']) ? $_SESSION['bg'] : '#367fa8';

        if(isset($_POST['action'])) {
            if(Painel::insertWithImg('site_depoiments' ,$_POST, $_FILES['image'])) {
                Painel::alertResponse('success','Sucesso ao cadastrar no banco de dados!');
            } else {
                Painel::alertResponse('error','Erro ao cadastrar no banco de dados!');
            }
        }
        
    ?>


        <h2><i class="fas fa-file-medical"></i> Cadastrar Depoimento</h2>

        <form action="" method="post" class="mt-4" enctype="multipart/form-data">

                <div class="form-group row col-12">
                    <label for="name" class="col-lg-2">Nome: </label>
                    <input required type="text" value=""name="name" id="name" class="col-lg-10">
                </div>
                
                <div class="form-group row col-12">
                    <label for="office" class="col-lg-2">Cargo: </label>
                    <input required type="text" value="" name="office" id="office" class="col-lg-10">
                </div>

                <div class="form-group row col-12">
                    <label for="depoiment" class="col-lg-2">Depoimento: </label>
                    <textarea required name="depoiment" id="depoiment" cols="30" rows="10"  class="col-lg-10"></textarea>
                </div>

                <div class="form-group row col-12">
                    <label for="image" class="col-lg-2">Imagem: </label>
                    <input type="file" name="image" id="image" class="col-lg-10 custom-file-control">
                    <input type="hidden" value="" name="imgName">
                </div>

                <input type="hidden" name="id_changer" value="<?php echo $index?>">

                                
                <div class="form-group row col-12">
                    <!-- <label for="" class="col-lg-2"></label> -->
                    <input  style="background: <?php echo $bg?>" type="submit" value="Criar" class="btn btn-lg text-white btn-contact" name="action" class="col-lg-10">
                </div>
            

            </div>
        </form>
    </div>
</div>