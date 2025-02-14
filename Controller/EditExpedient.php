<?php

namespace FacturaScripts\Plugins\Oftalmol\Controller;

use FacturaScripts\Core\Lib\ExtendedController\EditController;
use FacturaScripts\Plugins\Oftalmol\src\Constants;
use FacturaScripts\Core\Base\DataBase\DataBaseWhere;
use FacturaScripts\Core\Tools;

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
    #[\Override]
    protected function loadData($viewName, $view) {

        $mainViewName = $this->getMainViewName();
        $idexpedient = $this->getViewModelValue($mainViewName, 'id');
        $idpatient = $this->getViewModelValue($mainViewName, 'codcliente');

        if ($viewName === $mainViewName) {
            parent::loadData($viewName, $view);
            if (false === empty($idpatient)) {
                $this->addActionsButton();
            }
            //$this->setValueSelectFechas($idexpedient);
            return;
        }

        switch ($viewName) {
            case Constants::VIEW_LIST_PATIENT:
                if (false === empty($idpatient)) {
                    $view->loadData($idpatient);
                    $view->model->loadClientData();
                    $view->count = -1;
                }
                break;
            case Constants::VIEW_LIST_REFRACTIONTEST:
                $where = [new DataBaseWhere('id', $idexpedient)];
                break;
            case Constants::VIEW_EDIT_ANAMNESIS:
            case Constants::VIEW_EDIT_PROFESIONALNOTE:
                $idnotetype = $this->getViewModelValue($viewName, 'idNoteType');
                $where = [
                    new DataBaseWhere('idExpedient', $idexpedient),
                    new DataBaseWhere('idNoteType', $idnotetype)];

                break;
        }
        $view->loadData(false, $where, ['creationDate' => 'DESC']);
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
        $this->createViewRefraction();
        //$this->createViewFissureLamp();
        //$this->createViewFuncionMotora();
        //$this->createViewPresionIntraocular();
        //$this->createViewViaLagrimal();
        //$this->createViewExploration();
        //$this->createViewTest();
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
        $this->addEditListView($viewName, 'Anamnesis', 'anamnesis', 'fas fa-chart-line');
        $this->views[$viewName]->setInLine(true);
    }

    private function createViewProfesionalNote(string $viewName = Constants::VIEW_EDIT_PROFESIONALNOTE) {
        $this->addEditListView($viewName, 'ProfesionalNote', 'profesionalNote', 'fas fa-glasses');
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

    private function createViewRefraction(string $viewName = Constants::VIEW_LIST_REFRACTIONTEST) {
        $this->addListView($viewName, 'Join\RefractionJoin', 'refractionTests', 'fas fa-laptop-medical');
        $this->setSettings($viewName, 'btnNew', false);
        $this->setSettings($viewName, 'btnDelete', false);

        //$this->views[$viewName]->addOrderBy(['COALESCE(graduaciones.fecha)'], 'date', 2);
        //$this->views[$viewName]->addOrderBy(['fecha'], 'date', 2);
        /* $this->views[$viewName]->addOrderBy(['fecha'], 'date', 2);
          $i18n = $this->toolBox()->i18n();
          $values = [
          ['code' => 0, 'description' => '----------------------'],
          ['code' => PruebaGraduacion::TIPO_REFRACCION, 'description' => $i18n->trans('refraction')],
          ['code' => PruebaGraduacion::TIPO_AGUDEZAVISUAL, 'description' => $i18n->trans('visual-acuity')],
          ['code' => PruebaGraduacion::TIPO_AUTOREFRACTOMETRO, 'description' => $i18n->trans('autorefractometro')],
          ['code' => PruebaGraduacion::TIPO_ESQUIASCOPIA, 'description' => $i18n->trans('skiascopy')],
          ['code' => PruebaGraduacion::TIPO_FRONTOFOCOMETRO, 'description' => $i18n->trans('lensmeter')],
          ];
          $this->views[$viewName]->addFilterSelect('type', 'acuity-tests', 'tipo', $values); */
    }

    #[\Override]
    protected function execPreviousAction($action) {
        switch ($action) {
            case Constants::ACTION_NEW_TEST_REFRACTION:
                $idExpedient = (int) $this->request->get('code', 0);
                $newtype = $this->request->request->get('typeTest', 0);
                Tools::log()->warning($idExpedient);
                if (false === empty($idExpedient)) {
                    $this->redirect('EditTestRefraction?code=' . $idExpedient . '&newtest=' . $newtype, 0);
                    return false;
                }
                return true;
            default:
                return parent::execPreviousAction($action);
        }
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
            'action' => Constants::ACTION_CLOSE_EXPEDIENT,
            'color' => 'danger',
            'icon' => 'fas fa-archive',
            'label' => 'close',
            'confirm' => 'true',
        ]);

        $this->addButton($mainViewName, [
            'action' => Constants::ACTION_NEW_TREATMENT,
            'color' => 'info',
            'icon' => 'fas fa-medkit',
            'label' => 'add-treatment',
            'type' => 'modal',
        ]);

        $this->addButton($mainViewName, [
            'action' => Constants::ACTION_PRINT_TREATMENT,
            'color' => 'warning',
            'icon' => 'fas fa-print',
            'label' => 'print-treatment',
            'type' => 'modal',
        ]);

        $this->addButton($mainViewName, [
            'action' => Constants::ACTION_PRINT_DOSSIER,
            'color' => 'info',
            'icon' => 'fas fa-print',
            'label' => 'print-dossier',
            'type' => 'modal',
                // level para que sólo le aparezca el botón a los administradores
                //'level' => '99'
        ]);
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
}
