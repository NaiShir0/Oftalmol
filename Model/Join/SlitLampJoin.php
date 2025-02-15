<?php

namespace FacturaScripts\Plugins\Oftalmol\Model\Join;

use FacturaScripts\Core\Model\Base;


class SlitLampJoin extends Base\JoinModel
{
/**TODO: mirar si sirve para algo. Javi tiene que revisarlo
 *     public function __construct($data = array())
    {
        parent::__construct($data);
        $this->setMasterModel( new Test() );
    }*/
    
    protected function getFields(): array {
        return [
            'id' => 'slitlamp.id',
            'isSpeciality' => 'slitlamp.idSpeciality',
            'idExpedient' => 'slitlamp.idExpedient',
            'idTestType' => 'slitlamp.idTestType',
            'creationDate' => 'slitlamp.creationDate',
            'creationTime' => 'slitlamp.creationTime',
            'modificationDate' => 'slitlamp.modificationDate',
            'modificationTime' => 'slitlamp.modificationTime',
            'ODnote' => 'slitlamp.ODnote',
            'OSnote' => 'slitlamp.OSnote',
            'generalNote' => 'slitlamp.generalNote',
            'profesionalNote' => 'slitlamp.profesionalNote',
        ];
    }
    
    protected function getSQLFrom(): string {
        return 'oft_expedients expedient' 
            . ' INNER JOIN oft_slitlamps slitlamp ON slit.idExpedient = expedient.id';
    }
    
    protected function getTables(): array {
        return [
            'oft_expedients',
            'oft_slitlamps',
        ];
    }
}

