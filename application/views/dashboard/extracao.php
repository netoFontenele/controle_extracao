<?php echo $header ?>
<?php echo $page_header ?>
<!-- body content here -->
<div class="row header-info">
	<div class="small-12 small-centered columns"><h3 class="inf-page"><?php echo load_img('icones/document-lined-pen.png','extração') ?> Cadastro de extração</h3></div>
</div>
<div class="row">
	<div class="small-12 small-centered columns">
		<?php
		echo show_erros();
		echo exist_flashdata('status');
		echo exist_flashdata('extracao_delete');
		echo exist_flashdata('extracao_atualizada');
		?>
		<?php 
		echo form_open('dashboard/extracao/cadastro');
		?>
		<div class="row collapse">
			<div class="small-3 large-2 columns">
				<span class="prefix"><i class="fa fa-subscript"></i> </span>
			</div>
			<div class="small-9 large-10 columns">
				<?php $attributes = array(
					'name' => 'extracao' ,
					'placeholder' => 'Número extração' ,
					'value' => set_value('extracao') ,
					'required' => true
					);
					echo form_input($attributes); ?>
				</div>
			</div>
			<div class="row collapse">
				<div class="small-3 large-2 columns">
					<span class="prefix"><i class="fa fa-align-left"></i> </span>
				</div>
				<div class="small-9 large-10 columns">
					<?php $attributes = array(
						'name' => 'descricao' ,
						'placeholder' => 'Descrição Extração' ,
						'value' => set_value('descricao') ,
						'required' => true
						);
						echo form_input($attributes); ?>
					</div>
				</div>
				<div class="row collapse">
					<div class="small-3 large-2 columns">
						<span class="prefix"><i class="fa fa-plus"></i> </span>
					</div>
					<div class="small-9 large-10 columns">
						<?php $attributes = array(
							'name' => 'quantidade' ,
							'placeholder' => 'Quantidade Recebida' ,
							'value' => set_value('quantidade') ,
							'required' => true
							);
							echo form_input($attributes); ?>
						</div>
					</div>
					<div class="row collapse">
						<div class="small-3 large-2 columns">
							<span class="prefix"><i class="fa fa-calendar"></i></span>
						</div>
						<div class="small-9 large-10 columns">
							<?php $attributes = array(
								'name' => 'data' ,
								'id' => 'data',
								'placeholder' => 'Data da Extração' ,
								'value' => set_value('data') ,
								'required' => true,
								'autocomplete' => 'off'
								);
								echo form_input($attributes); ?>
							</div>
						</div>
						<div class="row collapse">
							<div class="small-12">
								<?php 
								$data = array(
									'name' => 'submit',
									'value' => 'Cadastrar',
									'type' => 'submit',
									'content' => 'Cadastrar'
									);

								echo form_button($data);
								?>
							</div>
						</div>
						<?php echo form_close(); ?>
					</div>
				</div>
				<div class="row">
					<table class="small-12 small-centered">
						<thead>
							<tr>
								<th>Nº Extração</th>
								<th>Descrição</th>
								<th>Data</th>
								<th>Quant. distribuida</th>
								<th>Status</th>
								<th>Excluir</th>
								<th>Editar</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($extracoes as $extracao) {  ?>
							<tr>
								<td><?php echo $extracao->extracao ?></td>
								<td><?php echo $extracao->descricao ?></td>
								<td><?php echo converterBR($extracao->data) ?></td>
								<td><?php echo $extracao->quantidade ?></td>
								<td>
									<?php
									if ($extracao->ativo == 1) {
										echo anchor(base_url('dashboard/extracao/status').'/'.$extracao->extracao, '<i class="fa fa-check-square-o"></i> Ativa');
									} else {
										echo anchor(base_url('dashboard/extracao/status').'/'.$extracao->extracao, '<i class="fa fa-square-o"></i> Inativa');
									}
									?>
								</td>
								<td>
									<div id='extracao_<?php echo $extracao->extracao ?>' class="reveal-modal" data-reveal>
										<h2><i class="fa fa-exclamation-triangle fa-2x"></i> Tem certeza disto?</h2>
										<p>Ao clicar em excluir, a extração será apagada do Banco de dados</p>
										<p>Está operação não poderá ser desfeita</p>
										<?php echo anchor(base_url('dashboard/extracao/delete').'/'.$extracao->ExtracaoID, 'Excluir',array('class' => 'j_delete button','id' => $extracao->ExtracaoID,'data-ativo' => $extracao->ativo)) ?>
										<a class="close-reveal-modal">&#215;</a>
									</div>
									<a href="#" data-reveal-id='extracao_<?php echo $extracao->extracao ?>'><i class="fa fa-trash-o"></i></a>
								</td>
								<td>
									<a href="#" data-reveal-id="editar_extracao_<?php echo $extracao->extracao ?>"><i class="fa fa-pencil-square-o"></i></a>
									<div id="editar_extracao_<?php echo $extracao->extracao ?>" class="reveal-modal" data-reveal>
										<h2><i class="fa fa-pencil-square-o"></i> Editar Extração</h2>
										<div class="row">
											<div class="small-12 small-centered columns">
												<?php echo form_open('dashboard/extracao/editar')?>
												<div class="row collapse">
													<div class="small-3 large-2 columns">
														<span class="prefix"><i class="fa fa-subscript"></i> </span>
													</div>
													<div class="small-9 large-10 columns">
														<input type="text" name="extracao" value="<?php echo $extracao->extracao ?>" id="">
													</div>
												</div>
												<div class="row collapse">
													<div class="small-3 large-2 columns">
														<span class="prefix"><i class="fa fa-align-left"></i> </span>
													</div>
													<div class="small-9 large-10 columns">
														<input type="text" name="descricao" id="" value="<?php echo $extracao->descricao ?>">
													</div>
												</div>
												<div class="row collapse">
													<div class="small-3 large-2 columns">
														<span class="prefix"><i class="fa fa-plus"></i> </span>
													</div>
													<div class="small-9 large-10 columns">
														<input type="text" name="quantidade" id="" value="<?php echo $extracao->quantidade ?> ">
													</div>
												</div>
												<div class="row collapse">
													<div class="small-3 large-2 columns">
														<span class="prefix"><i class="fa fa-calendar"></i></span>
													</div>
													<div class="small-9 large-10 columns">
														<input type="text" autocomplete="off" name="data" id="data" value="<?php echo $extracao->data ?> ">
													</div>
												</div>
												<div class="row collapse">
													<?php echo form_hidden('extracaoID', $extracao->ExtracaoID); ?>
													<div class="small-12">
														<?php 
														$data = array(
															'name' => 'submit',
															'value' => 'Cadastrar',
															'type' => 'submit',
															'content' => 'Editar'
															);

														echo form_button($data);
														?>
													</div>
												</div>
												<?php echo form_close(); ?>
											</div>
										</div>
										<a class="close-reveal-modal">&#215;</a>
									</div>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<?php echo $paginacao?>
				</div>
				<?php echo $footer ?>