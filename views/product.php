<div class="row">
    <div class="col-sm-5">
        <div class="mainphoto">
            <img src="<?php echo BASE_URL; ?>media/products/<?php echo $product_images[0]['url']; ?>" />
        </div>
        <!-- mainphoto -->
         <div class="gallery">
            <?php foreach($product_images as $img): ?>
                <div class="photo_item">
                    <img src="<?php echo BASE_URL; ?>media/products/<?php echo $img['url']; ?>" />
                </div>
                <!-- photo_item -->
            <?php endforeach; ?>
         </div>
         <!-- gallery -->
    </div>
    <!-- col-sm-5 -->
    <div class="col-sm-7">
        <h2><?= $product_info['name'] ?></h2>
        <small><?= $product_info['brand_name'] ?></small><br />
        <?php if ($product_info['rating'] != '0'): ?>
            <?php for($i = 0; $i < intval($product_info['rating']); $i++): ?>
                <img src="<?= BASE_URL ?>assets/images/star.png" border="0" height="15" />
            <?php endfor; ?>
        <?php endif; ?>
        <hr />
        <p><?= $product_info['description'] ?></p>
        <hr />
        De: <span class="price_from">R$ <?php echo number_format($product_info['price_from'], 2); ?></span><br />
        <!-- price_from -->
        Por: <span class="original_price">R$ <?php echo number_format($product_info['price'], 2); ?></span>
        <!-- original_price -->

        <form method="POST" class="addtocartform">
            <button data-action="decrease">-</button><input type="text" name="qtd" value="1" class="addtocart_qt" disabled /><button data-action="increase">+</button> 
            <input class="addtocart_submit" type="submit" value="<?php $this->lang->get('ADD_TO_CART'); ?>" />
            <!-- addtocart_submit -->
        </form>
    </div>
    <!-- col-sm-7 -->
</div>
<!-- row -->