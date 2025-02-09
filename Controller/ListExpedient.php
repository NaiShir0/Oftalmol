<?php

namespace FacturaScripts\Plugins\Oftalmol\Controller;

use FacturaScripts\Core\Lib\ExtendedController\ListController;
use FacturaScripts\Core\Base\DataBase\DataBaseWhere;
use FacturaScripts\Plugins\Oftalmol\src\Constants;

class ListExpedient extends ListController {

    #[\Override]
    public function getPageData(): array {
        $data = parent::getPageData();
        $data['menu'] = 'ophthalmology';
        $data['title'] = 'expedients';
        $data['icon'] = 'fas fa-layer-group';
        $data['ordernum'] = 200;
        return $data;
    }

    #[\Override]
    protected function createViews(string $viewName = Constants::VIEW_LIST_EXPEDIENT) {

        //$this->addView($viewName, 'Expediente');
        $this->addView($viewName, 'Join\ExpedientJoin', 'expedients', 'fas fa-layer-group');
        $this->addSearchFields('ListExpedient', ['clientes.nombre', 'reasons.name', 'clientes.telefono1', 'clientes.telefono2', 'clientes.email']);
        $this->addOrderBy($viewName, ['expedients.modificationDate'], 'datemod', 2);
        $this->addOrderBy($viewName, ['expedients.creationDate'], 'date');
        $this->addOrderBy($viewName, ['clientes.nombre'], 'name');

        $this->addFilterAutocomplete($viewName, 'patient', 'patient', 'clientes.codcliente', 'clientes', 'codcliente', 'nombre');
        $this->addFilterAutocomplete($viewName, 'reason', 'reasons-consultation', 'reasons.name', 'oft_reasons', 'name', 'name');
        $this->addFilterPeriod($viewName, 'creationDate', 'creationDate', 'expedients.creationDate');
        $values2 = [
            ['label' => $this->toolBox()->i18n()->trans('all'), 'where' => []],
            ['label' => $this->toolBox()->i18n()->trans('only-pending'), 'where' => [new DataBaseWhere('expedients.release', null, 'IS')]],
            ['label' => $this->toolBox()->i18n()->trans('Dados de Alta'), 'where' => [new DataBaseWhere('expedients.release', null, 'IS NOT')]],
        ];

        $this->addFilterSelectWhere($viewName, 'release', $values2);
        $this->addFilterPeriod($viewName, 'datemod', 'datemod', 'expedients.modificationDate');
    }
}
