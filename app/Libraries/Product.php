<?php
/**
 * Product model
 */

namespace App\Libraries;

use App\Product as ProductModel;

class Product
{
	public $id;
	public $item_id;
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
	 * setting params
	 * @param params array of params
	 */
	public function setParams( $params )
	{
		$this->params = $params;
	}

	/**
	 * setting params
	 * @param params array of params
	 */
	public function setImages( $images )
	{
		$this->images = $images;
	}

	/**
	 * Save product to database
	 */
	public function save()
	{
		$data = [
			'item_id' => $this->item_id,
			'shop_id'	 => $this->shop_id,
		] + $this->data;

		if( !ProductModel::where('shop_id', $this->shop_id)->where('item_id', $this->item_id )->update( $this->data ) && 
			!ProductModel::insert( $data ) )
		{
			return false;
		}

		$this->id = ProductModel::where('shop_id', $this->shop_id)
								->where('item_id', $this->item_id )
								->first()->id;

		return false;
	}
}