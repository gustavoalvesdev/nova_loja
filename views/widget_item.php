<?php foreach($list as $widget_item): ?>
<div class="widget_item">
    <a href="<?= BASE_URL ?>product/open/<?= $widget_item['id'] ?>">
        <div class="widget_info">
            <div class="widget_productname"><?= $widget_item['name'] ?></div>
            <!-- widget_productname -->
            <div class="widget_price"><span><?= number_format($widget_item['price_from'], 2, ',', '.') ?></span> <?= number_format($widget_item['price'], 2, ',', '.') ?></div>
            <!-- widget_price -->
        </div>
        <!-- widget_info -->
        <div class="widget_photo">
            <img src="<?= BASE_URL ?>media/products/<?= $widget_item['images'][0]['url'] ?>" />
        </div>
        <!-- widget_photo -->    
        <div style="clear: both;"></div>
    </a>     
</div>
<!-- widget_item -->
<?php endforeach; ?>