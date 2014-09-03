<nav class="top-bar" data-topbar >
  <ul class="title-area">
    <li class="name">
      <h1>
        <?php echo anchor(base_url('dashboard'), load_img('logo-small.png','Mastruz da Sorte')); ?>
      </h1>
    </li>
    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>
<div class="right">
  <i class="fa fa-user"></i> Logado como : <strong><?php echo $this->session->userdata('usuario'); ?></strong> <i class="fa fa-clock-o"></i> Ultimo acesso foi em <strong><?php echo $this->session->userdata('last_login'); ?></strong>
</div>
  <section class="top-bar-section">
    <ul class="left">
      <li class="has-dropdown">
        <a href="#"><i class="fa fa-ticket"></i> Distribuição</a>
        <ul class="dropdown">
          <li><a href="#">Vendedor ambulante</a></li>
          <li><a href="#">Ponto Fixo</a></li>
        </ul>
      </li>
      <li class="has-dropdown">
        <a href="#"><i class="fa fa-road"></i> Rota</a>
        <ul class="dropdown">
          <li><a href="#">Arrecadador</a></li>
          <li><a href="#">Rotas</a></li>
          <li><a href="#">Imprimir Intinerário</a></li>
        </ul>
      </li>
      <li class="has-dropdown">
        <a href="#"><i class="fa fa-money"></i> Prestação de contas</a>
        <ul class="dropdown">
          <li><a href="#">Vendedor</a></li>
          <li><a href="#">Arrecadador</a></li>
        </ul>
      </li>
      <li class="has-dropdown">
        <a href="#"><i class="fa fa-map-marker"></i> Mapas</a>
        <ul class="dropdown">
          <li><a href="#">Rede de distribuição</a></li>
          <li><a href="#">Buscar Vendedor / Ponto Fixo</a></li>
        </ul>
      </li>
      <li class="has-dropdown">
        <?php echo anchor('dashboard/utilitarios', '<i class="fa fa-briefcase"></i> Utilitários'); ?>
        <ul class="dropdown">
          <li>
            <?php echo anchor('dashboard/extracao', 'Extração'); ?>
          <li><?php echo anchor(base_url('dashboard/vendedores'), 'Vendedores'); ?></li>
            <li class="divider"></li>
          <li><a href="#">Venda por período</a></li>
          <li><a href="#">comparativo extrações</a></li>
        </ul>
      </li>
      <li class="has-dropdown">
        <a href="#"><i class="fa fa-wrench"></i> Configurações</a>
        <ul class="dropdown">
          <li><a href="#">Usuários</a></li>
          <li><a href="#">Parâmetros</a></li>
        </ul>
      </li>
    </ul>
  </section>
</nav>
<div id="all" class="row">
  <div class="small-12 bg">
  
