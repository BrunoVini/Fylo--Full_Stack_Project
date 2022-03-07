<?php 
    $usersOnline =  Painel::listUsersOnline(); 
    $totalVisitas = Painel::getVisitsTotal();
    $visitasHoje = Painel::getVisitsToday();   

    $loggedUsers = Painel::selectAll('tb_admin.usuarios');
    $offices = Painel::selectAll('tb_admin.offices');
?>

<div class="content-container">
    <div class="title">
        <i class="fas fa-home"></i>
        <h2>Dashboard - Fylo</h2>
    </div>
    
    <section class="data-site">

        <div class="box">
            <div class="icon bg-warning">
                <i class="fas fa-cog"></i>
            </div>
            <div class="">
                <h2>Tráfego de CPU</h2>
                <div>70%</div>
            </div>
        </div>

        <div class="box">
            <div class="icon bg-info">
                <i class="fas fa-signal"></i>
            </div>
            <div class="">
                <h2>Usuários Online</h2>
                <div><?php echo count($usersOnline) ?></div>
            </div>
        </div>

        <div class="box">
            <div class="icon bg-danger">
                <i class="fas fa-globe-americas"></i>
            </div>
            <div class="">
                <h2>Total Visitas</h2>
                <div><?php echo $totalVisitas?></div>
            </div>
        </div>

        <div class="box">
            <div class="icon bg-success">
                <i class="fas fa-sun"></i>
            </div>
            <div class="">
                <h2>Visitas Hoje</h2>
                <div><?php echo $visitasHoje?></div>
            </div>
        </div>

    </section>


    <section class="home-first">
        <div class="users-online">
        
            <h2> <i class="fas fa-signal"></i> <span>Usuários Online</span> </h2>
        
            <div class="table">

                <div class="title">
                    <h2>IP</h2>
                    <h2>Última Ação</h2>
                </div>

                <div class="data-users-online">
                
                    <div class="ips">
                        <?php 
                            foreach ($usersOnline as $key => $value) {
                                echo "<span>".$value['ip']."</span>";
                                if($key == 10) {break;};
                            }
                        ?>
                    </div>
                    <div class="ultima-acao">
                        <?php 
                            foreach ($usersOnline as $key => $value) {
                                echo "<span>". date('d/m/Y H:i:s', strtotime($value['last_action']))."</span>";
                                if($key == 10) {break;};
                            }
                        ?>
                    </div>

                    <?php if(count($usersOnline) == 0){
                        echo "Não há usuários online";
                    }?>

                </div>

            </div>

        </div>

        <?php if(verifyPermission($_SESSION['office'])) {?>

        <div class="users-online mt-4" id="logged">
        
            <h2> <i class="fas fa-user-friends"></i><span>Usuários Cadastrados no Painel</span> </h2>
        
            <div class="table">

                <div class="title">
                    <h2>Nome: </h2>
                    <h2>Cargo: </h2>
                </div>

                <div class="data-users-online">
                
                    <div class="ips">
                        <?php 
                            foreach ($loggedUsers as $key => $value) {
                                echo "<span>".$value['user']."</span>";
                                if($key == 10) {break;};
                            }
                        ?>
                    </div>
                    <div class="ultima-acao">
                        <?php 
                            foreach ($loggedUsers as $key => $value) {
                                echo "<span>". Painel::getOffice($value['office'])."</span>";
                                if($key == 10) break;
                            }
                        ?>
                    </div>

                </div>

            </div>

        </div>

        <?php }?>
    </section>

</div>