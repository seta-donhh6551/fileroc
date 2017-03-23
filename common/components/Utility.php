<?php

namespace common\components;

class Utility
{
	public static $defaultPageSize = 9;
	public static $defaultLimitPost = 9;
	
    public static $defaultImageThumb = array(
        'width' => 250,
        'height' => 250
    );
	
	public static $smallImageThumb = array(
        'width' => 77,
        'height' => 52
    );
    
    /**
     * Debug data
     *
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     * @param $val int
     * @return array
     */
    public static function debugData($value, $die = true)
    {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
		if($die){
			die();
		}
    }

	public static function getUserIp()
	{
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}

	/**
     * Format date
     *
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     * @param $year, $month, $day int
     * @return array
     */
    public static function formatInputDate($year, $month, $day)
    {
       return sprintf('%d-%d-%d', $year, $month, $day);
    }

    /**
     * @description Convert vietnamese, rewrite url
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     */
    public static function replaceUrl($str)
    {
		if(!$str){
            return false;
        }
  	        $unicode = array(
                'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'),
  	            'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
  	            'd'=>array('đ'),
                '-'=>array('-'),
  	            'D'=>array('Đ'),
  	            'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
  	            'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
  	            'i'=>array('í','ì','ỉ','ĩ','ị'),
  	            'I'=>array('Í','Ì','Ỉ','Ĩ','Ị'),
  	            'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
  	            '0'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
  	            'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
  	            'U'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
  	            'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),
  	            'Y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
                '-'=>array(', ','. '),
                '' =>array(',','.'."'"),
                '-'=>array(' .',' ;','; ',' :',': '),
  	            '-'=>array(';',':')
  	        );

  	        foreach($unicode as $nonUnicode=>$uni){
  	        	foreach($uni as $value)
            	$str = str_replace($value,$nonUnicode,$str);
  	        }

    	return strtolower($str);
	}
    
    public function addTextCopryRight($fileName, $outPath)
    {
        $imgSize = getimagesize($fileName);
        
        if(empty($imgSize))
        {
            return array(
                'result' => 0,
                'reason' => 'File '.$fileName.' is not exist'
            );
        }
        
        if($imgSize['mime'] != 'image/jpeg' && $imgSize['mime'] != 'image/png')
        {
            return array(
                'result' => 0,
                'reason' => 'File '.$fileName.' is JPG or PNG required'
            );
        }
		
		if($imgSize[0] < 400)
        {
            return array(
                'result' => 0,
                'reason' => 'File '.$fileName.' width from 400px'
            );
        }
        
        if($imgSize['mime'] == 'image/jpeg'){
            $jpgImage = imagecreatefromjpeg($fileName);
        }
        
        if($imgSize['mime'] == 'image/png'){
            $jpgImage = imagecreatefrompng($fileName);
        }

        // Allocate A Color For The Text
        $textColor = imagecolorallocate($jpgImage, 255, 0, 0);

        $top = $imgSize[1] - 50;
        $left = $imgSize[0] - 200;

        // Set Path to Font File
        $fontPath = 'fonts/Fashionv.ttf';

        // Set Text to Be Printed On Image
        $text = "FreeFile.vn";

        // Print Text On Image
        imagettftext($jpgImage, 30, 0, $left, $top, $textColor, $fontPath, $text);

        // Send Image to Browser
        header('Content-Type: image/jpg');
        imagejpeg($jpgImage, $outPath.'/'.$fileName, 100);
        
        return array(
            'result' => 1,
            'reason' => 'File '.$fileName.' create successfully!'
        );
    }

    /**
     * Get now date
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     */
    public static function getNowDate()
    {
        $nowDate = getdate();
        return $nowDate['weekday'].' , '.$nowDate['wday'].'/'.$nowDate['mon'].'/'.$nowDate['year'];
    }
}
