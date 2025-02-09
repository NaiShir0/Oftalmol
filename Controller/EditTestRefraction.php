<?php
/**
 * This file is part of Oftalmologia plugin for FacturaScripts.
 * FacturaScripts Copyright (C) 2015-2022 Carlos Garcia Gomez <carlos@facturascripts.com>
 * Oftalmologia   Copyright (C) 2022-2022 Clinica Castillo <jquingarcia@gmail.com>
 *                Copyright (C) 2022-2022 Jose Antonio Cuello Principal <yopli2000@gmail.com>
 *
 * This program and its files are under the terms of the license specified in the LICENSE file.
 */
namespace FacturaScripts\Plugins\Oftalmologia\Controller;

use FacturaScripts\Plugins\Oftalmologia\Lib\Oftalmologia\EditPrueba;
use FacturaScripts\Plugins\Oftalmologia\Lib\Oftalmologia\PruebaGraduacion;
use FacturaScripts\Plugins\Oftalmologia\Lib\Oftalmologia\PruebaMedica;
use FacturaScripts\Plugins\Oftalmologia\Model\Join\PruebaAgudeza;

/**
 * Class for view all basic test data from expedient.
 *
 * @author Clinica Castillo <info@clinicastillo.es>
 * @author Jose Antonio Cuello Principal <yopli2000@gmail.com>
 */
class EditPruebaAgudeza extends EditPrueba
{

    private const VIEW_AUTOREFRACTOMETRO = 'EditAutoRefractometro';
    private const VIEW_AUTO_CON = 'EditAutoCon';
    private const VIEW_AUTO_SIN = 'EditAutoSin';
    private const VIEW_REFRACCION = 'EditRefraccion';
    private const VIEW_FRONTOFOCOMETRO = 'EditFrontofocometro';
    private const VIEW_AGUDEZA_VISUAL = 'EditAgudezaVisual';
    private const VIEW_AGUDEZA_VISUAL_SIN = 'EditAgudezaVisualCon';
    private const VIEW_AGUDEZA_VISUAL_CON = 'EditAgudezaVisualSin';
    private const VIEW_ESQUIASCOPIA = 'EditEsquiascopia';
   

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
    protected function createViews()
    {
        parent::createViews();

        //$this->createViewsAgudezaVisualCon();
        // $this->createViewsAgudezaVisualSin();
        $this->createViewsAgudeza();
        //$this->createViewsAutoCon();
        //$this->createViewsAutoSin();
        $this->createViewsAutoRefractometro();
        $this->createViewsEsquiascopia();
        $this->createViewsFrontofocometro();
        
        $this->createViewsRefraccion();
    }

    /**
     * Get the name of the view for the test type.
     *
     * @param int $testType
     * @param string $default
     * @return string
     */
    protected function viewNameFromTestType(int $testType, string $default): string
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
    }

    /**
     *
     * @param string $viewName
     */
    private function createViewsAgudeza(string $viewName = self::VIEW_AGUDEZA_VISUAL) {
        $this->addEditListView($viewName, 'AgudezaVisual', 'visual-acuity');
    }

    /**
     *
     * @param string $viewName
     */
    private function createViewsAgudezaVisualCon(string $viewName = self::VIEW_AGUDEZA_VISUAL_CON)
    {
        $this->addEditListView($viewName, 'AgudezaVisualCon', 'visual-acuity-with');
    }
    
    /**
     *
     * @param string $viewName
     */
    private function createViewsAgudezaVisualSin(string $viewName = self::VIEW_AGUDEZA_VISUAL_SIN)
    {
        $this->addEditListView($viewName, 'AgudezaVisualSin', 'visual-acuity-without');
    }

     /**
     *
     * @param string $viewName
     */
    private function createViewsAutoRefractometro(string $viewName = self::VIEW_AUTOREFRACTOMETRO) {
        $this->addEditListView($viewName, 'Autorefractometro', 'auto-refactrometter');
    }

    /**
     *
     * @param string $viewName
     */
    private function createViewsAutoCon(string $viewName = self::VIEW_AUTO_CON)
    {
        $this->addEditListView($viewName, 'AutoCon', 'auto-with');
    }

    /**
     *
     * @param string $viewName
     */
    private function createViewsAutoSin(string $viewName = self::VIEW_AUTO_SIN)
    {
        $this->addEditListView($viewName, 'AutoSin', 'auto-without');
    }

    /**
     *
     * @param string $viewName
     */
    private function createViewsEsquiascopia(string $viewName = self::VIEW_ESQUIASCOPIA)
    {
        $this->addEditListView($viewName, 'Esquiascopia', 'skiascopy');
    }

    /**
     *
     * @param string $viewName
     */
    private function createViewsFrontofocometro(string $viewName = self::VIEW_FRONTOFOCOMETRO)
    {
        $this->addEditListView($viewName, 'Frontofocometro', 'lensmeter');
    }

   
    /**
     *
     * @param string $viewName
     */
    private function createViewsRefraccion(string $viewName = self::VIEW_REFRACCION)
    {
        $this->addEditListView($viewName, 'Refraccion', 'subjetive-refraction');
    }
}