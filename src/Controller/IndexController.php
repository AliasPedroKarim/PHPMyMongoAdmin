<?php 
/**
 * Copyright (c) 2015 SCHENCK Simon
 * 
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) SCHENCK Simon
 * @since         0.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 *
 */
namespace PHPMyMongoAdmin\Controller;

use PHPMyMongoAdmin\MasterController;


class IndexController extends MasterController {

	function index($namespace){
		$list = $this->Index->getList($namespace);
		$this->view->set(['list' => $list,'namespace'=>$namespace]);
	}

	public function add($namespace){
		if($this->request->isPost()){
			debug($this->request->data);
		}
		$this->view->set(['namespace'=>$namespace]);
	}

	public function edit($namespace){
		
	}

	public function delete($namespace){

	}

}