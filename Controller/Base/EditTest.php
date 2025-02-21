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
        $this->addEditView($viewName, $this->getModelClassName(), $this->getPageData()['title'], $this->getPageData()['icon']);

        // Remove all buttons
        $this->setSettings($viewName, 'btnDelete', false);
        $this->setSettings($viewName, 'btnSave', false);
        $this->setSettings($viewName, 'btnUndo', false);
        $this->setTabsPosition('left-bottom');
    }

    #[\Override]
    public function getModelClassName(): string {
        return 'Expedient';
    }

    /**
     * Loads the data to display.
     *
     * @param string $viewName
     * @param BaseView $view
     */
    #[\Override]
    protected function loadData($viewName, $view) {
        if ($viewName === $this->getMainViewName()) {
            parent::loadData($viewName, $view);
            $this->addButton($viewName, [
                'action' => 'returnToExpedient',
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

    /**
     * Run the actions that alter data before reading it.
     *
     * @param string $action
     * @return bool
     */
    protected function execPreviousAction($action) {
        /** Acción para volver al expediente cuando estamos dentro 
         * de un bloque de pruebas
         */
        if ($action === 'returnToExpedient') {
            $idexpedient = (int) $this->request->get('code', 0);
            if (false === empty($idexpedient)) {
                /** TODO: aquí deberíamos poner que cuando volvamos al expediente se quede seleccionado
                 * el grupo de pruebas del que veníamos.
                 */
                $this->redirect('EditExpedient?code=' . $idexpedient, 0);
                return false;
            }
            return true;
        }
        return parent::execPreviousAction($action);
    }
}
