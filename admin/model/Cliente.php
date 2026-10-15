<?php

require_once 'Abstract.php';
require_once 'DbTable/Cliente.php';

class Model_Cliente extends Model_Abstract {
    
    protected $select = "SELECT clientes.*,
                cidades.cidade AS nome_cidade,
                cidades.estado AS nome_estado
                FROM clientes
                INNER JOIN cidades ON cidades.id = clientes.cidades_id";

    public function __construct() {
        $this->_dbTable = new DbTable_Cliente();
    }
    
    protected function _insert(array $data) {
        return $this->_dbTable->insert($data);
    }
    
    protected function _update(array $data) {
        return $this->_dbTable->update($data, "id = " . (int) $data["id"]);
    }

}

?>
