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
		//echo exist_flashdata('status');
		?>
		<div class="row">
			<div class="large-6 columns">
				<label>Nome:<small class="right">Requerido</small>
					<?php $attributes = array(
					'name' => 'nome' ,
					'placeholder' => 'Nome completo' ,
					'value' => set_value('nome') ,
					'required' => true
					);
					echo form_input($attributes); ?>
					<small class="error">Valor inserido inválido ou incorreto</small>
				</label>
			</div>
			<div class="large-4 columns">
				<label>Apelido
					<?php $attributes = array(
					'name' => 'apelido' ,
					'placeholder' => 'Apelido' ,
					'value' => set_value('apelido')
					);
					echo form_input($attributes); ?>
					<small class="error">Valor inserido inválido ou incorreto</small>
				</label>
			</div>
			<div class="large-2 columns">
				<label>Sexo:</label>
				<input type="radio"  <?php echo set_radio('sexo', 'M', TRUE); ?> name="sexo" id="M" value="M"><label for="M">M <i class="fa fa-child"></i></label>
				<input type="radio" name="sexo" id="F" value="F"><label for="F">F <i class="fa fa-female"></i> </label>
			</div>
		</div>
		<div class="row">
			<div class="large-3 columns">
				<label>CPF: <small class="right" data-tooltip aria-haspopup="true" class="has-tip" title="Por favor inserir apenas números, o nosso sistema cuidará de inserir o resto ;)">Apenas Números / Requerido</small>
					<?php $attributes = array(
					'name' => 'cpf' ,
					'placeholder' => 'Digite aqui o seu CPF' ,
					'value' => set_value('cpf') ,
					'data-mask' => '000.000.000-00',
					'pattern' => '[0-9]{3}\.?[0-9]{3}\.?[0-9]{3}\-?[0-9]{2}',
					'required' => true
					);
					echo form_input($attributes); ?>
				</label>
				<small class="error">CPF inválido</small>
			</div>
			<div class="large-3 columns">
				<label>RG:<small class="right" data-tooltip aria-haspopup="true" class="has-tip" title="Por favor inserir apenas números, o nosso sistema cuidará de inserir o resto ;)">Requerido</small>
					<?php $attributes = array(
					'name' => 'rg' ,
					'placeholder' => 'Digite o RG' ,
					'value' => set_value('rg'),
					'required' => true
					);
					echo form_input($attributes); ?>
				</label>
				<small class="error">Valor inserido inválido ou incorreto</small>
			</div>
			<div class="large-3 columns">
				<label>Data Nascimento:<small class="right" data-tooltip aria-haspopup="true" class="has-tip" title="Por favor inserir apenas números, o nosso sistema cuidará de inserir o resto ;)">Requerido</small>
					<?php $attributes = array(
					'name' => 'nascimento' ,
					'placeholder' => 'Data de Nascimento' ,
					'data-mask' => '00/00/0000',
					'value' => set_value('nascimento'),
					'pattern' => '^([1-9]|0[1-9]|[1,2][0-9]|3[0,1])/([1-9]|1[0,1,2])/\d{4}$',
					'required' => true
					);
					echo form_input($attributes); ?>
				</label>
				<small class="error">Valor inserido inválido ou incorreto</small>
			</div>
			<div class="large-3 columns">
				<label>Telefone:<small class="right" data-tooltip aria-haspopup="true" class="has-tip" title="Por favor inserir apenas números, o nosso sistema cuidará de inserir o resto ;)">Requerido</small>
					<?php $attributes = array(
					'name' => 'telefone' ,
					'placeholder' => 'Telefone' ,
					'data-mask' => '(00) 0000-0000',
					'value' => set_value('telefone'),
					'required' => true
					);
					echo form_input($attributes); ?>
				</label>
				<small class="error">Valor inserido inválido ou incorreto</small>
			</div>
		</div>
		<h3>Dados de Endereço</h3>
		<div class="row">
			<div class="large-10 columns">
				<label>Rua<small class="right" data-tooltip aria-haspopup="true" class="has-tip" title="Inserir no Formato Rua: ou AV.">Requerido</small>
					<?php $attributes = array(
					'name' => 'endereco' ,
					'placeholder' => 'Digite a rua' ,
					'value' => set_value('endereco'),
					'required' => true
					);
					echo form_input($attributes); ?>
				</label>
				<small class="error">Valor inserido inválido ou incorreto</small>
			</div>
			<div class="large-2 columns">
				<label>Nº<small class="right" data-tooltip aria-haspopup="true" class="has-tip" title="Por favor inserir apenas números, o nosso sistema cuidará de inserir o resto ;)">Requerido</small>
					<?php $attributes = array(
					'name' => 'numero' ,
					'placeholder' => 'Nº' ,
					'value' => set_value('numero'),
					'pattern' => 'number',
					'required' => true
					);
					echo form_input($attributes); ?>
				</label>
				<small class="error">Valor inserido inválido ou incorreto</small>
			</div>
		</div>
		<div class="row">
			<div class="large-4 columns">
				<label>Cidade<small class="right" data-tooltip aria-haspopup="true" class="has-tip" title="Escolha cidade">Requerido</small>
					<?php 
					$options = array ('' => 'Escolha a cidade');
					foreach($cidades as $cidade)
						$options[$cidade->CidadeID] = $cidade->descricao;
					echo form_dropdown('cidade', $options,'','');
					?>
				</label>
				<small class="error">Valor escolhido inválido ou incorreto</small>
			</div>
			<div class="large-4 columns">
				<label>Bairro<small class="right" data-tooltip aria-haspopup="true" class="has-tip" title="Inserir no Formato Rua: ou AV.">Requerido</small>
					<?php $attributes = array(
					'name' => 'bairro' ,
					'placeholder' => 'Digite o bairro' ,
					'value' => set_value('bairro'),
					'required' => true
					);
					echo form_input($attributes); ?>
				</label>
				<small class="error">Valor inserido inválido ou incorreto</small>
			</div>
			<div class="large-4 columns">
				<label>CEP: <small class="right" data-tooltip aria-haspopup="true" class="has-tip" title="Por favor inserir apenas números, o nosso sistema cuidará de inserir o resto ;)">Apenas Números / Requerido</small>
					<?php $attributes = array(
					'name' => 'cep' ,
					'placeholder' => 'Digite o Cep' ,
					'data-mask' => "00000-000",
					'value' => set_value('cep'),
					'required' => true
					);
					echo form_input($attributes); ?>
				</label>
				<small class="error">Valor inserido inválido ou incorreto</small>
			</div>
			<!-- Mapa -->
			<div class="row">
				<div class="large-12 columns">
					<h3>Mostre o endereço do vendedor no mapa</h3>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<div class="row">
						<div class="small-10 columns">
					<?php $attributes = array(
					'name' => 'endereco_mapa' ,
					'placeholder' => 'Pesquisar o endereço' ,
					'id' => "endereco",
					'value' => set_value('endereco_mapa'),
					'required' => true
					);
					echo form_input($attributes); ?>
						</div>
						<div class="small-2 columns">
							<input class="button postfix" type="button" id="btnEndereco" name="btnEndereco" value="Mostrar no mapa" />
						</div>
					</div>
					<div id="mapa" style="height:350px"></div>
				</div>
				<div class="large-12 columns">
					<input type="hidden" id="latitude" name="latitude" />
					<input type="hidden" id="longitude" name="longitude" />
				</div>
			</div> <br>
			<h3>Referencias</h3>
			<br>
			<h4>1ª Referencia</h4>
			<div class="row">
				<div class="large-5 columns">
					<label>Nome:<small class="right" >Requerido</small>
					<?php $attributes = array(
					'name' => 'referencia1' ,
					'placeholder' => 'Digite nome' ,
					'value' => set_value('referencia1'),
					'required' => true
					);
					echo form_input($attributes); ?>
					</label>
					<small class="error">Valor inserido inválido ou incorreto</small>
				</div>
				<div class="large-3 columns">
					<label>Parentesco:
						<select name="parentesco1">
							<option value="">Escolha o parentesco</option>
							<option value="pai">Pai</option>
							<option value="mae">mãe</option>
							<option value="esposa">Esposa</option>
							<option value="Esposo">Esposo</option>
							<option value="Primo">Primo</option>
							<option value="prima">Prima</option>
							<option value="tio">Tio</option>
							<option value="tia">Tia</option>
							<option value="irmao">irmão</option>
							<option value="irma">irmã</option>
							<option value="vizinho">Vizinho</option>
						</select>
					</label>
				</div>
				<div class="large-4 columns">
					<label>Contato: <small class="right" data-tooltip aria-haspopup="true" class="has-tip" title="Por favor inserir apenas números, o nosso sistema cuidará de inserir o resto ;)">Apenas Números / Requerido</small>
					<?php $attributes = array(
					'name' => 'contato1' ,
					'placeholder' => 'Telefone' ,
					'data-mask' => '(00) 0000-0000',
					'value' => set_value('contato1'),
					'required' => true
					);
					echo form_input($attributes); ?>
					</label>
					<small class="error">Valor inserido inválido ou incorreto</small>
				</div>
			</div>
			<h4>2ª Referencia</h4>
			<div class="row">
				<div class="large-5 columns">
					<label>Nome: <small class="right" >Requerido</small>
					<?php $attributes = array(
					'name' => 'referencia2' ,
					'placeholder' => 'Digite nome' ,
					'value' => set_value('referencia2'),
					'required' => true
					);
					echo form_input($attributes); ?>
					</label>
					<small class="error">Valor inserido inválido ou incorreto</small>
				</div>
				<div class="large-3 columns">
					<label>Parentesco:
						<select name="parentesco2">
							<option value="">Escolha o parentesco</option>
							<option value="pai">Pai</option>
							<option value="mae">mãe</option>
							<option value="esposa">Esposa</option>
							<option value="Esposo">Esposo</option>
							<option value="Primo">Primo</option>
							<option value="prima">Prima</option>
							<option value="tio">Tio</option>
							<option value="tia">Tia</option>
							<option value="irmao">irmão</option>
							<option value="irma">irmã</option>
							<option value="vizinho">Vizinho</option>
						</select>
					</label>
					<small class="error">Valor inserido inválido ou incorreto</small>
				</div>
				<div class="large-4 columns">
					<label>Contato: <small class="right" data-tooltip aria-haspopup="true" class="has-tip" title="Por favor inserir apenas números, o nosso sistema cuidará de inserir o resto ;)">Apenas Números / Requerido</small>
					<?php $attributes = array(
					'name' => 'contato2' ,
					'placeholder' => 'Telefone' ,
					'data-mask' => '(00) 0000-0000',
					'value' => set_value('contato2'),
					'required' => true
					);
					echo form_input($attributes); ?>
					</label>
					<small class="error">Valor inserido inválido ou incorreto</small>
				</div>
			</div>
		</div>
		<input type="submit" value="vai" class="button">
	</form>
</div>
<div id="mapa" class="" style="height: 500px;width:890px"></div>
</div>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyADNrhQpCRDfXpkhXabTP4f3FPRgLaRBTY&amp;sensor=false"></script>
<?php echo load_js('js_vendedor.js') ?>
<?php echo $footer ?>