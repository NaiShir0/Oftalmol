<?php
/**
 * This file is part of Oftalmologia plugin for FacturaScripts.
 * FacturaScripts Copyright (C) 2015-2022 Carlos Garcia Gomez <carlos@facturascripts.com>
 * Oftalmologia   Copyright (C) 2022-2022 Clinica Castillo <jquingarcia@gmail.com>
 *
 * This program and its files are under the terms of the license specified in the LICENSE file.
 */
namespace FacturaScripts\Plugins\Oftalmol\Controller;

use FacturaScripts\Core\Lib\ExtendedController\EditController;

/**
 * Class for edit the reason consultation.
 *
 * @author Clinica Castillo <info@clinicastillo.es>
 */
class EditReason extends EditController
{

    /**
     * Returns the class name of the model to use in the editView.
     */
    public function getModelClassName(): string {
        return 'Reason';
    }

    /**
     * Return the basic data for this page.
     *
     * @return array
     */
    public function getPageData(): array {
        $data = parent::getPageData();
        $data['menu'] = 'ophthalmology';
        $data['title'] = 'queryReason';
        $data['icon'] = 'fas fa-bezier-curve';
        return $data;
    }
}