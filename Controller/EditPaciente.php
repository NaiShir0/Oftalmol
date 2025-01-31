<?php
namespace FacturaScripts\Plugins\Oftalmol\Controller;

use FacturaScripts\Core\Lib\ExtendedController\EditController;
class EditPaciente extends EditController{
    
    #[\Override]
    public function getModelClassName(): string{
        return 'Paciente';
    }
}
