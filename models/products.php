<?php 

namespace Models;

use Core\Model;

class Products extends Model {

    public function getMaxPrice($filters = array())
    {
        $where = $this->buildWhere($filters);

        $sql = "SELECT 
        price
        FROM products
        WHERE " . implode(' AND ', $where) . "
        ORDER BY price DESC
        LIMIT 1";
        $sql = $this->db->prepare($sql);

        $this->bindWhere($filters, $sql);

        $sql->execute();

        if ($sql->rowCount() > 0) {

            $sql = $sql->fetch();

            return $sql['price'];

        } else {

            return '0';

        }
    }

    public function getListOfBrands($filters = array()) {

        $array = array();

        $where = $this->buildWhere($filters);

        $sql = "SELECT 
        id_brand,
        COUNT(id) AS c
        FROM products
        WHERE " . implode(' AND ', $where) . "
        GROUP BY id_brand";
        $sql = $this->db->prepare($sql);

        $this->bindWhere($filters, $sql);

        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;

    }

    public function getList($offset = 0, $limit = 3, $filters = array()) {
        $array = array();

        $where = $this->buildWhere($filters);

        $sql = "SELECT 
        *, 
            (select brands.name from brands where brands.id = products.id_brand) as brand_name,
            (select categories.name from categories where categories.id = products.id_category) as category_name 
        FROM 
        products 
        WHERE " . implode(' AND ', $where) . "
        LIMIT $offset, $limit";

        $sql = $this->db->prepare($sql);

        $this->bindWhere($filters, $sql);

        $sql->execute();

        if($sql->rowCount() > 0) {
            
            $array = $sql->fetchAll();

            foreach($array as $key => $item) {

                $array[$key]['images'] = $this->getImagesByProductId($item['id']);

            }
        }

        return $array;

    }

    public function getTotal($filters = array()) {

        $where = $this->buildWhere($filters);

        $sql = "SELECT 
        COUNT(*) as c 
        FROM products
        WHERE " . implode(' AND ', $where);
        $sql = $this->db->prepare($sql);

        $this->bindWhere($filters, $sql);

        $sql->execute();
        $sql = $sql->fetch();

        return $sql['c'];
    }

    public function getImagesByProductId($id) {

        $array = array();

        $sql = "SELECT url FROM products_images WHERE id_product = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;

    }

    private function buildWhere($filters)
    {
        $where = array(
            '1=1'
        );

        if (!empty($filters['category'])) {
            $where[] = 'id_category = :id_category';
        }

        return $where;
    }

    private function bindWhere($filters, &$sql)
    {
        if (!empty($filters['category'])) {
            $sql->bindValue(':id_category', $filters['category']);
        }
    }

}
