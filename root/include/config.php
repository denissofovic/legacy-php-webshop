<?php

// --- Baza (Docker: host je ime servisa iz docker-compose.yml) ---
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'trgovina');

// --- Admin nalog za sajt ---
define('ADMIN_USER', 'admin');
define('ADMIN_PASS', 'admin');

// --- PHPMailer / Gmail SMTP ---
define('MAIL_HOST', 'smtp.gmail.com');
define('MAIL_PORT', 587);
define('MAIL_SECURE', 'tls');
define('MAIL_USER', 'APP_MAIL');
define('MAIL_PASS', 'APP_PASSWORD');
define('MAIL_FROM', 'APP_MAIL');
define('MAIL_FROM_NAME', 'AOT Computers');