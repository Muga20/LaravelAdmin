<?php

namespace App;

use App\Models\Products;

class Cart {
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

  

    public function __construct($oldCart) {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $product_id) {
        $product = Products::findOrFail($product_id);

        $storedItem = [
            'qty' => 0,
            'product_id' => 0,
            'product_name' => $product->name,
            'product_price' => $product->price,
            'product_image' => $product->image,
            'item' => $product
        ];

        if ($this->items) {
            if (array_key_exists($product_id, $this->items)) {
                $storedItem = $this->items[$product_id];
            }
        }

        $storedItem['qty']++;
        $storedItem['product_id'] = $product_id;
        $storedItem['product_name'] = $product->name;
        $storedItem['product_price'] = $product->price;
        $storedItem['product_image'] = $product->image;
        $this->totalQty++;
        $this->totalPrice += $product->price;
        $this->items[$product_id] = $storedItem;
    }

    public function updateQty($id, $qty) {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['product_price'] * $this->items[$id]['qty'];
        $this->items[$id]['qty'] = $qty;
        $this->totalQty += $qty;
        $this->totalPrice += $this->items[$id]['product_price'] * $qty;
    }

    public function removeItem($id) {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['product_price'] * $this->items[$id]['qty'];
        unset($this->items[$id]);
    }
}
