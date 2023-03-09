<?php

namespace App\Services;

use App\Models\Dish;

class CartService
{
    private $cart, $cartList, $total = 0, $count = 0;
    
    public function __construct()
    {
        $this->cart = session()->get('cart', []);

        $ids = array_keys($this->cart);

        $this->cartList = Dish::whereIn('id', $ids)
        ->get()
        ->map(function($dish) {
            $hotel->count = $this->cart[$dish->id];
            $dish->sum = $dish->count * $dish->price;
            $this->total += $dish->sum;
            return $dish;
        });

        $this->count = $this->cartList->count();

    }

    public function __get($props)
    {
        return match($props) {
            'total' => $this->total,
            'count' => $this->count,
            'list' => $this->cartList,
            default => null
        };
    }

    public function add(int $id, int $count)
    {
        if (isset($this->cart[$id])) {
            $this->cart[$id] += $count;
        }
        else {
            $this->cart[$id] = $count;
        }
        session()->put('cart', $this->cart);
    }

    public function update(array $cart)
    {
        session()->put('cart', $cart);
    }

    
    public function delete(int $id)
    {
        unset($this->cart[$id]);
        session()->put('cart', $this->cart);
    }

    public function order()
    {
        $order = (object)[];
        $order->total = $this->total;
        $order->hotels = [];

        foreach ($this->cartList as $dish) {
            $order->hotels[] = (object)[
                'name' => $dish->name,
                'count' => $dish->count,
                'id' => $dish->id
            ];
        }

        return $order;
    }

    public function empty()
    {
        session()->put('cart', []);
        $this->total = 0;
        $this->count = 0;
        $this->cartList = collect();
        $this->cart = [];
    }

}

?>