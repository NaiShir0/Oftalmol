<?php
namespace FacturaScripts\Plugins\Oftalmol\Controller;

use FacturaScripts\Core\Lib\ExtendedController\EditController;
use FacturaScripts\Plugins\Oftalmol\src\Constants;
use FacturaScripts\Core\Base\DataBase\DataBaseWhere;

class EditPatient extends EditController{
     
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
            case Constants::VIEW_LIST_EXPEDIENT:
                $codcliente = $this->getViewModelValue($mainViewName, 'codcliente');
                $where = [new DataBaseWhere('expedients.codcliente', $codcliente)];
                $view->loadData('', $where, ['expedients.creationDate' => 'DESC']);
                break;
        }
    }
    
    #[\Override]
    public function getModelClassName(): string{
        return 'Patient';
    }
    
    #[\Override]
    protected function createViews() {
        parent::createViews();
        $this->setSettings($this->getMainViewName(), 'btnDelete', false);
        $this->setTabsPosition("bottom");

        $this->createViewsExpedient();
    }
    
    /**
     * Add Expedient view for patient.
     *
     * @param string $viewName
     */
    private function createViewsExpedient(string $viewName = Constants::VIEW_LIST_EXPEDIENT)
    {
        $this->addListView($viewName, 'Join\ExpedientJoin', 'expedients');

        $this->views[$viewName]->addSearchFields(['reasons.name',]);
        // FIXME:
        // $this->views[$viewName]->addFilterCheckbox('discharge', false);

        $this->views[$viewName]->disableColumn('date', true);
        $this->views[$viewName]->disableColumn('patient', true);
        $this->views[$viewName]->disableColumn('mobile', true);
        $this->views[$viewName]->disableColumn('birthDate', true);
    }
}
