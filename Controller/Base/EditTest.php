<?php

namespace FacturaScripts\Plugins\Oftalmol\Controller\Base;

use FacturaScripts\Core\Lib\ExtendedController\EditController;

class EditTest extends EditController {

    #[\Override]
    public function getModelClassName(): string {
        return 'Test';
    }

    #[\Override]
    protected function createViews() {
        parent::createViews();
    }
}
