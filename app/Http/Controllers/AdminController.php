<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Customer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $account;
    private $customer;
    public function __construct()
    {
        $this->account = new Account();
        $this->customer = new Customer();
    }
    public function dataCustomer()
    {
        return view('layout/Admin_Layout/customer', [
            'title' => "Data Customer",
            'folder'    => "Customer",
            'data'      => $this->customer->get()
        ]);
    }
}
