<?php
namespace controllers;
use Ubiquity\utils\http\USession;
use Ubiquity\utils\http\URequest;
use controllers\auth\files\AuthCtrlFiles;
use Ubiquity\controllers\auth\AuthFiles;
use Ubiquity\orm\DAO;
use models\User;

 /**
 * Auth Controller AuthCtrl
 **/
class AuthCtrl extends \Ubiquity\controllers\auth\AuthController{

	protected function onConnect($connected) {
		$urlParts=$this->getOriginalURL();
		USession::set($this->_getUserSessionKey(), $connected);
		if(isset($urlParts)){
			$this->_forward(implode("/",$urlParts));
		}else{
			$this->_forward('main');
		}
	}

	protected function _connect() {
		if(URequest::isPost()){
			$email=URequest::post($this->_getLoginInputName());
			$password=URequest::post($this->_getPasswordInputName());
			$user=DAO::getOne(User::class, "email= ?",false,[$email]);
			if($user){
			    if($user->getPassword()==$password){
			        return $user;
			    }
			}
		}
		return;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Ubiquity\controllers\auth\AuthController::isValidUser()
	 */
	public function _isValidUser($action=null) {
		return USession::exists($this->_getUserSessionKey());
	}
	
	public function _getUserSessionKey(){
	    return 'user';
	}

	public function _getBaseRoute() {
		return 'AuthCtrl';
	}
	
	protected function getFiles(): AuthFiles{
		return new AuthCtrlFiles();
	}



}
