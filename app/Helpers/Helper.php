<?php

class Helper 
{
	public static function sectionTree($sections, $indent = 0)
	{
		$html = '';

		foreach($sections as $section)
		{
			$tree[$section->id] = ['id' => $section->id, 'name' => $section->name, 'children' => [] ];
			$html .= '<li class="section-option" style="text-indent: ' . $indent . 'px;" data-option="' . $section->id . '">' . $section->name . '</li>';

			if( count($section->children) > 0 ) {
				$html .= self::sectionTree($section->children, $indent + 10);
			}
		}

		return $html;
	}
}