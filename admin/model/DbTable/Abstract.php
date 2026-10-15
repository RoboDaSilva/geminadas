<?php

abstract class DbTable_Abstract {
    protected $_name;

    public function search($select = null, $page = null, array $where = null, array $like = null, $group = null, $order = null, $limit = null) {
        global $CONFIG;
        global $mysqli;

        $sql = "";

        $arrayReturn = array();
        $conditionWhere = "";
        $conditionLike = "";
        $conditions = "";
        $i = 0;

        if ($where) {
            if (isset($where['use_prefix_table'])) {
                $where_use_prefix_table = $where['use_prefix_table'];
                unset($where['use_prefix_table']);
            } else {
                $where_use_prefix_table = true;
            }

            foreach ($where as $key => $value) {
                $condition = str_replace("?", "'" . $value . "'", $key);
                if ($conditionWhere == "") {
                    $conditionWhere .= ($where_use_prefix_table) ? " {$this->_name}.{$condition}" : " {$condition}";
                } else {
                    $conditionWhere .= ($where_use_prefix_table) ? " AND {$this->_name}.{$condition}" : " AND {$condition}";
                    
                }
            }
        }

        if ($like) {
            if (isset($like['use_prefix_table'])) {
                $like_use_prefix_table = $like['use_prefix_table'];
                unset($like['use_prefix_table']);
            } else {
                $like_use_prefix_table = true;
            }

            foreach ($like as $key => $value) {
                $condition = str_replace("=", "", str_replace("?", "LIKE '%" . htmlentities($value, ENT_QUOTES, "UTF-8") . "%'", $key));
                if ($conditionLike == "") {
                    $conditionLike .= ($like_use_prefix_table) ? " {$this->_name}.{$condition}" : " {$condition}";
                } else {
                    $conditionLike .= ($like_use_prefix_table) ? " OR {$this->_name}.{$condition}" : " OR {$condition}";
                }
            }

            $conditionLike = "({$conditionLike})";
        }

        if ($where or $like) {
            if ($where) {
                $conditions .= ($conditions != "") ? " AND " : "";
                $conditions .= $conditionWhere;
            }

            if ($like) {
                $conditions .= ($conditions != "") ? " AND " : "";
                $conditions .= $conditionLike;
            }

            $sql .= " WHERE " . trim($conditions);
        }

        if ($group) {
            $group = " GROUP BY {$group}";

            $sql .= $group;
        }

        if ($order) {
            $order = " ORDER BY {$order}";

            $sql .= $order;
        }

        if ($page) {
            if (!$select) {
                $result = $mysqli->query("SELECT * FROM {$this->_name} {$sql}");
                $totalItem = $result->num_rows;
            } else {
                $result = $mysqli->query("SELECT {$select} FROM {$this->_name} {$sql}");
                $totalItem = $result->num_rows;
            }

            $arrayReturn['paginator']['currentPage'] = $page;
            $arrayReturn['paginator']['totalPage'] = ceil($totalItem / $CONFIG['paginator']['totalItemPerPage']);
            $arrayReturn['paginator']['totalItem'] = $totalItem;
            $arrayReturn['paginator']['totalItemPerPage'] = $CONFIG['paginator']['totalItemPerPage'];

            $limit = " LIMIT " . (($page - 1) * $CONFIG['paginator']['totalItemPerPage']) . ", " . $CONFIG['paginator']['totalItemPerPage'];
            $sql .= $limit;
        } else {
            if ($limit) {
                $limit = " LIMIT {$limit}";

                $sql .= $limit;
            }
        }

        if (!$select) {
            $select = "SELECT * FROM {$this->_name}";
        }

        $sql = $select . $sql;

        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $arrayReturn[$i] = array();

                foreach ($row as $key => $value) {
                    $arrayReturn[$i][$key] = html_entity_decode($value, ENT_QUOTES, 'UTF-8');
                }

                $i++;
            }

            return $arrayReturn;
        } else {
            return false;
        }
    }

    public function fetchAll($select = null, $group = null, $order = null) {
        global $CONFIG;
        global $mysqli;

        $arrayReturn = array();
        $i = 0;

        if ($select) {
            $sql = $select;
        } else {
            $sql = "SELECT * FROM {$this->_name}";
        }

        if ($group) {
            $group = " GROUP BY {$group}";

            $sql .= $group;
        }

        if ($order) {
            $order = " ORDER BY {$order}";

            $sql .= $order;
        }

        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $arrayReturn[$i] = array();

                foreach ($row as $key => $value) {
                    $arrayReturn[$i][$key] = html_entity_decode($value, ENT_QUOTES, 'UTF-8');
                }

                $i++;
            }
            return $arrayReturn;
        } else {
            return false;
        }

        return $sql;
    }

    public function find($select = null, $id = null, $group = null) {
        global $CONFIG;
        global $mysqli;

        $arrayReturn = array();

        if ($select) {
            $sql = $select . " WHERE {$this->_name}.id = " . $id;
        } else {
            $sql = "SELECT * FROM {$this->_name} WHERE id = " . $id;
        }

        if ($group) {
            $group = " GROUP BY {$group}";

            $sql .= $group;
        }

        $sql .= " LIMIT 1";

        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            foreach ($row as $key => $value) {
                $arrayReturn[$key] = html_entity_decode($value, ENT_QUOTES, 'UTF-8');
            }

            return $arrayReturn;
        } else {
            return false;
        }
    }

    public function insert(array $data = null) {
        global $CONFIG;
        global $mysqli;

        if ($data) {
            $filds = "";
            $values = "";
            $sql = "INSERT INTO {$this->_name} (";

            foreach ($data as $key => $value) {
                $filds .= $key . ", ";
                if ($value === null || $value === "") {
                    $values .= "NULL, ";
                } else {
                    $value_htmlentities = htmlentities($value, ENT_QUOTES, "UTF-8");
                    $values .= "'{$value_htmlentities}', ";
                }
            }

            $filds = substr($filds, 0, strlen($filds) - 2);
            $values = substr($values, 0, strlen($values) - 2);

            $sql .= $filds;
            $sql .= ") VALUES (";
            $sql .= $values;
            $sql .= ")";

            $result = $mysqli->query($sql);

            if ($result) {
                $sql = "SELECT id FROM {$this->_name} ORDER BY id DESC LIMIT 1";
                $result = $mysqli->query($sql);
                $row = $result->fetch_assoc();

                return $row['id'];
            } else {
                return false;
            }
        }
    }

    public function update(array $data = null, $condition = null) {
        global $CONFIG;
        global $mysqli;
        if ($data and $condition) {
            $filds_values = "";
            $sql = "UPDATE {$this->_name} SET ";

            foreach ($data as $key => $value) {
                if ($value === null || $value === "") {
                    $filds_values .= "{$key} = NULL, ";
                } else {
                    $value_htmlentities = htmlentities($value, ENT_QUOTES, "UTF-8");
                    $filds_values .= "{$key} = '{$value_htmlentities}', ";
                }
            }

            $filds_values = substr($filds_values, 0, strlen($filds_values) - 2);

            $sql .= $filds_values;
            $sql .= " WHERE {$condition}";
            $sql .= " LIMIT 1";

            $result = $mysqli->query($sql);

            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function delete($condition = null) {
        global $CONFIG;
        global $mysqli;
        if ($condition) {
            $sql = "DELETE FROM {$this->_name} WHERE {$condition} LIMIT 1";

            $result = $mysqli->query($sql);

            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    }

}
?>