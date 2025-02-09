<?php

namespace FacturaScripts\Plugins\Oftalmol\Controller;

use FacturaScripts\Core\Lib\ExtendedController\EditController;
use FacturaScripts\Plugins\Oftalmol\src\Constants;

class EditExpediente extends EditController {

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
        return 'Expediente';
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
        $this->createViewNotasProfesional();
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
        $this->addEditView($viewName, 'Paciente', 'clinic-history', 'fas fa-user-injured');
        $this->setSettings($viewName, 'btnDelete', false);
        $this->setNumColumns($viewName, 'allergies', 6);
        $this->setNumColumns($viewName, 'ophthalmological-history', 6);
        $this->setNumColumns($viewName, 'personal-history', 6);
        $this->setNumColumns($viewName, 'family-history', 6);
    }

    private function createViewAnamnesis(string $viewName = Constants::VIEW_ANAMNESIS) {
        $this->addEditListView($viewName, 'Notas', 'anamnesis', 'fas fa-chart-line');
        $this->views[$viewName]->setInLine(true);
    }

    private function createViewNotasProfesional(string $viewName = Constants::VIEW_NOTASPROFESIONAL) {
        $this->addEditListView($viewName, 'Notas', 'profesionalNotes', 'fas fa-glasses');
        $this->views[$viewName]->setInLine(true);
    }

    private function createViewEvolution(string $viewName = Constants::VIEW_EVOLUTION) {
        $this->addEditListView($viewName, 'Notas', 'evolution', 'fas fa-chart-line');
    }
    private function createViewClinicalJudgment(string $viewName = Constants::VIEW_CLINICAL)
    {
        $this->addEditListView($viewName, 'Notas', 'clinical-judgment', 'fas fa-diagnoses');
        $this->views[$viewName]->setInLine(true);
    }

    private function createViewTreatment(string $viewName = Constants::VIEW_TREATMENT) {
        $this->addEditListView($viewName, 'Notas', 'treatment', 'fas fa-prescription-bottle-alt');
    }

    private function createViewPrescription(string $viewName = Constants::VIEW_PRESCRIPTION) {
        $this->addEditListView($viewName, 'Notas', 'optical-prescription', 'fas fa-glasses');
    }
}
