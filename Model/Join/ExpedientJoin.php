<?php namespace FacturaScripts\Plugins\Oftalmol\Model\Join;

use FacturaScripts\Core\Model\Base\JoinModel;
use FacturaScripts\Dinamic\Model\Expedient as DinExpedient;
/**
 * Description of ExpedienteJoin
 *
 * @author Nai
 */
class ExpedientJoin extends JoinModel {
    //put your code here
    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->setMasterModel( new DinExpedient() );
    }
    
    #[\Override]
    protected function getFields(): array {
        return [
            'releaseDate' => 'expedients.releaseDate',
            'creationDate' => 'expedients.creationDate',
            'modificationDate' => 'expedients.modificationDate',
            'codcliente' => 'expedients.codcliente',
            'id' => 'expedients.id',
            //'idReason' => 'reasons.id',
            'reasonName' => 'reasons.reasonName',
            'nombre' => 'clientes.nombre',
            'telefono1' => 'clientes.telefono1',
            'telefono2' => 'clientes.telefono2',
            'email' => 'clientes.email',
            'birthDate' => 'clientes.birthDate',
        ];
    }

    #[\Override]
    protected function getSQLFrom(): string {
        return 'oft_expedients expedients'
            . ' INNER JOIN oft_reasons reasons ON reasons.id = expedients.idReason'
            . ' INNER JOIN clientes ON clientes.codcliente = expedients.codcliente';
    }

    #[\Override]
    protected function getTables(): array {
        return [
            'oft_expedients',
            'oft_reasons',
            'clientes',
        ];
    }
}
