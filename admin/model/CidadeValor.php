<?php

require_once 'Abstract.php';
require_once 'DbTable/CidadeValor.php';

class Model_CidadeValor extends Model_Abstract {
    
    // protected $select = "SELECT COMPLETE";

    public function __construct() {
        $this->_dbTable = new DbTable_CidadeValor();
    }
    
    protected function _insert(array $data) {
        return $this->_dbTable->insert($data);
    }
    
    protected function _update(array $data) {
        return $this->_dbTable->update($data, "id = " . (int) $data["id"]);
    }

}

?>
