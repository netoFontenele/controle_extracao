<?php echo $header ?>
<?php echo $page_header ?>
<!-- body content here -->
<div class="row header-info">
	<div class="small-12 columns"><h3 class="inf-page"><?php echo load_img('icones/vcard.png','Vendedores') ?>Ficha do vendedor</h3></div>
</div>
<pre><?php print_r($referencias) ?></pre>
<div class="row">
	<table class="small-12 columns" height="400" border="1" cellspacing="2">
  <tr>
    <td width="180" rowspan="3"><?php echo load_img('logo.png','Mastruz da Sorte',array('width' => 180,'height' => 120)) ?></td>
    <td height="32" colspan="4"><h2 class="text-center">Ficha de vendedor</h2></td>
  </tr>
  <tr>
    <td width="162">Data de Cadastro</td>
    <td colspan="2">cod. vendedor</td>
    <td width="187">Regional</td>
  </tr>
  <tr>
    <td height="23"><?php echo converterBR($vendedor->data) ?></td>
    <td colspan="2"><?php echo $vendedor->cod_vendedor ?></td>
    <td><?php echo $vendedor->regional ?></td>
  </tr>
  <tr>
    <td colspan="5"> Nome: <?php echo $vendedor->nome ?></td>
  </tr>
  <tr>
    <td colspan="2">Endereço: <?php echo $vendedor->endereco ?></td>
    <td width="55">Nº: <?php echo $vendedor->numero ?></td>
    <td width="105">Bairro: <?php echo $vendedor->bairro ?></td>
    <td>Referência: <?php echo $vendedor->referencia ?></td>
  </tr>
  <tr>
    <td>Cidade: <?php echo $vendedor->cidade ?></td>
    <td>Telefone: <?php echo $vendedor->telefone ?></td>
    <td colspan="2">CPF: <?php echo $vendedor->cpf ?></td>
    <td>RG: <?php echo $vendedor->rg ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">1- Referência </td>
    <td colspan="3">2- Referência </td>
  </tr>
  <tr>
    <td colspan="2">Nome: <?php echo $referencias[0]->nome ?></td>
    <td colspan="3">Nome: <?php echo $referencias[1]->nome ?></td>
  </tr>
  <tr>
    <td>Telefone: <?php echo $referencias[0]->contato ?></td>
    <td>Parentesco:  <?php echo $referencias[0]->parentesco ?></td>
    <td colspan="2">Telefone:  <?php echo $referencias[1]->contato ?></td>
    <td>Parentesco: <?php echo $referencias[1]->parentesco ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
		
</dia>
<?php echo load_js('js_vendedor.js') ?>
<?php echo $footer ?>