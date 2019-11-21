<?php
namespace controllers;
 use Ubiquity\orm\DAO;
use models\Organization;
use Ubiquity\utils\http\URequest;
use Ubiquity\utils\http\USession;
use Ubiquity\utils\http\UResponse;

 /**
 * Controller OrgaController
 **/
class OrgaController extends ControllerBase{
    
    public function isValid($action){
        if($action=='index'){
            return true;
        }
        return USession::exists('user');
    }
    
    public function onInvalidControl(){
        UResponse::setResponseCode(401);
        echo "Connexion non autorisée!";
    }

	/**
	 * {@inheritDoc}
	 * @see \Ubiquity\controllers\Controller::index()
	 * @get("orgas")
	 */
	public function index(){
	    $orgas=DAO::getAll(Organization::class);
		$this->loadView("OrgaController/index.html",['orgas'=>$orgas]);
	}

	/**
	 * @get("orgas/add")
	 */
	public function frmAdd(){
		
		$this->loadView('OrgaController/frmAdd.html');

	}


	/**
	 *@post("orgas/add")
	**/
	public function addOrga(){
	    $orga=new Organization();
	    //URequest::setPostValuesToObject($orga);
		$orga->setDomain(URequest::post('domain'));
		$orga->setName(URequest::post('name'));
		if(DAO::save($orga)){
		    echo 'Ca marche bien!';
		}else{
		    echo 'Nul';
		}
		
	}

}
