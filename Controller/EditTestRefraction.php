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
class EditTestRefraction extends EditTest {

    /**
     * Return the basic data for this page.
     *
     * @return array
     */
    public function getPageData(): array {
        $data = parent::getPageData();
        $data['title'] = 'expedient-acuity-test';
        return $data;
    }

    /**
     * Create the view to display.
     */
    protected function createViews() {
        parent::createViews();

        //$this->createViewsVisualAcuity();
        $this->createViewsAutorefractometer();
        $this->createViewsShiascopy();
        $this->createViewsFrontofocometer();
        $this->createViewsSubjetiveRefraction();
    }

    /**
     * Get the name of the view for the test type.
     *
     * @param int $testType
     * @param string $default
     * @return string
     */
    /* protected function viewNameFromTestType(int $testType, string $default): string
      {
      switch ($testType) {
      case PruebaGraduacion::TIPO_AGUDEZAVISUAL_CON:
      return self::VIEW_AGUDEZA_VISUAL_CON;

      case PruebaGraduacion::TIPO_AGUDEZAVISUAL_SIN:
      return self::VIEW_AGUDEZA_VISUAL_SIN;

      case PruebaGraduacion::TIPO_AUTO_CON:
      return self::VIEW_AUTO_CON;

      case PruebaGraduacion::TIPO_AUTO_SIN:
      return self::VIEW_AUTO_SIN;

      case PruebaGraduacion::TIPO_ESQUIASCOPIA:
      return self::VIEW_ESQUIASCOPIA;

      case PruebaGraduacion::TIPO_FRONTOFOCOMETRO:
      return self::VIEW_FRONTOFOCOMETRO;

      case PruebaGraduacion::TIPO_REFRACCION:
      return self::VIEW_REFRACCION;

      }
      return $default;
      } */

    /**
     *
     * @param string $viewName
     */
    private function createViewsAgudeza() {
        $this->addEditListView(Constants::VIEW_EDIT_VISUALACUITY, 'visualAcuity', 'visualAcuity');
    }

    /**
     *
     * @param string $viewName
     */
    private function createViewsautorefractometer() {
        $this->addEditListView(Constants::VIEW_EDIT_AUTOREFRACTOMETER, 'Autorefractometer', 'autorefractometer');
    }

    /**
     *
     * @param string $viewName
     */
    private function createViewsShiascopy() {
        $this->addEditListView(Constants::VIEW_EDIT_SHIASCOPY, 'Shiascopy', 'shiascopy');
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
