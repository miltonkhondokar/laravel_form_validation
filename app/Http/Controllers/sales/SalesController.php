<?php

namespace App\Http\Controllers\sales;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalesTrackerRequest;
use App\Models\sales\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sales-tracker.index');
    }

    /**
     * Display a listing of all the sales.
     */
    public function salesList(Request $request)
    {
        // $allSalesInfo = Sales::get();
        // return view('admin.sales-tracker.all-sales', ['data' => $allSalesInfo]);
        return view('admin.sales-tracker.all-sales');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.sales-tracker.create-sales');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SalesTrackerRequest $request)
    {

        date_default_timezone_set('Asia/Dhaka');


        if (!isset($_COOKIE["form_submit_status"])) {


            if (!empty($_POST['buyer'] && $_POST['phone'] && $_POST['buyer_email']) && $_POST['receipt_id']) {

                setcookie('form_submit_status', 1, time() + (24*60*60*1000));

                $salt = 'U7Dnb0dx2F18ANz3q4Ou5lfSpyVXjLirhMQ6ZKEatwe9vIgGcmoWHsYRCkBJPT';


                $entry_by    = $request->entry_by;
                $buyer       = $request->buyer;
                $phone       = $request->phone;
                $buyer_email = $request->buyer_email;
                $city        = $request->city;
                $receipt_id  = $request->receipt_id;
                $amount      = $request->amount;
                $note        = $request->note;


                $ipaddress = '';
                if (isset($_SERVER['HTTP_CLIENT_IP'])) {
                    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
                } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
                } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
                    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
                } else if (isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
                    $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
                } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
                    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
                } else if (isset($_SERVER['HTTP_FORWARDED'])) {
                    $ipaddress = $_SERVER['HTTP_FORWARDED'];
                } else if (isset($_SERVER['REMOTE_ADDR'])) {
                    $ipaddress = '127.0.0.1';
                } else {
                    $ipaddress = 'UNKNOWN';
                }

                $data = array(
                    'entry_by'    => $entry_by,
                    'buyer'       => $buyer,
                    'buyer_ip'    => $ipaddress,
                    'phone'       => (!empty($phone)) ? '880' . $phone : '',
                    'buyer_email' => $buyer_email,
                    'city'        => $city,
                    'receipt_id'  => $receipt_id,
                    'amount'      => $amount,
                    'note'        => $note,
                    'items'       => implode(", ", array_values($_POST['items'])),
                    'hash_key'    => hash("sha512", $salt . $receipt_id),
                    'entry_at'    => date("Y-m-d"),
                );

                $insert_data =  Sales::insert($data);
                echo 'y';
            } else {
                echo 'e';
            }
        } else {
            echo "n";
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
