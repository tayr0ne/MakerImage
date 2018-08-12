<?php


class makerImage {

    private $_arq;
    private $_img;
    private $_titleColor;
    private $_color;
    private $_fontpath;
    private $_fontpath2;   
    private $_size;
    private $_angular;
    private $_x;
    private $_y;
    private $_text;

    public function __construct($arq) {
        
        $this->_arq = $arq;
        $this->_img = imagecreatefromjpeg($this->_arq);
    
    }

    public function setTitleColor($c01, $c02, $c03) {

        $this->_titleColor = imagecolorallocate($this->_img, $c01, $c02, $c03);

    }

    public function setColor($c01, $c02, $c03) {

        $this->_color = imagecolorallocate($this->_img, $c01, $c02, $c03);

    }

    public function setFontPath($f01, $f02) {

        $this->_fontpath = $f01;
        $this->_fontpath2 = $f02;

    } 
     
    public function setCreateImgShow($size, $angular, $x, $y, $array, $text) {
        $this->_size[$array] = $size;
        $this->_angular[$array] = $angular;
        $this->_x[$array] = $x;
        $this->_y[$array] = $y;
        $this->_text[$array] = $text;
        
       
    }


    public function createImgShow() {
      $i = 0;
       foreach($this->_text as $row){
          imagettftext($this->_img,  $this->_size[$i],  $this->_angular[$i],  $this->_x[$i],  $this->_y[$i], $this->_titleColor, $this->_fontpath, $this->_text[$i]);
           $i++;
    }
       //imagestring($this->_img, 10, 350, 600,"Hcode cursos", $this->_titleColor);
       imagejpeg($this->_img);
       imagedestroy($this->_img);
       
    }


  public function SaveImg($caminho) {

    $i = 0;
    foreach($this->_text as $row){
       imagettftext($this->_img,  $this->_size[$i],  $this->_angular[$i],  $this->_x[$i],  $this->_y[$i], $this->_titleColor, $this->_fontpath, $this->_text[$i]);
        $i++;
    }
        imagejpeg($this->_img, "$caminho".".jpg");
        imagedestroy($this->_img);
    }
   

} // Fim da classe de imagem



//Report any errors

/*ini_set("display_errors", "1");
error_reporting(E_ALL); 

//Set the content type
header('content-type: image/jpeg');

$arquivo =  '/var/www/html/src/biblio/imgs/certificado.jpg';

$font_path = '/var/www/html/src/biblio/fonts/Bevan-Regular.ttf';
$font_path2 = '/var/www/html/src/biblio/fonts/Playball-Regular.ttf';

$string = 'Certificado';
$string02 = 'Certificamos que o aluno Donald Amannd';
$string03 = 'Conclui com aproveitamento o treinamento';
$string04 = 'de Javascript 8.5 com 32 horas no total';

$image = new ProcImage($arquivo);

$image->setTitleColor(0 , 0, 0);

$image->setColor(100, 100, 100);

$image->setFontPath($font_path, $font_path2);

$image->setMsg($string, $string02, $string03, $string04);

//$image->createImgShow();

$image->SaveImg();*/



?>