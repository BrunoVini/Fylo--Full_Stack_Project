<?php 
  $url = isset($_GET['url']) ? $_GET['url'] : '';
  @$param = explode('/', $url);

  @Painel::changeOrderDepoiments(@$param[1], @$param[2]);

  $bg = isset($_SESSION['bg']) ? $_SESSION['bg'] : '#367fa8';

  $sql = MySql::conectar()->prepare("SELECT * FROM `site_depoiments` ORDER BY `id_changer`");
  $sql->execute();
  $depoiments = $sql->fetchAll();
  $indexMax =count($depoiments);

  if(@$param[2] != null) {
    echo "<script>history.replaceState('','','999')</script>";      
  }

?>

<a href="<?php echo INCLUDE_PATH_PAINEL?>listar-depoimentos">  <i class="fas fa-arrow-left"> </i> Voltar</a>

<section id="depoiments">

    <div class="bg-white">
    <div class="first" data-simplebar data-simplebar-auto-hide="false">
        
        <div class="bg">
            <div class="title mb-3 third" style="min-width: auto">
                <h4 style="background: <?php echo $bg?>">Nome</h4>
                <h4 style="background: <?php echo $bg?>">Subir</h4>
                <h4 style="background: <?php echo $bg?>">Descer</h4>
            </div>
        </div>

        <div class="elements pb-3" style="min-width: auto">
            <?php if($depoiments == null) {?>
                <div class="noneDep">
                    <h4>Nenhum depoimento cadastrado</h4>
                </div>
            <?php }?>
            <?php 
                foreach ($depoiments as $key => $value) {
            ?>

                <div class="box third">
                    <h5 class="ml-3"><?php echo $value['name']; ?></h5>
                    <a href="<?php echo INCLUDE_PATH_PAINEL.'ordem-depoimentos/up/'.$value['id_changer']?>" class="<?php echo $value['id_changer'] == (1) ? 'disabled' : '' ;?>" >  <i class="fas fa-arrow-up"> </i> </a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL.'ordem-depoimentos/down/'.$value['id_changer']?>"  class="<?php echo $value['id_changer'] == ($indexMax) ? 'disabled' : '' ;?>"><i class="fas fa-arrow-down"></i> </a>
                </div>

            <?php }?>
        </div>

    </div>
    </div>

</section>