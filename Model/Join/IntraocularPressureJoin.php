<?php

namespace FacturaScripts\Plugins\Oftalmol\Model\Join;

use FacturaScripts\Core\Model\Base;


class IntraocularPressureJoin extends Base\JoinModel
{
/**TODO: mirar si sirve para algo. Javi tiene que revisarlo
 *     public function __construct($data = array())
    {
        parent::__construct($data);
        $this->setMasterModel( new Test() );
    }*/
    
    protected function getFields(): array {
        return [
            'id' => 'intraocularpressure.id',
            'isSpeciality' => 'intraocularpressure.idSpeciality',
            'idExpedient' => 'intraocularpressure.idExpedient',
            'idTestType' => 'intraocularpressure.idTestType',
            'creationDate' => 'intraocularpressure.creationDate',
            'creationTime' => 'intraocularpressure.creationTime',
            'modificationDate' => 'intraocularpressure.modificationDate',
            'modificationTime' => 'intraocularpressure.modificationTime',
            'ODnote' => 'intraocularpressure.ODnote',
            'OSnote' => 'intraocularpressure.OSnote',
            'generalNote' => 'intraocularpressure.generalNote',
            'profesionalNote' => 'intraocularpressure.profesionalNote',
        ];
    }
    
    protected function getSQLFrom(): string {
        return 'oft_expedients expedient' 
            . ' INNER JOIN oft_intraocularpressure intraocularpressure ON intraocularpressure.idExpedient = expedient.id';
    }
    
    protected function getTables(): array {
        return [
            'oft_expedients',
            'oft_intraocularpressure',
        ];
    }
}

