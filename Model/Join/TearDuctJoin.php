<?php

namespace FacturaScripts\Plugins\Oftalmol\Model\Join;

use FacturaScripts\Core\Model\Base;


class TearDuctJoin extends Base\JoinModel
{
/**TODO: mirar si sirve para algo. Javi tiene que revisarlo
 *     public function __construct($data = array())
    {
        parent::__construct($data);
        $this->setMasterModel( new Test() );
    }*/
    
    protected function getFields(): array {
        return [
            'id' => 'tearduct.id',
            'isSpeciality' => 'tearduct.idSpeciality',
            'idExpedient' => 'tearduct.idExpedient',
            'idTestType' => 'tearduct.idTestType',
            'creationDate' => 'tearduct.creationDate',
            'creationTime' => 'tearduct.creationTime',
            'modificationDate' => 'tearduct.modificationDate',
            'modificationTime' => 'tearduct.modificationTime',
            'ODnote' => 'tearduct.ODnote',
            'OSnote' => 'tearduct.OSnote',
            'generalNote' => 'tearduct.generalNote',
            'profesionalNote' => 'tearduct.profesionalNote',
        ];
    }
    
    protected function getSQLFrom(): string {
        return 'oft_expedients expedient' 
            . ' INNER JOIN oft_tearducts tearduct ON tearduct.idExpedient = expedient.id';
    }
    
    protected function getTables(): array {
        return [
            'oft_expedients',
            'oft_tearducts',
        ];
    }
}

