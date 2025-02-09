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

        $this->createViewEvolution();
        $this->createViewClinicalJudgment();
        $this->createViewTreatment();
        $this->createViewPrescription();

        //$this->createViewExpedientFiles();
    }

    private function createViewPatient(string $viewName = Constants::VIEW_PATIENT) {
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
    private function createViewClinicalJudgment(string $viewName = Constants::VIEW_CLINICAL)
    {
        $this->addEditListView($viewName, 'Note', 'clinicalJudgmentNote', 'fas fa-diagnoses');
        $this->views[$viewName]->setInLine(true);
    }

    private function createViewTreatment(string $viewName = Constants::VIEW_TREATMENT) {
        $this->addEditListView($viewName, 'Note', 'treatmentNote', 'fas fa-prescription-bottle-alt');
    }

    private function createViewPrescription(string $viewName = Constants::VIEW_PRESCRIPTION) {
        $this->addEditListView($viewName, 'Note', 'opticalPrescriptionNote', 'fas fa-glasses');
    }
}
