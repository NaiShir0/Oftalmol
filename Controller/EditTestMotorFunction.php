<?php

/**
 * This file is part of Oftalmologia plugin for FacturaScripts.
 * FacturaScripts Copyright (C) 2015-2022 Carlos Garcia Gomez <carlos@facturascripts.com>
 * Oftalmologia   Copyright (C) 2022-2022 Clinica Castillo <jquingarcia@gmail.com>
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
class EditTestMotorFunction extends EditTest {

    /**
     * Return the basic data for this page.
     *
     * @return array
     */
    public function getPageData(): array {
        $data = parent::getPageData();
        $data['title'] = 'motorFunction';
        return $data;
    }

    /**
     * Create the view to display.
     */
    protected function createViews() {
        parent::createViews();

        $this->createViewCoverTest();
        $this->createViewStereopsis();
        $this->createViewEyelidFunction();
        $this->createViewExophthalmometry();
        $this->createViewWorthLight();
        $this->createViewBielschoswsky();
        $this->createViewOcularMotility();
        $this->createViewConvergencePoint();
    }

    /**
     *
     * @param string $viewName
     */
    private function createViewCoverTest() {
        $this->addEditListView(Constants::VIEW_EDIT_COVERTEST, 'CoverTest', 'CoverTest');
    }

    /**
     *
     * @param string $viewName
     */
    private function createViewStereopsis() {
        $this->addEditListView(Constants::VIEW_EDIT_STEREOPSIS, 'Stereopsis', 'Stereopsis');
    }

    /**
     *
     * @param string $viewName
     */
    private function createViewEyelidFunction() {
        $this->addEditListView(Constants::VIEW_EDIT_EYELIDFUNCTION, 'EyelidFunction', 'EyelidFunction');
    }

    /**
     *
     * @param string $viewName
     */
    private function createViewExophthalmometry() {
        $this->addEditListView(Constants::VIEW_EDIT_EXOPHTHALMOMETRY, 'Exophthalmometry', 'Exophthalmometry');
    }

    /**
     *
     * @param string $viewName
     */
    private function createViewWorthLight() {
        $this->addEditListView(Constants::VIEW_EDIT_WORTHLIGHT, 'WorthLight', 'WorthLight');
    }

    /**
     *
     * @param string $viewName
     */
    private function createViewBielschoswsky() {
        $this->addEditListView(Constants::VIEW_EDIT_BIELSCHOSWSKY, 'Bielschoswsky', 'Bielschoswsky');
    }

    /**
     *
     * @param string $viewName
     */
    private function createViewOcularMotility() {
        $this->addEditListView(Constants::VIEW_EDIT_OCULARMOTILITY, 'OcularMotility', 'OcularMotility');
    }

    /**
     *
     * @param string $viewName
     */
    private function createConvergencePoint() {
        $this->addEditListView(Constants::VIEW_EDIT_CONVERGENCEPOINT, 'ConvergencePoint', 'ConvergencePoint');
    }
}
