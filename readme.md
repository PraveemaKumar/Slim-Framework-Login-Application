Created a Simple login page validation using -
 
PHP Framework : "Slim Framework"	 ~~ composer require slim/slim "3.0"

Template      : "Twig Template Engine"   ~~ composer require slim/twig-view

CSS 	      : "Bootstrap Framework"

DB Model      : "Laravel Eloquent ORM"   ~~ composer require illuminate/database

Database Table - 'users':
CREATE TABLE `user`.`users` ( `id` INT NOT NULL , 
							`name` VARCHAR(255) NOT NULL , 
							`password` VARCHAR(255) NOT NULL , 
							`created_at` TIMESTAMP NOT NULL , 
							`updated_at` TIMESTAMP NOT NULL , 
							PRIMARY KEY (`id`)) ENGINE = InnoDB;
