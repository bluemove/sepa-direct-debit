<?php

return [

    /*
    |--------------------------------------------------------------------------
    | SEPA Settings
    |--------------------------------------------------------------------------
    |
    | Define here your bank settings
    |
    */

    'sepa_settings' => [
        'name' => 'Bluemove',
        'IBAN' => 'NL50BANK1234567890',
        'BIC' => 'BANKNL2A',
        'batch' => true,
        'creditor_id' => '00000',
        'currency' => 'EUR',
    ]

];

