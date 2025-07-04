@echo off

php artisan migrate --path=/database/migrations/2014_10_12_000000_create_users_table.php
php artisan migrate --path=/database/migrations/2014_10_12_100000_create_password_resets_table.php
php artisan migrate --path=/database/migrations/2019_08_19_000000_create_failed_jobs_table.php
php artisan migrate --path=/database/migrations/2019_12_14_000001_create_personal_access_tokens_table.php
php artisan migrate --path=/database/migrations/2024_06_26_095038_create_experts_table.php
php artisan migrate --path=/database/migrations/2024_06_26_133953_create_data_penyakits_table.php
php artisan migrate --path=/database/migrations/2024_06_26_134107_create_data_gejalas_table.php
php artisan migrate --path=/database/migrations/2024_06_29_135511_create_data_solusis_table.php
php artisan migrate --path=/database/migrations/2024_06_29_161329_create_rules_table.php
php artisan migrate --path=/database/migrations/2024_06_29_163835_create_pasiens_table.php
php artisan migrate --path=/database/migrations/2024_06_29_163301_create_diagnoses_table.php
php artisan migrate --path=/database/migrations/2024_06_29_163301_create_diagnoses_table.php