<!DOCTYPE html>
<html>

<head>
    <title>Product List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QZw7ro8NhI4N5j+8F+dOFuZC1QqjJzPBJ7IIjtK2E/W+gaXrgn+pZb7m3J3SwFYF" crossorigin="anonymous">
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- Estilo personalizado para maior espaçamento e bordas suaves -->
    <style>
        body {
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        .table {
            margin-top: 50px;
            border-collapse: separate;
            border-spacing: 0 15px; /* Espaçamento entre as linhas */
        }
        thead th {
            background-color: #f8f9fa; /* Fundo cinza claro no cabeçalho */
            font-weight: bold;
            text-align: left;
        }
        td, th {
            padding: 15px 20px;
            border: none; /* Remove bordas entre as células */
        }
        tr {
            background-color: #ffffff; /* Fundo branco para as linhas */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra para destacar as linhas */
        }
        tr:hover {
            background-color: #f1f1f1; /* Destaque ao passar o mouse */
        }
    </style>
</head>

<body>
    <?php
    $result = file_get_contents("http://node-container:9001/products");
    $products = json_decode($result);
    ?>
    
    <div class="container">
        <h1 class="text-center">Lista de Produtos</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product->name; ?></td>
                        <td><?php echo $product->price; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
