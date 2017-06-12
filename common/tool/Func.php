<?php
namespace common\tool;

/**
* 
*/
class Func
{
	/**
 	* 获取一个指定长度的随机码
	 * 
 	* @author 	chendong 	2014-04-10
 	* @author 	litt 		2015-06-04
 	* @param 	int 		$num
 	* @param 	str 		$codes  随机码包含的字符串
 	* @return 	str 		$code
 	*/	
 	function randCode($num,$codes='ABCDEFGHJKMNPQRSTUVWY123456789'){
 		$len	=	strlen($codes) - 1;
 		$code	=	'';
 		for($i=0;$i<$num;$i++){
 			$nums	=	rand(0,$len);
 			$code	.=	$codes[$nums];
 		}
 		return $code;
 	}
}