<?php

/**
 * This file is part of Oftalmologia plugin for FacturaScripts.
 * FacturaScripts Copyright (C) 2015-2022 Carlos Garcia Gomez <carlos@facturascripts.com>
 * Oftalmologia   Copyright (C) 2022-2022 Clinica Castillo <jquingarcia@gmail.com>
 *                Copyright (C) 2022-2022 Jose Antonio Cuello Principal <yopli2000@gmail.com>
 *
 * This program and its files are under the terms of the license specified in the LICENSE file.
 */

namespace FacturaScripts\Plugins\Oftalmol\Controller;

use FacturaScripts\Plugins\Oftalmol\Controller\Base\EditTest;
use FacturaScripts\Plugins\Oftalmol\src\Constants;

/**
 * Class for view all basic test data from expedient.
 *
 * @author Clinica Castillo <info@clinicastillo.es>
 */
class EditTestTearDuct extends EditTest {

    /**
     * Create the view to display.
     */
    protected function createViews() {
        parent::createViews();

        $this->addEditListView(Constants::VIEW_EDIT_TESTJONES, 'TestJones', 'TestJones');
        $this->addEditListView(Constants::VIEW_EDIT_TEARDUCTPROBING, 'TearDuctProbing', 'TearDuctProbing');
        $this->addEditListView(Constants::VIEW_EDIT_TESTSCHIRMER, 'TestSchirmer', 'TestSchirmer');
    }
}
