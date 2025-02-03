<?php
namespace FacturaScripts\Plugins\Oftalmol\Model;

use FacturaScripts\Core\Model\Base;


class Expediente extends Base\ModelClass {
    use Base\ModelTrait;
    
    /**
     *
     * @var string
     */
    public $alta;

    /**
     * Link to Patient model.
     *
     * @var string
     */
    public $codcliente;

    /**
     *
     * @var string
     */
    public $fecha;
	
    /**
     *
     * @var string
     */
    public $fechamodificacion;

    /**
     * Primary key
     *
     * @var int
     */
    public $id;

    /**
     * Link to Motivo model
     *
     * @var int
     */
    public $idmotivo;
    
    public function clear() {
        parent::clear();
        $this->fecha = date('d-m-Y');
        $this->fechamodificacion = date('d-m-Y');
        
    }
    
    #[\Override]
    public static function primaryColumn(): string {
        return 'id';
    }

    #[\Override]
    public static function tableName(): string {
        return 'oft_expedientes';
    }
}
