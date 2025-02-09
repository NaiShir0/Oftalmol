<?php
namespace FacturaScripts\Plugins\Oftalmol\Controller;

use FacturaScripts\Core\Lib\ExtendedController\ListController;
use FacturaScripts\Plugins\Oftalmol\src\Constants;

class ListPatient extends ListController{
    
 #[\Override]
 public function getPageData(): array {
        $data = parent::getPageData();
        $data['menu'] = 'ophthalmology';
        $data['title'] = 'patients';
        $data['icon'] = 'fas fa-user-injured';
        return $data;
    }
    
    /**
     * Inserts the views or tabs to display.
     */
    #[\Override]
    protected function createViews(string $viewName = Constants::VIEW_LIST_PATIENT)
    {
        
        //$this->addView($viewName, 'Patient');
        $this->addView($viewName, 'Join\PatientJoin', 'patients', 'fas fa-user-injured');
        /*$this->addSearchFields($viewName, ['clientes.nombre', 'clientes.telefono1', 'clientes.telefono2', 'clientes.email']);
        //Desactivamos botones por defecto
        $this->setSettings($viewName, 'btnNew', false);
        $this->setSettings($viewName, 'btnDelete', false);
        $this->setSettings($viewName, 'btnPrint', false);
        //Add Filter options
        $this->addFilterCheckbox($viewName, 'conexpedientes', 'with-expedients', 'expedientes.idmotivo');
        //Add more OrdersBy types
        $this->addOrderBy($viewName, ['count(expedients.idReason)'], 'numexpedients', 2);
        $this->addOrderBy($viewName, ['clientes.nombre'], 'name', 1);*/
    }
}
