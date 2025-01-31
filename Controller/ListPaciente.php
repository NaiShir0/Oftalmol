<?php
namespace FacturaScripts\Plugins\Oftalmol\Controller;

use FacturaScripts\Core\Lib\ExtendedController\ListController;

class ListPaciente extends ListController{
    
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
    protected function createViews(string $viewName = 'ListPaciente')
    {
        
        $this->addView($viewName, 'Paciente');
        $this->addSearchFields($viewName, ['clientes.nombre', 'clientes.telefono1', 'clientes.telefono2', 'clientes.email']);
        //Desactivamos botones por defecto
        $this->setSettings($viewName, 'btnNew', true);
        $this->setSettings($viewName, 'btnDelete', false);
        $this->setSettings($viewName, 'btnPrint', false);
        //Add Filter options
        $this->addFilterCheckbox($viewName, 'conexpedientes', 'with-expedients', 'expedientes.idmotivo');
        //Add more OrdersBy types
        $this->addOrderBy($viewName, ['count(expedientes.idmotivo)'], 'numexpedientes', 2);
        $this->addOrderBy($viewName, ['clientes.nombre'], 'name', 1);
    }
}
