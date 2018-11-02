<?php require_once 'functions/default.php' ?>
<?php include 'header.php' ?>
    <section class="data-fields-section">
        <?php
    	if(isset($_GET['act'])){
    		if($_GET['act'] == 'transactErr'){
				echo "<p class='error-create'><span class='fas fa-times-circle'></span>Saldo insuficiente para esta retirada...</p>";
			}
			if($_GET['act'] == 'identityErr'){
				echo "<p class='error-create'><span class='fas fa-times-circle'></span>Impossível fazer uma transferência para você mesmo...</p>";
			}
    	}
    	?>        	
		<h2 class="data-fields-title">Painel <span>IB</span></h2>
		<div class="panel-user-info">
    		<p><span class="fas fa-user"></span> Bem-vindo, <b><?= $userPanel_name ?></b></p>
			<p><span class="fas fa-dollar-sign"></span> Seu saldo é de <b><?= $userPanel_balance ?></b></p>
		</div>
		<div class="data-fields-container">
			<form class="form-ib" action="" method="POST" id="form-ib-deposit" name="form-ib-deposit">
				<p>
					<span class="icon-deposit fas fa-dollar-sign"></span>
					<input class="inpt-deposit" type="text" id="form-ib-deposit-value" name="form-ib-deposit-value" placeholder="1500,50" required>
				</p>
				<button class="btn btn-success" type="submit" id="form-ib-deposit-submit" name="form-ib-deposit-submit"><span class="fas fa-sort-amount-up"></span> Depósito</button>
			</form>			
		</div>
		<hr>
		<div class="data-fields-container">
			<form class="form-ib" action="" method="POST" id="form-ib-withdraw" name="form-ib-withdraw">
				<p>
					<span class="icon-withdraw fas fa-dollar-sign"></span>
					<input class="inpt-withdraw" type="text" id="form-ib-withdraw-value" name="form-ib-withdraw-value" placeholder="285,75" required>
				</p>
				<button class="btn btn-danger" type="submit" id="form-ib-withdraw-submit" name="form-ib-withdraw-submit"><span class="fas fa-sort-amount-down"></span> Retirada</button>
			</form>			
		</div>
		<hr>
        <div class="data-fields-container">
            <form class="form-ib" action="" method="POST" id="form-ib-transfer" name="form-ib-transfer">
                <p>
                    <span class="icon-transfer fas fa-university"></span>
                    <input class="inpt-transfer" type="text" id="form-ib-transfer-acc" name="form-ib-transfer-acc" placeholder="Nº da conta do favorecido" maxlength="7" required>
                </p>
                <p>
                    <span class="icon-transfer fas fa-dollar-sign"></span>
                    <input class="inpt-transfer" type="text" id="form-ib-transfer-value" name="form-ib-transfer-value" placeholder="Valor a ser transferido" required>
                </p>
                <button class="btn btn-warning" type="submit" id="form-ib-transfer-submit" name="form-ib-transfer-submit"><span class="fas fa-exchange-alt"></span> Transferir</button>
            </form>         
        </div>
        <hr>
		<a href="?act=logout" class="btn btn-info"><span class="fas fa-door-open"></span> Sair do Painel</a>
    </section>
<?php include 'footer.php'; ?>