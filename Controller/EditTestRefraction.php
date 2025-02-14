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
use FacturaScripts\Core\Tools;

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
    #[\Override]
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

        $this->addEditListView(Constants::VIEW_EDIT_VISUALACUITY, 'VisualAcuity', 'visualAcuity');
        $this->addEditListView(Constants::VIEW_EDIT_AUTOREFRACTOMETER, 'Autorefractometer', 'autoRefractometer');
        $this->addEditListView(Constants::VIEW_EDIT_SHIASCOPY, 'Shiascopy', 'shiascopy');
        $this->addEditListView(Constants::VIEW_EDIT_FRONTOFOCOMETER, 'Frontofocometer', 'Frontofocometer');
        //$this->createViewsRefraccion();
    }

    /**
     * Returns the class name of the model to use in the editView.
     */
    public function getModelClassName(): string {
        return 'Expedient';
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
}
