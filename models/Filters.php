<?php

namespace Models;

use Core\Model;

class Filters extends Model
{

    public function getFilters($filters = array())
    {

        $products = new Products();
        $brands = new Brands();

        $array = array(
            'brands' => array(),
            'maxslider' => 1000,
            'stars' => array(
                '0' => 0,
                '1' => 0,
                '2' => 0,
                '3' => 0,
                '4' => 0,
                '5' => 0
            ),
            'sale' => '0',
            'options' => array()
        );

        $array['brands'] = $brands->getList();
        $brand_products = $products->getListOfBrands($filters);

        // Criando filtro de Marcas
        foreach ($array['brands'] as $bKey => $bitem) {

            $array['brands'][$bKey]['count'] = '0';

            foreach ($brand_products as $bproduct) {
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

        // Criando filtro das Estrelas
        $star_products = $products->getListOfStars($filters);

        foreach ($array['stars'] as $skey => $sitem) {

            foreach ($star_products as $sproduct) {

                if ($sproduct['rating'] == $skey) {
                    $array['stars'][$skey] = $sproduct['c'];
                }
            }
        }

        // Criando filtro das Promoções
        $array['sale'] = $products->getSaleCount($filters);

        // Criando filtro das Opções
        $array['options'] = $products->getAvailableOptions($filters);

        return $array;
    }
}
