<?php

class Helper 
{
	public static function sectionTree($sections, $indent = 0)
	{
		if( count( $sections ) == 0 )
			return "<li>Nenalezena žádná kategorie</li>";

		$html = '';

		foreach($sections as $section)
		{
			$html .= '<li class="section-option" style="text-indent: ' . $indent . 'px;" data-option="' . $section->id . '">' . $section->name . '</li>';

			if( count($section->children) > 0 )
				$html .= self::sectionTree($section->children, $indent + 10);

		}
		
		return $html;
	}

	public static function sectionList($sections) {

		if( count( $sections ) == 0 )
			return '<span>Nenalezena žádná kategorie</span>';

		$html = '';
		foreach ($sections as $section)
		{
			if( count( $section->children ) > 0 )
				$html .= self::sectionList($section->children);

			else
				$html .= '<li class="section-option" data-id="' . $section->id . '">' . $section->name . '</li>';

		}

		return $html;
	}
}