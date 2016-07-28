<?php
namespace extend\lib;
use \think\Session;
use \think\Db;
class user{
	private $userid;
	public  $nickname;
	public $name;
	public $mobile;

	static public function auth($userid,$passwd){
		$rec = Db::query('select * from user where userid=?',[$userid]);
		if(count($rec)==0) return false;
		else if($passwd===$rec[0]['passwd']){
			trace($passwd);
			trace($rec[0]['passwd']);
			$user = new user($userid);
			$user->nickname = $rec[0]['nickname'];
			$user->mobile  = $rec[0]['mobile'];
			$user->name = $rec[0]['name'];
			//Session::set('user',$user);
			return $user;
		}
		return false;
	}
	static public function register($regData){
		$rec = Db::query('select * from user where userid=?',[$regData['mobile']]);
		if(count($rec)==1) return 0;
		Db::table('user')->insert($regData);
		return 1;
	}
	function __construct($userid){
		$this->userid = $userid;
	}
}