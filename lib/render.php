<?php
namespace JensTornell\Bricks\UI;
use tpl;

class Render extends \Kirby\Component\Template {
	public function render($file, $data = [], $page = null) {
		$data = $this->data($page, $data);

		if(!file_exists($file)) {
			throw new Exception('The template could not be found');
		}

		$tplData = tpl::$data;
		tpl::$data = array_merge(tpl::$data, $data);
		$result = tpl::load($file, null);
		tpl::$data = $tplData;

		return $result;
	}
}