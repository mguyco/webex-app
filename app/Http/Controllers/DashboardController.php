<?php
namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard');
    }
}
