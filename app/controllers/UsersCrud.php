<?php
namespace controllers;
use controllers\crud\datas\UsersCrudDatas;
use Ubiquity\controllers\crud\CRUDDatas;
use controllers\crud\viewers\UsersCrudViewer;
use Ubiquity\controllers\crud\viewers\ModelViewer;
use controllers\crud\events\UsersCrudEvents;
use Ubiquity\controllers\crud\CRUDEvents;
use controllers\crud\files\UsersCrudFiles;
use Ubiquity\controllers\crud\CRUDFiles;

 /**
 * CRUD Controller UsersCrud
 * @route("/users","inherited"=>true,"automated"=>true)
 **/
class UsersCrud extends \Ubiquity\controllers\crud\CRUDController{

	public function __construct(){
		parent::__construct();
		\Ubiquity\orm\DAO::start();
		$this->model="models\\User";
	}

	public function _getBaseRoute() {
		return '/users';
	}
	
	protected function getAdminData(): CRUDDatas{
		return new UsersCrudDatas($this);
	}

	protected function getModelViewer(): ModelViewer{
		return new UsersCrudViewer($this);
	}

	protected function getEvents(): CRUDEvents{
		return new UsersCrudEvents($this);
	}

	protected function getFiles(): CRUDFiles{
		return new UsersCrudFiles();
	}


}
