<?php
/**
 * Product model
 */

namespace App\Libraries;

use App\Product as ProductModel;

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

	/**
	 * Save product to database
	 */
	public function save()
	{
		try 
		{
			ProductModel::where('shop_id', '=', $this->shop_id, 'and', 'product_id', '=', $this->product_id )->update( $this->data );
		}
		catch( \QueryException $e )
		{

			$data = [
				'product_id' => $this->product_id,
				'shop_id'	 => $this->shop_id,
			] + $this->data;

			ProductModel::insert( $data );
		}

	}
}