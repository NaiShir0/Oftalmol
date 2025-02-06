<?php namespace FacturaScripts\Plugins\Oftalmol\Model\Join;

use FacturaScripts\Core\Model\Base\JoinModel;
use FacturaScripts\Dinamic\Model\Paciente as DinPaciente;

class PacienteJoin extends JoinModel{
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
        $this->setMasterModel( new DinPaciente );
    }
    
    #[\Override]
    protected function getFields(): array {
        return [
            'codcliente' => 'clientes.codcliente',
            'nombre' => 'clientes.nombre',
            'telefono1' => 'clientes.telefono1',
            'telefono2' => 'clientes.telefono2',
            'email' => 'clientes.email',
            'nacimiento' => 'clientes.nacimiento',
            'codgrupo' => 'clientes.codgrupo',

            'aseguradora'=> 'grupos.nombre',

            'alergias' => 'pacientes.alergias',
            'antecedentes_personal' => 'pacientes.antecedentes_personales',
            'antecedentes_familiar' => 'pacientes.antecedentes_familiares',
            'antecedentes_oftalmolog' => 'pacientes.antecedentes_oftalmologicos',
            'observaciones' => 'pacientes.observaciones',
            'numexpedientes' => 'COUNT(expedientes.idmotivo)',
        ];
    }

    #[\Override]
    protected function getSQLFrom(): string {
        return 'clientes'
            . ' INNER JOIN oft_pacientes pacientes ON clientes.codcliente = pacientes.codcliente'
            . ' LEFT JOIN gruposclientes grupos ON clientes.codgrupo = grupos.codgrupo'
            . ' LEFT JOIN oft_expedientes expedientes ON pacientes.codcliente = expedientes.codcliente';
    }

    #[\Override]
    protected function getTables(): array {
        return [
            'clientes',
            'gruposclientes',
            'oft_pacientes',
        ];
    }
    protected function getGroupFields(): string
    {
        return 'pacientes.codcliente';
    }
}
