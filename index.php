<?php
 
var_dump(isset($_GET['search']));
 
$search = isset(($_GET['search'])) ? $_GET['search'] : '';
 
 
var_dump($search);
//Criar um array produtos
$produtos = [
    [
        'nome' => "Monitor Alurin CoreVision 120IPSLite 22 FullHD 120Hz IPS HDR10 Adaptive Sync",
        'categoria' => 'Monitor',
        'preco' => 79,
        'stock' => 8
    ],
    [
        'nome' => "PcCom Essential E20 Rato Ergonómico Sem Fios 1.600 DPI Preto",
        'categoria' => 'Rato',
        'preco' => 10,
        'stock' => 990
    ],
 
];
 
$resultado = [];
 
foreach ($produtos as $produto) {
    if ($search === '' || strpos($produto['nome'], $search) !== false) {
        $resultado[] = $produto;
    }
}
 
 
?>
 
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RC-PC-Componetnes</title>
 
    <style>
        * {
            box-sizing: border-box
        }
 
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: #f3f5f8;
        }
 
        form {
            border: 2px solid #2d0af2;
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
        }
 
        input {
            padding: 17px 20px;
            flex: 1;
            min-width: 0;
        }
 
        button {
            padding: 17px 20px;
            cursor: pointer;
        }
 
        .produtos {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
 
        .cartao {
            background: #FFF;
            padding: 20px;
            border-radius: 10px;
            width: 240px;
            box-shadow: 0 20px 7px #ddd;
        }
 
        .preco {
            color: #116b42;
            font-weigth: bold;
        }
    </style>
</head>
 
<body>
    <main>
        <h1>Componetes para PC</h1>
        <form method="GET" action="index.php">
            <input type="text" name="search" value="<?= $search ?>" placeholder="Pesquisar pelo nome...">
            <button type="submit">Pesquisar</button>
        </form>
 
        <div class="produtos">
            <?php foreach ($resultado as $produto): ?>
                <div class="cartao">
                    <h2><?= $produto['nome'] ?></h2>
                    <p><?= $produto['categoria'] ?></p>
                    <p class="preco"><?= $produto['preco'] ?></p>
                </div>
            <?php endforeach ?>
        </div>
 
 
        <p>Não foram encontrados produtos.</p>
 
    </main>
</body>
 
</html>