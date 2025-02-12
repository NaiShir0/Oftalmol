<?php

namespace FacturaScripts\Plugins\Oftalmol;

use FacturaScripts\Core\Base\InitClass;
use FacturaScripts\Core\Base\DataBase;
use FacturaScripts\Plugins\Oftalmol\Model\Patient;
use FacturaScripts\Plugins\Oftalmol\Model\Expedient;
use FacturaScripts\Plugins\Oftalmol\Model\VisualAcuity;
use FacturaScripts\Plugins\Oftalmol\Model\Autorefractometer;

class Init extends InitClass {

    #[\Override]
    public function init(): void {
        $this->loadExtension(new Extension\Model\Cliente());
        $this->createModels();
    }

    #[\Override]
    public function uninstall(): void {
        // se ejecuta cada vez que se desinstale el plugin. Primero desinstala y luego ejecuta el uninstall.
    }

    #[\Override]
    public function update(): void {
        $this->createModels();

        /*$dataBase = new DataBase();
        $sql = 'SELECT DISTINCT t1.codcliente'
                . ' FROM clientes t1'
                . ' LEFT JOIN oft_patients t2 ON t2.codcliente = t1.codcliente'
                . ' WHERE t2.codcliente IS NULL';

        foreach ($dataBase->select($sql, 0, 0) as $row) {
            $patient = new Patient();
            $patient->codcliente = $row['codcliente'];
            $patient->save();
        }*/
    }

    private function createModels() {
        //new PlantillaTratamiento();
        new Patient();
        new Expedient();
        new VisualAcuity();
        new Autorefractometer();
        //new Amsler();
        //new TestIshihara();
        //new AgudezaVisualCon();
        //new Queratometria();
        //new PlantillaImprimir();
    }
}
