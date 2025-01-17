<?php

/* * *******************************************************************************
 * The content of this file is subject to the PDF Maker Free license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is IT-Solutions4You s.r.o.
 * Portions created by IT-Solutions4You s.r.o. are Copyright(C) IT-Solutions4You s.r.o.
 * All Rights Reserved.
 * ****************************************************************************** */

class PDFMaker_RecordStructure_Model extends Vtiger_RecordStructure_Model {

	const RECORD_STRUCTURE_MODE_DEFAULT = '';
	const RECORD_STRUCTURE_MODE_FILTER = 'Filter';
	const RECORD_STRUCTURE_MODE_EDITTASK = 'EditTask';

	function setPDFMakerModel($PDFMakerModel) {
		$this->PDFMakerModel = $PDFMakerModel;
	}

	function getPDFMakerModel() {
		return $this->PDFMakerModel;
	}
	/**
	 * Function to get the values in stuctured format
	 * @return <array> - values in structure array('block'=>array(fieldinfo));
	 */
	public function getStructure() {
		if(!empty($this->structuredValues)) {
			return $this->structuredValues;
		}

		$recordModel = $this->getPDFMakerModel();
		$recordId = $recordModel->getId();

		$taskTypeModel = $this->getTaskRecordModel()->getTaskType();
		$taskTypeName = $taskTypeModel->getName();
		$values = array();

		$baseModuleModel = $moduleModel = $this->getModule();
		$blockModelList = $moduleModel->getBlocks();
		if($taskTypeName == 'VTUpdateFieldsTask'){
			unset($blockModelList['LBL_ITEM_DETAILS']);
		}
		foreach($blockModelList as $blockLabel=>$blockModel) {
			$fieldModelList = $blockModel->getFields();
			if (!empty ($fieldModelList)) {
				$values[$blockLabel] = array();
				foreach($fieldModelList as $fieldName=>$fieldModel) {
					if($fieldModel->isViewable()) {
						if (in_array($moduleModel->getName(), array('Calendar', 'Events'))&& $fieldName != 'modifiedby'  && $fieldModel->getDisplayType() == 3) {
							/* Restricting the following fields(Event module fields) for "Calendar" module
							 * time_start, time_end, eventstatus, activitytype,	visibility, duration_hours,
							 * duration_minutes, reminder_time, recurringtype, notime
							 */
							continue;
						}
						//Should not show starred and tag fields in edit task view
						if($fieldModel->getDisplayType() == '6') {
							continue;
						}
						if(!empty($recordId)) {
							//Set the fieldModel with the valuetype for the client side.
							$fieldValueType = $recordModel->getFieldFilterValueType($fieldName);
							$fieldInfo = $fieldModel->getFieldInfo();
							$fieldInfo['pdfmaker_valuetype'] = $fieldValueType;
							$fieldInfo['pdfmaker_columnname'] = $fieldName;
							$fieldModel->setFieldInfo($fieldInfo);
						}
						// This will be used during editing task like email, sms etc
						$fieldModel->set('pdfmaker_columnname', $fieldName)->set('pdfmaker_columnlabel', vtranslate($fieldModel->get('label'), $moduleModel->getName()));
						// This is used to identify the field belongs to source module of pdfmaker
						$fieldModel->set('pdfmaker_sourcemodule_field', true);
						$fieldModel->set('pdfmaker_fieldEditable',$fieldModel->isEditable());
						$values[$blockLabel][$fieldName] = clone $fieldModel;
					}
				}
			}
		}

		//All the reference fields should also be sent
		$fields = $moduleModel->getFieldsByType(array('reference', 'owner', 'multireference'));
		foreach($fields as $parentFieldName => $field) {
			$type = $field->getFieldDataType();
			$referenceModules = $field->getReferenceList();
			if($type == 'owner') $referenceModules = array('Users');
			foreach($referenceModules as $refModule) {
				$moduleModel = Vtiger_Module_Model::getInstance($refModule);
				$blockModelList = $moduleModel->getBlocks();
				if($taskTypeName == 'VTUpdateFieldsTask'){
					unset($blockModelList['LBL_ITEM_DETAILS']);
				}
				foreach($blockModelList as $blockLabel=>$blockModel) {
					$fieldModelList = $blockModel->getFields();
					if (!empty ($fieldModelList)) {
						foreach($fieldModelList as $fieldName=>$fieldModel) {
							if($fieldModel->isViewable()) {
								//Should not show starred and tag fields in edit task view
								if($fieldModel->getDisplayType() == '6') {
									continue;
								}
								$name = "($parentFieldName : ($refModule) $fieldName)";
								$label = vtranslate($field->get('label'), $baseModuleModel->getName()).' : ('.vtranslate($refModule, $refModule).') '.vtranslate($fieldModel->get('label'), $refModule);
								$fieldModel->set('pdfmaker_columnname', $name)->set('pdfmaker_columnlabel', $label);
								if(!empty($recordId)) {
									$fieldValueType = $recordModel->getFieldFilterValueType($name);
									$fieldInfo = $fieldModel->getFieldInfo();
									$fieldInfo['pdfmaker_valuetype'] = $fieldValueType;
									$fieldInfo['pdfmaker_columnname'] = $name;
									$fieldModel->setFieldInfo($fieldInfo);
								}
								$fieldModel->set('pdfmaker_fieldEditable',$fieldModel->isEditable());
								//if field is not editable all the field of that reference field should also shd be not editable
								//eg : created by is not editable . so all user field refered by created by field shd also be non editable
								// owner fields should also be non editable
								if(!$field->isEditable() || $type == "owner") {
									$fieldModel->set('pdfmaker_fieldEditable',false);
								}
								$values[$field->get('label')][$name] = clone $fieldModel;
							}
						}
					}
				}
			}
		}
		$this->structuredValues = $values;
		return $values;
	}

