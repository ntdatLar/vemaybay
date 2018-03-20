<?php
/**
 *
 * @package		Adminpro
 * @author		Nguyễn Thành Đạt (ntdat.tb@gmail.com)
 * @copyright   PHP TEAM
 * @link
 * @since		Version 1.0
 * @phone       0969730726
 *
 */

if(!function_exists("pre"))
{
    function pre($var)
    {   
        echo "<pre>";
        if(is_array($var) || is_object($var)){
            print_r($var);
        }else{
            echo $var;
        }
        echo "</pre>";
        //die();
    }
}
/*
	* This is function replace
*/
if(!function_exists("replace"))
{
	function replace($str) {
		if(!$str) return false;
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
			'-'=>array(', ','. ','+','!'),
			'' =>array(',','.',', ','+'),
			'' =>array('(',')','+','%','?','.','`'),
			'-'=>array(' .',' ;','; ',' :',': ',', ','+','!','%','?','.','`',' '),
			'-'=>array(';',':','!','%','?','.','`',' '),
			'-'=>array(' - ',' , ',',',', ','+','!','%','?','.','`',' '),
		);

		foreach($unicode as $nonUnicode=>$uni){
			foreach($uni as $value)
				$str = str_replace($value,$nonUnicode,$str);
		}
		$str =  str_replace('---','-', $str);
		$str =  str_replace('--','-', $str);
		return $str;
	}
}
# Chuyển đổi ký tự tiếng việt sang dạng ascii
function VietChar($str) {
	$arr_fillter = array('--','---',);
	$arr_fillter[] = html_entity_decode('&ndash;');
	$str = str_replace('   ',' ',str_replace($arr_fillter,' ',$str));	
    $vietChar    = 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ó|ò|ỏ|õ|ọ|ơ|ớ|ờ|ở|ỡ|ợ|ô|ố|ồ|ổ|ỗ|ộ|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|í|ì|ỉ|ĩ|ị|ý|ỳ|ỷ|ỹ|ỵ|đ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ó|Ò|Ỏ|Õ|Ọ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Í|Ì|Ỉ|Ĩ|Ị|Ý|Ỳ|Ỷ|Ỹ|Ỵ|Đ';
    $engChar     = 'a|a|a|a|a|a|a|a|a|a|a|a|a|a|a|a|a|e|e|e|e|e|e|e|e|e|e|e|o|o|o|o|o|o|o|o|o|o|o|o|o|o|o|o|o|u|u|u|u|u|u|u|u|u|u|u|i|i|i|i|i|y|y|y|y|y|d|A|A|A|A|A|A|A|A|A|A|A|A|A|A|A|A|A|E|E|E|E|E|E|E|E|E|E|E|O|O|O|O|O|O|O|O|O|O|O|O|O|O|O|O|O|U|U|U|U|U|U|U|U|U|U|U|I|I|I|I|I|Y|Y|Y|Y|Y|D';
    $arrVietChar = explode("|", $vietChar);
    $arrEngChar  = explode("|", $engChar);
    return str_replace($arrVietChar, $arrEngChar, $str);
}	
//Clean XSS
function fillter($str){
	$str = str_replace("<", "&lt;", $str);
	$str = str_replace(">", "&gt;", $str);
	$str = str_replace("&", "&amp;", $str);			
	$str = str_replace("|", "&brvbar;", $str);
	$str = str_replace("~", "&tilde;", $str);
	$str = str_replace("`", "&lsquo;", $str);
	$str = str_replace("#", "&curren;", $str);
	$str = str_replace("%", "&permil;", $str);
	$str = str_replace("'", "&rsquo;", $str);
	$str = str_replace("\"", "&quot;", $str);
	$str = str_replace("\\", "&frasl;", $str);
	$str = str_replace("--", "&ndash;&ndash;", $str);
	$str = str_replace("ar(", "ar&Ccedil;", $str);
	$str = str_replace("Ar(", "Ar&Ccedil;", $str);
	$str = str_replace("aR(", "aR&Ccedil;", $str);
	$str = str_replace("AR(", "AR&Ccedil;", $str);
	return htmlspecialchars($str);
}

/*
	* This is function get_ip
*/
function get_ip() {
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }else if($_SERVER['HTTP_X_FORWARDED_FOR'] != NULL){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
//this is function cut string description
function cut( $str, $limit, $more=" ..."){
	if ($str=="" || $str == NULL || is_array($str) || strlen($str)==0)
	  return $str;
	$str = trim($str);

	if (strlen($str) <= $limit) return $str;
	$str = substr($str,0,$limit);

	if (!substr_count($str," ")){
	  if ($more) $str .= " ...";
	  return $str;
	}
	while(strlen($str) && ($str[strlen($str)-1] != " ")){
	  $str = substr($str,0,-1);
	}
	$str = substr($str,0,-1);
	if ($more) $str .= " ...";
	return $str;
}

//function show category recursive
if(!function_exists("showCate")) {
	function showCate($cateArray = NULL,$parent_id=0,$char = '',$select = 0){
		$txtselect = '';
		if(is_array($cateArray)){
			foreach($cateArray as $item){
				if($parent_id == $item['parent_id']){
					if($select == $item['id']){
						$txtselect = 'selected';
					}
					echo '<option value="'.$item['id'].'" '.$txtselect.'>'.$char.$item['name'].'</option>';
					$txtselect = '';
					showCate($cateArray,$item['id'],$char.'--');
				}
			}
		}
	}
}