<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$output = "";
$tables = ['data_orang_tua'];
foreach ($tables as $table) {
    $output .= "TABLE: $table\n";
    $columns = DB::select("DESCRIBE $table");
    foreach ($columns as $c) {
        $output .=  $c->Field . " - Null: " . $c->Null . " - Extra: " . $c->Extra . " - Default: " . $c->Default . "\n";
    }
    $output .= "--------------------------\n";
}
file_put_contents('schema_out_5.txt', $output);
