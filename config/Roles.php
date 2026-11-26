<?php

/**
 * Permisos definidos por rol (sin tabla permissions).
 * El mismo permiso puede aparecer en varios roles.
 */
return [
    'administrador' => [
        'vehiculos.view',
        'vehiculos.create',
        'vehiculos.delete',
    ],

    'editor' => [
        'vehiculos.view',
    ],
];