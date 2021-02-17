<?php
    try {
        include('../../config.php');
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $_SESSION['idDp'] = $id;
        $depoiment = Painel::selectById('site_depoiments', $id);
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    $bg = isset($_SESSION['bg']) ? $_SESSION['bg'] : '#367fa8';

?>

<div id="box-edit">
    <div class="overflow-auto">
        <form action="" method="post" class="" enctype="multipart/form-data">
            
            <div class="btn btn-danger close-form mb-3 pb-2 pt-2">
                <i class="fa fa-times"></i>
            </div>

            <div class="form-group row col-12">
                <label for="name" class="col-lg-2">Nome: </label>
                <input required type="text" value="<?php echo $depoiment[0]['name']?>" name="name" id="name" class="col-lg-10">
            </div>

            <div class="form-group row col-12">
                <label for="office" class="col-lg-2">Cargo: </label>
                <input required type="text" value="<?php echo $depoiment[0]['office']?>" name="office" id="office" class="col-lg-10">
            </div>

            <div class="form-group row col-12">
                <label for="depoiment" class="col-lg-2">Texto: </label>
                <textarea required name="depoiment" id="depoiment" cols="30" rows="10"  class="col-lg-10"> <?php echo $depoiment[0]['depoiment']?> </textarea>
            </div>

            <div class="form-group row col-12">
                <label for="image" class="col-lg-2">Imagem: </label>
                <div class="col-lg-10" id="filo">
                    <label for="image" class="click-img text-truncate">Escolha a imagem</label>
                    <input type="file" name="image" id="image" class="custom-file-control">
                    <img class="preview-img ml-2" src="<?php echo INCLUDE_PATH_PAINEL."uploads/".$depoiment[0]['img']?>" alt="<?php echo $depoiment[0]['name']?>">
                </div>
            </div>
            <input type="hidden" value="<?php echo $depoiment[0]['img']?>" name="imgAtual">
            
                            
            <div class="form-group row col-12 pb-4">
                <label for="" class="col-lg-2"></label>
                <input style="background: <?php echo $bg?>" type="submit" value="Editar" class="btn text-white" name="update" class="col-lg-10">
            </div>


            </div>
        </form>
    </div>
</div>

<script>

    $('#image').change((e) => {
        var file = e.target.files.item(0);
        const fileReader = new FileReader();

        fileReader.onloadend = () => {
            $('.preview-img').attr('src', fileReader.result);
            $('.click-img').html(e.target.files[0].name);
        }

        fileReader.readAsDataURL(file);
    })
    
    $('#box-edit, .close-form').click(() => {
        $('#depoiments .first').fadeIn(0);
        $('.link').removeClass('d-none');
        $('.ajax').html('');
    })

    $('#box-edit form').click(function(e) {
        e.stopPropagation();
    })
</script>