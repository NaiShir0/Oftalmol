<?php


namespace FacturaScripts\Plugins\Oftalmol\Controller;

use FacturaScripts\Plugins\Oftalmol\Controller\Base\EditTest;
use FacturaScripts\Plugins\Oftalmol\src\Constants;
use FacturaScripts\Core\Tools;


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
