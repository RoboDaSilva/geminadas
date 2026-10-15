<?php

class Acl {
    
    private $rules_list;
    
    public function __construct() {
        $this->user_id = $_SESSION['admin_id'];
        
        $this->generateRulesList();
    }

    private function generateRulesList() {
        $sql = "SELECT admin_acl_tokens.*
                FROM admin_acl_tokens
                INNER JOIN admin_acl_rules ON admin_acl_rules.id_token = admin_acl_tokens.id
                INNER JOIN admin_users ON admin_acl_rules.id_user = admin_users.id
                WHERE admin_users.id = '$this->user_id'";

        $result = mysql_query($sql);

        $this->rules_list = array(0 => "dashboard");

        while ($row = mysql_fetch_array($result)) {
            $this->rules_list[$row['id']] = $row['token'];
        }

        return true;
    }

    public function checkAccess($token = false) {
        if (in_array($token, $this->rules_list)) {
            return true;
        } else {
            return false;
        }
    }

    public function checkAccessPage($token = false) {
        if ($this->checkAccess($token)) {
            return true;
        } else {
            echo "<script>alert('No permission');location.href='index.php';</script>";
            exit;
        }
    }

}

?>
