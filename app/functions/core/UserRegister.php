<?php
require_once 'User.php';

class UserRegister extends User{
	
	private $nameUser;
	private $initialMoney;

	function __construct($name, $account, $iniMoney, $pass){
		$this->setNameUser($name);
		$this->setAccountNum($account);
		$this->setInitialMoney($iniMoney);
		$this->setPassword(password_hash($pass, PASSWORD_BCRYPT));

		$this->databaseAct('register', array(
			'name' => $this->getNameUser(),
			'accNum' => $this->getAccountNum(),
			'balance' => $this->getInitialMoney(),
			'pass' => $this->getPassword()
		));

		$this->returnRegisterUser_act();
	}

	private function returnRegisterUser_act(){
		if($this->getCreateStatus()){
			header('Location: ../app/login.php?act=success&account='.$this->getAccountNum());
		}else{
			header('Location: ../app/register.php?act=error');
		}
	}

    /**
     * @return mixed
     */
    private function getNameUser(){
        return $this->nameUser;
    }

    /**
     * @param mixed $nameUser
     *
     * @return self
     */
    private function setNameUser($nameUser){
        $this->nameUser = $nameUser;

        return $this;
    }

    /**
     * @return mixed
     */
    private function getInitialMoney(){
        return $this->initialMoney;
    }

    /**
     * @param mixed $initialMoney
     *
     * @return self
     */
    private function setInitialMoney($initialMoney){
        $this->initialMoney = $initialMoney;

        return $this;
    }
}