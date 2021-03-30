<?php
namespace App\Helpers;

use App\Helpers\SupportString;

/**
* TableOfContentGenerator
* 
* Class that scans text content, extract headings (H1-H6) and build menu
* with links connected to headings inside of original content
* 
* @author Truong Thanh Hung <thanhthien3046@gmail.com>
*/
class Catalogue {

    /**
     * function main: generate text to html table ul li 
     *
     * @param  string $text
     * @return object catalogue, text
     */
	public static function generate(string $text) {

		$headings = self::parseHeadings($text);

		$catalogue      = self::buildMenuTree($headings);
		$text_catalogue = self::buildHeaddingTextTree($headings);

		$text = self::addHeadingsIdentifiers($text, $catalogue);
        
		return (object)compact('catalogue', 'text', 'text_catalogue');
    }
    
	private static function parseHeadings(string $text) {

		$headings     = array();
        $raw_headings = self::getHeadings($text);
        
		if(empty($raw_headings)) {
			return $headings;
        }
        
		for ($i = 1; $i <= 6; $i++) {
			$last_index = null;
			foreach($raw_headings as $index => $heading) {
				if(preg_match('/<h'. $i . '.*>([\s\S]*)<\/h' . $i . '>/miU', $heading)) {
					$last_index = $heading;
					$headings[$last_index] = [];
				}
				if($last_index) {
					$next_index = $i + 1;
					if( preg_match('/<h'. $next_index . '.*>([\s\S]*)<\/h' . $next_index . '>/miU', $heading) ) {
						$headings[$last_index][$heading] = [];
					}
				}
			}
        }
        
		foreach(array_reverse($headings) as $heading => $subheadings) {
			foreach($subheadings as $subheading => $items) {
				if(array_key_exists($subheading, $headings)) {
					if(!empty($headings[$subheading])) {
						$headings[$heading][$subheading] = $headings[$subheading];
					}
					unset($headings[$subheading]);
				}
			}
        }
        
		return $headings;
	}
	private static function buildMenuTree(array $headings) {

		$menu_tree = '';
		foreach($headings as $heading => $subheadings) {
			$heading = self::cleanText($heading);
			$id    	 = '#' . SupportString::createLinkSlug($heading);
			$link	 = '<a href="' . $id . '">' . $heading . '</a>';
			$menu_tree .= '<li>' . $link;
			if(!empty($subheadings)) {
				$menu_tree .= self::buildMenuTree($subheadings);
			}
			$menu_tree .= '</li>';
        }
        
		if(!empty($menu_tree)) {
			$menu_tree = '<ul>' . $menu_tree . '</ul>';
        }
        
		return $menu_tree;
	}
	private static function buildHeaddingTextTree(array $headings) {

		$menu_tree = '';
		foreach($headings as $heading => $subheadings) {
			
			$menu_tree .= ' ' . strip_tags($heading);
			if(!empty($subheadings)) {
				$menu_tree .= ' ' . self::buildHeaddingTextTree($subheadings);
			}
			$menu_tree .= ' ';
        }
        
		return $menu_tree;
	}
	private static function addHeadingsIdentifiers(string $text, string $menu) {

		foreach(self::getHeadings($text) as $heading) {
			for ($i = 1; $i <= 6; $i++) {
				if(preg_match('/<h' . $i . '/i', $heading) && preg_match('/<\/h' . $i . '>/i', $heading)) {
					$text = str_replace($heading, '<h' . $i . '>' . self::cleanText($heading) . '</h' . $i . '>', $text);
				}
			}
        }
        
		preg_match_all('/<a href="#(.+)">([\s\S]*)<\/a>/miU', $menu, $links);
		for ($i = 0; $i < count($links[2]); $i++) {
			$txt  	= self::cleanText($links[2][$i]);
			$id 	= $links[1][$i];
			$regex	= '/<h(\d)>' . preg_quote($txt, '/') . '<\/h(\d)>/miU';
			$repl	= '<h$1 id="' . $id . '">' . $txt . '</h$1>';
			$text = preg_replace($regex, $repl, $text);
		}
		return $text;
	}
	private static function getHeadings(string $text) {
		$headings = array();
		preg_match_all("/<h\d.*>([\s\S]*)<\/h\d>/miU", $text, $matches);
		foreach($matches[0] as $index => $heading) {
			if(!empty(self::cleanText($heading))) {
				$headings[] = $heading;
			}
		}
		return $headings;
	}
	private static function cleanText(string $text) {
		return trim(strip_tags(str_replace(["\n", "\r", "&nbsp;"], "", $text)));
	}

	
	/**
	 * cleanTextSupport là hàm để Support Json kế thừa hàm này
	 *
	 * @param  mixed $text
	 * @return void
	 */
	public static function cleanTextSupport(string $text) {
		
		return html_entity_decode(self::cleanText($text));
	}
}