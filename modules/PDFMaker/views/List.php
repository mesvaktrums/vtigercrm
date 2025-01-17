<?php

/* * *******************************************************************************
 * The content of this file is subject to the PDF Maker Free license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * ****************************************************************************** */

class PDFMaker_List_View extends Vtiger_Index_View {

    protected $listViewLinks = false;

    public function __construct() {
        parent::__construct();
        $this->exposeMethod('getList');
    }

    public function preProcess(Vtiger_Request $request, $display = true)
    {
        vtws_addDefaultModuleTypeEntity($request->getModule());

        parent::preProcess($request, false);

        $viewer = $this->getViewer($request);
        $moduleName = $request->getModule();
        $viewer->assign('QUALIFIED_MODULE', $moduleName);
        $viewer = $this->getViewer($request);

        $moduleName = $request->getModule();

        if (!empty($moduleName)) {
            $moduleModel = new PDFMaker_PDFMaker_Model('PDFMaker');
            $currentUser = Users_Record_Model::getCurrentUserModel();
            $userPrivilegesModel = Users_Privileges_Model::getInstanceById($currentUser->getId());
            $permission = $userPrivilegesModel->hasModulePermission($moduleModel->getId());
            $viewer->assign('MODULE', $moduleName);

            if (!$permission) {
                $viewer->assign('MESSAGE', 'LBL_PERMISSION_DENIED');
                $viewer->view('OperationNotPermitted.tpl', $moduleName);
                exit;
            }

            $linkParams = array('MODULE' => $moduleName, 'ACTION' => $request->get('view'));
            $linkModels = $moduleModel->getSideBarLinks($linkParams);

            $viewer->assign('QUICK_LINKS', $linkModels);
        }

        $viewer->assign('CURRENT_USER_MODEL', Users_Record_Model::getCurrentUserModel());
        $viewer->assign('CURRENT_VIEW', $request->get('view'));

        $PDFMakerModel = Vtiger_Module_Model::getInstance('PDFMaker');
        $version_type = $PDFMakerModel->GetVersionType();
        $viewer->assign("VERSION_TYPE", $version_type);

        if ($display) {
            $this->preProcessDisplay($request);
        }
    }

    function preProcessTplName(Vtiger_Request $request) {
        return 'ListViewPreProcess.tpl';
    }

    public function postProcess(Vtiger_Request $request) {
        $viewer = $this->getViewer($request);
        $viewer->view('IndexPostProcess.tpl');

        parent::postProcess($request);
    }

    public function process(Vtiger_Request $request) {
        $viewer = $this->getViewer($request);
        
        $qualifiedModuleName = $request->getModule(false);
        $viewer->assign('QUALIFIED_MODULE', $qualifiedModuleName);
        $viewer->assign("URL", vglobal("site_URL"));

        if (is_dir("modules/PDFMaker/resources/mpdf")) {
            $this->invokeExposedMethod('getList', $request);
        } else {
            $mb_string_exists = function_exists("mb_get_info");
            if ($mb_string_exists === false) {
                $viewer->assign("MB_STRING_EXISTS", 'false');
            } else {
                $viewer->assign("MB_STRING_EXISTS", 'true');
            }
            $viewer->assign("STEP", "1");
            $viewer->assign("CURRENT_STEP", "1");
            $viewer->assign("TOTAL_STEPS", "3");
            
            $viewer->view('Install.tpl', 'PDFMaker');
        }
    }

    public function getList(Vtiger_Request $request) {
        $moduleName = $request->getModule();

        PDFMaker_Debugger_Model::GetInstance()->Init();
        $current_user = Users_Record_Model::getCurrentUserModel();
        $PDFMakerModel = Vtiger_Module_Model::getInstance($moduleName);

        $viewer = $this->getViewer($request);

        $version_type = $PDFMakerModel->GetVersionType();
        $viewer->assign("VERSION_TYPE", $version_type);
        $viewer->assign("VERSION", ucfirst($version_type) . " " . PDFMaker_Version_Helper::$version);

        $return_data = $PDFMakerModel->GetListviewData();
        $viewer->assign("PDFTEMPLATES", $return_data);
        $category = getParentTab();
        $viewer->assign("PARENTTAB", $category);
        $viewer->assign("CATEGORY", $category);

        if ($current_user->isAdminUser()) {
            $viewer->assign('IS_ADMIN', '1');
        }

        $viewer->assign("MAIN_PRODUCT_SUPPORT", '');
        $viewer->assign("MAIN_PRODUCT_WHITELABEL", '');
        $viewer->assign("MODULE", $moduleName);
        $viewer->assign('SEARCH_DETAILS', $searchParams);
        $viewer->view("ListPDFTemplatesContents.tpl", $moduleName);
    }
    
    function getHeaderScripts(Vtiger_Request $request) {
        $headerScriptInstances = parent::getHeaderScripts($request);
        $jsFileNames = array(
            "layouts.v7.modules.PDFMaker.resources.FreeInstall",
        );
        $jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
        $headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);
        return $headerScriptInstances;
    }   
}