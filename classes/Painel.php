<?php

    class Painel {

        public static function logado() {
            return isset($_SESSION['login']) ? true : false;
        }

        public static function startSection($user, $password) {
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
            $sql->execute([$user, $password]);
        
            return $sql->fetchAll();
        }

        public static function logout() {
            setcookie('logged', true, time() - 1, '/');
            session_destroy();
            header('Location: '.INCLUDE_PATH_PAINEL);
            die();
        }

        public static function loadPage() {
            if(isset($_GET['url'])) {
                $urlEx = explode('/', $_GET['url']);
                if(file_exists("pages/".$urlEx[0].".php")) {
                    include("pages/".$urlEx[0].".php");
                } else {
                    self::redirect(INCLUDE_PATH_PAINEL);
                }
            } else {
                include('pages/home.php');
            }
        }

        public static function selectAll($tableName, $start = null, $end = null) {
            if($start == null && $end == null)
                $sql = MySql::conectar()->prepare("SELECT * FROM `$tableName`");
            else 
                $sql = MySql::conectar()->prepare("SELECT * FROM `$tableName` LIMIT $start,$end");
            
            $sql->execute();
            return $sql->fetchAll();
        }

        public static function selectAllOrderAsc($tableName, $order, $start = null, $end = null) {
            if($start == null && $end == null)
                $sql = MySql::conectar()->prepare("SELECT * FROM `$tableName` ORDER BY $order");
            else 
                $sql = MySql::conectar()->prepare("SELECT * FROM `$tableName` ORDER BY $order LIMIT $start,$end ");
            
            $sql->execute();
            return $sql->fetchAll();
        }

        public static function selectById($tableName, $where) {
            $sql = MySql::conectar()->prepare("SELECT * FROM `$tableName` WHERE id = $where");
            $sql->execute();
            return $sql->fetchAll();
        }

        public static function delete($tableName, $id, $img = null) {
            
            if($img != null) {
                Usuario::deleteFile($img);
            }

            $sql = MySql::conectar()->prepare("DELETE FROM `$tableName` WHERE id = ?");
            $sql->execute([$id]);
        }

        public static function listUsersOnline() {
            self::clearUsersOnline();
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.online`");
            $sql->execute();
            return $sql->fetchAll();
        }

        private static function clearUsersOnline() {
            $date = date('Y-m-d H:i:s');
            $sql = MySql::conectar()->exec("DELETE FROM `tb_admin.online` WHERE last_action < '$date' - INTERVAL 2 MINUTE");
        }

        public static function getVisitsTotal() {
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas`");
            $sql->execute();
            return $sql->rowCount();
        }
        
        public static function getVisitsToday() {
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas` WHERE day = ?");
            $sql->execute([date('Y-m-d')]);
            return $sql->rowCount();
        }

        public static function getOffice ($cargoNum) {
            if($cargoNum != null) {
                $sqlOffice = MySql::conectar()->prepare("SELECT * FROM `tb_admin.offices` WHERE numberOffice = ?");
                $sqlOffice->execute([$cargoNum]);
                $info = $sqlOffice->fetchAll();
                return $info[0]['name'];
            }
        }

        public static function getMessages ($param) {
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.contact` ORDER BY id desc");
            $sql->execute();
            if($param == 'count') {
                return $sql->rowCount();
            } else if ($param == 'Allmessages') {
                $info = $sql->fetchAll();
                return $info;
            }
        }

        public static function getContactSpecify ($param, $index) {
            if($param == 'get' && $index != null) {
                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.contact` WHERE id = ?");
                $sql->execute([$index]);
                $info = $sql->fetchAll();
                return $info;
            } else if ($param == 'delete' && $index != null) {
                $sql = MySql::conectar()->prepare("DELETE FROM `tb_site.contact` WHERE id = ?");
                $sql->execute([$index]);
                die();
            }
        }


        public static function deleteMessage ($index) {
            if($index != null) {
                $sql = MySql::conectar()->prepare("DELETE FROM `tb_site.contact` WHERE id = ?");
            }
        }

        public static function insertWithImg ($tableName, $arr, $img = null) {
            $imgName = '';
            $query = "INSERT INTO `$tableName` VALUES (null";

            if($img != null) {
                if(Usuario::imagemValida($img)) {
                    $imgName = Usuario::uptadeFile($img);
                    foreach ($arr as $key => $value) {
                        if($key == 'imgName') {$value = $imgName;}
                        if($value == null) break;
                        if($key == 'table_name' || $key == 'action' ) {continue;} 
                        $query .= ",?";
                        $parametros[] = $value;
                    }

                    $query .= ")";
                    $sql = MySql::conectar()->prepare($query);
                    if( $sql->execute($parametros)) {
                        return true;
                    }
                }
            } else {
                foreach ($arr as $key => $value) {
                    if($value == null) break;
                    if($key == 'table_name' || $key == 'action' ) {continue;} 
                    $query .= ",?";
                    $parametros[] = $value;
                }

                $query .= ")";
                $sql = MySql::conectar()->prepare($query);
                if( $sql->execute($parametros)) {
                    return true;
                }
            }
        }

        public static function changeOrderDepoiments($direction, $index) {
            $getId = MySql::conectar()->prepare("SELECT id FROM `site_depoiments` WHERE id_changer = ?");
            $id_changer = intval($index);

            if($direction != null) {
                $getId->execute([$id_changer - 1]); $idBefore = $getId->fetchALl()[0]['id'];
                $getId->execute([$id_changer]); $idAtual = $getId->fetchALl()[0]['id'];
                $getId->execute([$id_changer + 1]); $idAfter = $getId->fetchALl()[0]['id'];
                if($idAtual == null ) {
                    echo self::redirect(INCLUDE_PATH_PAINEL."ordem-depoimentos");
                }
            }

            
            $sql = MySql::conectar()->prepare("UPDATE `site_depoiments` SET id_changer = ? WHERE id = ?");

            if($direction == 'up' && $index != null) {
                $sql->execute([$id_changer - 1, $idAtual]); # modifica o atual
                $sql->execute([$id_changer, $idBefore]);
            } else if($direction == 'down'  && $index != null) {
                $sql->execute([$id_changer + 1, $idAtual]); # modifica o atual
                $sql->execute([$id_changer, $idAfter]);
            }
        }



        public static function alertResponse($type, $message) {
            echo self::messageAlert($type, $message);
        }


        private static function messageAlert($type, $message) {
            $classAlert = '';
            $typeTranslated = '';
            $icon = '';
            if ($type == 'success') {
                $classAlert = 'success';
                $typeTranslated = 'Successo';
                $icon = "<i class='fas fa-check'></i>";
            } else if ($type == 'error') {
                $classAlert = 'danger';
                $typeTranslated = 'Error';
                $icon = "<i class='fas fa-exclamation-circle'></i>";
            } else if ($type == 'warn') {
                $classAlert = 'warning';
                $typeTranslated = 'Alerta';
                $icon = "<i class='fas fa-exclamation-triangle'></i>";
            } else if ($type == 'info') {
                $classAlert = 'info';
                $typeTranslated = 'Infomação';
                $icon = "<i class='fas fa-info'></i>";
            } 

            if($classAlert != '') {
                return "<div class='alert alert-$classAlert alert-dismissible fade show' role='alert'><strong class='mr-3'>$typeTranslated $icon</strong>  $message<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            };
        }

        public static function redirect($url) {
            echo "<script>location.href='$url'</script>";
            die();
        }

    }
    
?>