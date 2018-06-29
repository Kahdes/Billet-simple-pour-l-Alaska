<?php

class View {

	private $file;
	private $side;
	private $title;
	private $description;

	public function __construct($action, $side) {
		$this->side = $side;
		$this->file = "View/" . $this->side . "/view" . $action . ".php";
	}

	public function generate($data) {
		$content = $this->generateFile($this->file, $data);
		$vue = $this->generateFile('View/' . $this->side . '/template.php',
		array(
			'title' => $this->title,
			'description' => $this->description,
		 	'content' => $content
		));
		echo $vue;
	}

	private function generateFile($file, $data) {
		if (file_exists($file)) {
		    extract($data);
		    ob_start();
		    require($file);
		    return ob_get_clean();
		} else {
		    throw new Exception("Fichier '$file' introuvable");
		}
	}
}