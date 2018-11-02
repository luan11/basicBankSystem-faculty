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
		header('Location: ../app/panel.php?act=transactSuccess');
	}

	public function setWithdraw($balanceVal, $withdrawVal){
		if($withdrawVal <= $balanceVal){			
			$newBalanceVal = $balanceVal - $withdrawVal;
			$this->databaseAct('panel_transactions', array( 'accId' => $this->getAccountNum(), 'balance' => $newBalanceVal ));
			header('Location: ../app/panel.php?act=transactSuccess');
		}else{
			header('Location: ../app/panel.php?act=transactErr');
		}
	}

	public function setTransfer($balanceVal, $transferVal, $accToTransfer){
		if($transferVal <= $balanceVal){
			$this->databaseAct('panel_data_transfer', array( 'accNum' => $accToTransfer ));
			
			if(!empty($this->getQueryResults())){
				if($this->getQueryResults()->usersData_id == $this->getAccountNum()){
					header('Location: ../app/panel.php?act=identityErr');
				}else{
					$newTransferredVal = $this->getQueryResults()->usersData_balance + $transferVal;
					$this->databaseAct('panel_transactions', array( 'accId' => $this->getQueryResults()->usersData_id, 'balance' => $newTransferredVal ));

					$newBalanceVal = $balanceVal - $transferVal;
					$this->databaseAct('panel_transactions', array( 'accId' => $this->getAccountNum(), 'balance' => $newBalanceVal ));

					header('Location: ../app/panel.php?act=transactSuccess');
				}
			}else{
				header('Location: ../app/panel.php?act=notfoundErr');
			}			
		}else{
			header('Location: ../app/panel.php?act=transactErr');
		}
	}

	public function closeAccount(){
		if($this->getQueryResults()->usersData_balance == 0){
			$this->databaseAct('panel_acc_delete', array( 'accId' => $this->getAccountNum() ));
			session_destroy();
			header('Location: ../app/login.php?act=accLockedUp');
		}else{
			header('Location: ../app/panel.php?act=outAccErr');
		}		
	}
}