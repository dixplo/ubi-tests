<?php
namespace controllers\crud\datas;

use Ubiquity\controllers\crud\CRUDDatas;
 /**
 * Class UsersCrudDatas
 **/
class UsersCrudDatas extends CRUDDatas{
    /**
     * {@inheritDoc}
     * @see \Ubiquity\controllers\crud\CRUDDatas::getFieldNames()
     */
    public function getFieldNames($model){
        return ['firstName','lastName','email'];
    }
	
}
