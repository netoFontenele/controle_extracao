<?php echo $header ?>
<?php echo $page_header ?>
<!-- body content here -->
<div class="row header-info">
	<div class="small-12 columns"><h3 class="inf-page"><?php echo load_img('icones/user_add.png','Vendedores') ?>Cadastro de Vendedores</h3></div>
</div>
<div class="row">
	<div class="small-12 small-centered columns">
		Cadastrar vendedores da regional: <strong><?php echo $this->session->userdata('regional')?></strong>
		<br><br><br>
		
		<h3>Dados Pessoais</h3>
		<?php echo form_open(base_url('dashboard/vendedores/validar'),'data-abide'); ?>
		<?php
		echo show_erros();
		echo exist_flashdata('cad_vendedor');
		?>
	</dia>
</dia>
<?php echo load_js('js_vendedor.js') ?>
<?php echo $footer ?>