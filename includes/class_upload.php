<?php
class upload{
	var $max_size = 2000000;
	var $file;
	var $quality = 100;
	var $name;
	function rename(){
		$this->name = 'sonvt_'.date('hmsdmY').'_'.$this->file['name'];
	}
	function gettype(){
		$type = 0;
		switch($this->file['type'])
        {
            case 'image/jpeg':
                $type = 1;
                break;
            case 'image/jpg':
                $type = 1;
                break;            
            case 'image/gif':
                $type = 2;
                break;
            case 'image/png':
                $type = 3;
                break;
            case 'application/x-shockwave-flash':
                $type = 4;
                break;    
            default:
                $type = 0;
                break;
        }
        return $type;
	}
	function checkfile(){
		if ($this->gettype()== 0){
			die("Incorrect file upload");
		}
		$size = $this->file['size'];
		if ($size > $this->max_size){
			die ("File upload limit (2Mb)");
		}
	}
	function process($file,$path,$max_width = 0,$max_height = 0){
		$this->file = $file;
		$this->checkfile($file);
		$this->rename();
		$this->getsize();
		@move_uploaded_file($file['tmp_name'], $path.$this->name);
		if ($this->gettype() != 4){
			if (intval($max_width) > 0){
				if ($this->getwidth < $max_width)
				$max_width = $this->getwidth;
				$this->new_height = ( $max_width/$this->getwidth )*$this->getheight;
				$this->new_width = $max_width;
				$this->resize($path);
			}
			elseif (intval($max_height) > 0){
				if ($this->getheight < $max_height)
				$max_height = $this->getheight;
				$this->new_width = $max_height/$this->getheight * $this->getwidth;
				$this->new_height = $max_height;
				$this->resize($path);
			}
		}
		return $this->name;
	}
    function getsize(){
		$size = getimagesize($this->file['tmp_name']);
		$this->getheight = $size[1];
		$this->getwidth = $size[0];
	} 
	
	function resize($path){
		$path_resize = $path.'resize/'.$this->name;
		switch ($this->gettype()){
			case 1:
			$simg = imagecreatefromjpeg($path.$this->name);
			break;
			case 2:
			$simg = imagecreatefromgif($path.$this->name);
			break;
			case 3:
			$simg =imagecreatefrompng($path.$this->name);
			break;
		}	
		$dst = imagecreatetruecolor($this->new_width, $this->new_height);
		$white = imagecolorallocate($dst, 255, 255, 255);
		imagefill($dst, 0, 0, $white);

		if (function_exists('imageantialias'))
  			imageantialias($dst, true);
  		imagecopyresampled($dst, $simg, 0, 0, 0, 0, $this->new_width, $this->new_height, $this->getwidth, $this->getheight);
    	imagejpeg($dst, $path_resize, 90);
     	imagedestroy($simg); // Destroying The Temporary Image
	}   
}
?>