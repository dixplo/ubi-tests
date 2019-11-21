<?php
namespace controllers;
 use Ajax\php\ubiquity\JsUtils;
use Ubiquity\orm\DAO;
use models\Groupe;
use Ajax\semantic\html\elements\HtmlList;
use Ajax\service\JArray;
use Ubiquity\utils\http\USession;
use Ubiquity\controllers\auth\AuthController;
use Ubiquity\controllers\auth\WithAuthTrait;

 /**
 * Controller MainController
 * @property JsUtils $jquery
 **/
class MainController extends ControllerBase{
    use WithAuthTrait;
    /**
     * @get("connect/{name}") 
     */
    public function connect($name){
        USession::set('user', $name);
        echo "Connection réussie pour <b>{$name}</b>";
    }

    /**
     * @get("exit")
     */
    public function disconnect(){
        $name=USession::get('user');
        USession::delete('user');
        echo "Déconnection réussie.<br>A bientôt <b>{$name}</b>...";
    }
    
	/**
	 * @get('main') 
	 */
	public function index(){
	    $groupes=DAO::getAll(Groupe::class,'',['organization.users']);
	    
	    $dt=$this->jquery->semantic()->dataTable('dtGroupes', Groupe::class,$groupes);
	    $dt->setFields(['name','organization']);
	    
	    $dt->fieldAsLabel('organization','building');
	    
	    
	    /*$dt->setValueFunction('orgaUsers', function($v,$instance){
	        $lst= new HtmlList('',JArray::modelArray($instance->getOrganization()->getUsers()));
	        $lst->setDivided()->setBulleted();
	        return $lst;
	    });*/
	    
	    $this->jquery->getHref('a','',['historize'=>false,'hasLoader'=>'internal']);
		$this->jquery->renderView("MainController/index.html");
	}
	
    protected function getAuthController(): AuthController{
        return new AuthCtrl();
    }

}
