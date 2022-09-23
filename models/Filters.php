<?php 

namespace Models;

use Core\Model;

class Filters extends Model {

    public function getFilters($filters = array()) {

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
        $brand_products = $products->getListOfBrands($filters);

        // Criando filtro de Marcas
        foreach($array['brands'] as $bKey => $bitem) {

            $array['brands'][$bKey]['count'] = '0';

            foreach($brand_products as $bproduct) {
                if ($bproduct['id_brand'] == $bitem['id']) {
                    $array['brands'][$bKey]['count'] = $bproduct['c'];
                }
            }

             if ($array['brands'][$bKey]['count'] == '0') {
                unset($array['brands'][$bKey]);
             }
        }

        // Criando filtro de Preço
        $array['maxslider'] = $products->getMaxPrice($filters);

        return $array;
    }

}
