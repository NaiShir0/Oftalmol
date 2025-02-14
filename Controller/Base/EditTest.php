<?php

namespace FacturaScripts\Plugins\Oftalmol\Controller\Base;

use FacturaScripts\Core\Lib\ExtendedController\EditController;
use FacturaScripts\Plugins\Oftalmol\src\Constants;
use FacturaScripts\Core\Base\DataBase\DataBaseWhere;

class EditTest extends EditController {

    #[\Override]
    protected function createViews() {
        // master view -> EditExpediente in readonly.
        $viewName = Constants::VIEW_EDIT_EXPEDIENT;
        $this->addEditView($viewName, $this->getModelClassName(),$this->getPageData()['title'],$this->getPageData()['icon']);

        // Remove all buttons
        $this->setSettings($viewName, 'btnDelete', false);
        $this->setSettings($viewName, 'btnSave', false);
        $this->setSettings($viewName, 'btnUndo', false);
        $this->setTabsPosition('left-bottom');
    }

    #[\Override]
    public function getModelClassName(): string {
        return 'Test';
    }
    
    /**
     * Loads the data to display.
     *
     * @param string $viewName
     * @param BaseView $view
     */
    protected function loadData($viewName, $view)
    {
        if ($viewName === $this->getMainViewName()) {
            parent::loadData($viewName, $view);
            $this->addButton($viewName, [
                'action' => 'expedient-backward',
                'color' => 'warning',
                'icon' => 'fas fa-backward',
                'label' => 'expedient',
            ]);
            return;
        }

        $idexpedient = $this->getViewModelValue($this->getMainViewName(), 'id');
        $where = [
                new DataBaseWhere('idExpedient', $idexpedient),
                new DataBaseWhere('idTestType', $view->model->idTestType),
            ];
        $view->loadData('', $where, ['creationDate' => 'DESC']);
    }
}
