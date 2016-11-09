<?php

return [
    'webhook_url' => [
        'required' => true,
        'type'     => 'anomaly.field_type.url',
    ],
    'sender'      => [
        'required' => true,
        'type'     => 'anomaly.field_type.text',
    ],
    'channel'     => [
        'required' => true,
        'type'     => 'anomaly.field_type.text',
    ],
];
