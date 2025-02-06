<?php
namespace FacturaScripts\Plugins\Oftalmol\Controller;

use FacturaScripts\Core\Lib\ExtendedController\EditController;
use FacturaScripts\Plugins\Oftalmol\src\Constants;
use FacturaScripts\Core\Base\DataBase\DataBaseWhere;

class EditPaciente extends EditController{
     
    /**
     * Return the basic data for this page.
     *
     * @return array
     */
    public function getPageData(): array {
        $data = parent::getPageData();
        $data['menu'] = 'ophthalmology';
        $data['title'] = 'patients';
        $data['icon'] = 'fas fa-bezier-curve';
        return $data;
    }
    /**
     * Loads the data to display.
     *
     * @param string $viewName
     * @param BaseView $view
     */
    protected function loadData($viewName, $view)
    {
        $mainViewName = $this->getMainViewName();
        if ($viewName === $mainViewName) {
            parent::loadData($viewName, $view);
            $view->model->loadClientData();
            return;
        }

        switch ($viewName){
            case Constants::VIEW_EXPEDIENTE:
                $codcliente = $this->getViewModelValue($mainViewName, 'codcliente');
                $where = [new DataBaseWhere('expedientes.codcliente', $codcliente)];
                $view->loadData('', $where, ['expedientes.fecha' => 'DESC']);
                break;
        }
    }
    
    #[\Override]
    public function getModelClassName(): string{
        return 'Paciente';
    }
    #[\Override]
    protected function createViews() {
        parent::createViews();
        $this->setSettings($this->getMainViewName(), 'btnDelete', false);
        $this->setTabsPosition("bottom");

        $this->createViewsExpediente();
    }
    
    /**
     * Add Expedient view for patient.
     *
     * @param string $viewName
     */
    private function createViewsExpediente(string $viewName = Constants::VIEW_EXPEDIENTE)
    {
        $this->addListView($viewName, 'Join\ExpedienteJoin', 'expedients');

        $this->views[$viewName]->addSearchFields(['motivos.name',]);
        // FIXME:
        // $this->views[$viewName]->addFilterCheckbox('discharge', false);

        $this->views[$viewName]->disableColumn('date', true);
        $this->views[$viewName]->disableColumn('patient', true);
        $this->views[$viewName]->disableColumn('mobile', true);
        $this->views[$viewName]->disableColumn('date-birth', true);
    }
}
