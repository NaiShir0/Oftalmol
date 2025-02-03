<?php
namespace FacturaScripts\Plugins\Oftalmol\Model;

use FacturaScripts\Core\Model\Base;

class Paciente extends Base\ModelClass{
    use Base\ModelTrait;
    
    /**
     * Strings variables
     * @var string
     */
    public $alergias;
    public $antecedentes_personales;
    public $antecedentes_familiares;
    public $antecedentes_oftalmologicos;
    public $observaciones;
    public $nacimiento;
    public $codgrupo;
    
    /**
     * Primary Key.
     * Link to Cliente Model.
     *
     * @var string
     */
    public $codcliente;
    
 


    
    
    
    
    #[\Override]
    public static function primaryColumn(): string {
        return 'codcliente';
    }

    #[\Override]
    public static function tableName(): string {
        return 'oft_pacientes';
    }
}
