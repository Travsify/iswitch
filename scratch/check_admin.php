<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$u = User::where('email', 'admin@iswitch.com')->first();
if ($u) {
    echo "USER FOUND. Password check: " . (Hash::check('GodMode2026!', $u->password) ? 'YES' : 'NO') . "\n";
} else {
    echo "USER NOT FOUND.\n";
}
