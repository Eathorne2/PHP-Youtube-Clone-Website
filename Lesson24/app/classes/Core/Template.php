<?php

namespace Core;

/**
 * Template
 */
class Template
{
	
	private $extends = '';
	private $currentSection = '';
	private $sections = [];

	public function render(string $path, array $data = []):void 
	{
		if(!empty($data))
			extract($data);
		
		$this->extends = '';

		$file = "../app/views/".str_replace('.', '/', $path).".view.php";
		if(file_exists($file)){
			require $file;
		}else{

			$file = "../app/views/".str_replace('.', '/', $path).".tpl.php";
			if(file_exists($file)){

				$cached = $this->compile($path);
				ob_start();
				require $cached;
				$content = ob_get_clean();

				if(!empty($this->extends))
				{
					$cached = $this->compile($this->extends);
					ob_start();
					require $cached;
					$content = ob_get_clean();
				}

				echo $content;

			}else{
				echo "View file not found: $file";
			}
		}
	}

	private function compile($path)
	{
		$file = "../app/views/".str_replace('.', '/', $path).".tpl.php";
		$cached = "../app/cache/".md5($path).".tpl.php";

		$content = $this->parse(file_get_contents($file));
		file_put_contents($cached, $content);

		return $cached;
	}

	private function parse($content)
	{
		$content = preg_replace('/@extends\([\'"](.+?)[\'"]\)/', '<?php $this->extends = "$1";?>', $content);
		$content = preg_replace('/@section\([\'"](.+?)[\'"]\)/', '<?php ob_start(); $this->currentSection = "$1";?>', $content);
		$content = preg_replace('/@endsection/', '<?php $this->sections["$this->currentSection"] = ob_get_clean();', $content);

		$content = preg_replace('/@yield\([\'"](.+?)[\'"]\)/', '<?php echo $this->sections["$1"];?>', $content);
		return $content;
	}

}