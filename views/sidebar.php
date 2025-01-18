<aside>
    <h1><?= $this->lang->get('FILTER'); ?></h1>
    <div class="filterarea">

        <form method="GET">

            <input type="hidden" name="s" value="<?php if(isset($viewData['searchTerm'])) { echo $viewData['searchTerm']; } ?>" />
            <input type="hidden" name="category" value="<?php if(isset($viewData['category'])) {echo $viewData['category']; } ?>" />

            <div class="filterbox">
                <div class="filtertitle"><?php $this->lang->get('BRANDS'); ?></div>
                <div class="filtercontent">
                    <?php foreach ($viewData['filters']['brands'] as $bitem) : ?>
                    <div class="filteritem">
                        <input type="checkbox" <?php echo (isset($viewData['filters_selected']['brand']) && in_array($bitem['id'], $viewData['filters_selected']['brand'])) ? 'checked="checked"' : ''; ?> name="filter[brand][]"
                            value="<?php echo $bitem['id']; ?>"
                            id="filter_brand<?php echo $bitem['id']; ?>"> <label
                            for="filter_brand<?php echo $bitem['id']; ?>">
                        </label>
                        <?php echo $bitem['name']; ?> <span
                            style="float:right;">(<?php echo $bitem['count']; ?>)</span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="filterbox">
                <div class="filtertitle"><?php $this->lang->get('PRICE'); ?></div>
                <div class="filtercontent">
                    <input type="hidden" id="slider0" name="filter[slider0]" value="<?= $viewData['filters']['slider0']; ?>" />
                    <input type="hidden" id="slider1" name="filter[slider1]" value="<?= $viewData['filters']['slider1']; ?>" />
                    <input type="text" id="amount" readonly>

                    <div id="slider-range"></div>
                </div>
            </div>

            <div class="filterbox">
                <div class="filtertitle"><?php $this->lang->get('RATING'); ?></div>
                <div class="filtercontent">

                    <div class="filteritem">
                        <input type="checkbox" name="filter[star][]" <?php echo (isset($viewData['filters_selected']['star']) && in_array('0', $viewData['filters_selected']['star'])) ? 'checked="checked"' : ''; ?> value="0" id="filter_star0"> <label
                            for="filter_star0">
                            (<?php $this->lang->get('NO_STAR'); ?>)
                        </label>
                        <span
                            style="float: right">(<?php echo $viewData['filters']['stars']['0']; ?>)</span>
                    </div>

                    <div class="filteritem">
                        <input type="checkbox" name="filter[star][]" <?php echo (isset($viewData['filters_selected']['star']) && in_array('1', $viewData['filters_selected']['star'])) ? 'checked="checked"' : ''; ?> value="1" id="filter_star1"> <label
                            for="filter_star1">
                            <img src="<?php echo BASE_URL ?>assets/images/star.png" border="0"
                                height="13">
                        </label>
                        <span
                            style="float: right">(<?php echo $viewData['filters']['stars']['1']; ?>)</span>
                    </div>
                    <div class="filteritem">
                        <input type="checkbox" name="filter[star][]" <?php echo (isset($viewData['filters_selected']['star']) && in_array('2', $viewData['filters_selected']['star'])) ? 'checked="checked"' : ''; ?> value="2" id="filter_star2"> <label
                            for="filter_star2">
                            <img src="<?php echo BASE_URL ?>assets/images/star.png" border="0"
                                height="13">
                            <img src="<?php echo BASE_URL ?>assets/images/star.png" border="0"
                                height="13">
                        </label>
                        <span
                            style="float: right">(<?php echo $viewData['filters']['stars']['2']; ?>)</span>
                    </div>
                    <div class="filteritem">
                        <input type="checkbox" name="filter[star][]" <?php echo (isset($viewData['filters_selected']['star']) && in_array('3', $viewData['filters_selected']['star'])) ? 'checked="checked"' : ''; ?> value="3" id="filter_star3"> <label
                            for="filter_star3">
                            <img src="<?php echo BASE_URL ?>assets/images/star.png" border="0"
                                height="13">
                            <img src="<?php echo BASE_URL ?>assets/images/star.png" border="0"
                                height="13">
                            <img src="<?php echo BASE_URL ?>assets/images/star.png" border="0"
                                height="13">
                        </label>
                        <span
                            style="float: right">(<?php echo $viewData['filters']['stars']['3']; ?>)</span>
                    </div>
                    <div class="filteritem">
                        <input type="checkbox" name="filter[star][]" <?php echo (isset($viewData['filters_selected']['star']) && in_array('4', $viewData['filters_selected']['star'])) ? 'checked="checked"' : ''; ?> value="4" id="filter_star4"> <label
                            for="filter_star4">
                            <img src="<?php echo BASE_URL ?>assets/images/star.png" border="0"
                                height="13">
                            <img src="<?php echo BASE_URL ?>assets/images/star.png" border="0"
                                height="13">
                            <img src="<?php echo BASE_URL ?>assets/images/star.png" border="0"
                                height="13">
                            <img src="<?php echo BASE_URL ?>assets/images/star.png" border="0"
                                height="13">
                        </label>
                        <span
                            style="float: right">(<?php echo $viewData['filters']['stars']['4']; ?>)</span>
                    </div>
                    <div class="filteritem">
                        <input type="checkbox" name="filter[star][]" <?php echo (isset($viewData['filters_selected']['star']) && in_array('5', $viewData['filters_selected']['star'])) ? 'checked="checked"' : ''; ?> value="5" id="filter_star5"> <label
                            for="filter_star5">
                            <img src="<?php echo BASE_URL ?>assets/images/star.png" border="0"
                                height="13">
                            <img src="<?php echo BASE_URL ?>assets/images/star.png" border="0"
                                height="13">
                            <img src="<?php echo BASE_URL ?>assets/images/star.png" border="0"
                                height="13">
                            <img src="<?php echo BASE_URL ?>assets/images/star.png" border="0"
                                height="13">
                            <img src="<?php echo BASE_URL ?>assets/images/star.png" border="0"
                                height="13">
                        </label>
                        <span
                            style="float: right">(<?php echo $viewData['filters']['stars']['5']; ?>)</span>
                    </div>
                </div>
            </div>

            <div class="filterbox">
                <div class="filtertitle"><?php $this->lang->get('SALE'); ?></div>
                <div class="filtercontent">
                    <div class="filteritem">
                        <input type="checkbox" name="filter[sale]" value="1" <?php echo (isset($viewData['filters_selected']['sale']) && $viewData['filters_selected']['sale'] == '1') ? 'checked="checked"' : ''; ?> id="filter_sale"> 
                        
                        <label for="filter_sale">Em promoção</label>
                        <span style="float: right">(<?php echo $viewData['filters']['sale']; ?>)</span>
                    </div>
                </div>
            </div>

            <div class="filterbox">
                <div class="filtertitle"><?php $this->lang->get('OPTIONS'); ?></div>
                <div class="filtercontent">
                    <?php foreach ($viewData['filters']['options'] as $option) : ?>
                    <strong><?php echo $option['name']; ?></strong><br>
                    <?php foreach($option['options'] as $op): ?>
                    <div class="filteritem">
                        <input type="checkbox" name="filter[options][]" <?php echo (isset($viewData['filters_selected']['options']) && in_array($op['value'], $viewData['filters_selected']['options'])) ? 'checked="checked"' : ''; ?>  value="<?php echo $op['value']; ?>"
                            id="filter_options<?php echo $op['id']; ?>"> <label
                            for="filter_options<?php echo $op['id']; ?>">
                        </label>
                        <?php echo $op['value']; ?> <span
                            style="float:right;">(<?php echo $op['count']; ?>)</span>
                    </div>
                    <?php endforeach; ?>
                    <br>
                    <?php endforeach; ?>
                </div>
            </div>
    
        </form>

    </div>

    <div class="widget">
        <h1><?= $this->lang->get('FEATUREDPRODUCTS'); ?></h1>
        <div class="widget_body">
            <?php $this->loadView('widget_item', array('list' => $viewData['widget_featured1'])); ?>
        </div>
    </div>
</aside>