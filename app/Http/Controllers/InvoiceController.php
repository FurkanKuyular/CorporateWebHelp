<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getChartAdmin(\Symfony\Component\HttpFoundation\Request $request)
    {
        $invoice = Invoice::query()->where('billing_type', 'INVOICE')->get();
        $order =   Invoice::query()->where('billing_type', 'ORDER')->get();

        $invoiceCount = count($invoice);
        $orderCount = count($order);

        $chartjs = app()->chartjs
            ->name('pieChart')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Invoice', 'Order'])
            ->datasets([
                [
                    'backgroundColor' => ['#452768', '#36A2EB'],
                    'hoverBackgroundColor' => ['#452768', '#36A2EB'],
                    'data' => [$invoiceCount, $orderCount],
                ]
            ])
            ->options([]);

        return view('admin.dashboard', compact('chartjs'));
    }
}
