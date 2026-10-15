<?php

class DbAdapter {

    public function search($query, $page = null, $toArray = true) {
        global $CONFIG;
        global $mysqli;
        
        $arrayReturn = array();
        
        if ($page) {
            $result = $mysqli->query($query);
            $totalItem = $result->num_rows;

            $arrayReturn['paginator']['currentPage'] = $page;
            $arrayReturn['paginator']['totalPage'] = ceil($totalItem / $CONFIG['paginator']['itemPerPage']);
            $arrayReturn['paginator']['totalItem'] = $totalItem;
            $arrayReturn['paginator']['totalItemPerPage'] = $CONFIG['paginator']['totalItemPerPage'];

            $limit = " LIMIT " . (($page - 1) * $CONFIG['paginator']['totalItemPerPage']) . ", " . $CONFIG['paginator']['totalItemPerPage'];
            $query .= $limit;
        }
        
        $result = $mysqli->query($query);
        
        if ($toArray) {
            if ($result->num_rows > 0) {
                $i = 0;

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
        } else {
            return $result;
        }
    }

    public function fetchAll($tableName, $order = null, $toArray = true) {
        $arrayReturn = array();
        $i = 0;

        $sql = "SELECT * FROM " . $tableName;

        if ($order) {
            $order = " ORDER BY " . $order;

            $sql .= $order;
        }

        $result = $this->search($sql, null, $toArray);

        if ($toArray) {
            if ($result) {
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
        } else {
            return $result;
        }
    }

    public function insert($tableName, array $data = null) {
        if ($data) {
            $filds = "";
            $values = "";
            $sql = "INSERT INTO " . $tableName . " (";

            foreach ($data as $key => $value) {
                $filds .= $key . ", ";
                if ($value === null) {
                    $values .= "NULL, ";
                } else {
                    $values .= "'" . htmlentities($value, ENT_QUOTES, "UTF-8") . "', ";
                }
            }

            $filds = substr($filds, 0, strlen($filds) - 2);
            $values = substr($values, 0, strlen($values) - 2);

            $sql .= $filds;
            $sql .= ") VALUES (";
            $sql .= $values;
            $sql .= ")";

            $result = $this->search($sql, null, false);

            if ($result) {
                $sql = "SELECT id FROM " . $tableName . " ORDER BY id DESC LIMIT 1";
                $result = $this->search($sql, null, false);
                $row = $result->fetch_assoc();

                return $row['id'];
            } else {
                return false;
            }
        }
    }

    public function update($tableName, array $data = null, $where = null) {
        if ($data and $where) {
            $filds_values = "";
            $sql = "UPDATE " . $tableName . " SET ";

            foreach ($data as $key => $value) {
                if ($value == null) {
                    $filds_values .= $key . " = NULL, ";
                } else {
                    $filds_values .= $key . " = '" . htmlentities($value, ENT_QUOTES, "UTF-8") . "', ";
                }
            }

            $filds_values = substr($filds_values, 0, strlen($filds_values) - 2);

            $conditionWhere = "";

            if ($where) {
                foreach ($where as $key => $value) {
                    $condition = str_replace("?", "'" . $value . "'", $key);
                    if ($conditionWhere == "") {
                        $conditionWhere .= " " . $condition;
                    } else {
                        $conditionWhere .= " AND " . $condition;
                    }
                }
            }

            $sql .= $filds_values;
            $sql .= " WHERE " . $conditionWhere;
            $sql .= " LIMIT 1";

            $result = $this->search($sql, null, false);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function delete($tableName, $where = null, $limit = null) {
        if ($where) {
            $sql = "DELETE FROM " . $tableName;

            $conditionWhere = "";

            if ($where) {
                foreach ($where as $key => $value) {
                    $condition = str_replace("?", "'" . $value . "'", $key);
                    if ($conditionWhere == "") {
                        $conditionWhere .= " " . $condition;
                    } else {
                        $conditionWhere .= " AND " . $condition;
                    }
                }
            }
            
            if ($limit) {
                $limit = " LIMIT " . $limit;
            } else {
                $limit = "";
            }
            $sql .= " WHERE " . $conditionWhere . $limit;
            
            $result = $this->search($sql, null, false);

            if ($result) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}

?>