	/**
	 * Function returns all the email fields for the pdfmaker record structure
	 * @return type
	 */
	public function getAllEmailFields() {
		return $this->getFieldsByType('email');
	}

	/**
	 * Function returns all the date time fields for the pdfmaker record structure
	 * @return type
	 */
	public function getAllDateTimeFields() {
		$fieldTypes = array('date','datetime');
		return $this->getFieldsByType($fieldTypes);
	}

	/**
	 * Function returns fields based on type
	 * @return type
	 */
	public function getFieldsByType($fieldTypes) {
		$fieldTypesArray = array();
		if(gettype($fieldTypes) == 'string'){
			array_push($fieldTypesArray,$fieldTypes);
		} else {
			$fieldTypesArray = $fieldTypes;
		}
		$structure = $this->getStructure();
		$fieldsBasedOnType = array();
		if(!empty($structure)) {
			foreach($structure as $block => $fields) {
				foreach($fields as $metaKey => $field) {
					$type = $field->getFieldDataType();
					if(in_array($type, $fieldTypesArray)){
						$fieldsBasedOnType[$metaKey] = $field;
					}
				}
			}
		}
		return $fieldsBasedOnType;
	}

	public static function getInstanceForPDFMakerModule($PDFMakerModel, $mode) {
		$className = Vtiger_Loader::getComponentClassName('Model', $mode.'RecordStructure', 'PDFMaker');
		$instance = new $className();
		$instance->setPDFMakerModel($PDFMakerModel);
		$instance->setModule($PDFMakerModel->getModule());
		return $instance;
	}

	public function getNameFields() {
		$moduleModel = $this->getModule();
		$nameFieldsList[$moduleModel->getName()] = $moduleModel->getNameFields();

		$fields = $moduleModel->getFieldsByType(array('reference', 'owner', 'multireference'));
		foreach($fields as $parentFieldName => $field) {
			$type = $field->getFieldDataType();
			$referenceModules = $field->getReferenceList();
			if($type == 'owner') $referenceModules = array('Users');
			foreach($referenceModules as $refModule) {
				$moduleModel = Vtiger_Module_Model::getInstance($refModule);
				$nameFieldsList[$refModule] = $moduleModel->getNameFields();
			}
		}

		$nameFields = array();
		$recordStructure = $this->getStructure();
		foreach ($nameFieldsList as $moduleName => $fieldNamesList) {
			foreach ($fieldNamesList as $fieldName) {
				foreach($recordStructure as $block => $fields) {
					foreach($fields as $metaKey => $field) {
						if ($fieldName === $field->get('name')) {
							$nameFields[$metaKey] = $field;
						}
					}
				}
			}
		}
		return $nameFields;
	}
}