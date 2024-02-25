<?php

use App\crm\customer\service\export\jsonExport;
use App\crm\customer\service\export\pdfExport;
use App\crm\customer\service\export\htmlExport;

return [
    'exporter'=>[
        'json'=>jsonExport::class,
        'html'=>htmlExport::class,
        'pdf'=>pdfExport::class,
    ]
];
