<?php

namespace FacturaScripts\Plugins\Oftalmol\src;

class Constants {

    const SPECIALITE_OPHTALMOLOGY = 1;
    
    //ADMIN
    const VIEW_LIST_REASON = 'ListReason';
    
    //LOGS
    const LOG_OFTALMOL = 'Oftalmología';

    //VIEWS
    const VIEW_EDIT_PATIENT = 'EditPatient';
    const VIEW_LIST_PATIENT = 'ListPatient';
    const VIEW_EDIT_EXPEDIENT = 'EditExpedient';
    const VIEW_LIST_EXPEDIENT = 'ListExpedient';
    const VIEW_EDIT_ANAMNESIS = 'EditAnamnesis';
    const VIEW_EDIT_PROFESIONALNOTE = 'EditProfesionalNote';
    const VIEW_EDIT_EVOLUTION = 'EditEvolution';
    const VIEW_EDIT_CLINICALJUDGMENT = 'EditClinicalJudgment';
    const VIEW_EDIT_TREATMENT = 'EditTreatment';
    
    //REFRACTIONS TEST VIEWS
    const VIEW_LIST_REFRACTIONTEST = 'EditTestRefraction';
    const VIEW_EDIT_VISUALACUITY = 'EditVisualAcuity';
    const VIEW_EDIT_AUTOREFRACTOMETER = 'EditAutorefractometer';
    const VIEW_EDIT_SHIASCOPY = 'EditShiascopy';
    const VIEW_EDIT_FRONTOFOCOMETER = 'EditFrontofocometer';
    const VIEW_EDIT_SUBJETIVEREFRACTION = 'EditSubjetiveRefraction';
    

    //SLITLAMPS TEST VIEWS
    const VIEW_LIST_SLITLAMP = 'EditTestSlitLamp';
    const VIEW_EDIT_BIOMICROSCOPY = 'EditBiomicroscopy';
    const VIEW_EDIT_EYEFUNDUS = 'EditEyeFundus';
    const VIEW_EDIT_GONIOSCOPY = 'EditGonioscopy';
    
    //INTRAOCULARPRESSURE TEST VIEWS
    const VIEW_LIST_INTRAOCULARPRESSURE = 'EditTestIntraocularPressure';
    const VIEW_EDIT_TONOMETRY = 'EditTonometry';
    const VIEW_EDIT_TONOMETRYBRALEY = 'EditTonometryBraley';
    const VIEW_EDIT_PACHYMETRY = 'EditPachymetry';
    
    //OPTICAL PRESCRIPTIONS TEST VIEWS
    const VIEW_LIST_OPTICALPRESCRIPTION = 'EditTestOpticalPrescription';
    const VIEW_EDIT_OPTICALPRESCRIPTION = 'EditOpticalPrescription';
    
    //TEAR DUCT TESTS VIEWS
    const VIEW_LIST_TEARDUCT = 'EditTestTearDuct';
    const VIEW_EDIT_TESTJONES = 'EditTestJones';
    const VIEW_EDIT_TEARDUCTPROBING = 'EditTearDuctProbing';
    const VIEW_EDIT_TESTSCHIRMER = 'EditTestSchirmer';
    
    //ACTIONS
    //const ACTION_OPEN_EXPEDIENT = 'open-expedient';
    //const ACTION_CLOSE_EXPEDIENT = 'close-expedient';
    //const ACTION_NEW_TREATMENT = 'new-treatment';
    //const ACTION_PRINT_TREATMENT = 'print-treatment';
    //const ACTION_PRINT_DOSSIER = 'print-dossier';
    const ACTION_NEW_TEST_REFRACTION = 'newTestRefraction';
    const ACTION_NEW_TEST_SLITLAMP = 'newTestSlitLamp';
    const ACTION_NEW_TEST_INTRAOCULARPRESSURE = 'newTestIntraocularPressure';
    const ACTION_NEW_TEST_OPTICALPRESCRIPTION = 'newTestOpticalPrescription';
    const ACTION_NEW_TEST_TEARDUCT = 'newTestTearDuct';
}
