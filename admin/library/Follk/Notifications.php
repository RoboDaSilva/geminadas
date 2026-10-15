<?php

class Notifications {

    protected $model_notification;

    public function __construct() {
        $this->model_notification = new Model_Notification();
    }

    public function sendNotification($id_user_from = null, $id_user_to = null, $notification = null, $link = null) {
        if ($id_user_from != $id_user_to) {
            $data = array(
                'id_user_from' => $id_user_from,
                'id_user_to' => $id_user_to,
                'date_time' => date('Y-m-d H:i:s'),
                'notification' => $notification,
                'link' => $link,
                'status' => 0
            );

            return $this->model_notification->save($data);
        } else {
            return true;
        }
    }

}

?>
