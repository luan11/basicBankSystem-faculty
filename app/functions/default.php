<?php
require_once 'core/UserRegister.php';
require_once 'core/UserLogin.php';
require_once 'core/UserPanel.php';

function execute_act($page, $func){

	$now_uri = $_SERVER['REQUEST_URI'];

	if(strpos($now_uri,$page)){
		$func();
	}

}

function verify_act($page){
	$now_uri = $_SERVER['REQUEST_URI'];

	if(strpos($now_uri,$page)){
		return true;
	}else{
		return false;
	}
}

function str_replace_assoc(array $values, $string){

	return str_replace(array_keys($values), array_values($values), $string);

}

function generate_account_number(){

	if(verify_act('register')){
		$acc_num = '';

		for($i = 0; $i <= 6; $i++){
			$acc_num .= rand(0,9);
		}

		return $acc_num;		
	}

}

function initial_money(){

	if(verify_act('register')){
		return "R$ ".rand(10,50).",00";
	}	

}

function sanitize_money($money){

	$replaces = [
		"R$ " => "",
		"." => "",
		"," => "."
	];

	return str_replace_assoc($replaces, $money);

}

function format_money($money){

	$formatedMoney = number_format($money, 2, ',', '.');
	return "R$ ".$formatedMoney;

}

function register_user(){

	if(isset($_POST['form-ib-register-submit']) && isset($_POST['form-ib-register-name']) && isset($_POST['form-ib-register-account']) && isset($_POST['form-ib-register-money']) && isset($_POST['form-ib-register-pass'])){
		$userName = filter_var($_POST['form-ib-register-name'], FILTER_SANITIZE_STRING);
		$userAcc = filter_var($_POST['form-ib-register-account'], FILTER_SANITIZE_STRING);
		$userIniMoney = floatval(filter_var(sanitize_money($_POST['form-ib-register-money']), FILTER_SANITIZE_STRING));
		$userPass = filter_var($_POST['form-ib-register-pass'], FILTER_SANITIZE_STRING);

		$userReg = new UserRegister($userName, $userAcc, $userIniMoney, $userPass);
	}

}
execute_act('register', 'register_user');

function login_user(){

	if(isset($_POST['form-ib-login-submit']) && isset($_POST['form-ib-login-account']) && isset($_POST['form-ib-login-pass'])){
		$userAcc = filter_var($_POST['form-ib-login-account'], FILTER_SANITIZE_STRING);
		$userPass = filter_var($_POST['form-ib-login-pass'], FILTER_SANITIZE_STRING);
	
		$userLog = new UserLogin($userAcc, $userPass);
	}

}
execute_act('login', 'login_user');

function the_panel(){

	session_start();
	if(!isset($_SESSION['ses_accN']) == true){
		unset($_SESSION['ses_accN']);
		header('Location: ../app/login.php?act=login');
	}else{
		global $userPanel_name;
		global $userPanel_balance;

		$userPanel = new UserPanel($_SESSION['ses_accN']);
		$userPanel_name = $userPanel->getName_user();
		$userPanel_balance = format_money($userPanel->getBalance_user());

		if(isset($_POST['form-ib-deposit-submit']) && isset($_POST['form-ib-deposit-value'])){
			$dep_val = floatval(filter_var(sanitize_money($_POST['form-ib-deposit-value']), FILTER_SANITIZE_STRING));

			$userPanel->setDeposit(sanitize_money($userPanel_balance), $dep_val);
		}

		if(isset($_POST['form-ib-withdraw-submit']) && isset($_POST['form-ib-withdraw-value'])){
			$wd_val = floatval(filter_var(sanitize_money($_POST['form-ib-withdraw-value']), FILTER_SANITIZE_STRING));

			$userPanel->setWithdraw(sanitize_money($userPanel_balance), $wd_val);
		}

		if(isset($_POST['form-ib-transfer-submit']) && isset($_POST['form-ib-transfer-value']) && isset($_POST['form-ib-transfer-acc'])){
			$tr_acc = filter_var($_POST['form-ib-transfer-acc'], FILTER_SANITIZE_STRING);
			$tr_val = floatval(filter_var(sanitize_money($_POST['form-ib-transfer-value']), FILTER_SANITIZE_STRING));

			$userPanel->setTransfer(sanitize_money($userPanel_balance), $tr_val, $tr_acc);
		}
	}

}
execute_act('panel', 'the_panel');

function logout_panel(){

	if(isset($_GET['act'])){
		if($_GET['act'] == 'logout'){
			session_destroy();
			header('Location: ../app/login.php?act=logout');
		}
	}

}
execute_act('panel', 'logout_panel');