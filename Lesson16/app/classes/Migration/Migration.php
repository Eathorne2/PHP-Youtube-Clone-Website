<?php
namespace Migration;

use \Core\Database;

/**
 * Migration class
 */
class Migration extends Database
{

	public function run(string $action, string $table, bool $seed = false)
	{
		$className = ucfirst($table);
		$files = [];
		$files[] = '../app/migrations/'.$className.'.php';

		if($table == 'all')
		{
			$files = [];
			$files = glob('../app/migrations/*.php');

		}

		foreach ($files as $file) {
			
			$className = basename($file);
			$className = str_replace('.php', '', $className);

			if(!file_exists($file))
			{
				echo "\nMigration file for table '$className' not found\n";
				die;
			}

			require $file;
			$class = new ("\Migration\\$className");

			if($action == 'create'){
				$class->up();
				if($seed && method_exists($class, 'seed'))
					$class->seed();
			}
			elseif ($action == 'drop'){
				$class->down();
			}
			else{
				die("\nUsage: php migrate [create|drop] [table|all] [seed]\n");
			}
		}
	}
}