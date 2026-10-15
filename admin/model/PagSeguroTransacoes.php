<?php

require_once 'Abstract.php';
require_once 'DbTable/PagSeguroTransacoes.php';

class Model_PagSeguroTransacoes extends Model_Abstract {
    
    // protected $select = "SELECT COMPLETE";

    public function __construct() {
        $this->_dbTable = new DbTable_PagSeguroTransacoes();
    }
    
    protected function _insert(array $data) {
        return $this->_dbTable->insert($data);
    }
    
    protected function _update(array $data) {
        return $this->_dbTable->update($data, "id = " . (int) $data["id"]);
    }
        
}

?>
