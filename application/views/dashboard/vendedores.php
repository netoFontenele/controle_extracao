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
		<?php
		echo show_erros();
		//echo exist_flashdata('status');
		?>
		<h3>Dados Pessoais</h3>
		<?php echo form_open(base_url('dashboard/vendedores/validar'),'data-abide'); ?>
		<div class="row">
			<div class="large-6 columns">
				<label>Nome:<small class="right">Requerido</small>
					<input type="text" name="nome" required  placeholder="Digite o nome completo">
					<small class="error">Valor inserido inválido ou incorreto</small>
				</label>
			</div>
			<div class="large-4 columns">
				<label>Apelido
					<input type="text" name="apelido" placeholder="Apelido" requerid>
					<small class="error">Valor inserido inválido ou incorreto</small>
				</label>
			</div>
			<div class="large-2 columns">
				<label>Sexo:</label>
				<input type="radio" name="pokemon" value="Red" id="pokemonRed"><label for="pokemonRed">M <i class="fa fa-child"></i></label>
				<input type="radio" name="pokemon" value="Blue" id="pokemonBlue"><label for="pokemonBlue">F <i class="fa fa-female"></i> </label>
			</div>
		</div>
		<div class="row">
			<div class="large-3 columns">
				<label>CPF: <small class="right" data-tooltip aria-haspopup="true" class="has-tip" title="Por favor inserir apenas números, o nosso sistema cuidará de inserir o resto ;)">Apenas Números / Requerido</small>
					<input type="text" placeholder="Digite aqui o seu CPF"  data-mask="000.000.000-00" required pattern="[0-9]{3}\.?[0-9]{3}\.?[0-9]{3}\-?[0-9]{2}" />
				</label>
				<small class="error">CPF inválido</small>
			</div>
			<div class="large-3 columns">
				<label>RG:<small class="right" data-tooltip aria-haspopup="true" class="has-tip" title="Por favor inserir apenas números, o nosso sistema cuidará de inserir o resto ;)">Requerido</small>
					<input type="text" required placeholder="Digite o RG" />
				</label>
				<small class="error">Valor inserido inválido ou incorreto</small>
			</div>
			<div class="large-3 columns">
				<label>Data Nascimento:<small class="right" data-tooltip aria-haspopup="true" class="has-tip" title="Por favor inserir apenas números, o nosso sistema cuidará de inserir o resto ;)">Requerido</small>
					<input type="text" required pattern="month_day_year" data-mask="00/00/0000" placeholder="Data de Nascimento" />
				</label>
				<small class="error">Valor inserido inválido ou incorreto</small>
			</div>
			<div class="large-3 columns">
				<label>Telefone:<small class="right" data-tooltip aria-haspopup="true" class="has-tip" title="Por favor inserir apenas números, o nosso sistema cuidará de inserir o resto ;)">Requerido</small>
					<input type="text" required data-mask="(00) 0000-0000" placeholder="Telefone" />
				</label>
				<small class="error">Valor inserido inválido ou incorreto</small>
			</div>
		</div>
		<h3>Dados de Endereço</h3>
		<div class="row">
			<div class="large-10 columns">
				<label>Rua<small class="right" data-tooltip aria-haspopup="true" class="has-tip" title="Inserir no Formato Rua: ou AV.">Requerido</small>
					<input type="text" placeholder="Digite a rua" required />
				</label>
				<small class="error">Valor inserido inválido ou incorreto</small>
			</div>
			<div class="large-2 columns">
				<label>Nº<small class="right" data-tooltip aria-haspopup="true" class="has-tip" title="Por favor inserir apenas números, o nosso sistema cuidará de inserir o resto ;)">Requerido</small>
					<input type="text" placeholder="Nº" required pattern="number" />
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
					echo form_dropdown('cidade', $options,'','required');
					?>
				</label>
				<small class="error">Valor escolhido inválido ou incorreto</small>
			</div>
			<div class="large-4 columns">
				<label>Bairro<small class="right" data-tooltip aria-haspopup="true" class="has-tip" title="Inserir no Formato Rua: ou AV.">Requerido</small>
					<input type="text" required placeholder="Digite o bairro" />
				</label>
				<small class="error">Valor inserido inválido ou incorreto</small>
			</div>
			<div class="large-4 columns">
				<label>CEP: <small class="right" data-tooltip aria-haspopup="true" class="has-tip" title="Por favor inserir apenas números, o nosso sistema cuidará de inserir o resto ;)">Apenas Números / Requerido</small>
					<input type="text" required placeholder="Digite o Cep" data-mask="00000-000" />
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
							<input type="text" id="txtEndereco" name="txtEndereco" placeholder="Pesquisar o endereço" />
						</div>
						<div class="small-2 columns">
							<input class="button postfix" type="button" id="btnEndereco" name="btnEndereco" value="Mostrar no mapa" />
						</div>
					</div>
					<div id="mapa" style="height:350px"></div>
				</div>
				<div class="large-12 columns">
					<input type="hidden" id="txtLatitude" name="txtLatitude" />
					<input type="hidden" id="txtLongitude" name="txtLongitude" />
				</div>
			</div> <br>
			<h3>Referencias</h3>
			<div class="row">
				<div class="large-5 columns">
					<label>Nome: <small class="right" data-tooltip aria-haspopup="true" class="has-tip" title="Por favor inserir apenas números, o nosso sistema cuidará de inserir o resto ;)">Apenas Números / Requerido</small>
						<input type="text" required placeholder="Digite nome" />
					</label>
					<small class="error">Valor inserido inválido ou incorreto</small>
				</div>
				<div class="large-3 columns">
					<label>Parentesco: <small class="right" data-tooltip aria-haspopup="true" class="has-tip" title="Por favor inserir apenas números, o nosso sistema cuidará de inserir o resto ;)">Apenas Números / Requerido</small>
						<input type="text" required placeholder="Digite nome" />
					</label>
					<small class="error">Valor inserido inválido ou incorreto</small>
				</div>
				<div class="large-4 columns">
					<label>Contato: <small class="right" data-tooltip aria-haspopup="true" class="has-tip" title="Por favor inserir apenas números, o nosso sistema cuidará de inserir o resto ;)">Apenas Números / Requerido</small>
						<input type="text" required placeholder="Digite nome" />
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