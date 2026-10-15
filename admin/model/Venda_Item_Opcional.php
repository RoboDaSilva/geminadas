<?php

require_once 'Abstract.php';
require_once 'DbTable/Venda_Item_Opcional.php';

class Model_Venda_Item_Opcional extends Model_Abstract {
    
    // protected $select = "SELECT COMPLETE";
    protected $select = "SELECT vendas_itens_opcionais.*,
                    opcionais.nome,
                    opcionais.valor
                    FROM vendas_itens_opcionais
                    INNER JOIN opcionais ON opcionais.id = vendas_itens_opcionais.opcionais_id";
    
    public function __construct() {
        $this->_dbTable = new DbTable_Venda_Item_Opcional();
    }
    
    protected function _insert(array $data) {
        return $this->_dbTable->insert($data);
    }
    
    protected function _update(array $data) {
        return $this->_dbTable->update($data, "id = " . (int) $data["id"]);
    }
        
}

?>
