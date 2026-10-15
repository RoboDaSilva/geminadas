<?php

/*
 * A opção safe_mode do servidor deve estar desativada
 */

class ManageDirectory {
    
    public function make_dir($dir, $mode = 0777, $recursive = false) {

        // Verifica se a entrada já existe
        if (file_exists($dir)) {

            // Verifica se é um diretório
            if (is_dir($dir)) {
                return true;
            }
        }

        // Cria o diretório
        $old_umask = umask(0);
        if (mkdir($dir, $mode, $recursive)) {
            umask($old_umask);
            return true;
        } else {
            return false;
        }
    }

    public function rename_dir($oldname, $newname) {

        // Verifica se a entrada já existe
        if (!file_exists($oldname)) {
            return false;
        }

        // Verifica se é um diretório
        if (!is_dir($oldname)) {
            return false;
        }

        // Renomeia o diretório
        $old_umask = umask(0);
        if (rename($oldname, $newname)) {
            umask($old_umask);
            return true;
        } else {
            return false;
        }
    }

    public function remove_dir($dir) {

        // Verifica se a entrada existe
        if (!file_exists($dir)) {
            return false;
        }

        // Verifica se é um diretório
        if (!is_dir($dir)) {
            return false;
        }

        // Para cada entrada do diretório 
        foreach (scandir($dir) as $item) {

            // Atalhos simbólicos no Unix, passemos
            if (!in_array($item, array('.', '..'))) {

                // Encontramos o caminho em relação ao início 
                $item = $dir . DIRECTORY_SEPARATOR . $item;

                // Remove o subdiretório ou um arquivo
                if (is_dir($item)) {
                    $this->remove_dir($item);
                } else {
                    unlink($item);
                }
            }
        }

        // Remove o diretório
        $old_umask = umask(0);
        if (rmdir($dir)) {
            umask($old_umask);
            return true;
        } else {
            return false;
        }
    }

}

?>