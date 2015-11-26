<?php
namespace App\Libraries;

class Product
{
	public $id;
	public $product_id;
	public $shop_id;

	private $data = [];

	/**
	 *	Set product's param
	 *	@param param SQL column name
	 *	@param value param value
	 */
	public function set( $param, $value )
	{
		$this->data[ $param ] = $value;
	}
}