<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="style-header.css">
  <link rel="stylesheet" href="style-main-aside.css">
  <link rel="stylesheet" href="media queries e estilo/medias.css">
  <link rel="shortcut icon" href="imagens-index/LOGO 2.webp" type="image/x-icon">
  <link rel="shortcut icon" href="imagens-index/logo-nova-transparente.png" type="image/x-icon">
  <title>LS Games</title>
</head>

<body>
  <!-- github/dev -->
  <a href="https://github.com/lsl4k1997" id="logogit" target="_blank"><i class="me-3 bi bi-github text-light"></i></a>


  <!-- BARRA DE NAVEGAÇÃO -->
  <header class="bg-dark">
    <div class="navbar-brand w-100"><a href="index.php" class="text-decoration-none text-white"><img class="ms-2" src="imagens-index/logo-nova-transparente.png" alt="logo/site" width="120px"></a></div>
  </header>
  <nav>
    <nav class="navbar bg-dark navbar-expand-md">
      <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar" id="menuhamburguer"><i class="bi bi-list text-light"></i></button>

        <div id="menuNavbar" class="mt-2 collapse navbar-collapse">
          <a href="index.php" class="nav-link text-light border">Inicio</a>
          <a href="#" class="nav-link text-light">Idioma</a>
          <a href="#" class="nav-link text-light">Crackers</a>
          <a href="contato.html" class="nav-link text-light">Contato</a>
          <a href="#" class="nav-link text-light">Pedir Jogo</a>
          <a href="dmca.php" class="nav-link text-light">DMCA</a>
          <!-- Menu Dropdown de Categorias -->
          <div class="dropdown">
            <button class="btn text-white dropdown-toggle" data-bs-toggle="dropdown">Categorias</button>
            <ul class="dropdown-menu" id="idropdown">
              <!-- Categorias no menu enviam o filtro via URL -->
              <li class="dropdown-item"><a href="index.php?categoria=ação">Ação</a></li>
              <li class="dropdown-item"><a href="index.php?categoria=aventura">Aventura</a></li>
              <li class="dropdown-item"><a href="index.php?categoria=corrida">Corrida</a></li>
              <li class="dropdown-item"><a href="index.php?categoria=esporte">Esporte</a></li>
              <li class="dropdown-item"><a href="index.php?categoria=rpg">RPG</a></li>
              <li class="dropdown-item"><a href="index.php?categoria=terror">Terror</a></li>
              <li class="dropdown-item"><a href="index.php?categoria=mundo+aberto">Mundo Aberto</a></li>
              <li class="dropdown-item"><a href="index.php?categoria=estratégia">Estratégia</a></li>
              <li class="dropdown-item"><a href="index.php?categoria=indie">Indie</a></li>
              <li class="dropdown-item"><a href="index.php?categoria=sobrevivência">Sobrevivência</a></li>
              <li class="dropdown-item"><a href="index.php?categoria=medieval">Medieval</a></li>
            </ul>
          </div>
        </div>

        <!-- Campo de Busca -->
        <form action="index.php" method="GET" id="ibuscar">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Pesquisar jogo..." name="pesquisa" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary text-white" type="submit">Buscar</button>
            </div>
          </div>
        </form>
      </div>
    </nav>

    <!-- IMAGEM ABAIXO DO NAV -->
    <form class="d-md-none" action="index.php" method="GET" id="">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Pesquisar jogo..." name="pesquisa" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary bg-dark text-white" type="submit">Buscar</button>
        </div>
      </div>
    </form>
    <section>
      <div id="caixadetexto">
        <h1>Jogos Gratuitos</h1>
        <p>Baixar agora jogos antigos, novos, emuladores e muito mais...</p>
      </div>
    </section>
  </nav>

  <!-- FORMATANDO CAIXAS -->
  <div class="container d-flex">
    <div class="row">
      <div class="col-12 col-lg-8 m-0">

        <!-- Introdução Antes do Conteúdo -->
        <div class="d-flex mt-5 ms-4">
          <h5 class="me-3">Adicionados Recentemente</h5>
          <hr class="flex-fill">
        </div>

        <!-- Exibição dos Jogos com Filtro e Paginação -->
        <main class="w-100">
          <div class="container">
            <?php include 'pagination.php'; ?>
          </div>
        </main>

      </div>

      <!-- ASIDE -->
      <aside class="col-12 col-lg-4 p-5">
        <div class="d-flex">
          <hr class="flex-fill">
        </div>
        <div>
          <form method="GET" action="index.php" id="ibuscar" class="mb-4">
            <div class="input-group">
              <input type="text" class="form-control" name="pesquisa" placeholder="Pesquisar jogo..." aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="bg-dark text-white btn btn-outline-secondary" type="submit">Buscar</button>
              </div>
            </div>
          </form>
        </div>

        <div class="d-flex">
          <h5 class="me-3">Mais Baixados</h5>
          <hr class="flex-fill">
        </div>

        <!-- Exemplo de Jogos Mais Baixados -->
        <div id="imagemcanto">
          <img src="https://www.ratongames.com/wp-content/uploads/2020/09/Screenshot_2020-09-25-2BNeed-2Bfor-2BSpeed-2BUnderground-2B2-2B-2BPesquisa-2BGoogle-300x157.png" alt="" class="w-100">
          <a href="#">Download Need for Speed: Underground 2 v1.2 [PT-BR]</a>
          <hr>
          <img src="https://www.ratongames.com/wp-content/uploads/2021/01/residentevil4original-300x201.jpg" alt="" class="w-100">
          <a href="#">Download Resident Evil 4 + Crack [PT-BR]</a>
          <hr>
          <img src="https://www.ratongames.com/wp-content/uploads/2020/11/Far-2BCry-2B3-300x140.jpg" alt="" class="w-100">
          <a href="#">Download Far Cry 3 v1.05 + DLCs + Crack [PT-BR]</a>
          <hr>
          <img src="https://www.ratongames.com/wp-content/uploads/2019/02/Grand-2BTheft-2BAuto-2BIV-2BComplete-2BEdition-300x140.jpg" alt="" class="w-100">
          <a href="#">Grand Theft Auto IV: Complete Edition + Crack [PT-BR]</a>
          <hr>
        </div>

        <div class="d-flex">
          <h5 class="me-3">Categorias</h5>
          <hr class="flex-fill">
        </div>

        <div class="row">
          <div class="col" id="categoriasside">
            <span><a class="text-decoration-none" href="index.php?categoria=ação">Ação</a></span>
            <span><a class="text-decoration-none" href="index.php?categoria=aventura">Aventura</a></span>
            <span><a class="text-decoration-none" href="index.php?categoria=corrida">Corrida</a></span>
            <span><a class="text-decoration-none" href="index.php?categoria=esporte">Esporte</a></span>
            <span><a class="text-decoration-none" href="index.php?categoria=rpg">RPG</a></span>
            <span><a class="text-decoration-none" href="index.php?categoria=terror">Terror</a></span>
            <span><a class="text-decoration-none" href="index.php?categoria=mundo+aberto">Mundo Aberto</a></span>
            <span><a class="text-decoration-none" href="index.php?categoria=estratégia">Estratégia</a></span>
            <span><a class="text-decoration-none" href="index.php?categoria=indie">Indie</a></span>
            <span><a class="text-decoration-none" href="index.php?categoria=sobrevivência">Sobrevivência</a></span>
            <span><a class="text-decoration-none" href="index.php?categoria=medieval">Medieval</a></span>
          </div>
        </div>
      </aside>
      <iframe src="comentarios.php" height="1000px"></iframe>
    </div>
  </div>
  <!-- RODAPÉ -->
  <footer>
    <div class="border-top text-muted bg-dark">
      <div class="container">
        <hr class="text-muted">
        <div class="row py-3">
          <div class="col-12 col-md-4 text-center text-md-left">
            © 2022 Company, Inc
          </div>
          <div class="col-12 col-md-4 text-center">
            <a href="#" class="text-decoration-none text-light"><img src="imagens-index/logo-nova-transparente.png"
                alt="logo/site" style="width: 100px;"></a>
          </div>
          <div class="col-12 col-md-4 text-center">
            <a href="index.php" id="stilolinks">Home |</a>
            <a href="contato.php" id="stilolinks">Contato |</a>
            <a href="#" id="stilolinks">Sobre</a>
          </div>
        </div>
      </div>
      <div class="container mt-2 text-center">
        <div class="row">
          <div class="col">
            <p>© | Todos jogos são via torrent, não hospedamos nada em nosso servidor.<a href="dmca.php" class="" id="stilolinks"> DMCA</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>