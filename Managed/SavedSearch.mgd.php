<?php

use CRM_Paymentsearch_ExtensionUtil as E;

return [
  [
    'name' => 'Payment search',
    'entity' => 'SavedSearch',
    'cleanup' => 'never',
    'update' => 'never',
    'params' => [
      'version' => 4,
      'checkPermissions' => FALSE,
      'values' => [
        'name' => 'Payment search',
        'label' => 'Payment search',
        'description' => E::ts('Payment search'),
        'api_entity' => 'Contribution',
        'api_params' => [
          'version' => 4,
          'select' => [
            'id',
            'contact_id.display_name',
            'Contribution_EntityFinancialTrxn_FinancialTrxn_01.check_number',
            'Contribution_EntityFinancialTrxn_FinancialTrxn_01.trxn_id',
            'Contribution_EntityFinancialTrxn_FinancialTrxn_01.payment_instrument_id:label',
            'Contribution_EntityFinancialTrxn_FinancialTrxn_01.total_amount',
            'Contribution_EntityFinancialTrxn_FinancialTrxn_01.payment_processor_id:label',
          ],
          'join' => [
            [
              'FinancialTrxn AS Contribution_EntityFinancialTrxn_FinancialTrxn_01',
              'INNER',
              'EntityFinancialTrxn',
              [
                'id',
                '=',
                'Contribution_EntityFinancialTrxn_FinancialTrxn_01.entity_id',
              ],
              [
                'Contribution_EntityFinancialTrxn_FinancialTrxn_01.entity_table',
                '=',
                "'civicrm_contribution'",
              ],
              [
                'Contribution_EntityFinancialTrxn_FinancialTrxn_01.is_payment',
                '=',
                TRUE,
              ],
            ],
          ],
        ],
      ],
      'chain' => [
        'search_display' => [
          'SearchDisplay',
          'create',
          [
            'values' => [
              'name' => 'Payments',
              'label' => 'Payments',
              'saved_search_id' => '$id',
              'type' => 'table',
              'settings' => [
                'limit' => 50,
                'pager' => TRUE,
                'classes' => [
                  'table-striped',
                  'table-bordered',
                  'table',
                ],
                'columns' => [
                  [
                    'key' => 'id',
                    'label' => E::ts('Contribution ID'),
                    'dataType' => 'Integer',
                    'type' => 'field',
                    'title' => 'View Contribution',
                    'link' => [
                      'path' => 'civicrm\/contact\/view\/contribution?reset=1&action=view&id=[id]',
                      'target' => 'crm-popup',
                    ],
                  ],
                  [
                    'key' => 'contact_id.display_name',
                    'label' => E::ts('Contact Name'),
                    'dataType' => 'String',
                    'type' => 'field',
                    'link' => [
                      'path' => 'civicrm\/contact\/view?reset=1&cid=[contact_id]',
                      'title' => 'View Contact',
                    ],
                  ],
                  [
                    'key' => 'Contribution_EntityFinancialTrxn_FinancialTrxn_01.trxn_date',
                    'label' => E::ts('Date'),
                    'dataType' => 'String',
                    'type' => 'field',
                  ],
                  [
                    'key' => 'Contribution_EntityFinancialTrxn_FinancialTrxn_01.check_number',
                    'label' => E::ts('Check Number'),
                    'dataType' => 'String',
                    'type' => 'field',
                  ],
                  [
                    'key' => 'Contribution_EntityFinancialTrxn_FinancialTrxn_01.trxn_id',
                    'label' => E::ts('Transaction ID'),
                    'dataType' => 'String',
                    'type' => 'field',
                  ],
                  [
                    'key' => 'Contribution_EntityFinancialTrxn_FinancialTrxn_01.payment_instrument_id:label',
                    'label' => E::ts('Payment Method'),
                    'dataType' => 'Integer',
                    'type' => 'field',
                  ],
                  [
                    'key' => 'Contribution_EntityFinancialTrxn_FinancialTrxn_01.total_amount',
                    'label' => E::ts('Amount'),
                    'dataType' => 'Money',
                    'type' => 'field',
                  ],
                  [
                    'key' => 'Contribution_EntityFinancialTrxn_FinancialTrxn_01.payment_processor_id:label',
                    'label' => E::ts('Payment Processor'),
                    'dataType' => 'Integer',
                    'type' => 'field',
                  ],
                ],
              ],
            ],
          ],
        ],
      ],
    ],
  ],
];

