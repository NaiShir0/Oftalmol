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
class EditTestSlitLamp extends EditTest {

    /**
     * Return the basic data for this page.
     *
     * @return array
     */
    public function getPageData(): array {
        $data = parent::getPageData();
        $data['title'] = 'SlitLamp';
        return $data;
    }

    /**
     * Create the view to display.
     */
    protected function createViews() {
        parent::createViews();

        $this->createViewBiomicroscopy();
        $this->createViewEyeFundus();
        $this->createViewGonioscopy();
    }

    /**
     *
     * @param string $viewName
     */
    private function createViewBiomicroscopy() {
        $this->addEditListView(Constants::VIEW_EDIT_BIOMICROSCOPY, 'Biomicroscopy', 'Biomicroscopy');
    }

    /**
     *
     * @param string $viewName
     */
    private function createViewEyeFundus() {
        $this->addEditListView(Constants::VIEW_EDIT_EYEFUNDUS, 'EyeFundus', 'EyeFundus');
    }

    /**
     *
     * @param string $viewName
     */
    private function createViewGonioscopy() {
        $this->addEditListView(Constants::VIEW_EDIT_GONIOSCOPY, 'Gonioscopy', 'Gonioscopy');
    }

    /**
     *
     * @param string $viewName
     */
    private function createViewsFrontofocometer() {
        $this->addEditListView(Constants::VIEW_EDIT_FRONTOFOCOMETER, 'Frontofocometer', 'frontofocometer');
    }

    /**
     *
     * @param string $viewName
     */
    private function createViewsVisualRefraction() {
        $this->addEditListView(Constants::VIEW_EDIT_SUBJETIVEREFRACTION, 'SubjetiveRefraction', 'subjetiveRefraction');
    }
}
