{*<!--
/*********************************************************************************
  ** The contents of this file are subject to the vtiger CRM Public License Version 1.0
   * ("License"); You may not use this file except in compliance with the License
   * The Original Code is: vtiger CRM Open Source
   * The Initial Developer of the Original Code is vtiger.
   * Portions created by vtiger are Copyright (C) vtiger.
   * All Rights Reserved.
  *
 ********************************************************************************/
-->*}
{strip}
    <div class="modal-footer">
        <div class="row-fluid">
            <div class="col-xs-6">
                {if $FIELD_MODEL->getProfileReadWritePermission()}
                    {include file=vtemplate_path($FIELD_MODEL->getUITypeModel()->getTemplateName(),$MODULE_NAME)}
                {/if}
            </div>
            <div class="col-xs-6">
                <div>
                    <div class="pull-right cancelLinkContainer" style="margin-top:0px;">
                        <a class="cancelLink" type="reset" data-dismiss="modal">{vtranslate('LBL_CANCEL', $MODULE)}</a>
                    </div>
                    <button class="btn btn-success" type="submit" name="saveButton"><strong>{vtranslate('LBL_SAVE', $MODULE)}</strong></button>
                </div>
            </div>
        </div>
    </div>
    
    
{/strip}