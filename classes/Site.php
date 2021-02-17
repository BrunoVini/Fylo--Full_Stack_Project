<?php

    class Site {

        // public static function onlineFunc {}

        public static function updateUserOnline() {
            if(isset($_SESSION['online'])) {
                $token = $_SESSION['online'];
                $currentHour = date("Y-m-d H:i:s");
                $check = MySql::conectar()->prepare("UPDATE `tb_admin.online` SET last_action = ? WHERE token= ?");
                $check->execute([$currentHour, $_SESSION['online']]);

                if($check->rowCount() == 1) {
                    $sql = MySql::conectar()->prepare("UPDATE `tb_admin.online` SET last_action = ? WHERE token = ?");
                    $sql->execute([$currentHour, $token]);
                } else {
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $token = $_SESSION['online'];
                    $currentHour = date("Y-m-d H:i:s");
                    $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.online` VALUES(null, ?, ?, ?)");
                    $sql->execute([$ip, $currentHour, $token]);
                }

            } else {
                $_SESSION['online'] = uniqid();
                $ip = $_SERVER['REMOTE_ADDR'];
                $token = $_SESSION['online'];
                $currentHour = date("Y-m-d H:i:s");
                $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.online` VALUES(null, ?, ?, ?)");
                $sql->execute([$ip, $currentHour, $token]);
            }
        }

        public static function counter() {
            if(!isset($_COOKIE['visita'])) {
                setcookie("visita", 'true', time() + (60 * 60 * 24 *7));
                $sql = MySql::conectar()->prepare('INSERT INTO `tb_admin.visitas` VALUES(null, ?, ?)');
                $sql->execute([$_SERVER['REMOTE_ADDR'], date("Y-m-d")]);
            }
        }

        public static function sendEmail($email) {
            if($email != null) {
                $date = date("Y-m-d");
                $sql = MySql::conectar()->prepare("INSERT INTO `tb_site.email` VALUES(null, ?, ?)");
                $sql->execute([$email, $date]);
            } else {
                echo Painel::alertResponse('error','Houve um problema ao enviar o formulário');
            }
        }

        public static function sendContact($name, $email, $message) {
            if( $name != null&& $email != null && $message != null) {
                $date = date("Y-m-d");
                $sql = MySql::conectar()->prepare("INSERT INTO `tb_site.contact` VALUES(null, ?, ?, ?, ?)");
                $sql->execute([$name, $email, $message, $date]);
            } else {
                echo Painel::alertResponse('error','Houve um problema ao enviar o formulário');
            }
        }

    }    

?>