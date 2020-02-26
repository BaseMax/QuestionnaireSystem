<?php
require_once "_phpedb.php";
$db=new database();
$db->connect("localhost", "root", "*******");
$db->db="questionnaire";
$db->create_database($db->db, false);
function getIpAddr(){
	if(!empty($_SERVER["HTTP_CLIENT_IP"])) {
		// share internet
		$ip = $_SERVER["HTTP_CLIENT_IP"];
	}
	elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
		// proxy
		$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	}
	else if(isset($_SERVER["REMOTE_ADDR"])){
		// webserver
		$ip = $_SERVER["REMOTE_ADDR"];
	}
	else {
		// cli, without webserver
		$ip="::1";
	}
	return $ip;
}
function getUserAgent() {
	if(isset($_SERVER["HTTP_USER_AGENT"])) {
		return $_SERVER["HTTP_USER_AGENT"];
	}
	return "cli";
}
function saveUser() {
	global $db;
	$ip=getIpAddr();
	$values=["ip"=>$ip];
	if($db->count("user", $values) == 0) {
		$userID=$db->insert("user", $values);
	}
	else {
		$userID=$db->select("user", $values)["id"];
	}
	return $userID;
}
function saveSystem($userID) {
	global $db;
	$clauses=["id"=>$userID];
	if($db->count("user", $clauses) == 0) {
		return null;
	}
	$userAgent=getUserAgent();
	$values=["userAgent"=>$userAgent, "userID"=>$userID];
	if($db->count("system", $values) == 0) {
		$systemID=$db->insert("system", $values);
	}
	else {
		$systemID=$db->select("system", $values)["id"];
	}
	return $systemID;
}
function arraySearch($array, $search) {
	foreach($array as $index=>$value) {
		if($value === $search) {
			return $index;
			// return true;
			// break;
		}
	}
	// return -1;
	return false;
}
function checkValuesExists($array) {
	// [educationFeild]
	// [educationPlace]
	// [age]
	// [gender]
	// [options1]
	// [options2]
	// [options3]
	// [options4]
	// [submit]
	$fields=["educationFeild", "educationPlace", "age", "gender", "question1", "question2", "question3", "question4", "submit"];
	if(!is_array($array) || $array == null) {
		return false;
	}
	if(count($array) > count($fields)) {
		return false;
	}
	foreach($array as $key=>$value) {
		// if($i=in_array($key, $fields)) {}
		$index=arraySearch($fields, $key);
		if($index !== false) {
			unset($fields[$index]);
		}
	}
	if(count($fields) !== 0) {
		return false;
	}
	return true;
}
function fixNumber($value) {
	// if(!is_string($array)) {
	// 	return "";
	// }
	// UTF8 chars: ۰۱۲۳۴۵۶۷۸۹ / ٠١٢٣٤٥٦٧٨٩
	// We want to support persian and arabic numbers, both in one solution.
	return strtr($value, array('۰'=>'0', '۱'=>'1', '۲'=>'2', '۳'=>'3', '۴'=>'4', '۵'=>'5', '۶'=>'6', '۷'=>'7', '۸'=>'8', '۹'=>'9', '٠'=>'0', '١'=>'1', '٢'=>'2', '٣'=>'3', '٤'=>'4', '٥'=>'5', '٦'=>'6', '٧'=>'7', '٨'=>'8', '٩'=>'9'));
}
function sqlInject($value) {
	// escape_string() ...
	return $value;
}
function readValues($array) {
	$result=[];
	if(!is_array($array)) {
		return $result;
	}
	unset($array["submit"]);
	foreach($array as $key=>$value) {
		// fixNumber() required for `age` field
		// if($key === "age"){}else{}
		$result[$key]=sqlInject(mb_strtolower(trim(fixNumber($value))));
	}
	return $result;
}
function validValues($array) {
	if(!is_array($array)) {
		return false;
	}
	// if($array["educationPlace"] === "") {return false;}
	foreach($array as $key=>$value) {
		if($value === "" || $value === null) {
			return false;
		}
	}
	if(!preg_match('/[1-9][0-9]+$/i', $array["age"])) {
		return false;
	}
	return true;
}
function saveLog($type) {
	if($type == 0) {
		// normal error
		$line="[NORM ERROR] ";
	}
	else if($type == 1) {
		// bad error, db error
		$line="[DB ERROR] ";
	}
	else {
		// not support!
		// skip and not display warning!
	}
	if(isset($line)) {
		$line.=date("Y-m-d H:i:sP");
		$line.="\nserver: ". print_r($_SERVER, true).", post: ". print_r($_POST, true) . ", get: ". print_r($_GET, true). ", cookie: " . print_r($_COOKIE, true) . ", session: " . print_r($_SESSION, true);
		file_put_contents("_errors.log", $line."\n", FILE_APPEND);
	}
}
function prepareUser() {
	global $userID, $systemID;
	$GLOBALS["userID"]=saveUser();
	$GLOBALS["systemID"]=saveSystem($userID);
}
///////////////////////////////////////////////////////
$SAVE_USER_ON_FIRST_VIEW=true;
if($SAVE_USER_ON_FIRST_VIEW === true) {
	prepareUser();
}
