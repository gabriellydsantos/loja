<link rel="stylesheet" href="icofont/geral/icofont.min.css">
<link rel="stylesheet" href="css/menu_blue.css">

<header class="navHeader">
  <button id="sanduiche">
    <i id="icone" class="icofont-navigation-menu icofont-1x"></i>
  </button>
  <div class="logo">
    <i class="icofont-duotone icofont-cart icofont-1x"></i> LojaTech
  </div>
  <nav id="navbar" class="menu">
    <ul class="ulnav">
      <li class="item_menu"><a href="./">Home</a></li>
      <?php
      $id_logado = $_SESSION['id_usuario'] ?? 0;
      if ($id_logado == 1) {
      ?>
      <li class="item_menu"><a href="cadastro_categoria.php">Categorias</a></li>
      <li class="item_menu"><a href="cadastro_produtos.php">Produtos</a></li>
      <li class="item_menu"><a href="cadastrar_usuario.php">Usuários</a></li>
      <?php
      }
      ?>
      <li>
        <form method="post" class="pesquisa">
          <input type="search" placeholder="Pesquisar">
          <button type="submit"><i class="icofont icofont-search"></i></button>
        </form>
      </li>
      <li class="topo">
        <?php
        if (isset($_SESSION['email'])) {
        ?>
          <a href="#" id="abresub"><i class="icofont-duotone icofont-user"></i></a>
          <span class="toggle" id="navHeader">
            <ul class="subnavHeader" id="togle">
              <li class="subitem"><a href="alterar_usuario.php"> <i class="icofont-duotone icofont-manage-user"></i> Meus Dados</a></li>
              <li class="subitem"><a href="#"> <i class="icofont-duotone icofont-cart"></i> Meus Pedidos</a></li>
              <li class="subitem"><a href="logout.php"> <i class="icofont-duotone icofont-exit"></i> Sair</a></li>
            </ul>
          </span>
        <?php
        } else {
          echo '<a id="abresub"></a>
              <button type="button" id="login"><a href="login.php">Login</a></button>
              <button type="button" id="cadastro"><a href="cadastrar_usuario.php">Cadastre-se</a></button>';
        }
        ?>
      </li>
      <li class="item_menu"><a href="carrinho.php"><i class="icofont-duotone icofont-cart"></i> Carrinho</a></li>
    </ul>
  </nav>
  <script src="js/menu.js"></script>
</header>