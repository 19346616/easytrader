<?php
namespace extend\lib;
class sms{
	// 配置项
const SMSGATE = 'https://webapi.sms.mob.com';// '接口地址（例：https://webapi.sms.mob.com)';
const APPKEY = '14588ae31b5c8';
const ZONE = '86';
static function doPostRequest($phone,$code){
	self::postRequest(self::SMSGATE.'/sms/verify',array( 
	    'appkey' =>self::APPKEY,
	    'phone' =>$phone,
	    'zone' =>self::ZONE,
	    'code' =>$code));
}
 
/**
 * 发起一个post请求到指定接口
 * 
 * @param string $api 请求的接口
 * @param array $params post参数
 * @param int $timeout 超时时间
 * @return string 请求结果
 */
private static function postRequest($api, array $params = array(), $timeout = 30 ) {
    $ch = curl_init();
    trace($ch);
    curl_setopt( $ch, CURLOPT_URL, $api );
    // 以返回的形式接收信息
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
    // 设置为POST方式
    curl_setopt( $ch, CURLOPT_POST, 1 );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $params ) );
    // 不验证https证书
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
    curl_setopt( $ch, CURLOPT_TIMEOUT, $timeout );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/x-www-form-urlencoded;charset=UTF-8',
        'Accept: application/json',
    ) ); 
    // 发送数据
    trace($ch);
    $response = curl_exec( $ch );

    // 不要忘记释放资源
    curl_close( $ch );
    return $response;
	}
}