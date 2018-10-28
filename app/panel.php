<?php require_once 'functions/default.php' ?>
<?php include 'header.php' ?>
    <main class="principal">
        <section class="data-fields-section">
	        <?php
        	if(isset($_GET['act'])){
        		if($_GET['act'] == 'transactErr'){
    				echo "<p class='error-create'><span class='fas fa-times-circle'></span>Saldo insuficiente para esta retirada...</p>";
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
						<span class="fas fa-dollar-sign"></span>
						<input type="text" id="form-ib-deposit-value" name="form-ib-deposit-value" placeholder="1500,50" required>
					</p>
					<button class="btn btn-success" type="submit" id="form-ib-deposit-submit" name="form-ib-deposit-submit">Depósito</button>
				</form>			
    		</div>
    		<hr>
    		<div class="data-fields-container">
				<form class="form-ib" action="" method="POST" id="form-ib-withdraw" name="form-ib-withdraw">
					<p>
						<span class="fas fa-dollar-sign"></span>
						<input type="text" id="form-ib-withdraw-value" name="form-ib-withdraw-value" placeholder="285,75" required>
					</p>
					<button class="btn btn-danger" type="submit" id="form-ib-withdraw-submit" name="form-ib-withdraw-submit">Retirada</button>
				</form>			
    		</div>
    		<hr>
			<a href="?act=logout" class="btn btn-warning">Sair</a>
        </section>
    </main>
<?php include 'footer.php'; ?>