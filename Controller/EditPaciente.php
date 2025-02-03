<?php
namespace FacturaScripts\Plugins\Oftalmol\Controller;

use FacturaScripts\Core\Lib\ExtendedController\EditController;

class EditPaciente extends EditController{
    /**
     * Return the basic data for this page.
     *
     * @return array
     */
    public function getPageData(): array {
        $data = parent::getPageData();
        $data['menu'] = 'ophthalmology';
        $data['title'] = 'patients';
        $data['icon'] = 'fas fa-bezier-curve';
        return $data;
    }
    
    #[\Override]
    public function getModelClassName(): string{
        return 'Paciente';
    }
}
