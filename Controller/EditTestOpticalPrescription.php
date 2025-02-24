<?php

namespace FacturaScripts\Plugins\Oftalmol\Controller;

use FacturaScripts\Plugins\Oftalmol\Controller\Base\EditTest;
use FacturaScripts\Plugins\Oftalmol\src\Constants;

class EditTestOpticalPrescription extends EditTest {

    /**
     * Return the basic data for this page.
     *
     * @return array
     */
    #[\Override]
    public function getPageData(): array {
        $data = parent::getPageData();
        $data['title'] = 'testOpticalPrescription';
        /* TODO: aquí sería bueno que apareciera el grupo de pruebas en el que estamos y el nombre del cliente */
        return $data;
    }

    /**
     * Create the view to display.
     */
    protected function createViews() {
        parent::createViews();

        $this->addEditListView(Constants::VIEW_EDIT_OPTICALPRESCRIPTION, 'OpticalPrescription', 'opticalPrescription');
        //$this->addEditListView(Constants::VIEW_EDIT_FRONTOFOCOMETER, 'Frontofocometer', 'opticalPrescription');
    }
}
