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


class DatabaseController extends MasterController {

	function index(){
		$dbList = $this->Database->getDBList();
		$this->view->set(['dbList' => $dbList]);
	}

	public function view($dbName = ''){
		$collectionList = $this->Database->getCollectionList($dbName);
		$this->view->set(['dbName' => $dbName,'collectionList'=>$collectionList]);
	}

	public function add(){
		
	}

	public function edit(){

	}

	public function delete(){

	}
}