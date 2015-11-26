<?php

namespace App\Libraries;

use App;

class Section
{
	public static function parse( $string )
	{
		foreach( ( $sections = explode( " | ", $string ) ) as $index=>$sectionName )
		{ 
			$parent = $index ? $section->id : 0;
			$section = App\Section::firstOrNew( [ 'name' => $sectionName , 'parent_id' => $parent ] );
			$section->save();			
		}
	}	
}