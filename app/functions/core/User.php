<?php 
abstract class User {

	protected $accountNum;
	protected $password;
	protected $createStatus;
	protected $queryResults;

	protected function databaseAct($act, array $params){
		try {
			$conn = new PDO("mysql:host=localhost;dbname=db_local_ib", "root", "");
   			 // set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			switch($act){
				case 'register':
					$insertUser = $conn->prepare("INSERT INTO ib_usersdata (usersData_name, usersData_account, usersData_balance, usersData_pw) VALUES (:usersData_name, :usersData_account, :usersData_balance, :usersData_pw)");
					$insertUser->bindParam(':usersData_name', $uName);
					$insertUser->bindParam(':usersData_account', $uAcc);
					$insertUser->bindParam(':usersData_balance', $uBalance);
					$insertUser->bindParam(':usersData_pw', $uPw);

					$uName = $params['name'];
					$uAcc = $params['accNum'];
					$uBalance = $params['balance'];
					$uPw = $params['pass'];
					$insertUser->execute();
				break;

				case 'login':
					$searchUser = $conn->prepare("SELECT usersData_id, usersData_account, usersData_pw FROM ib_usersdata WHERE usersData_account LIKE :usersData_account");
					$searchUser->bindParam(':usersData_account', $uAcc);

					$uAcc = $params['accNum'];
					$searchUser->execute();

					$this->queryResults = $searchUser->fetch(PDO::FETCH_OBJ);
				break;

				case 'panel_data':
					$searchPanelData = $conn->prepare("SELECT usersData_name, usersData_balance FROM ib_usersdata WHERE usersData_id LIKE :usersData_id");
					$searchPanelData->bindParam(':usersData_id', $uId);

					$uId = $params['accId'];
					$searchPanelData->execute();

					$this->queryResults = $searchPanelData->fetch(PDO::FETCH_OBJ);
				break;

				case 'panel_transactions':
					$updBalance = $conn->prepare("UPDATE ib_usersdata SET usersData_balance = :usersData_balance WHERE usersData_id LIKE :usersData_id");
					$updBalance->bindParam(':usersData_id', $uId);
					$updBalance->bindParam(':usersData_balance', $uBalance);

					$uId = $params['accId'];
					$uBalance = $params['balance'];
					$updBalance->execute();
				break;

                case 'panel_transactions_transfer':
                    $searchUser = $conn->prepare("SELECT usersData_id, usersData_account, usersData_balance FROM ib_usersdata WHERE usersData_account LIKE :usersData_account");
                    $searchUser->bindParam(':usersData_account', $uAcc);

                    $uAcc = $params['accNum'];
                    $searchUser->execute();

                    $this->queryResults = $searchUser->fetch(PDO::FETCH_OBJ);
                break;
			}

			$this->createStatus = true;		
		}
		catch(PDOException $e) {
	    	$this->createStatus = false;
	    }
		$conn = null;
	}

    /**
     * @return mixed
     */
    protected function getAccountNum(){
    	return $this->accountNum;
    }

    /**
     * @param mixed $accountNum
     *
     * @return self
     */
    protected function setAccountNum($accountNum){
    	$this->accountNum = $accountNum;

    	return $this;
    }

    /**
     * @return mixed
     */
    protected function getPassword(){
    	return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return self
     */
    protected function setPassword($password){
    	$this->password = $password;

    	return $this;
    }

    /**
     * @return mixed
     */
    protected function getCreateStatus(){
        return $this->createStatus;
    }

    /**
     * @param mixed $createStatus
     *
     * @return self
     */
    protected function setCreateStatus($createStatus){
        $this->createStatus = $createStatus;

        return $this;
    }   

    /**
     * @return mixed
     */
    protected function getQueryResults(){
        return $this->queryResults;
    }

    /**
     * @param mixed $queryResults
     *
     * @return self
     */
    protected function setQueryResults($queryResults){
        $this->queryResults = $queryResults;

        return $this;
    }
}