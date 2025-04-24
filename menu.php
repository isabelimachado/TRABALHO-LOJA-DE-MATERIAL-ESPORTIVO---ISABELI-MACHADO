<?php
// Inicia a sessão para gerenciar o carrinho
session_start();

// Inicializa o carrinho se não existir

// Função para contar itens no carrinho
function contarItensCarrinho() {
    $total = 0;
    if (isset($_SESSION['carrinho'])) {
        foreach ($_SESSION['carrinho'] as $item) {
            $total += $item['quantidade'];
        }
    }
    return $total;
}

// Adicionar produto ao carrinho (via POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar_carrinho'])) {
    $produtoId = $_POST['produto_id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $imagem = $_POST['imagem'];

    // Verifica se o produto já está no carrinho
    $encontrado = false;
    foreach ($_SESSION['carrinho'] as $chave => $item) {
        if ($item['id'] == $produtoId) {
            $_SESSION['carrinho'][$chave]['quantidade']++;
            $encontrado = true;
            break;
        }
    }

    // Se não encontrou, adiciona como novo item
    if (!$encontrado) {
        $_SESSION['carrinho'][] = array(
            'id' => $produtoId,
            'nome' => $nome,
            'preco' => $preco,
            'imagem' => $imagem,
            'quantidade' => 1
        );
    }

    // Redireciona para evitar reenvio do formulário
    header("Location: ".$_SERVER['PHP_SELF']."?adicao=sucesso");
    exit;
}
?>

<div class="mensagem-sucesso" id="mensagemSucesso">Produto adicionado ao carrinho!</div>

<header class="header">
    <div class="carrinho-container">
        <a href="carrinho.php">
            <img class="carrinho" src="fotosite/carrinho.png" alt="Carrinho de compras">
            <span class="carrinho-contador"><?php echo contarItensCarrinho(); ?></span>
        </a>
    </div>
    <h1>Pratique Esportes</h1>
    <a href="login.html" class="login-btn">Login ADM</a>
</header>

<div class="container">
    <aside class="filtros">
        <div class="filtro-grupo">
            <h3 class="filtro-titulo">Marca</h3>
            <label>
                <input type="checkbox" name="marca" value="nike" onchange="filtrarProdutos()">
                Nike
            </label>
            <label>
                <input type="checkbox" name="marca" value="adidas" onchange="filtrarProdutos()">
                Adidas
            </label>
            <label>
                <input type="checkbox" name="marca" value="puma" onchange="filtrarProdutos()">
                Puma
            </label>
        </div>

        <div class="filtro-grupo">
            <h3 class="filtro-titulo">Categoria</h3>
            <label>
                <input type="checkbox" name="categoria" value="camisetas" onchange="filtrarProdutos()">
                Camisetas
            </label>
            <label>
                <input type="checkbox" name="categoria" value="calcas" onchange="filtrarProdutos()">
                Calças
            </label>
            <label>
                <input type="checkbox" name="categoria" value="calcados" onchange="filtrarProdutos()">
                Calçados
            </label>
            <label>
                <input type="checkbox" name="categoria" value="boné" onchange="filtrarProdutos()">
                Boné
            </label>
            <label>
                <input type="checkbox" name="categoria" value="mochila" onchange="filtrarProdutos()">
                Mochila
            </label>
        </div>

        <div class="filtro-grupo">
            <h3 class="filtro-titulo">Tamanho</h3>
            <label>
                <input type="checkbox" name="tamanho" value="p" onchange="filtrarProdutos()">
                P
            </label>
            <label>
                <input type="checkbox" name="tamanho" value="m" onchange="filtrarProdutos()">
                M
            </label>
            <label>
                <input type="checkbox" name="tamanho" value="g" onchange="filtrarProdutos()">
                G
            </label>
        </div>
    </aside>

    <main class="produtos" id="listaProdutos">
        <div class="produto" data-marca="nike" data-categoria="camisetas" data-tamanho="m">
            <img src="fotosite/camisa nike.avif" alt="Camiseta Nike">
            <h3>Camiseta Nike Dry-Fit</h3>
            <p>Camiseta esportiva tecnologia Dry-Fit</p>
            <p>R$ 129,99</p>
            <br>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="produto_id" value="1">
                <input type="hidden" name="nome" value="Camiseta Nike Dry-Fit">
                <input type="hidden" name="preco" value="129.99">
                <input type="hidden" name="imagem" value="fotosite/camisa nike.avif">
                <button type="submit" name="adicionar_carrinho">COMPRAR</button>
            </form>
        </div>

        <div class="produto" data-marca="adidas" data-categoria="calcas" data-tamanho="g">
            <img src="fotosite/calçasite.webp" alt="Calça Adidas">
            <h3>Calça Adidas Treino</h3>
            <p>Calça de treino confortável</p>
            <p>R$ 199,99</p>
            <br>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="produto_id" value="2">
                <input type="hidden" name="nome" value="Calça Adidas Treino">
                <input type="hidden" name="preco" value="199.99">
                <input type="hidden" name="imagem" value="fotosite/calçasite.webp">
                <button type="submit" name="adicionar_carrinho">COMPRAR</button>
            </form>
        </div>

        <!-- Continue para os outros produtos... -->
    </main>
</div>

<script>
    function filtrarProdutos() {
        const produtos = document.querySelectorAll('.produto');

        const marcasSelecionadas = Array.from(document.querySelectorAll('input[name="marca"]:checked'))
            .map(el => el.value);
        const categoriasSelecionadas = Array.from(document.querySelectorAll('input[name="categoria"]:checked'))
            .map(el => el.value);
        const tamanhosSelecionados = Array.from(document.querySelectorAll('input[name="tamanho"]:checked'))
            .map(el => el.value);

        produtos.forEach(produto => {
            const marca = produto.getAttribute('data-marca');
            const categoria = produto.getAttribute('data-categoria');
            const tamanho = produto.getAttribute('data-tamanho');

            const marcaValida = marcasSelecionadas.length === 0 || marcasSelecionadas.includes(marca);
            const categoriaValida = categoriasSelecionadas.length === 0 || categoriasSelecionadas.includes(categoria);
            const tamanhoValido = tamanhosSelecionados.length === 0 || tamanhosSelecionados.includes(tamanho);

            produto.style.display = (marcaValida && categoriaValida && tamanhoValido) ? 'block' : 'none';
        });
    }

    // Mostrar mensagem de sucesso quando o produto for adicionado
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('adicao') === 'sucesso') {
            const mensagem = document.getElementById('mensagemSucesso');
            mensagem.style.display = 'block';

            // Esconder a mensagem após 3 segundos
            setTimeout(function() {
                mensagem.style.display = 'none';
                // Remover o parâmetro da URL
                window.history.replaceState({}, document.title, window.location.pathname);
            }, 3000);
        }
    });
</script>
</body>
</html>

