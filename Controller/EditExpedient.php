<?php

namespace FacturaScripts\Plugins\Oftalmol\Controller;

use FacturaScripts\Core\Lib\ExtendedController\EditController;
use FacturaScripts\Plugins\Oftalmol\src\Constants;

class EditExpedient extends EditController {

    /**
     * Return the basic data for this page.
     *
     * @return array
     */
    #[\Override]
    public function getPageData(): array {
        $data = parent::getPageData();
        $data['menu'] = 'ophthalmology';
        $data['title'] = 'expedient';
        $data['showonmenu'] = false;
        $data['icon'] = 'fas fa-layer-group';
        return $data;
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
    protected function loadData($viewName, $view) {
        $mainViewName = $this->getMainViewName();
        if ($viewName === $mainViewName) {
            parent::loadData($viewName, $view);
            $idpatient = $this->getViewModelValue($mainViewName, 'codcliente');
            if (false === empty($idpatient)) {
                //$this->addActionsButton();
            }
            $idexpedient = $this->getViewModelValue($mainViewName, 'id');
            //$this->setValueSelectFechas($idexpedient);
            return;
        }
        switch ($viewName) {

            case Constants::VIEW_EDIT_PATIENT:
                $idpatient = $this->getViewModelValue($mainViewName, 'codcliente');
                if (false === empty($idpatient)) {
                    $view->loadData($idpatient);
                    $view->model->loadClientData();
                    $view->count = -1;
                }
                break;
        }
    }

    /**
     *
     * @param string $viewName
     * @param string $columnName
     * @param int $numcolumns
     */
    private function setNumColumns(string $viewName, string $columnName, int $numcolumns) {
        $column = $this->views[$viewName]->columnForName($columnName);
        if (isset($column)) {
            $column->numcolumns = $numcolumns;
        }
    }

    /**
     * Create the view to display.
     */
    #[\Override]
    protected function createViews() {
        parent::createViews();
        $this->setTabsPosition('left-bottom');

        $this->createViewPatient();
        $this->createViewAnamnesis();
        $this->createViewProfesionalNote();
        //$this->createViewAcuity();
        //$this->createViewFissureLamp();
        //$this->createViewFuncionMotora();
        //$this->createViewPresionIntraocular();
        //$this->createViewViaLagrimal();
        // $this->createViewExploration();
        // $this->createViewTest();
        //$this->createViewComplementary();
        //$this->createViewEvolution();
        //$this->createViewClinicalJudgment();
        //$this->createViewTreatment();
        //$this->createViewPrescription();
        //$this->createViewExpedientFiles();
    }

    private function createViewPatient(string $viewName = Constants::VIEW_LIST_PATIENT) {
        $this->addEditView($viewName, 'Patient', 'clinicHistory', 'fas fa-user-injured');
        $this->setSettings($viewName, 'btnDelete', false);
        $this->setNumColumns($viewName, 'allergies', 6);
        $this->setNumColumns($viewName, 'ophthalmolHistory', 6);
        $this->setNumColumns($viewName, 'personalHistory', 6);
        $this->setNumColumns($viewName, 'familyHistory', 6);
    }

    private function createViewAnamnesis(string $viewName = Constants::VIEW_EDIT_ANAMNESIS) {
        $this->addEditListView($viewName, 'Note', 'anamnesisNote', 'fas fa-chart-line');
        $this->views[$viewName]->setInLine(true);
    }

    private function createViewProfesionalNote(string $viewName = Constants::VIEW_EDIT_PROFESIONALNOTE) {
        $this->addEditListView($viewName, 'Note', 'profesionalNote', 'fas fa-glasses');
        $this->views[$viewName]->setInLine(true);
    }

    private function createViewEvolution(string $viewName = Constants::VIEW_EVOLUTION) {
        $this->addEditListView($viewName, 'Note', 'evolutionNote', 'fas fa-chart-line');
    }

    private function createViewClinicalJudgment(string $viewName = Constants::VIEW_CLINICAL) {
        $this->addEditListView($viewName, 'Note', 'clinicalJudgmentNote', 'fas fa-diagnoses');
        $this->views[$viewName]->setInLine(true);
    }

    private function createViewTreatment(string $viewName = Constants::VIEW_TREATMENT) {
        $this->addEditListView($viewName, 'Note', 'treatmentNote', 'fas fa-prescription-bottle-alt');
    }

    private function createViewPrescription(string $viewName = Constants::VIEW_PRESCRIPTION) {
        $this->addEditListView($viewName, 'Note', 'opticalPrescriptionNote', 'fas fa-glasses');
    }

    private function addActionsButton() {
        $mainViewName = $this->getMainViewName();
        $discharge = $this->getViewModelValue($mainViewName, 'alta');
        if (false === empty($discharge)) {
            $this->addButton($mainViewName, [
                'action' => self::ACTION_OPEN_EXPEDIENT,
                'color' => 'warning',
                'icon' => 'far fa-folder-open',
                'label' => 'reopen',
                'confirm' => 'true',
            ]);
            return;
        }

        $this->addButton($mainViewName, [
            'action' => self::ACTION_CLOSE_EXPEDIENT,
            'color' => 'danger',
            'icon' => 'fas fa-archive',
            'label' => 'close',
            'confirm' => 'true',
        ]);

        $this->addButton($mainViewName, [
            'action' => self::ACTION_NEW_TREATMENT,
            'color' => 'info',
            'icon' => 'fas fa-medkit',
            'label' => 'add-treatment',
            'type' => 'modal',
        ]);

        $this->addButton($mainViewName, [
            'action' => self::ACTION_PRINT_TREATMENT,
            'color' => 'warning',
            'icon' => 'fas fa-print',
            'label' => 'print-treatment',
            'type' => 'modal',
        ]);

        $this->addButton($mainViewName, [
            'action' => self::ACTION_PRINT_DOSSIER,
            'color' => 'info',
            'icon' => 'fas fa-print',
            'label' => 'print-dossier',
            'type' => 'modal',
                // level para que sólo le aparezca el botón a los administradores
                //'level' => '99'
        ]);
    }
}
