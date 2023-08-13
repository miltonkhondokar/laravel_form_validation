<?php

namespace App\Http\Controllers\ajax;

use App\Http\Controllers\Controller;
use App\Models\sales\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{

    public function __construct()
    {
    }

    public function getAllSalesRecords(Request $request)
    {

          // dd($request->all());

        $data = [];

        $start_data = $request->start_data;
        $end_date   = $request->end_date;
        $user_id    = $request->user_id;

        if (!empty($start_data) && !empty($end_date) && !empty($user_id)) {

            $salesData = Sales::whereBetween('entry_at', [$start_data, $end_date])
                ->where('entry_by', $user_id)
                ->get();
        } elseif (!empty($start_data) && !empty($end_date) && empty($user_id)) {

            $salesData = Sales::whereBetween('entry_at', [$start_data, $end_date])->get();
        } elseif (empty($start_data) && empty($end_date) && !empty($user_id)) {

            $salesData = Sales::where('entry_by', $user_id)->get();
        } else {

            $salesData = Sales::get();
        }

        $totalSalesData = $salesData->count();

        if (isset($salesData) && is_countable($salesData) && count($salesData) > 0) {

            foreach ($salesData as $key => $sale) {

                $prepareData = [];

                $prepareData[] = $sale->buyer;
                $prepareData[] = $sale->phone;
                $prepareData[] = $sale->buyer_email;
                $prepareData[] = $sale->buyer_email;
                $prepareData[] = $sale->city;
                $prepareData[] = $sale->receipt_id;
                $prepareData[] = $sale->items;
                $prepareData[] = $sale->amount;
                $prepareData[] = $sale->entry_at;
                $prepareData[] = $sale->entry_by;

                $data[] = $prepareData;
            }
        }

        $json_data = array(
            "draw"            => intval($request->draw),
            "recordsTotal"    => intval($totalSalesData),
            "recordsFiltered" => intval($totalSalesData),
            "data"            => $data
        );
        echo json_encode($json_data);
    }
}
