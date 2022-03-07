
<a class="d-block mt-2" href="<?php echo INCLUDE_PATH_PAINEL?>listar-noticias"><i class="fa fa-arrow-left"></i> Voltar</a>
<div id="add-user" class="bg-white p-4 mt-2">
    <div class="container">

  <?php

    $url = isset($_GET['url']) ? $_GET['url'] : '';
    $newsSlug = @explode('/', $url)[2];

    $new = Painel::selectByCollumn('tb_site.noticias', 'slug', $newsSlug);
    $id_uuid = $new[0]['id_uuid'];

    $bg = isset($_SESSION['bg']) ? $_SESSION['bg'] : '#367fa8';
    $categorys = Painel::selectAll('tb_noticias.categorias');


    if($newsSlug == '' || $new == null) {
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-noticias');
        die();
    }
    
    if(isset($_POST['action'])) {
                
          if($_POST['title'] == '' || $_POST['category_id'] == '' || $_POST['content'] == '' || $_POST['description'] == '') {
              Painel::alertResponse('error', 'Campos vazios não são permitidos');
          } else {

              $slug = Painel::generateSlug($_POST['title']);
              $category = $_POST['category_id'];
              $verifyData = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE slug = ? AND category = ? AND id_uuid = ?");
              $verifyData->execute([$slug, $category, $id_uuid]);
              $verify = $verifyData->rowCount();
              
              $arr = [
                $title = trim($_POST['title']),
                $slug = $slug,
                $category,
                $description = trim($_POST['description']),
                $content = trim($_POST['content']),
                $date = date("Y-m-d H:i:s"),
              ];

              $img = $_FILES['image'];

              if($verify == 0) {
                  if ($img['name'] == '') {
                    array_push($arr, $id_uuid);
                    $sql = MySql::conectar()->prepare("UPDATE `tb_site.noticias` SET title = ?, slug = ?, category = ?, description = ?, content = ?, date = ? WHERE id_uuid = ?"); 
                    $sql->execute($arr);
                    Painel::redirect(INCLUDE_PATH_PAINEL.'listar-noticias');
                  } else if ($img['name'] != '') {
                    if(Usuario::deleteFile($new[0]['imgName'])) {
                        $imgName = Usuario::uptadeFile($img);
                        array_push($arr, $imgName, $id_uuid);
                        $sql = MySql::conectar()->prepare("UPDATE `tb_site.noticias` SET title = ?, slug = ?, category = ?, description = ?, content = ?, date = ?, imgName = ? WHERE id_uuid = ?"); 
                        $sql->execute($arr);
                        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-noticias');
                    }
                  }
              } else {
                  Painel::alertResponse('error','Já existe uma notícia com esse título! Escolha outro');
              }
              
             
          }
          

      }
      
  ?>


    <h2><i class="fas fa-file-medical"></i> Editar Notícia</h2>

    <form action="" method="post" class="mt-4" enctype="multipart/form-data">

        <div class="form-group row col-12">
            <label for="title" class="col-lg-2">Título: </label>
            <input required type="text" value="<?php echo $new[0]['title']; ?>" name="title" id="title" class="col-lg-10">
        </div>
        
        <div class="form-group row col-12">
            <label for="description" class="col-lg-2">Descricão: </label>
            <textarea maxlength="200" style="resize: none" required name="description" id="description" cols="30" rows="5" class="col-lg-10">
                <?php echo trim($new[0]['description']); ?>
            </textarea>
        </div>
        
        <div class="form-group row col-12">
            <label for="category" class="col-lg-2">Categoria: </label>
            <select required id="category" class="col-lg-10" name="category_id">
                <?php
                    foreach ($categorys as $key => $value) {
                ?>
                    <option <?php echo $value['index_id'] == ($new[0]['category']) ? 'selected' : null ;?> value="<?php echo $value['index_id']; ?>"><?php echo $value['category']; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group row col-12">
            <label for="content" class="col-lg-2">Matéria: </label>
            <textarea required class="tinymce" name="content" id="editor-text" cols="30" rows="10"  class="col-lg-10">
                <?php echo $new[0]['content']; ?>
            </textarea>
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
            <input  style="background: <?php echo $bg?>" type="submit" value="Salvar" class="btn btn-lg text-white btn-contact" name="action" class="col-lg-10">
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