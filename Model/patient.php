<?php

namespace FacturaScripts\Plugins\Oftalmol\Model;

use FacturaScripts\Core\Model\Base;
use FacturaScripts\Dinamic\Model\Cliente;
use FacturaScripts\Plugins\Oftalmol\src\Utils;

class Patient extends Base\ModelClass {

    use Base\ModelTrait;

    /**
     * Strings variables
     * @var string
     */
    public $allergies;
    public $personalHistory;
    public $familyHistory;
    public $oftalmolHistory;
    public $observations;
    public $birthDate;
    public $codgrupo;

    /**
     * Primary Key.
     * Link to Cliente Model.
     *
     * @var string
     */
    public $codcliente;

    /**
      /**
     * Get client data.
     *
     * @return Cliente
     */
    public function getClient(): Cliente {
        $client = new Cliente();
        $client->loadFromCode($this->codcliente);
        return $client;
    }

    /**
     * Load client data to patient view.
     *
     * @param Paciente $patient
     */
    public function loadClientData() {
        $client = $this->getClient();
        $this->nombre = $client->nombre;
        $this->telefono1 = $client->telefono1;
        $this->telefono2 = $client->telefono2;
        $this->email = $client->email;
        $this->birthDate = $client->birthDate;
        $this->codgrupo = $client->codgrupo;
        $this->nif = $client->cifnif;
        //$this->edad = Utils::CalculaEdad($this->nacimiento);
    }

    #[\Override]
    public static function primaryColumn(): string {
        return 'codcliente';
    }

    #[\Override]
    public static function tableName(): string {
        return 'oft_patients';
    }
}
