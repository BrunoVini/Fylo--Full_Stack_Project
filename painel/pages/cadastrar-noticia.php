
<div id="add-user" class="bg-white p-4 mt-4">
    <div class="container">

    <?php

        $bg = isset($_SESSION['bg']) ? $_SESSION['bg'] : '#367fa8';
        $categorys = Painel::selectAll('tb_noticias.categorias');

        if(isset($_POST['action'])) {

            if($_POST['title'] == '' || $_POST['category_id'] == '' || $_POST['content'] == '' || $_POST['description'] == '' || $_FILES['image'] == '') {
                Painel::alertResponse('error', 'Campos vazios não são permitidos');
            } else {

                $slug = Painel::generateSlug($_POST['title']);
                $category = $_POST['category_id'];
                $verify = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE slug = `$slug` AND category = `$category`");

                if($verify->rowCount() == 0) {
                    $arr = [
                        "title" => $_POST['title'],
                        "slug" => $slug,
                        "category" => $category,
                        "description" => $_POST['description'],
                        "content" => $_POST['content'],
                        "date" => date("Y-m-d H:i:s"),
                        "id_uuid" => uniqid ( time () * 2.45),
                        "imgName" => $_POST['imgName'],
                    ];

                    echo "<pre>";
                    print_r($_FILES['image']);
                    echo "</pre>";
        
                    if(Painel::insertWithImg('tb_site.noticias' ,$arr, $_FILES['image'])) {
                        Painel::alertResponse('success','Sucesso ao cadastrar no banco de dados!');
                    } else {
                        Painel::alertResponse('error','Erro ao cadastrar no banco de dados!');
                    }
                } else {
                    Painel::alertResponse('error','Erro! Esse título já está sendo utilizado');
                }
            }
            

        }
        
    ?>


        <h2><i class="fas fa-file-medical"></i> Cadastrar Notícia</h2>

        <form action="" method="post" class="mt-4" enctype="multipart/form-data">

                <div class="form-group row col-12">
                    <label for="title" class="col-lg-2">Título: </label>
                    <input required type="text" value="" name="title" id="title" class="col-lg-10">
                </div>
               
                <div class="form-group row col-12">
                    <label for="description" class="col-lg-2">Descricão: </label>
                    <textarea maxlength="200" style="resize: none" required name="description" id="description" cols="30" rows="5" class="col-lg-10"></textarea>
                </div>
                
                <div class="form-group row col-12">
                    <label for="category" class="col-lg-2">Categoria: </label>
                    <select required id="category" class="col-lg-10" name="category_id">
                        <?php
                            foreach ($categorys as $key => $value) {
                                echo "<option value=". $value['index_id'].">". $value['category'] ."</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group row col-12">
                    <label for="content" class="col-lg-2">Matéria: </label>
                    <textarea required name="content" class="tinymce" id="textarea" cols="30" rows="10"  class="col-lg-10"></textarea>
                </div>

                <div class="form-group row col-12">
                <label for="image" class="col-lg-2">Imagem: </label>
                    <div class="col-lg-10" id="filo">
                        <label for="image" class="click-img text-truncate">Escolha a imagem</label>
                        <input type="file" name="image" id="image" class="custom-file-control">
                        <img class="preview-img ml-2" src="" alt="">
                        <input type="hidden" value="" name="imgName"> 
                    </div>
                </div>

                                
                <div class="form-group row col-12">
                    <!-- <label for="" class="col-lg-2"></label> -->
                    <input  style="background: <?php echo $bg?>" type="submit" value="Criar" class="btn btn-lg text-white btn-contact" name="action" class="col-lg-10">
                </div>
            

            </div>
        </form>
    </div>
</div>


<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

<script>
    
    tinymce.init({
        selector: '.tinymce',
        plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker image',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        height:300
    });

</script>