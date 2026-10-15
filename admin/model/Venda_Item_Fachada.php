<?php

require_once 'Abstract.php';
require_once 'DbTable/Venda_Item_Fachada.php';

class Model_Venda_Item_Fachada extends Model_Abstract {
    
    // protected $select = "SELECT COMPLETE";

    public function __construct() {
        $this->_dbTable = new DbTable_Venda_Item_Fachada();
    }
    
    protected function _insert(array $data) {
        return $this->_dbTable->insert($data);
    }
    
    protected function _update(array $data) {
        return $this->_dbTable->update($data, "id = " . (int) $data["id"]);
    }
        
}

?>
