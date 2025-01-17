<?php

/* * *******************************************************************************
 * The content of this file is subject to the PDF Maker Free license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * ****************************************************************************** */

class PDFMaker_IndexAjax_View extends Vtiger_Index_View
{

    public function __construct()
    {
        parent::__construct();
        $Methods = array('showSettingsList', 'PDFBreakline', 'getPreview', 'ProductImages', 'PDFTemplatesSelect', 'EditAndExport');
        foreach ($Methods as $method) {
            $this->exposeMethod($method);
        }
    }

    public function preProcess(Vtiger_Request $request, $display = true)
    {
        return true;
    }

    public function postProcess(Vtiger_Request $request)
    {
        return true;
    }

    public function process(Vtiger_Request $request)
    {
        $mode = $request->get('mode');
        if (!empty($mode)) {
            $this->invokeExposedMethod($mode, $request);
            return;
        }

        $type = $request->get('type');
    }

    public function showSettingsList(Vtiger_Request $request)
    {
        $PDFMaker = new PDFMaker_PDFMaker_Model();

        $viewer = $this->getViewer($request);
        $moduleName = $request->getModule();

        $viewer->assign('MODULE', $moduleName);

        $linkParams = array('MODULE' => $moduleName, 'ACTION' => $request->get('view'), 'MODE' => $request->get('mode'));
        $linkModels = $PDFMaker->getSideBarLinks($linkParams);

        $viewer->assign('QUICK_LINKS', $linkModels);

        $parent_view = $request->get('pview');

        if ($parent_view == "EditProductBlock") {
            $parent_view = "ProductBlocks";
        }

        $viewer->assign('CURRENT_PVIEW', $parent_view);

        echo $viewer->view('SettingsList.tpl', 'PDFMaker', true);
    }

    public function PDFBreakline(Vtiger_Request $request)
    {
        $moduleName = $request->getModule();
        $viewer = $this->getViewer($request);
        $viewer->assign('MODULE_NAME', $moduleName);

        $adb = PearDatabase::getInstance();
        $id = $request->get("return_id");
        $sql = "SELECT CASE WHEN vtiger_products.productid != '' THEN vtiger_products.productname ELSE vtiger_service.servicename END AS productname, 
                vtiger_inventoryproductrel.sequence_no, vtiger_inventoryproductrel.productid
              FROM vtiger_inventoryproductrel
              LEFT JOIN vtiger_products 
                ON vtiger_products.productid=vtiger_inventoryproductrel.productid 
              LEFT JOIN vtiger_service 
                ON vtiger_service.serviceid=vtiger_inventoryproductrel.productid
              WHERE id=? order by sequence_no";
        $result = $adb->pquery($sql, array($id));

        $saved_sql = "SELECT productid, sequence, show_header, show_subtotal FROM vtiger_pdfmaker_breakline WHERE crmid=?";
        $saved_res = $adb->pquery($saved_sql, array($id));
        $saved_products = array();
        while ($saved_row = $adb->fetchByAssoc($saved_res)) {
            $saved_products[$saved_row["productid"] . "_" . $saved_row["sequence"]] = $saved_row["sequence"];

            $header_checked = "";
            $subtotal_checked = "";
            if ($saved_row["show_header"] == "1") {
                $header_checked = ' checked="checked"';
            }
            if ($saved_row["show_subtotal"] == "1") {
                $subtotal_checked = ' checked="checked"';
            }
        }

        $Products = array();
        $num_rows = $adb->num_rows($result);

        $viewer->assign('SAVE_PRODUCTS', $saved_products);

        $checked_no = 0;
        if ($num_rows > 0) {
            while ($row = $adb->fetchByAssoc($result)) {
                $seq = $row["sequence_no"];
                $productid = $row["productid"];

                if (isset($saved_products[$productid . "_" . $seq])) {
                    $ischecked = 'yes';
                    $checked_no++;
                } else {
                    $ischecked = 'no';
                }

                $product_name = $row["productname"];
                $Products[] = array('uid' => $productid . '_' . $seq, 'checked' => $ischecked, 'name' => $product_name);
            }
        }
        if ($checked_no == 0) {
            $header_checked = ' disabled="disabled"';
            $subtotal_checked = ' disabled="disabled"';
        }

        $viewer->assign('HEADER_CHECKED', $header_checked);
        $viewer->assign('SUBTOTAL_CHECKED', $subtotal_checked);
        $viewer->assign('PRODUCTS', $Products);
        $viewer->assign('RECORD', $id);

        echo $viewer->view('ModalPDFBreaklineContent.tpl', $moduleName, true);
    }

