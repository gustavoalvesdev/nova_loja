<?php 

class Filters extends Model {

    public function getFilters() {

        $products = new Products();
        $brands = new Brands();

        $array = array(
            'brands' => array(),
            'maxslider' => 1000,
            'stars' => array(),
            'sale' => false,
            'options' => array()
        );

        $array['brands'] = $brands->getList();
        $brand_products = $products->getListOfBrands();

        foreach($array['brands'] as $bKey => $bitem) {

            $array['brands'][$bKey]['count'] = '0';

            foreach($brand_products as $bproduct) {

                if ($bproduct['id_brand'] == $bitem['id']) {

                    $array['brands'][$bKey]['count'] = $bproduct['c'];

                }

            }

        }

        return $array;
    }

}
