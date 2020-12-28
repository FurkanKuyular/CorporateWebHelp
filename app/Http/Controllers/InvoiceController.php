<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getChartAdmin()
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

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getChartSeller()
    {
        $drink = count(Invoice::query()->where('product_type', 'drink')->get());
        $accessory = count(Invoice::query()->where('product_type', 'Accessory')->get());
        $baofeng = count(Invoice::query()->where('product_type', 'LIKE', '%Baofeng%')->get());

        $chartjs = app()->chartjs
            ->name('pieChart')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Drink', 'Accessory', 'Boafeng'])
            ->datasets([
                [
                    'backgroundColor' => ['#452768', '#36A2EB', '#FB8D1D'],
                    'hoverBackgroundColor' => ['#452768', '#36A2EB', '#FB8D1D'],
                    'data' => [$drink, $accessory, $baofeng],
                ]
            ])
            ->options([]);

        return view('sellers.dashboard', compact('chartjs', 'drink', 'accessory', 'baofeng'));
    }
}
