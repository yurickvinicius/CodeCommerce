<?php
/**
 * Created by PhpStorm.
 * User: yurickvinicius
 * Date: 03/08/15
 * Time: 14:27
 */

namespace CodeCommerce;


class Cart
{

    private $items;

    public function __construct(){
        $this->items = [];
    }

    //add
    public function add($id, $name, $price){

        $this->items += [
            $id => [
                'qtd' => isset($this->items[$id]['qtd']) ? $this->items[$id]['qtd']++ : 1,
                'price' => $price,
                'name' => $name
            ]
        ];

        return $this->items;

        // id -> qtd, price, name
    }

    //remove
    public function remove($id){
        unset($this->items[$id]);
    }

    //all
    public function all(){
        return $this->items;
    }

    //getTotal
    public function getTotal(){
        $total = 0;

        foreach($this->items as $items){
            $total += $items['qtd'] * $items['price'];
        }

        return $total;
    }

    public function clear(){
        $this->items = [];
    }

}