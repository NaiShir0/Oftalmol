<?php

namespace FacturaScripts\Plugins\Oftalmol\Controller;

use FacturaScripts\Core\Lib\ExtendedController\ListController;
use FacturaScripts\Core\Base\DataBase\DataBaseWhere;

class ListExpediente extends ListController {

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
    protected function createViews(string $viewName = 'ListExpediente') {

        //$this->addView($viewName, 'Expediente');
        $this->addView($viewName, 'Join\ExpedienteJoin', 'expedients', 'fas fa-layer-group');
        $this->addSearchFields('ListExpediente', ['clientes.nombre', 'motivos.name', 'clientes.telefono1', 'clientes.telefono2', 'clientes.email']);
        $this->addOrderBy($viewName, ['expedientes.fechamodificacion'], 'datemod', 2);
        $this->addOrderBy($viewName, ['expedientes.fecha'], 'date');
        $this->addOrderBy($viewName, ['clientes.nombre'], 'name');

        $this->addFilterAutocomplete($viewName, 'patient', 'patient', 'clientes.codcliente', 'clientes', 'codcliente', 'nombre');
        $this->addFilterAutocomplete($viewName, 'motivo', 'reasons-consultation', 'motivos.name', 'oft_motivos', 'name', 'name');
        $this->addFilterPeriod($viewName, 'date', 'date', 'expedientes.fecha');
        $values2 = [
            ['label' => $this->toolBox()->i18n()->trans('all'), 'where' => []],
            ['label' => $this->toolBox()->i18n()->trans('only-pending'), 'where' => [new DataBaseWhere('expedientes.alta', null, 'IS')]],
            ['label' => $this->toolBox()->i18n()->trans('Dados de Alta'), 'where' => [new DataBaseWhere('expedientes.alta', null, 'IS NOT')]],
        ];

        $this->addFilterSelectWhere($viewName, 'discharge', $values2);
        $this->addFilterPeriod($viewName, 'datemod', 'datemod', 'expedientes.fechamodificacion');
    }
}
