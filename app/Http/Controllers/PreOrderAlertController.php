<?php

namespace App\Http\Controllers;

use App\Models\PreOrderAlert;
use App\Support\SeoMeta;
use Illuminate\View\View;

class PreOrderAlertController extends Controller
{
    public function index(): View
    {
        $preOrderAlerts = PreOrderAlert::query()
            ->orderBy('display_order')
            ->orderBy('id')
            ->get();
        $seo = SeoMeta::preOrderAlert();

        return view('pre-order-alerts.index', compact('preOrderAlerts', 'seo'));
    }
}
