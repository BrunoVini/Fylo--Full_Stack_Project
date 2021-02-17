<?php 
    $sql = MySql::conectar()->prepare("SELECT * FROM `site_depoiments` ORDER BY `id_changer`");
    $sql->execute();
    $depoiments = $sql->fetchAll();

    $bg = isset($_SESSION['bg']) ? $_SESSION['bg'] : '#367fa8';

    if(isset($_POST['update'])) {
        $name = $_POST['name'];
        $office = $_POST['office'];
        $depoiment = $_POST['depoiment'];
        $img = $_FILES['image'];
        $imageAtual = $_POST['imgAtual'];
        $id = $_SESSION['idDp'];

        if($name == '' || $office == '' || $depoiment ==  '') {
            Painel::alertResponse('error','Campos vazios não são permitidos');
        } else {
            if($img['name'] != '') {
                if(Usuario::imagemValida($img)) {
                    if( Usuario::deleteFile($imageAtual)) {
                        $image = Usuario::uptadeFile($img);
                        $sql = MySql::conectar()->prepare("UPDATE `site_depoiments` SET name = ?, office = ?, depoiment = ?, img = ? WHERE id = ?");
                        if($sql->execute([$name,$office,$depoiment, $image, $id])) {
                            Painel::alertResponse('success','Depoimento Atualizado com sucesso!');
                        } else {
                            Painel::alertResponse('error','Erro ao atualizar');
                        }
                    }
                } else {
                    Painel::alertResponse('error','Image com formato inválido');
                }
            } else {
                $sql = MySql::conectar()->prepare("UPDATE `site_depoiments` SET name = ?, office = ?, depoiment = ? WHERE id = ?");
                if($sql->execute([$name,$office,$depoiment, $id])) {
                    Painel::alertResponse('success','Depoimento Atualizado com sucesso!');
                } else {
                    Painel::alertResponse('error','Erro ao atualizar');
                }
            }
        } 

    }
?>

<section id="depoiments">

    <a class="link" href="<?php echo INCLUDE_PATH_PAINEL?>ordem-depoimentos">Alterar a ordem dos depoimentos</a>
    
    <div class="bg-white">
    <div class="first" data-simplebar data-simplebar-auto-hide="false">
        
        <div class="bg">
            <div class="title mb-3">
                <h4 style="background: <?php echo $bg?>">Nome</h4>
                <h4 style="background: <?php echo $bg?>">Cargo</h4>
                <h4 style="background: <?php echo $bg?>">#</h4>
                <h4 style="background: <?php echo $bg?>">#</h4>
            </div>
        </div>

        <div class="elements pb-3">
            <?php if($depoiments == null) {?>
                <div class="noneDep">
                    <h4>Nenhum depoimento cadastrado</h4>
                </div>
            <?php }?>
            <?php 
                foreach ($depoiments as $key => $value) {
            ?>

                <div class="box">
                    <h5 class="ml-3"><?php echo $value['name']; ?></h5>
                    <h5><?php echo $value['office']; ?></h5>
                    <button onclick="editDepoiment(<?php echo $value['id']; ?>)" class="text-primary">Editar <i class="fas fa-edit"></i></button>
                    <button onclick="deleteDepoiment(<?php echo $value['id']; ?>)" class="text-danger">Excluir <i class="fa fa-times"></i></button>
                </div>

            <?php }?>
        </div>

    </div>
    </div>

</section>

<script>

    const deleteDepoiment = id => {
        var rest = confirm('Deseja excluir esse depoimento?');
        if(rest == true) {
            $.post("ajax/deleteElSite.php", {id: id, table: 'site_depoiments'}, function(data) {
                document.location='<?php echo INCLUDE_PATH_PAINEL?>listar-depoimentos';
            })
        } else return false;
    }

    const editDepoiment = id => {
        $('#depoiments .first').fadeOut(0);
        $.post("ajax/edit-depoiment.php", {id: id}, function(data) {
            $('.link').addClass('d-none');
            $('.ajax').html(data);
        })
    }

</script>