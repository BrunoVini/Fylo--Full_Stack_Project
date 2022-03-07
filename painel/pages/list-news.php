<?php 
    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` ORDER BY `date` DESC");
    $sql->execute();
    $noticias = $sql->fetchAll();

    $categoryNum = $noticias[0]['category'];

    $bg = isset($_SESSION['bg']) ? $_SESSION['bg'] : '#367fa8';

?>

<style>
    #noticias .noticia {
        margin: 10px;
    }

    .noticia .contentNew {
        padding: 15px;
        background: #fff;
        display: flex;
        justify-content: space-between;
        max-width: 1000px;
        margin: 0 auto;
    }

    .noticia img {
        width: 100px;
        height: 100px;
        object-fit: cover;
    }

    .noticia .hour {
        font-size: 80%;
        color: #c1c1c1;
    }

    @media only screen and (max-width: 600px) {
        .noticia .contentNew {
            display: block;
        }

        .noticia img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    }

</style>

<section id="noticias">

        <?php foreach ($noticias as $key => $value) {?>

            <div class="noticia">
                <div class="contentNew">
                    <div class="titles">
                        <h2> <a href="<?php echo INCLUDE_PATH_PAINEL."listar-noticias/noticia/".$value['slug']?>"> <?php echo $value['title']?> </a> </h2>
                        <p><?php echo $value['description']?></p>
                        <p class="text-secondary mb-1"><?php echo Painel::fetchCategory($value['category'])?></p>
                        <p class="hour">Atualizado em: <?php echo date('d/m/Y H:i:s', strtotime($value['date']))?></p>
                    </div>
                    <img  src="<?php echo INCLUDE_PATH_PAINEL.'uploads/'.$value['imgName']?>" alt="<?php echo $value['imgName']?>">
                </div>
            </div>

        <?php }?>

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