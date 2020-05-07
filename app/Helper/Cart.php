<?php 
namespace App\Helper;

use App\Model\Product_Image;

/**
 * summary
 */
class Cart
{
    public $items = [];
    public $total_price = 0;
    public $total_items = 0;
    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
        $this->total_price = $this->total_price();
        $this->total_items = $this->total_items();
    }

    public function add($model, $qty)
    {
    	$image = Product_Image::where('product_id', $model->id)->first();

    	if (isset($this->items[$model->id])) 
    	{
    		$this->items[$model->id]['quantity'] += $qty;
    		$this->items[$model->id]['subtotal'] = $this->items[$model->id]['quantity'] * $model->unit_price;
    	} 
    	else 
    	{
    		$this->items[$model->id] = [
	    		'id' => $model->id,
	    		'name' => $model->name,
	    		'slug' => $model->slug,
	    		'unit_price' => $model->unit_price,
	    		'subtotal' => $model->unit_price,
	    		'quantity' => $qty,
	    		'image' => $image,
	    	];
    	}

    	session(['cart' => $this->items]);
    }

    public function delete($id)
    {
    	if (isset($this->items[$id])) {
    		unset($this->items[$id]);
    	}

    	session(['cart' => $this->items]);
    }

    public function update($id, $quantity)
    {
    	
    	if (isset($this->items[$id])) 
    	{
    		$this->items[$id]['quantity'] = $quantity;
    		$this->items[$id]['subtotal'] = $this->items[$id]['quantity'] * $this->items[$id]['unit_price'];
    	} 

    	session(['cart' => $this->items]);
    }

    public function clear()
    {
    	session(['cart'=>[]]);
    }

    protected function total_price()
    {
    	$p = 0;
    	foreach ($this->items as $item) {
    		$p = $p + $item['subtotal'];
    	}

    	return $p;
    }

    protected function total_items()
    {
    	$i = 0;
    	foreach ($this->items as $item) {
    		$i += 1;
    	}

    	return $i;
    }
}

?>