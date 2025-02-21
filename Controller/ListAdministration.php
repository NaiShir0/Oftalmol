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

use FacturaScripts\Core\Lib\ExtendedController\ListController;
use FacturaScripts\Plugins\Oftalmol\src\Constants;

/**
 * Master table set.
 *
 * @author Clinica Castillo <info@clinicastillo.es>
 * @author Jose Antonio Cuello Principal <yopli2000@gmail.com>
 */
class ListAdministration extends ListController
{

    /**
     * Return the basic data for this page.
     *
     * @return array
     */
    public function getPageData(): array {
        $data = parent::getPageData();
        $data['menu'] = 'ophthalmology';
        $data['title'] = 'administration';
        $data['icon'] = 'fas fa-cogs';
        return $data;
    }

    /**
     * Inserts the views or tabs to display.
     */
    protected function createViews()
    {
        //$this->createViewReason();
        $this->addView(Constants::VIEW_LIST_REASON, 'Reason', 'reason');
        //$this->createViewsRevision();
        //$this->createViewsPlantillaTratamiento();
        //$this->createViewsPregunta();
        //$this->createViewsTiposPruebas();
        //$this->createViewsTiposEspecialidad();
    }

    /**
     * Add reasons consultation view.
     *
     * @param string $viewName
     */
    /*protected function createViewReason(string $viewName = 'ListMotivo')
    {
        $this->addView($viewName, 'Motivo', 'reasons-consultationdddd', 'fas fa-bezier-curve');
        $this->addSearchFields($viewName, ['name']);
    }*/

    /**
     * Add revisions view.
     *
     * @param string $viewName
     */
    /*protected function createViewsRevision(string $viewName = 'ListRevision')
    {
        $this->addView($viewName, 'Revision', 'reviews', 'far fa-calendar-check');
        $this->addSearchFields($viewName, ['name']);
    }*/

    /**
     * Add treatments view.
     *
     * @param string $viewName
     */
    protected function createViewsPlantillaTratamiento(string $viewName = 'ListPlantillaTratamiento')
    {
        $this->addView($viewName, 'PlantillaTratamiento', 'treatments', 'fas fa-medkit');
        $this->addSearchFields($viewName, ['name']);
    }
    
        /**
     * Add treatments view.
     *
     * @param string $viewName
     */
    protected function createViewsPregunta(string $viewName = 'ListPregunta')
    {
        $this->addView($viewName, 'Pregunta', 'treatments', 'fas fa-medkit');
        $this->addSearchFields($viewName, ['nombre']);
    }
    
    protected function createViewsTiposPruebas(string $viewName = 'ListTiposPruebas')
    {
        $this->addView($viewName, 'TiposPruebas', 'tiposdepruebas', 'fas fa-medkit');
        $this->addSearchFields($viewName, ['nombre']);
    }
    protected function createViewsTiposEspecialidad(string $viewName = 'EditTiposEspecialidad')
    {
        $this->addView($viewName, 'TiposEspecialidad', 'tiposespecialidad', 'fas fa-medkit');
        $this->addSearchFields($viewName, ['nombre']);
    }
}
