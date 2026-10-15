<?php

class Upload {

    private $config = array();
    private $error = array();
    private $names = array();
    private $ext_allowed = array();
    private $directory;
    private $ext;
    private $ext_pattern;
    private $i = 0;

    function __construct($ext = false, $directory = false) {
        $this->ext_allowed = $ext;
        $this->directory = $directory;
    }

    public function extractExtension($name) {
        if (!$this->ext_allowed) {
            $name_exploded = explode(".", $name);
            
            $this->ext = "." . $name_exploded[count($name_exploded) - 1];
            
            return $this->ext;
            
        } else {
            for ($i = 0; $i < count($this->ext_allowed); $i++) {
                $this->ext_pattern .= $this->ext_allowed[$i];

                if ($i != (count($this->ext_allowed) - 1)) {
                    $this->ext_pattern .= "|";
                }
            }

            if (preg_match("/\.(" . $this->ext_pattern . "){1}$/i", $name, $ext)) {
                $this->ext = $ext[0];
                
                return $this->ext;
            } else {
                return false;
            }
        }
    }

    private function stampImage($image, $stamp) {
        $image_data = getimagesize($image);
        $image_w = $image_data[0];
        $image_h = $image_data[1];

        $stamp_data = getimagesize($stamp['url']);
        $stamp_w = $stamp_data[0];
        $stamp_h = $stamp_data[1];

        $pos_y = $image_h + $stamp['pos-y'];

        $image_stamped = imagecreatefromjpeg($image);
        $stamp_url = imagecreatefromjpeg($stamp['url']);

        imagecopymerge($image_stamped, $stamp_url, 0, $pos_y, 0, 0, $stamp_w, $stamp_h, $stamp['opacity']);

        imagejpeg($image_stamped, $image, $stamp['quality']);

        imagedestroy($image_stamped);
        imagedestroy($stamp_url);
    }

    private function resizeImage($temp_name, $file_name, $imageMaxW, $imageMaxH, $quality, $stamp, $sufix = null, $unlink_temp_image = false) {
        if (file_exists($this->directory . $temp_name)) {
            $readImage = imagecreatefromjpeg($this->directory . $temp_name);

            $imageW = imagesx($readImage);
            $imageH = imagesy($readImage);

            $height = $imageH * $imageMaxW / $imageW;
            $width = $imageMaxW;

            if ($imageMaxH) {
                if ($height > $imageMaxH) {
                    $width = $imageW * $imageMaxH / $imageH;
                    $height = $imageMaxH;
                }
            }

            $newImage = imagecreatetruecolor($width, $height);

            imagecopyresampled($newImage, $readImage, 0, 0, 0, 0, $width + 1, $height + 1, $imageW, $imageH);

            $this->names[$sufix] = $file_name . $sufix . $this->ext;

            imagejpeg($newImage, $this->directory . $this->names[$sufix], $quality);

            imagedestroy($newImage);

            if ($unlink_temp_image) {
                unlink($this->directory . $temp_name);
            }

            if ($stamp) {
                $this->stampImage($this->directory . $this->names[$sufix], $stamp);
            }

            return true;
        } else {
            return false;
        }
    }

    public function startUpload($file = false, $dimension = null, $quality = 80) {
        if ($file) {
            $this->ext = "";

            if (!$this->extractExtension($file["name"])) {
                return false;
                exit;
            }

            $unique_name = md5(uniqid(time())) . $this->i++;

            $file_name = $unique_name;

            if ($dimension) {
                $temp_name = "temp_" . $file_name . $this->ext;

                if (!move_uploaded_file($file["tmp_name"], $this->directory . $temp_name)) {
                    return false;
                    exit;
                } else {
                    for ($i = 0; $i < count($dimension); $i++) {
                        $imageMaxW = $dimension[$i][0];
                        $imageMaxH = $dimension[$i][1];
                        $stamp = (isset($dimension[$i][2])) ? $dimension[$i][2] : null;

                        $unlink_temp_image = false;

                        if ($i == (count($dimension) - 1)) {
                            $unlink_temp_image = true;
                        }

                        if (!$this->resizeImage($temp_name, $file_name, $imageMaxW, $imageMaxH, $quality, $stamp, $i, $unlink_temp_image)) {
                            return false;
                            exit;
                        }
                    }

                    return $this->names;
                }
            } else {
                if (!move_uploaded_file($file["tmp_name"], $this->directory . $file_name . $this->ext)) {
                    return false;
                    exit;
                } else {
                    return $file_name . $this->ext;
                }
            }
        } else {
            return false;
            exit;
        }
    }

}

?>