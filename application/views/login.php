<?php echo $header ?>
<!-- LOGO -->
<div class="row">
	<div class="small-3 small-centered columns">
		<?php echo load_img('logo.png','Mastruz da Sorte') ?>
	</div>
</div>
<!-- CAIXA DE ALERTAS -->
<div class="row">
	<div class="small-6 small-centered columns">
		<?php echo show_erros(); ?>
	</div>
</div>
<!-- FORM LOGIN -->
	<?php echo form_open('login/login_validation'); ?>
	<div class="row">
		<div class="small-6 small-centered columns">
			<div class="row collapse">
				<div class="small-3 large-2 columns">
					<span class="prefix"><i class="fa fa-user"></i></span>
				</div>
				<div class="small-9 large-10 columns">
					<?php 
					$attributes = array(
						'name' => 'username',
						'id' =>'username',
						'placeholder' => 'Usuário',
						'value' => set_value('username'),
						'required' => true,
						'pattern' => '[A-z.0-9]{3,15}.*'
						);
					echo form_input($attributes);
					?>
				</div>
			</div>
			<div class="row collapse">
				<div class="small-3 large-2 columns">
					<span class="prefix"><i class="fa fa-key"></i></span>
				</div>
				<div class="small-9 large-10 columns">
					<?php 
					$attributes = array(
						'name' => 'password',
						'id' =>'password',
						'placeholder' => 'Senha',
						'required' => true,
						'pattern' => '{3,15}'
						);
					echo form_password($attributes);
					?>
				</div>
			</div>
			<?php
			$attributes = array(
				'name' => 'submit',
				'class' => 'button radius',
				'value' => 'Entrar');
			echo form_submit($attributes);
			echo form_close();
			?>
			<a href="#" class="right" data-tooltip class="has-tip" title="Nós lhe enviaremos um e-mail com uma nova senha temporária, vamos lá, clique aqui."><i class="fa fa-key"></i> Esqueci a senha</a>
		</div>
	</div>
</form>
<?php echo $footer ?>