<?php
namespace FacturaScripts\Plugins\Oftalmol\Controller;

use FacturaScripts\Core\Lib\ExtendedController\EditController;

class EditExpediente extends EditController{
    /**
     * Return the basic data for this page.
     *
     * @return array
     */
    public function getPageData(): array {
        $data = parent::getPageData();
        $data['menu'] = 'ophthalmology';
        $data['title'] = 'expedient';
        $data['showonmenu'] = false;
        $data['icon'] = 'fas fa-layer-group';
        return $data;
    }
    
    #[\Override]
    public function getModelClassName(): string {
        return 'Expediente';
    }
}
