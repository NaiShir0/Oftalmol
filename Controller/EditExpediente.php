<?php
namespace FacturaScripts\Plugins\Oftalmol\Controller;

use FacturaScripts\Core\Lib\ExtendedController\EditController;
use FacturaScripts\Plugins\Oftalmol\src\Constants;

class EditExpediente extends EditController{
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
    private function setNumColumns(string $viewName, string $columnName, int $numcolumns)
    {
        $column = $this->views[$viewName]->columnForName($columnName);
        if (isset($column)) {
            $column->numcolumns = $numcolumns;
        }
    }
    
    /**
     * Create the view to display.
     */
    #[\Override]
    protected function createViews()
    {
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

        //$this->createViewEvolution();
        //  $this->createViewClinicalJudgment();
        //  $this->createViewTreatment();
        //  $this->createViewPrescription();

        //$this->createViewExpedientFiles();
    }
    private function createViewPatient(string $viewName = Constants::VIEW_PATIENT)
    {
        $this->addEditView($viewName, 'Paciente', 'clinic-history', 'fas fa-user-injured');
        $this->setSettings($viewName, 'btnDelete', false);
        $this->setNumColumns($viewName, 'allergies', 6);
        $this->setNumColumns($viewName, 'ophthalmological-history', 6);
        $this->setNumColumns($viewName, 'personal-history', 6);
        $this->setNumColumns($viewName, 'family-history', 6);
    }
    
    private function createViewAnamnesis(string $viewName = Constants::VIEW_ANAMNESIS)
    {        
        $this->addEditListView($viewName, 'Notas', 'anamnesis', 'fas fa-chart-line');
        $this->views[$viewName]->setInLine(true);
    }
 
    private function createViewNotasProfesional(string $viewName = Constants::VIEW_NOTASPROFESIONAL)
    {
        $this->addEditListView($viewName, 'Notas', 'profesionalNotes', 'fas fa-glasses');
        $this->views[$viewName]->setInLine(true);
    }
}
