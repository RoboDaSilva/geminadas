<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Check Auth
require 'checkAuth.php';

// Configurations
require 'config.php';

// Connections
require 'db-connect.php';

// Access Control
require 'library/Follk/Acl.php';
$acl = new Acl();

// Format
require 'library/Follk/Format.php';
$format = new Format();

// Db Adapter
require 'library/Follk/DbAdapter.php';
$db_adapter = new DbAdapter();

// Notifications
if ($CONFIG['notifications']) {
    require 'library/Follk/Notifications.php';
    require 'model/Notification.php';
    $notifications = new Notifications();
}

// Define user id
$user_id = $_SESSION['admin_id'];
?>
