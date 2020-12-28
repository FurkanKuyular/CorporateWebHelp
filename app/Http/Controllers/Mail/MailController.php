<?php

namespace App\Http\Controllers\Mail;

use App\Mail\Products;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MailController extends Controller
{
    /**
     * DashboardController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function sendChartMail(\Illuminate\Http\Request $request)
    {
        $products = $request->all();

        $sendMail = new Products($products);

        Mail::to(Auth::user()->email)
            ->send($sendMail);

        return redirect('home');
    }
}
