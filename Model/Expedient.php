<?php
namespace FacturaScripts\Plugins\Oftalmol\Model;

use FacturaScripts\Core\Model\Base;


class Expedient extends Base\ModelClass {
    use Base\ModelTrait;
    
    /**
     * Strings variables
     * @var string
     */
    public $releaseDate;
    public $creationDate;
    public $modificationDate;

    /**
     * Primary keyS
     *
     * @var int
     */
    public $id;

    /**
     * Link to Motivo model
     *
     * @var int
     */
    public $idReason;
     /**
     * Link to Patient model.
     *
     * @var string
     */
    public $codcliente;
    
    public function clear() {
        parent::clear();
        $this->creationDate = date('d-m-Y');
        $this->modificationDate = date('d-m-Y');
        
    }
    
        /**
     * This function is called when creating the model table. Returns the SQL
     * that will be executed after the creation of the table. Useful to insert values
     * default.
     *
     * @return string
     */
    /*public function install(): string {
        new Reason();
        return parent::install();
    }*/
    
    
     /**
     * Get patient of the expedient.
     *
     * @return Paciente
     */
    /*public function getPatient(): Patient
    {
        $patient = new Patient();
        $patient->loadFromCode($this->codcliente);
        return $patient;
    }*/
    
       /**
     * Update the model data in the database.
     *
     * @param array $values
        * 
     * @return bool
     */
    /*protected function saveUpdate(array $values = []): bool {
        if (false === empty($this->alta)) {
            $this->toolBox()->i18nLog()->error('no-update-discharged');

            return false;
        }
        return parent::saveUpdate($values);
    }*/
    
    #[\Override]
    public static function primaryColumn(): string {
        return 'id';
    }

    #[\Override]
    public static function tableName(): string {
        return 'oft_expedients';
    }
}
