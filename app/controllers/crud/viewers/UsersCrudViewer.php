<?php
namespace controllers\crud\viewers;

use Ubiquity\controllers\crud\viewers\ModelViewer;
 /**
 * Class UsersCrudViewer
 **/
class UsersCrudViewer extends ModelViewer{

    protected function getDataTableRowButtons(){
       return ['delete','display','edit'];
    }

	
}
