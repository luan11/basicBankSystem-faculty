<?php
require_once 'User.php';

class UserLogin extends User{

	private $loginStatus;

	function __construct($acc, $pass){
		$this->setAccountNum($acc);
		$this->setPassword($pass);

		$this->databaseAct('login', array( 'accNum' => $this->getAccountNum() ));
		if(!empty($this->getQueryResults())){
			if(password_verify($this->getPassword(), $this->getQueryResults()->usersData_pw)){
				$this->setLoginStatus('pass_true');
			}else{
				$this->setLoginStatus('pass_false');
			}	
		}else{
			$this->setLoginStatus('user_false');
		}

		$this->returnLoginUser_act();
	}

	private function returnLoginUser_act(){
		switch ($this->getLoginStatus()){
			case 'pass_true':
				session_start();
				$_SESSION['ses_accN'] = $this->getAccountNum();
				header('Location: ../app/panel.php');
			break;

			case 'pass_false':
				header('Location: ../app/login.php?act=u_err&account='.$this->getAccountNum());
			break;

			case 'user_false':
				header('Location: ../app/login.php?act=u_err&account='.$this->getAccountNum());
			break;
		}
	}

    /**
     * @return mixed
     */
    private function getLoginStatus(){
        return $this->loginStatus;
    }

    /**
     * @param mixed $loginStatus
     *
     * @return self
     */
    private function setLoginStatus($loginStatus){
        $this->loginStatus = $loginStatus;

        return $this;
    }
}