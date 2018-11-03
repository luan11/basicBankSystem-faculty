<?php require_once 'functions/default.php' ?>
<?php include 'header.php' ?>    	
    <section class="data-fields-section">
    	<?php
    		if(isset($_GET['act'])){
    			if($_GET['act'] == 'success'){
	    			echo "<p class='alerts success-create'><span class='fas fa-user-check'></span>Conta aberta com sucesso!</p>";
	    			echo "<p class='alerts-bar success-create'></p>";
	    			echo "<p class='alerts access-open'><span class='fas fa-info-circle'></span>Acesse sua conta...</p>";
	    			echo "<p class='alerts-bar access-open'></p>";
    			}
    			if($_GET['act'] == 'u_err'){
	    			echo "<p class='alerts error-create'><span class='fas fa-times-circle'></span>Ooops, Conta ou Senha estão incorretos.</p>";
	    			echo "<p class='alerts-bar error-create'></p>";
    			}
    			if($_GET['act'] == 'logout'){
	    			echo "<p class='alerts access-open'><span class='fas fa-info-circle'></span>Logout feito com sucesso!</p>";
	    			echo "<p class='alerts-bar access-open'></p>";
    			}
    			if($_GET['act'] == 'login'){
	    			echo "<p class='alerts access-open'><span class='fas fa-info-circle'></span>Faça seu login para ter acesso ao painel!</p>";
	    			echo "<p class='alerts-bar access-open'></p>";
    			}
    			if($_GET['act'] == 'accLockedUp'){
	    			echo "<p class='alerts access-open'><span class='fas fa-ban'></span>Conta encerrada com sucesso!</p>";
	    			echo "<p class='alerts-bar access-open'></p>";
    			}
    		}
    	?>
		<h2 class="data-fields-title">Entrar <span>IB</span></h2>
		<div class="data-fields-container">
			<form class="form-ib" action="" method="POST" id="form-ib-login" name="form-ib-login">
				<p>
					<span class="fas fa-university"></span>
					<input type="text" id="form-ib-login-account" name="form-ib-login-account" placeholder="Número da Conta" maxlength="7" <?php if(isset($_GET['account'])){ echo "value='".substr($_GET['account'],0,7)."'"; } ?> required>
				</p>
				<p>
					<span class="fas fa-key"></span>
					<input type="password" id="form-ib-login-pass" name="form-ib-login-pass" placeholder="Senha" maxlength="8" required>
				</p>
				<button class="btn btn-success" type="submit" id="form-ib-login-submit" name="form-ib-login-submit"><span class="fas fa-running"></span> Entrar</button>
				<?php if(!isset($_GET['act']) || $_GET['act'] == 'login'){ ?>
				<a href="register.php">Não possui uma conta?, Clique aqui e crie a sua.</a>
				<?php } ?>
			</form>			
		</div>
    </section>
<?php include 'footer.php' ?>
