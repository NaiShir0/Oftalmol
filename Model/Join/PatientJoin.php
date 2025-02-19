<?php namespace FacturaScripts\Plugins\Oftalmol\Model\Join;

use FacturaScripts\Core\Model\Base\JoinModel;
use FacturaScripts\Dinamic\Model\Patient as DinPatient;

class PatientJoin extends JoinModel{
    //put your code here
    /**
     * Constructor and class initializer.
     *
     * @param array $data
     */
    #[\Override]
    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->setMasterModel( new DinPatient );
    }
    
    #[\Override]
    protected function getFields(): array {
        return [
            'codcliente' => 'clientes.codcliente',
            'nombre' => 'clientes.nombre',
            'telefono1' => 'clientes.telefono1',
            'telefono2' => 'clientes.telefono2',
            'email' => 'clientes.email',
            'birthDate' => 'clientes.birthDate',
            'codgrupo' => 'clientes.codgrupo',

            'aseguradora'=> 'clientGroup.nombre',

            'allergies' => 'patients.allergies',
            'personalHistory' => 'patients.personalHistory',
            'familyHistory' => 'patients.familyHistory',
            'oftalmolHistory' => 'patients.oftalmolHistory',
            'observations' => 'patients.observations',
            'expedientCount' => 'COUNT(expedients.idReason)',
        ];
    }

    #[\Override]
    protected function getSQLFrom(): string {
        return 'clientes'
            . ' INNER JOIN oft_patients patients ON clientes.codcliente = patients.codcliente'
            . ' LEFT JOIN gruposclientes clientGroup ON clientes.codgrupo = clientGroup.codgrupo'
             . ' LEFT JOIN oft_expedients expedients ON patients.codcliente = expedients.codcliente'
            ;
    }

    #[\Override]
    protected function getTables(): array {
        return [
            'clientes',
            'gruposclientes',
            'oft_patients',
            'oft_expedients',
        ];
    }
    protected function getGroupFields(): string
    {
        return 'patients.codcliente';
    }
}
