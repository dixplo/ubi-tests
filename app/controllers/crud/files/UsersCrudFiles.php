<?php
namespace controllers\crud\files;

use Ubiquity\controllers\crud\CRUDFiles;
 /**
 * Class UsersCrudFiles
 **/
class UsersCrudFiles extends CRUDFiles{
	public function getViewIndex(){
		return "UsersCrud/index.html";
	}

	public function getViewForm(){
		return "UsersCrud/form.html";
	}

	public function getViewDisplay(){
		return "UsersCrud/display.html";
	}


}
