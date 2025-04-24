<?php
// Inicia a sessão para acessar o carrinho
session_start();

// Inicializa o carrinho se não existir
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array(); // Garante compatibilidade com PHP 5.3.x
}

// Função para calcular o total do carrinho
function calcularTotal() {
    $total = 0;
    if (isset($_SESSION['carrinho'])) {
        foreach ($_SESSION['carrinho'] as $item) {
            $total += $item['preco'] * $item['quantidade'];
        }
    }
    return $total;
}

// Remover item do carrinho
if (isset($_POST['remover_item']) && isset($_POST['produto_id'])) {
    $produtoId = $_POST['produto_id'];
    
    foreach ($_SESSION['carrinho'] as $chave => $item) {
        if ($item['id'] == $produtoId) {
            unset($_SESSION['carrinho'][$chave]);
            break;
        }
    }
    
    // Reindexar o array
    $_SESSION['carrinho'] = array_values($_SESSION['carrinho']); // Garante compatibilidade com PHP 5.3.x
    
    // Redireciona para evitar reenvio do formulário
    header("Location: carrinho.php");
    exit;
}

// Atualizar quantidade do item
if (isset($_POST['atualizar_quantidade']) && isset($_POST['quantidade']) && isset($_POST['produto_id'])) {
    $produtoId = $_POST['produto_id'];
    $novaQuantidade = (int)$_POST['quantidade'];
    
    if ($novaQuantidade <= 0) {
        // Se a quantidade for 0 ou menor, remover o item
        foreach ($_SESSION['carrinho'] as $chave => $item) {
            if ($item['id'] == $produtoId) {
                unset($_SESSION['carrinho'][$chave]);
                break;
            }
        }
        // Reindexar o array
        $_SESSION['carrinho'] = array_values($_SESSION['carrinho']); // Garante compatibilidade com PHP 5.3.x
    } else {
        // Atualizar a quantidade
        foreach ($_SESSION['carrinho'] as $chave => $item) {
            if ($item['id'] == $produtoId) {
                $_SESSION['carrinho'][$chave]['quantidade'] = $novaQuantidade;
                break;
            }
        }
    }
    
    // Redireciona para evitar reenvio do formulário
    header("Location: carrinho.php");
    exit;
}

// Limpar o carrinho
if (isset($_POST['limpar_carrinho'])) {
    $_SESSION['carrinho'] = array(); // Garante compatibilidade com PHP 5.3.x
    
    // Redireciona para evitar reenvio do formulário
    header("Location: carrinho.php");
    exit;
}

// Finalizar compra
if (isset($_POST['finalizar_compra'])) {
    // Aqui você pode adicionar código para processar o pagamento
    // Por enquanto, vamos apenas limpar o carrinho e mostrar uma mensagem
    $_SESSION['mensagem_sucesso'] = "Compra finalizada com sucesso! Obrigado por comprar conosco.";
    $_SESSION['carrinho'] = array(); // Garante compatibilidade com PHP 5.3.x
    
    // Redireciona para evitar reenvio do formulário
    header("Location: menu.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="logo.jpg" type="image/x-icon">
    <title>Carrinho de Compras - Pratique Esportes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        .header {
            background-color: #cf6f2e;
            color: white;
            padding: 10px;
            text-align: center;
        }
        
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 10px;
            background-color: white;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        
        .produto-img {
            width: 60px;
            height: 60px;
        }
        
        .btn {
            background-color: #cf6f2e;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        
        .btn-remove {
            background-color: #e74c3c;
        }
        
        .btn-checkout {
            background-color: #2ecc71;
        }
        
        .form-group {
            margin-bottom: 10px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        
        .form-group input {
            width: 100%;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Carrinho de Compras</h1>
    </div>

    <div class="container">
        <a href="menu.php">← Voltar às compras</a>
        
        <?php if (empty($_SESSION['carrinho'])): ?>
            <div style="text-align: center; padding: 20px;">
                <h2>Seu carrinho está vazio</h2>
                <p>Adicione produtos ao seu carrinho para continuar comprando.</p>
                <a href="menu.php">Continuar comprando</a>
            </div>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Subtotal</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['carrinho'] as $item): ?>
                        <tr>
                            <td>
                                <img src="<?php echo htmlspecialchars($item['imagem']); ?>" alt="<?php echo htmlspecialchars($item['nome']); ?>" class="produto-img">
                            </td>
                            <td><?php echo htmlspecialchars($item['nome']); ?></td>
                            <td>R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></td>
                            <td>
                                <form method="post" action="carrinho.php">
                                    <input type="hidden" name="produto_id" value="<?php echo $item['id']; ?>">
                                    <input type="number" name="quantidade" value="<?php echo $item['quantidade']; ?>" min="1" style="width: 50px;">
                                    <button type="submit" name="atualizar_quantidade" class="btn">Atualizar</button>
                                </form>
                            </td>
                            <td>R$ <?php echo number_format($item['preco'] * $item['quantidade'], 2, ',', '.'); ?></td>
                            <td>
                                <form method="post" action="carrinho.php">
                                    <input type="hidden" name="produto_id" value="<?php echo $item['id']; ?>">
                                    <button type="submit" name="remover_item" class="btn btn-remove">Remover</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div style="margin-top: 20px;">
                <h2>Total: R$ <?php echo number_format(calcularTotal(), 2, ',', '.'); ?></h2>
                
                <div style="margin-top: 10px;">
                    <form method="post" action="carrinho.php" style="display: inline-block;">
                        <button type="submit" name="limpar_carrinho" class="btn btn-remove">Limpar Carrinho</button>
                    </form>
                </div>
            </div>

            <div style="margin-top: 20px;">
                <h2>Informações de Entrega</h2>
                <form method="post" action="carrinho.php">
                    <div class="form-group">
                        <label for="nome">Nome Completo</label>
                        <input type="text" id="nome" name="nome" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="tel" id="telefone" name="telefone" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" id="endereco" name="endereco" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="cep">CEP</label>
                        <input type="text" id="cep" name="cep" required>
                    </div>
                    
                    <h3>Forma de Pagamento</h3>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="pagamento" value="credito" required> Cartão de Crédito
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="pagamento" value="boleto"> Boleto Bancário
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="pagamento" value="pix"> PIX
                        </label>
                    </div>
                    
                    <button type="submit" name="finalizar_compra" class="btn btn-checkout" style="margin-top: 10px;">Finalizar Compra</button>
                </form>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
