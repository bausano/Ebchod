<?php
/**
 * Product model
 */

namespace App\Libraries;

use App;

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
			'shop_id'	 => /*$this->shop_id*/1,
		] + $this->data;

		if( !App\Product::where('shop_id', $this->shop_id)->where('item_id', $this->item_id )->update( $this->data ) && 
			!App\Product::insert( $data ) )
			return false;

		$this->id = App\Product::where('shop_id', $this->shop_id)
								->where('item_id', $this->item_id )
								->first()->id;

		if( !$this->id )
			return false;

		foreach( $this->images as $image )
		{	
			if( !App\Image::where( 'url', $image['url'] )->update( $image ) && 
				!App\Image::insert( $image ) )
				return false;
		}

		foreach( $this->params as $param )
		{
			if( !App\Param::where( 'param', $param['param'] )->update( $param ) && 
				!App\Param::insert( $param ) )
				return false;
		}
		return true;
	}
}