<?php 

    class Usuario {

        public static function uptadeUser($name, $password, $img) {
            $sql = MySql::conectar()->prepare("UPDATE `tb_admin.usuarios` SET name = ?, password = ?, img = ? WHERE user = ?");
            if($sql->execute([$name, $password, $img, $_SESSION['user']])) {
                return true;
            } else {
                return false;
            }
        } 

        public static function imagemValida($image) {
            if($image['type'] == 'image/jpeg' ||
            $image['type'] == 'image/jpg' ||
            $image['type'] == 'image/gif' ||
            $image['type'] == 'image/png') {
                $size = intval($image['size'] / 1024);
                if($size < 10000) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        public static function uptadeFile($file) {
            $type =  explode('/', $file['type'])[1];
            $newName =  uniqid ( time () ) . '.' . $type;
            if(move_uploaded_file($file['tmp_name'], BASE_DIR_PAINEL.'/uploads/'.$newName)) {
                return $newName;
            } else {
                return false;
            }
        }

        public static function deleteFile($file) {
            if(is_file('uploads/'.$file)) {
                if(@unlink('uploads/'.$file)) {
                    return true;
                } else {
                    return false;
                }
            }
        }
        
        public static function createUser ($user, $password, $name, $img, $office) {
            $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.usuarios` VALUES (null, ?, ?, ?, ?, ?)");
            if($user != null) {
                if( $sql->execute([$user, $password, $name, $img, $office])) {
                    Painel::alertResponse('success',"Usuário $user criado com sucesso!");
                } else {
                    Painel::alertResponse('error', "Error ao criar o usuario $user...");
                } 
            }
        }

    }

?>