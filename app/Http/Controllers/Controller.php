<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Customer;
use App\Models\Account;
use App\Models\Merk;
use App\Models\Kategori;
use App\Models\Produk;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $accountModel,
        $customerModel,
        $merkModel,
        $kategoriModel,
        $produkModel;

    public function __construct()
    {
        $this->accountModel = new Account();
        $this->customerModel = new Customer();
        $this->merkModel = new Merk();
        $this->kategoriModel = new Kategori();
        $this->produkModel = new Produk();
    }
}
