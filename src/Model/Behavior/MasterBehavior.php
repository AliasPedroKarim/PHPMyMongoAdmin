<?php 
/**
 * Copyright (c) 2015 SCHENCK Simon
 * 
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) SCHENCK Simon
 * @since         0.0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 *
 */
namespace PHPMyMongoAdmin\Model\Behavior;


class MasterBehavior {

	function __construct($collection){
		
	}
	
	public function beforeInsert(&$data,&$entity=null){

	}

	public function afterInsert(&$data,&$entity=null){

	}

	public function beforeUpdate(&$data,&$entity=null){

	}

	public function afterUpdate(&$data,&$entity=null){

	}

	public function beforeCreateEntity(&$data,&$entity=null){

	}

	public function afterCreateEntity(&$data,&$entity=null){

	}

}
