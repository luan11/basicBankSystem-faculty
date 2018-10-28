<?php
require_once 'User.php';

class UserPanel extends User{

	private $depositVal;
	private $withdrawVal;

	function __construct($acc){
		$this->setAccountNum($acc);
		$this->databaseAct('panel_data', array( 'accId' => $this->getAccountNum() ));
	}

	public function getName_user(){
		if(!empty($this->getQueryResults())){
			return $this->getQueryResults()->usersData_name;
		}else{
			session_destroy();
		}			
	}

	public function getBalance_user(){
		if(!empty($this->getQueryResults())){
			return $this->getQueryResults()->usersData_balance;
		}else{
			session_destroy();
		}	
	}

	public function setDeposit($balanceVal, $depositVal){
		$newBalanceVal = $balanceVal + $depositVal;
		$this->databaseAct('panel_transactions', array( 'accId' => $this->getAccountNum(), 'balance' => $newBalanceVal ));
		header('Location: ../app/panel.php');
	}

	public function setWithdraw($balanceVal, $withdrawVal){
		if($withdrawVal <= $balanceVal){			
			$newBalanceVal = $balanceVal - $withdrawVal;
			$this->databaseAct('panel_transactions', array( 'accId' => $this->getAccountNum(), 'balance' => $newBalanceVal ));
			header('Location: ../app/panel.php');
		}else{
			header('Location: ../app/panel.php?act=transactErr');
		}
	}
}