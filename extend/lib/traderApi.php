<?php
namespace extend\lib;
class traderApi{
	const SERVER_ADDR = '121.40.53.151:8085';
	const APP_KEY = 'RYX3-1234-5678-9123';
	public static function userserExist($mobile){
		//$url = "http://121.40.53.151:8085/app/userexist/13568802228&appkey=RYX3-1234-5678-9123";
		//$url = "http://121.40.53.151:8085/app/userexist/13568802228?appkey=RYX3-1234-5678-9123";   
		$url = self::SERVER_ADDR.'/app/userexist/'.$mobile.'?appkey='.self::APP_KEY;
		$rc = self::getRequest($url);
		trace($rc);
		return $rc;
	}
     
     public static  function regUser($mobile,$nickname,$password,$deviceinfo,$name=null,$refer=null,
     	   $addr=null,$backname=null,$idcard=null,$bankno=null,$sex = null){
     	$url = self::SERVER_ADDR.'/app/regna'.'?appkey='.self::APP_KEY;
     	$param = array('mobile'=>$mobile,'nickname'=>$nickname,'password'=>md5($password),'deviceinfo'=>$deviceinfo);
     	$rc = self::postRequest($url,$param);
     	return $rc;
     }

     public static function userDetail($mobile){
         $url = self::SERVER_ADDR.'/app/userdetail/'.$mobile.'?appkey='.self::APP_KEY;
		$rc = self::getRequest($url);
		trace($rc);
		return $rc;
     }

     public static function changeUserDetail($mobile,$nickname,$name,$addr,$bankname,$bankno,$email){
     	$url = self::SERVER_ADDR.'/app/changedetail/'.$mobile.'?appkey='.self::APP_KEY;
     	$param = array('mobile'=>$mobile,'nickname'=>$nickname,'name'=>$name,
     		             'addr'=>$addr,'bankname'=>$bankname,'bankno'=>$bankno,'email'=>$email);

     	$rc = self::postRequest($url,$param);
     	return $rc;
     }

     public static function changePassWord($mobile,$password,$newpassword){
     	$url = self::SERVER_ADDR.'/app/changedetail/'.$mobile.'?appkey='.self::APP_KEY;
     	$param = array('password'=>$password,'newpassword'=>$newpassword);
     	$rc = self::postRequest($url,$param);
     	return $rc;
     }

     public static function  query($userid){
     	$url = self::SERVER_ADDR.'/app/vm/query/'.$userid.'?appkey='.self::APP_KEY;
     	//app/userexist/:mobile
		$rc = self::getRequest($url);
		trace($rc);
		return $rc;
     }

     public static function buyfund($userid){
     	$url = self::SERVER_ADDR.'/app/vm/buyfund/'.$userid.'?appkey='.self::APP_KEY;
     	//app/userexist/:mobile
		$rc = self::getRequest($url);
		trace($rc);
		return $rc;
     }

     public static function getpos($userid){
     	$url = self::SERVER_ADDR.'/app/vm/getpos/'.$userid.'?appkey='.self::APP_KEY;
     	//app/userexist/:mobile
		$rc = self::getRequest($url);
		trace($rc);
		return $rc;
     }

     public static function upload($userid){
     	$url = self::SERVER_ADDR.'/app/vm/upload/'.$userid.'?appkey='.self::APP_KEY;
     	//app/userexist/:mobile
		$rc = self::getRequest($url);
		trace($rc);
		return $rc;
     }


     public static function download($userid){
     	$url = self::SERVER_ADDR.'/app/vm/download/'.$userid.'?appkey='.self::APP_KEY;
     	//app/userexist/:mobile
		$rc = self::getRequest($url);
		trace($rc);
		return $rc;
     }

	private static function getRequest($url){
		// ip via
		$header = array('CLIENT-IP:140.207.114.102','X-FORWARDED-FOR:140.207.114.102',  'Content-Type: application/x-www-form-urlencoded;charset=UTF-8','Accept: application/json');
		$curl = curl_init();
	    //设置抓取的url 
	  
	 // $url= "www.baidu.com";
	    curl_setopt($curl, CURLOPT_URL,$url);
	    //设置头文件的信息作为数据流输出
	    curl_setopt($curl, CURLOPT_HEADER, 1);
	    curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
	    //设置获取的信息以文件流的形式返回，而不是直接输出。
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);

	 
	    //执行命令
	    $result = curl_exec($curl);

	    $length = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
 
        //取出头信息
        $header = substr($result, 0, $length);
 
        //去掉头信息
        $result = substr($result, $length);
  
	    curl_close($curl);
	    $rc = json_decode($result,true);
	    return json_decode($rc,true);
	}

	private static function postRequest($url, array $params = array(), $timeout = 30 ) {
		$header = array('CLIENT-IP:140.207.114.102','X-FORWARDED-FOR:140.207.114.102',  'Content-Type: application/x-www-form-urlencoded;charset=UTF-8','Accept: application/json');
	    $curl = curl_init();
	    curl_setopt( $curl, CURLOPT_URL, $url);
	    // 以返回的形式接收信息
	    curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
	    // 设置为POST方式
	    curl_setopt( $curl, CURLOPT_POST, 1 );
	    curl_setopt( $curl, CURLOPT_POSTFIELDS, http_build_query( $params ) );
	    trace($params);
	    // 不验证https证书
	    curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
	    curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, 0 );
	    curl_setopt( $curl, CURLOPT_TIMEOUT, $timeout );
	    curl_setopt( $curl, CURLOPT_HTTPHEADER, $header); 
	    // 发送数
	    $rc = curl_exec( $curl );

	    // 不要忘记释放资源
	    curl_close( $curl );
	    return json_decode($rc,true);
	}
}