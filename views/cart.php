<h1>Carrinho de Compras</h1>

<table border="0" width="100%">
    <tr>
        <th width="100">Imagem</th>
        <th>Nome</th>
        <th width="50">Qtd.</th>
        <th width="150">Preço</th>
    </tr>
    <?php $subtotal = 0; ?>
    <?php foreach($list as $item): ?>
    <?php $subtotal += (floatval($item['price']) * intval($item['qt'])); ?>
    <tr>
        <td><img src="<?= BASE_URL ?>media/products/<?= $item['image'] ?>" width="80"></td>
        <td><?= $item['name'] ?></td>
        <td><?= $item['qt'] ?></td>
        <td>R$ <?= number_format($item['price'], 2, ',', ';') ?></td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="3" align="right">Subtotal</td>
        <td><strong>R$ <?= number_format($subtotal, 2, ',', '.') ?></strong></td>
    </tr>
</table>