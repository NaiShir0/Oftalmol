<?php

namespace FacturaScripts\Plugins\Oftalmol\src;

class Constants {

    const SPECIALITE_OPHTALMOLOGY = 1;
    
    
    //VIEWS
    const VIEW_EDIT_PATIENT = 'EditPatient';
    const VIEW_LIST_PATIENT = 'ListPatient';
    const VIEW_EDIT_EXPEDIENT = 'EditExpedient';
    const VIEW_LIST_EXPEDIENT = 'ListExpedient';
    const VIEW_EDIT_ANAMNESIS = 'EditAnamnesis';
    const VIEW_EDIT_PROFESIONALNOTE = 'EditProfesionalNote';
    const VIEW_VISUALACUITY = 'ListPruebaAgudeza';
    const VIEW_EVOLUTION = 'EditEvolucion';
    const VIEW_PATIENT = 'EditPaciente';
    const VIEW_EXPEDIENTE = 'ListExpediente';
    const VIEW_ANAMNESIS = 'EditAnamnesis';
    const VIEW_NOTASPROFESIONAL = 'EditNotasProfesional';
    const VIEW_ACUITY = 'ListPruebaAgudeza';
    
    
    
    
    
    //TEST TYPE LÁMPARA HENDIDURA
    const VIEW_EDIT_BIOMICROSCOPY = 'EditBiomicroscopy';
    const VIEW_EDIT_EYEFUNDUS = 'EditEyeFundus';
    const VIEW_EDIT_GONIOSCOPY = 'EditGonioscopy';
    
    //REFRACTIONS TEST VIEWS
    const VIEW_LIST_REFRACTIONTEST = 'ListTestRefraction';
    const VIEW_EDIT_VISUALACUITY = 'EditVisualAcuity';
    const VIEW_EDIT_AUTOREFRACTOMETER = 'EditAutorefractometer';
    const VIEW_EDIT_SHIASCOPY = 'EditShiascopy';
    const VIEW_EDIT_FRONTOFOCOMETER = 'EditFrontofocometer';
    const VIEW_EDIT_SUBJETIVEREFRACTION = 'EditSubjetiveRefraction';
    
    //ACTIONS
    const ACTION_OPEN_EXPEDIENT = 'open-expedient';
    const ACTION_CLOSE_EXPEDIENT = 'close-expedient';
    const ACTION_NEW_TREATMENT = 'new-treatment';
    const ACTION_PRINT_TREATMENT = 'print-treatment';
    const ACTION_PRINT_DOSSIER = 'print-dossier';
    const ACTION_NEW_TEST_REFRACTION = 'newTestRefraction';
}
