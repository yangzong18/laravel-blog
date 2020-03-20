<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020/3/20
 * Time: 15:03
 */

namespace App\Services;

use Michelf\MarkdownExtra;
use Michelf\SmartyPants;
class Markdowner
{
	
	public function toHtml($text){
		$text = $this->preTransformText($text);
		$text = MarkdownExtra::defaultTransform($text);
		$text = SmartyPants::defaultTransform($text);
		return $this->postTransformText($text);
	}
	
	protected function preTransformText($text){
		return $text;
	}
	
	protected function postTransformText($text){
		return $text;
	}
	
}