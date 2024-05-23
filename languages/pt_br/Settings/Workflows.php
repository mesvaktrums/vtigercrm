<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger. 
 * All Rights Reserved. Contributor(s): Valmir C. Trindade - Brazilian Portuguese Translation - www.ttcasolucoes.com.br
 *************************************************************************************/
$languageStrings = array(
	//Basic Field Names
	'LBL_NEW' => 'Novo',
	'LBL_WORKFLOW' => 'Workflow',
	'LBL_CREATING_WORKFLOW' => 'Criando WorkFlow',
	'LBL_EDITING_WORKFLOW' => 'Editando Workflow',
	'LBL_ADD_RECORD' => 'Novo Workflow',

	//Edit view
	'LBL_STEP_1' => 'Passo 1',
	'LBL_ENTER_BASIC_DETAILS_OF_THE_WORKFLOW' => 'Digite os detalhes básico do Workflow',
	'LBL_SPECIFY_WHEN_TO_EXECUTE' => 'Especificar quando este Workflow será executado',
	'ON_FIRST_SAVE' => 'Somente a primeira vez que for salvo',
	'ONCE' => 'Até a primeira vez que a condição for verdadeira',
	'ON_EVERY_SAVE' => 'Todas as vezes que o registro for salvo',
	'ON_MODIFY' => 'Todas as vezes que o registro for modificado',
	'ON_SCHEDULE' => 'Agendar',
	'MANUAL' => 'Sistema',
	'SCHEDULE_WORKFLOW' => 'Agendar Workflow',
	'ADD_CONDITIONS' => 'Adicionar Condições',
	'ADD_TASKS' => 'Adicionar Ações',

	//Step2 edit view
	'LBL_EXPRESSION' => 'Expressão',
	'LBL_FIELD_NAME' => 'Campo',
	'LBL_SET_VALUE' => 'Definir Valor',
	'LBL_USE_FIELD' => 'Usar Campo',
	'LBL_USE_FUNCTION' => 'Usar Função',
	'LBL_RAW_TEXT' => 'Texto puro',
	'LBL_ENABLE_TO_CREATE_FILTERS' => 'Habilitar para criar Filtros',
	'LBL_CREATED_IN_OLD_LOOK_CANNOT_BE_EDITED' => 'Este workflow foi criado em uma forma antiga. As condições criadas na forma antiga não podem ser editadas. Você pode escolher recriar as condições ou utilizar uma condição existente sem alterá-las.',
	'LBL_USE_EXISTING_CONDITIONS' => 'Utilizar condições existentes',
	'LBL_RECREATE_CONDITIONS' => 'Recriar Condições',
	'LBL_SAVE_AND_CONTINUE' => 'Salvar e Continuar',

	//Step3 edit view
	'LBL_ACTIVE' => 'Ativo',
	'LBL_TASK_TYPE' => 'Tipo Ação',
	'LBL_TASK_TITLE' => 'Título Ação',
	'LBL_ADD_TASKS_FOR_WORKFLOW' => 'Adicionar Ação para Workflow',
	'LBL_EXECUTE_TASK' => 'Executar Ação',
	'LBL_SELECT_OPTIONS' => 'Selecionar Opções',
	'LBL_ADD_FIELD' => 'Adicionar campo',
	'LBL_ADD_TIME' => 'Adicionar hora',
	'LBL_TITLE' => 'Título',
	'LBL_PRIORITY' => 'Prioridade',
	'LBL_ASSIGNED_TO' => 'Atribuído a',
	'LBL_TIME' => 'Hora',
	'LBL_DUE_DATE' => 'Data Vencimento',
	'LBL_THE_SAME_VALUE_IS_USED_FOR_START_DATE' => 'O mesmo valor é usado para data inicial',
	'LBL_EVENT_NAME' => 'Nome do Evento',
	'LBL_TYPE' => 'Tipo',
	'LBL_METHOD_NAME' => 'Nome Método',
	'LBL_RECEPIENTS' => 'Destinatários',
	'LBL_ADD_FIELDS' => 'Adicionar Campos',
	'LBL_SMS_TEXT' => 'Testo SMS',
	'LBL_SET_FIELD_VALUES' => 'Definir Valores do Campo',
	'LBL_ADD_FIELD' => 'Adiciona Campo',
	'LBL_IN_ACTIVE' => 'Inativo',
	'LBL_SEND_NOTIFICATION' => 'Enviar Notificação',
	'LBL_START_TIME' => 'Hora Início',
	'LBL_START_DATE' => 'Data Início',
	'LBL_END_TIME' => 'Hora Final',
	'LBL_END_DATE' => 'Data Final',
	'LBL_ENABLE_REPEAT' => 'Habilitar Repetir',
	'LBL_NO_METHOD_IS_AVAILABLE_FOR_THIS_MODULE' => 'Nenhum método está disponível para este Módulo',
	
	'LBL_NO_TASKS_ADDED' => 'Nenhuma Ação',
	'LBL_CANNOT_DELETE_DEFAULT_WORKFLOW' => 'Você não pode apagar um Workflow padrão',
	'LBL_MODULES_TO_CREATE_RECORD' => 'Criar um novo registro em',
	'LBL_EXAMPLE_EXPRESSION' => 'Expressão',
	'LBL_EXAMPLE_RAWTEXT' => 'Texto puro',
	'LBL_VTIGER' => 'Vtiger',
	'LBL_EXAMPLE_FIELD_NAME' => 'Campo',
	'LBL_NOTIFY_OWNER' => 'notify_owner',
	'LBL_ANNUAL_REVENUE' => 'annual_revenue',
	'LBL_EXPRESSION_EXAMPLE2' => "if mailingcountry == 'India' then concat(firstname,' ',lastname) else concat(lastname,' ',firstname) end",
	'LBL_FROM' => 'De',
	'LBL_RUN_WORKFLOW' => 'Executar Workflow',
	'LBL_AT_TIME' => 'Na Hora',
	'LBL_HOURLY' => 'A cada hora',
	'Optional' => 'Opcional',
	'ENTER_FROM_EMAIL_ADDRESS'=> 'Digite endereço de email do Remetente',
	'LBL_ADD_TASK' => 'Adicionar Ação',
    'Portal Pdf Url' =>'URL PDF Portal',

	'LBL_DAILY' => 'Diariamente',
	'LBL_WEEKLY' => 'Semanalmente',
	'LBL_ON_THESE_DAYS' => 'Nesses dias',
	'LBL_MONTHLY_BY_DATE' => 'Mensalmente por Data',
	'LBL_MONTHLY_BY_WEEKDAY' => 'Mensalmente por Dias da Semana',
	'LBL_YEARLY' => 'Anualmente',
	'LBL_SPECIFIC_DATE' => 'Numa Data Específica',
	'LBL_CHOOSE_DATE' => 'Escolher Data',
	'LBL_SELECT_MONTH_AND_DAY' => 'Selecionar Data e Mês',
	'LBL_SELECTED_DATES' => 'Datas Selecionadas',
	'LBL_EXCEEDING_MAXIMUM_LIMIT' => 'Limite máximo excedido',
	'LBL_NEXT_TRIGGER_TIME' => 'Próximo hora de disparo em',
    'LBL_ADD_TEMPLATE' => 'Adicionar Modelo',
    'LBL_LINEITEM_BLOCK_GROUP' => 'Bloco Itens Linha para Imposto em Grupo',
    'LBL_LINEITEM_BLOCK_INDIVIDUAL' => 'Bloco Itens Linha para Imposto Individual',
	'LBL_MESSAGE' => 'Mensagem',
    'LBL_ADD_PDF' => 'Adicionar PDF',
	
	//Translation for module
	'Calendar' => 'Tarefa',
	'Send Mail' => 'Enviar Mensagem',
	'Invoke Custom Function' => 'Invocar Função Customizada',
	'Create Todo' => 'Criar Tarefa',
	'Create Event' => 'Criar Evento',
	'Update Fields' => 'Atualizar Campos',
	'Create Entity' => 'Criar Registro',
	'SMS Task' => 'Tarefa SMS',
	'Mobile Push Notification' => 'Notificação Push Celular',
    
    // v7 translations
    'LBL_WORKFLOW_NAME' => 'Nome Workflow',
    'LBL_TARGET_MODULE' => 'Módulo Alvo',
    'LBL_WORKFLOW_TRIGGER' => 'Disparo Workflow',
    'LBL_TRIGGER_WORKFLOW_ON' => 'Disparo do Workflow em',
    'LBL_RECORD_CREATION' => 'Criação Registro',
    'LBL_RECORD_UPDATE' => 'Atualizar Registro',
    'LBL_TIME_INTERVAL' => 'Intervalo de Tempo',
    'LBL_RECURRENCE' => 'Recorrência',
    'LBL_FIRST_TIME_CONDITION_MET' => 'Somente a primeira vez que a condição for atendida',
    'LBL_EVERY_TIME_CONDITION_MET' => 'Todas as vezes que a condição for atendida',
    'LBL_WORKFLOW_CONDITION' => 'Condição do Workflow',
    'LBL_WORKFLOW_ACTIONS' => 'Ações do Workflow',
    'LBL_DELAY_ACTION' => 'Atraso da Ação',
    'LBL_FREQUENCY' => 'Frequência',
    'LBL_SELECT_FIELDS' => 'Selecionar Campos',
    'LBL_INCLUDES_CREATION' => 'Incluir Criação',
    'LBL_ACTION_FOR_WORKFLOW' => 'Ação para o Workflow',
    'LBL_WORKFLOW_SEARCH' => 'Pesquisa por Nome',
	'LBL_ACTION_TYPE' => 'Tipo de Ação (Contagem Ativo)',
	'LBL_VTEmailTask' => 'Email',
    'LBL_VTEntityMethodTask' => 'Função Customizada',
    'LBL_VTCreateTodoTask' => 'Tarefa',
    'LBL_VTCreateEventTask' => 'Evento',
    'LBL_VTUpdateFieldsTask' => 'Atualizar Campo',
    'LBL_VTSMSTask' => 'SMS', 
    'LBL_VTPushNotificationTask' => 'Notificação Celular',
    'LBL_VTCreateEntityTask' => 'Criar Registro',
	'LBL_MAX_SCHEDULED_WORKFLOWS_EXCEEDED' => 'O número máximo de (%s)workflows agendado foi excedido',
);

