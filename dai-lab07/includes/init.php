<?php
// EVITA LLAMAR MÚLTIPLES VECES AL MÉTODO START
if (session_status() === PHP_SESSION_NONE) {
    session_start([
        'cookie_httponly' => true,
        'cookie_secure' => isset($_SERVER['HTTPS']),
        'use_strict_mode' => true,
        'cookie_lifetime' => 0,
        'cache_limiter' => 'nocache',
        'name' => 'MiSesionSegura'
    ]);
}
?>