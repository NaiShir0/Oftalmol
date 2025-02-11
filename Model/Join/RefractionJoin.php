<?php

namespace FacturaScripts\Plugins\Oftalmol\Model\Join;

use FacturaScripts\Core\Model\Base;
use FacturaScripts\Plugins\Oftalmol\Model\Base\Test;

class RefractionJoin extends Base\JoinModel
{
    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->setMasterModel( new Test() );
    }
    #[\Override]
    protected function getFields(): array {
        return [
            'idAcuity' => 'acuity.id',
            'isSpeciality' => 'acuity.idSpeciality',
            'idExpedient' => 'acuity.idExpedient',
            'idTestType' => 'acuity.idTestType',
            'creationDate' => 'acuity.creationDate',
            'ODfarSCnote' => 'acuity.ODfarSCnote',
            'OSfarSCnote' => 'acuity.OSfarSCnote',
            'FarSCnote' => 'acuity.FarSCnote',
            'ODfarCCnote' => 'acuity.ODfarCCnote',
            'OSfarCCnote' => 'acuity.OSfarCCnote',
            'FarCCnote' => 'acuity.FarCCnote',
            'FarNote' => 'acuity.FarNote',
            'ODcloseSCnote' => 'acuity.ODcloseSCnote',
            'OScloseSCnote' => 'acuity.OScloseSCnote',
            'CloseSCnote' => 'acuity.CloseSCnote',
            'ODcloseCCnote' => 'acuity.ODcloseCCnote',
            'OScloseCCnote' => 'acuity.OScloseCCnote',
            'CloseCCnote' => 'acuity.CloseCCnote',
            'CloseNote' => 'acuity.CloseNote',
            'GeneralNote' => 'acuity.GeneralNote',
            'ProfesionalNote' => 'acuity.ProfesionalNote',
        ];
    }
    
    #[\Override]
    protected function getSQLFrom(): string {
        return 'oft_expedients expedients'
            . ' INNER JOIN oft_visualacuities acuity ON expedients.id = acuity.idExpedient'
            . ' INNER JOIN oft_refractions refraction ON refraction.idExpedient = expedients.id';
    }
    
    #[\Override]
    protected function getTables(): array {
        return [
            'oft_expedients',
            'oft_refractions',
            'oft_visualacuities',
        ];
    }
}

