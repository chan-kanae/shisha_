<?php

return [
    'credentials' => [
        'file' => base_path(env('FIREBASE_CREDENTIALS')),
        'auto_discovery' => true,
    ],
];