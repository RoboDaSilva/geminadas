<?php

abstract class Model_Abstract {
    
    protected $_dbTable;

    public function fetchAll($group = null, $order = null) {
        if (isset($this->select)) {
            $select = $this->select;
        } else {
            $select = null;
        }
        return $this->_dbTable->fetchAll($select, $group, $order);
    }

    public function save(array $data) {
        if (!isset($data["id"])) {
            return $this->_insert($data);
        } else {
            return $this->_update($data);
        }
    }

    abstract protected function _insert(array $data);

    abstract protected function _update(array $data);

    public function find($id, $group = null) {
        if (isset($this->select)) {
            $select = $this->select;
        } else {
            $select = null;
        }
        return $this->_dbTable->find($select, $id, $group);
    }

    public function delete($id) {
        return $this->_dbTable->delete("id = " . (int) $id);
    }
    
    public function search($page = null, array $where = null, array $like = null, $group = null, $order = null, $limit = null) {
        if (isset($this->select)) {
            $select = $this->select;
        } else {
            $select = null;
        }
        return $this->_dbTable->search($select, $page, $where, $like, $group, $order, $limit);
    }
    
}

?>
