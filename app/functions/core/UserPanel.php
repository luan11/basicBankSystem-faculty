<?php
require_once 'User.php';

class UserPanel extends User{

	private $depositVal;
	private $withdrawVal;

	function __construct($acc){
		$this->setAccountNum($acc);
		$this->databaseAct('panel_data', array( 'accNum' => $this->getAccountNum() ));
	}

	public function getName_user(){
		if(!empty($this->getQueryResults())){
			return $this->getQueryResults()->usersData_name;
		}else{
			return 'null';
		}			
	}

	public function getBalance_user(){
		if(!empty($this->getQueryResults())){
			return $this->getQueryResults()->usersData_balance;
		}else{
			return 'null';
		}	
	}

	public function setDeposit($balanceVal, $depositVal){
		$newBalanceVal = $balanceVal + $depositVal;
		$this->databaseAct('panel_transactions', array( 'accNum' => $this->getAccountNum(), 'balance' => $newBalanceVal ));
		header('Location: ../app/panel.php');
	}

	public function setWithdraw($balanceVal, $withdrawVal){
		if($withdrawVal <= $balanceVal){			
			$newBalanceVal = $balanceVal - $withdrawVal;
			$this->databaseAct('panel_transactions', array( 'accNum' => $this->getAccountNum(), 'balance' => $newBalanceVal ));
			header('Location: ../app/panel.php');
		}else{
			header('Location: ../app/panel.php?act=transactErr');
		}
	}
}