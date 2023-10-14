<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DatabaseTestController extends Controller
{
    public function testConnection()
    {
        try {
            DB::connection()->getPdo();
            return response()->json(['success' => true, 'message' => 'Database connection is successful.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Could not connect to the database.', 'error' => $e->getMessage()], 500);
        }
    }
}
