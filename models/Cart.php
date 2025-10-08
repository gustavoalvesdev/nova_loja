<?php 

class Cart extends Model {
    public function getList() {
        $products = new Products();

        $array = array();
        
        $cart = $_SESSION['cart'];

        foreach($cart as $id => $qt) {
            
            $info = $products->getInfo($id);
            
            $array[] = array(
                'id' => $id,
                'qt' => $qt,
                'price' => $info['price'],
                'name' => $info['name'],
                'image' => $info['image']
            );
        }

        return $array;
    }

    public function getSubtotal() {
        $list = $this->getList();

        $subtotal = 0;
        foreach($list as $item) {
            $subtotal += (floatval($item['price']) * intval($item['qt']));
        }
        return $subtotal;
    }
}
