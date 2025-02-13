<?php

namespace FacturaScripts\Plugins\Oftalmol\Controller\Base;

use FacturaScripts\Core\Lib\ExtendedController\EditController;
use FacturaScripts\Plugins\Oftalmol\src\Constants;

class EditTest extends EditController {

    #[\Override]
    protected function createViews() {
        // master view -> EditExpediente in readonly.
        $viewName = Constants::VIEW_EDIT_EXPEDIENT;
        $this->addEditView($viewName, $this->getModelClassName(),$this->getPageData()['title'],$this->getPageData()['icon']);

        // Remove all buttons
        $this->setSettings($viewName, 'btnDelete', false);
        $this->setSettings($viewName, 'btnSave', false);
        $this->setSettings($viewName, 'btnUndo', false);
        $this->setTabsPosition('left-bottom');
    }

    #[\Override]
    public function getModelClassName(): string {
        return 'Test';
    }
}
