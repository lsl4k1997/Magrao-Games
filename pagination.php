<style>
    .card {
        text-align: justify;
    }

    #descricao {
        text-align: justify;
    }
</style>
<?php
// Corrigir os IDs para garantir que são únicos
$jogos = [
    ['id' => 4, 'nome' => 'Hogwarts Legacy Digital Deluxe Edition PT-BR (Build 10461750 + All DLCs + Console DLCs Unlocker + Bonus OST) PC [LS Games]', 'categoria' => 'RPG' . 'Mundo Aberto'.'Acão', 'descricao' => 'Assassins Creed: Mirage segue Basim Ibn Ishaq, um jovem ladrão de Bagdá no século IX, durante a Era de Ouro Islâmica. Atormentado por visões sobrenaturais, ele busca respostas e se junta aos Hidden Ones, uma organização que molda seu destino como assassino mestre...', 'imagem' => 'paginas-jogos/hogwarts-legacy-digital/hogwarts-legacy-digital.png', 'link_download' => 'paginas-jogos/hogwarts-legacy-digital/hogwarts-legacy-digital.php'],

    ['id' => 3, 'nome' => 'Assassins Creed: Mirage (2023) v1.0.6 PT-BR + Bonus [DODI Repack] PC [LS Games]', 'categoria' => 'Ação' . 'Aventura', 'descricao' => 'Assassins Creed: Mirage segue Basim Ibn Ishaq, um jovem ladrão de Bagdá no século IX, durante a Era de Ouro Islâmica. Atormentado por visões sobrenaturais, ele busca respostas e se junta aos Hidden Ones, uma organização que molda seu destino como assassino mestre...', 'imagem' => 'paginas-jogos/assassins-creed-mirage/assins-creed-mirage.png', 'link_download' => 'paginas-jogos/assassins-creed-mirage/assassins-creed-mirage.php'],

    ['id' => 2, 'nome' => 'Red Dead Redemption Crackeado PC Download (fitgirl-repacks) PC [LS Games]', 'categoria' => 'Ação' . 'Aventura', 'descricao' => 'Red Dead Redemption é um jogo eletrônico faroeste de ação aventura jogado em uma perspectiva de terceira pessoa em um mundo aberto. O jogador controla John Marston, podendo interagir com o ambiente e entrar em combate contra inimigos usando diferentes armas...', 'imagem' => 'paginas-jogos/red-dead-redemption/red-dead-redemption-1.png', 'link_download' => 'paginas-jogos/red-dead-redemption/red-dead-redemption.php'],

    ['id' => 1, 'nome' => 'God of War: Ragnarök - Digital Deluxe Edition (2022-2024) PT-BR + Update v1.2 + All DLCs Bonus + 6 GB VRAM Bypass [DODI/FitGirl Repacks]', 'categoria' => 'Ação' . 'Aventura', 'descricao' => 'God of War Ragnarök é um jogo eletrônico de ação-aventura desenvolvido pela Santa Monica Studio e publicado pela Sony Interactive Entertainment. Foi lançado em 9 de novembro de 2022...', 'imagem' => 'paginas-jogos/god-of-war-ragnrok/god-of-war-ragnrok.png', 'link_download' => 'paginas-jogos/god-of-war-ragnrok/god-of-war-ragnrok.php'],

];

// Filtragem
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
$pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';

$filtrados = array_filter($jogos, function ($jogo) use ($categoria, $pesquisa) {
    $categoria_correspondente = empty($categoria) || stripos($jogo['categoria'], $categoria) !== false;
    $pesquisa_correspondente = empty($pesquisa) || stripos($jogo['nome'], $pesquisa) !== false;
    return $categoria_correspondente && $pesquisa_correspondente;
});

// Paginação
$limite = 6;
$pagina_atual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$offset = ($pagina_atual - 1) * $limite;

$jogos_pagina = array_slice($filtrados, $offset, $limite);
$total_jogos = count($filtrados);
$total_paginas = ceil($total_jogos / $limite);
?>

<!-- Exibição dos jogos -->
<div id="cards" class="row container">
    <?php if (count($jogos_pagina) > 0): ?>
        <?php foreach ($jogos_pagina as $jogo): ?>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="<?= $jogo['imagem']; ?>" class="card-img-top" alt="<?= $jogo['nome']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $jogo['nome']; ?></h5>
                        <p id="descricao" class="card-text"><?= $jogo['descricao']; ?></p>
                        <a href="<?= $jogo['link_download']; ?>" class="btn btn-primary">Continuar lendo...</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhum jogo encontrado.</p>
    <?php endif; ?>
</div>

<!-- Paginação -->
<nav class="container fs-6" aria-label="Navegação de página">
    <ul class="pagination justify-content-center">
        <?php if ($pagina_atual > 1): ?>
            <li class="page-item">
                <a class="page-link" href="index.php?<?= http_build_query(array_merge($_GET, ['pagina' => 1])); ?>" aria-label="Primeira">
                    <span aria-hidden="true">&laquo;&laquo;</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="index.php?<?= http_build_query(array_merge($_GET, ['pagina' => $pagina_atual - 1])); ?>" aria-label="Anterior">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php endif; ?>

        <?php
        // Número de links a serem exibidos ao redor da página atual
        $max_links = 3; // Ajuste para o número de links a exibir

        // Definindo o intervalo de páginas para exibir
        $start_page = max(1, $pagina_atual - floor($max_links / 2));
        $end_page = min($total_paginas, $pagina_atual + floor($max_links / 2));

        // Ajuste se a lista for muito curta
        if ($end_page - $start_page < $max_links) {
            if ($start_page == 1) {
                $end_page = min($total_paginas, $start_page + $max_links - 1);
            } else {
                $start_page = max(1, $end_page - $max_links + 1);
            }
        }

        // Exibindo links de página com uma abordagem responsiva
        for ($i = $start_page; $i <= $end_page; $i++): ?>
            <li class="page-item <?= ($i == $pagina_atual) ? 'active' : ''; ?>">
                <a class="page-link" href="index.php?<?= http_build_query(array_merge($_GET, ['pagina' => $i])); ?>"><?= $i; ?></a>
            </li>
        <?php endfor; ?>

        <!-- Adicionando a última página apenas em caso de necessidade -->
        <?php if ($end_page < $total_paginas): ?>
            <li class="page-item disabled">
                <span class="page-link">...</span>
            </li>
            <li class="page-item">
                <a class="page-link" href="index.php?<?= http_build_query(array_merge($_GET, ['pagina' => $total_paginas])); ?>" aria-label="Última">
                    <?= $total_paginas; ?>
                </a>
            </li>
        <?php endif; ?>

        <?php if ($pagina_atual < $total_paginas): ?>
            <li class="page-item">
                <a class="page-link" href="index.php?<?= http_build_query(array_merge($_GET, ['pagina' => $pagina_atual + 1])); ?>" aria-label="Próximo">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="index.php?<?= http_build_query(array_merge($_GET, ['pagina' => $total_paginas])); ?>" aria-label="Última">
                    <span aria-hidden="true">&raquo;&raquo;</span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<style>
    .card-img-top {
        width: 100%;
        /* Ajusta para a largura do card */
        height: 300px;
        /* Altura fixa */
    }
</style>