$jsLanguageStrings = array(
	'JS_STATUS_CHANGED_SUCCESSFULLY' => 'Status alterado com Sucesso',
	'JS_TASK_DELETED_SUCCESSFULLY' => 'Ação apagada com Sucesso',
	'JS_SAME_FIELDS_SELECTED_MORE_THAN_ONCE' => 'O mesmo campo foi selecionado mais de uma vez',
	'JS_WORKFLOW_SAVED_SUCCESSFULLY' => 'Workflow salvo com Sucesso',
    'JS_CHECK_START_AND_END_DATE'=>'A Data e Hora Final devem ser maiores ou iguais a Data e Hora Inicial',
    'JS_TASK_STATUS_CHANGED' => 'O status da Tarefa foi alterado com Sucesso.',
    'JS_WORKFLOWS_STATUS_CHANGED' => 'O status do Workflow foi alterado com Sucesso.',
    'VTEmailTask' => 'Enviar Mensagem',
    'VTEntityMethodTask' => 'Invocar Função Customizada',
    'VTCreateTodoTask' => 'Criar Tarefa',
    'VTCreateEventTask' => 'Criar Evento',
    'VTUpdateFieldsTask' => 'Atualizar Campos',
    'VTSMSTask' => 'Tarefa SMS', 
    'VTPushNotificationTask' => 'Notificação Push Celular',
    'VTCreateEntityTask' => 'Criar Registro',
    'LBL_EXPRESSION_INVALID' => 'Expressão Inválida'
);

