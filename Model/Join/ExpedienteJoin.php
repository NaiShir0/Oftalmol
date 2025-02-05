<?php namespace FacturaScripts\Plugins\Oftalmol\Model\Join;

use FacturaScripts\Core\Model\Base\JoinModel;
/**
 * Description of ExpedienteJoin
 *
 * @author Nai
 */
class ExpedienteJoin extends JoinModel {
    //put your code here
    #[\Override]
    protected function getFields(): array {
        return [
            'alta' => 'expedientes.alta',
            'fecha' => 'expedientes.fecha',
            'fechamodificacion' => 'expedientes.fechamodificacion',
            'codcliente' => 'expedientes.codcliente',
            'id' => 'expedientes.id',
            'idmotivo' => 'expedientes.idmotivo',
            'motivo' => 'motivos.name',
            'nombre' => 'clientes.nombre',
            'telefono1' => 'clientes.telefono1',
            'telefono2' => 'clientes.telefono2',
            'email' => 'clientes.email',
            'nacimiento' => 'clientes.nacimiento',
        ];
    }

    #[\Override]
    protected function getSQLFrom(): string {
        return 'oft_expedientes expedientes'
            . ' INNER JOIN oft_motivos motivos ON motivos.id = expedientes.idmotivo'
            . ' INNER JOIN clientes ON clientes.codcliente = expedientes.codcliente';
    }

    #[\Override]
    protected function getTables(): array {
        return [
            'oft_expedientes',
            'oft_motivos',
            'clientes',
        ];
    }
}
