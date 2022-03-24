<?php
class file
{
    public $path;
    public $ext;
    public $upload_size;
    public $upload_name;
    public function upload_path($path)
    {
        $this->path = $path;
    }
    public function upload_ext($ext)
    {
        $this->ext[] = $ext;
    }
    public function upload_size($size)
    {
        $this->upload_size = $size * 1024 * 1024;
    }
    public function upload_name($upload_name)
    {
        $this->upload_name = $upload_name;
    }
    public function upload($file)
    {
        $errors = array();
        $file_name = $file['name'];
        $file_size = $file['size'];
        $file_tmp = $file['tmp_name'];
        $file_type = $file['type'];
        $tmp = strtolower($file['name']);
        $tmp = explode('.', $tmp);
        $file_ext = end($tmp);
        $expensions = $this->ext;
        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "extension not allowed.";
        }
        if ($file_size > $this->upload_size) {
            $errors[] = 'File size must be excately ' . $this->upload_size;
        }
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $this->path . $this->upload_name);
            $result = $this->path . $this->upload_name;
        } else {
            $result = $errors;
        }
        return $result;
    }

    public function load_file($url)
    {
        $source = file_get_contents($url);
        return $source;
    }
    public function exist($file)
    {
        if (file_exists($file) == false) {
            return false;
        } else {
            return true;
        }
    }
    public  function MakeThumb($thumb_target = '', $width = 60, $height = 60, $SetFileName = false, $ext, $quality = 80)
    {
     
        switch ($ext)
        {
            case "jpg";
                $thumb_img = imagecreatefromjpeg($thumb_target);
            break;
            case "jpeg";
            $thumb_img = imagecreatefromjpeg($thumb_target);
            break;

            case "gif";
                $thumb_img = imagecreatefromgif($thumb_target);
            break;

            case "png";
                $thumb_img = imagecreatefrompng($thumb_target);
            break;
        }
        //$thumb_img  =   imagecreatefromjpeg($thumb_target);

        // size from
        list($w, $h) = getimagesize($thumb_target);

        if ($w > $h) {
            $new_height =   $height;
            $new_width  =   floor($w * ($new_height / $h));
            $crop_x     =   ceil(($w - $h) / 2);
            $crop_y     =   0;
        } else {
            $new_width  =   $width;
            $new_height =   floor($h * ($new_width / $w));
            $crop_x     =   0;
            $crop_y     =   ceil(($h - $w) / 2);
        }

        // I think this is where you are mainly going wrong
        $tmp_img = imagecreatetruecolor($width, $height);

        imagecopyresampled($tmp_img, $thumb_img, 0, 0, $crop_x, $crop_y, $new_width, $new_height, $w, $h);

        if ($SetFileName == false) {
            header('Content-Type: image/jpeg');
            imagejpeg($tmp_img);
        } else
            imagejpeg($tmp_img, $SetFileName, $quality);

        imagedestroy($tmp_img);
    }
}
