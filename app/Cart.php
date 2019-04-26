<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart
{
    public $items;
    public $totalQty = 0;
    public $totalAmount = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalAmount = $oldCart->totalAmount;
            $this->totalQty = $oldCart->totalQty;
        } else {
            $this->items = null;
        }
    }

    public function addCart($id, $pd)
    {
        $storeItem = ['item' => $pd, 'qty' => 0, 'amount' => $pd->price];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storeItem = $this->items[$id];

            }
        }
        $storeItem['qty']++;
        $storeItem['amount'] = $pd->price * $storeItem['qty'];
        $this->items[$id] = $storeItem;
        $this->totalQty++;
        $this->totalAmount += $pd->price;
    }

    public function increase($id)
    {
        $this->items[$id]['qty']++;
        $this->items[$id]['amount']+=$this->items[$id]['item']['price'];
        $this->totalQty++;
        $this->totalAmount+=$this->items[$id]['item']['price'];

    }

    public function decrease($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['amount']-=$this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalAmount-=$this->items[$id]['item']['price'];
        if($this->items[$id]['qty']<=0){
            unset($this->items[$id]);
        }


    }
}