    public function getPreview(Vtiger_Request $request)
    {
        $moduleName = $request->getModule();

        $site_URL = vglobal('site_URL');
        $PDFMakerModuleModel = Vtiger_Module_Model::getInstance($moduleName);

        $source_module = $request->get("source_module");

        $viewer = $this->getViewer($request);

        $language = $request->get("language");
        $file_path = 'index.php?module=PDFMaker&action=IndexAjax&mode=getPreviewContent&source_module=' . $source_module . "&language=" . $language;

        $record = '';
        if ($request->has('record') && !$request->isEmpty('record')) {
            $record = $request->get("record");
            $file_path .= '&record=' . $record;
        }

        $attr_path .= $PDFMakerModuleModel->getUrlAttributesString($request);
        if ($attr_path != "") {
            $file_path .= "&" . $attr_path;
        }

        $viewer->assign('FILE_PATH', $file_path);
        $viewer->assign('SITE_URL', $site_URL);

        //$viewer->view('Preview.tpl', $moduleName);
        $viewer->assign('PDF_FILE_TYPE', 'yes');
        $viewer->assign('DOWNLOAD_URL', $file_path . "&generate_type=attachment");
        $viewer->assign('FILE_TYPE', 'pdf');

        $viewer->assign('MODULE_NAME', $moduleName);

        $printAction = "1";
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/Firefox/i', $u_agent)) {
            $printAction = "0";
        }
        $viewer->assign("PRINT_ACTION", $printAction);
        echo $viewer->view('PDFPreview.tpl', $moduleName, true);
    }

    public function ProductImages(Vtiger_Request $request)
    {
        $moduleName = $request->getModule();
        $viewer = $this->getViewer($request);
        $viewer->assign('MODULE_NAME', $moduleName);

        $adb = PearDatabase::getInstance();

        $denied_img = vimage_path("denied.gif");

        $id = $request->get("return_id");
        $setype = getSalesEntityType($id);
        if ($setype != "Products") {
            $sql = "SELECT CASE WHEN vtiger_products.productid != '' THEN vtiger_products.productname ELSE vtiger_service.servicename END AS productname,
            vtiger_inventoryproductrel.productid, vtiger_inventoryproductrel.sequence_no, vtiger_attachments.attachmentsid, name, path
          FROM vtiger_inventoryproductrel
          LEFT JOIN vtiger_seattachmentsrel
            ON vtiger_seattachmentsrel.crmid=vtiger_inventoryproductrel.productid
          LEFT JOIN vtiger_attachments
            ON vtiger_attachments.attachmentsid=vtiger_seattachmentsrel.attachmentsid
          LEFT JOIN vtiger_products
            ON vtiger_products.productid=vtiger_inventoryproductrel.productid
          LEFT JOIN vtiger_service
            ON vtiger_service.serviceid=vtiger_inventoryproductrel.productid
          WHERE vtiger_inventoryproductrel.id=? ORDER BY vtiger_inventoryproductrel.sequence_no";
        } else {
            $sql = "SELECT vtiger_products.productname, vtiger_products.productid, '1' AS sequence_no, vtiger_attachments.attachmentsid, name, path
              FROM vtiger_products
              LEFT JOIN vtiger_seattachmentsrel
                ON vtiger_seattachmentsrel.crmid=vtiger_products.productid
              LEFT JOIN vtiger_attachments
                ON vtiger_attachments.attachmentsid=vtiger_seattachmentsrel.attachmentsid
              WHERE vtiger_products.productid=? ORDER BY vtiger_attachments.attachmentsid";
        }

        $res = $adb->pquery($sql, array($id));
        $products = array();
        while ($row = $adb->fetchByAssoc($res)) {
            $row = PDFMaker_Module_Model::fixStoredName($row);

            $products[$row["productid"] . "#_#" . $row["productname"] . "#_#" . $row["sequence_no"]][$row["attachmentsid"]]["path"] = $row["path"];
            $products[$row["productid"] . "#_#" . $row["productname"] . "#_#" . $row["sequence_no"]][$row["attachmentsid"]]["name"] = $row["storedname"];
        }

        $saved_sql = "SELECT productid, sequence, attachmentid, width, height FROM vtiger_pdfmaker_images WHERE crmid=?";
        $saved_res = $adb->pquery($saved_sql, array($id));
        $saved_products = $saved_wh = $bac_products = array();

        while ($saved_row = $adb->fetchByAssoc($saved_res)) {
            $saved_products[$saved_row["productid"] . "_" . $saved_row["sequence"]] = $saved_row["attachmentid"];
            $saved_wh[$saved_row["productid"] . "_" . $saved_row["sequence"]]["width"] = ($saved_row["width"] > 0 ? $saved_row["width"] : "");
            $saved_wh[$saved_row["productid"] . "_" . $saved_row["sequence"]]["height"] = ($saved_row["height"] > 0 ? $saved_row["height"] : "");
        }

        $imgHTML = "";
        foreach ($products as $productnameid => $data) {
            list($productid, $productname, $seq) = explode("#_#", $productnameid, 3);
            $prodImg = "";
            $i = 0;
            $noCheck = ' checked="checked" ';
            $width = "100";
            $height = "";
            foreach ($data as $attid => $images) {
                if ($attid != "") {
                    if ($i == 3) {
                        $prodImg .= "</tr><tr>";
                    }
                    $checked = "";
                    if (isset($saved_products[$productid . "_" . $seq])) {
                        if ($saved_products[$productid . "_" . $seq] == $attid) {
                            $checked = ' checked="checked" ';
                            $noCheck = "";
                            $width = $saved_wh[$productid . "_" . $seq]["width"];
                            $height = $saved_wh[$productid . "_" . $seq]["height"];
                        }
                    } elseif (!isset($bac_products[$productid . "_" . $seq])) { //$bac_products array is used for default selection of first image  in case no explicit selection has been made
                        $bac_products[$productid . "_" . $seq] = $attid;
                        $checked = ' checked="checked" ';
                        $noCheck = "";
                        $width = "100";
                        $height = "";
                    }
                    $prodImg .= '<td valign="middle"><input type="radio" name="img_' . $productid . '_' . $seq . '" value="' . $attid . '"' . $checked . '/>
		                 <img align="absmiddle" src="' . $images["path"] . $attid . '_' . $images["name"] . '" alt="' . $images["name"] . '" title="' . $images["name"] . '" style="max-width:50px;max-height:50px;">
		                 </td>';
                    $i++;
                }
            }

            $imgHTML .= '<tr><td class="detailedViewHeader" style="padding-top:5px;padding-bottom:5px;"><b>' . $productname . '</b>';
            if ($i > 0) {
                $imgHTML .= '&nbsp;&nbsp;&nbsp;<input type="text" maxlength="3" name="width_' . $productid . '_' . $seq . '" value="' . $width . '" class="small" style="width:40px">&nbsp;x&nbsp;
		              <input type="text" maxlength="3" name="height_' . $productid . '_' . $seq . '" value="' . $height . '" class="small" style="width:40px">';
            }
            $imgHTML .= '</td></tr>
		             <tr><td class="dvtCellInfo">';
            $imgHTML .= '<table cellpadding="0" cellspacing="1"><tr><td><input type="radio" name="img_' . $productid . '_' . $seq . '" value="no_image"' . $noCheck . '/>';
            $imgHTML .= '<img src="' . $denied_img . '" width="30" align="absmiddle" title="' . $pdf_strings["LBL_NO_IMAGE"] . '" alt="' . $pdf_strings["LBL_NO_IMAGE"] . '"/></td>';
            $imgHTML .= $prodImg . "</tr></table>
		            </td></tr>";
        }

        $viewer->assign('IMG_HTML', $imgHTML);
        $viewer->assign('RECORD', $id);

        echo $viewer->view('ModalImageSelectContent.tpl', $moduleName, true);
    }
}