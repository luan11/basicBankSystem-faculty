<?php require_once 'functions/default.php' ?>
<?php include 'header.php' ?>    	
    <section class="data-fields-section">    
    	<?php
    	if(isset($_GET['act'])){
    		if($_GET['act'] == 'error'){
				echo "<p class='alerts error-create'><span class='fas fa-times-circle'></span>Erro ao tentar abrir sua conta, tente novamente!</p>";
				echo "<p class='alerts-bar error-create'></p>";
			}
    	}
    	?>    	
		<h2 class="data-fields-title">Registro <span>IB</span></h2>
		<div class="data-fields-container">
			<form class="form-ib" method="POST" id="form-ib-register" name="form-ib-register">
				<p>
					<span class="fas fa-user"></span>
					<input type="text" id="form-ib-register-name" name="form-ib-register-name" placeholder="Seu nome" required>
				</p>
				<p>						
					<span title="Account number" class="fas fa-university" noedit="true"></span>
					<input type="text" id="form-ib-register-account" name="form-ib-register-account" value="<?= generate_account_number(); ?>" maxlength="7" readonly="true">
				</p>
				<p>

					<span title="Balance" class="fas fa-dollar-sign" noedit="true"></span>
					<input type="text" id="form-ib-register-money" name="form-ib-register-money" value="<?= initial_money(); ?>" readonly="true">
				</p>
				<p>
					<span class="fas fa-key"></span>
					<input type="password" id="form-ib-register-pass" name="form-ib-register-pass" placeholder="Senha" maxlength="8" required>
				</p>
				<button class="btn btn-success" type="submit" id="form-ib-register-submit" name="form-ib-register-submit"><span class="fas fa-check"></span> Registrar</button>
				<a href="panel.php">Já possui uma conta?, Clique aqui e acesse nosso painel.</a>
			</form>			
		</div>
    </section>
<?php include 'footer.php' ?>
