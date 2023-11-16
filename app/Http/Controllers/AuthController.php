<?php

namespace App\Http\Controllers;

use Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Authenticatable;

class AuthController extends Controller
{
    public function login()
    {
        // session(['url.intended' => url()->previous()]);

        return view('layout/login');
    }
    public function register()
    {
        return view('layout/register');
    }

    public function store(Request $request)
    {
        $account = $request->validate([
            'email'     => 'required|unique:accounts|email:dns',
            'password'  => 'required|min:8',
            'role_id'   => 'required',
            'aktivasi'  => 'required'
        ]);

        $account['password'] = bcrypt($account['password']);
        $customer = $request->validate([
            'name'      => 'required|max:255',
        ]);
        $insertedAccount = $this->accountModel::create($account);
        if ($insertedAccount) {
            $customer['account_id'] = $insertedAccount->id;
            $customer['nama'] = $request->name;
            $customer['phone'] = "";
            $customer['alamat'] = "";

            $insertedCustomer = $this->customerModel::create($customer);
            if ($insertedCustomer) {
                $request->session()->flash('success', 'Registrasi Berhasil, silahkan Login');
                return redirect('/login');
            }
            $request->session()->flash('error', 'Registrasi Gagal, silahkan Ulangi beberapa saat lagi');
            return redirect('/register');
        }
    }

    public function authentikasi(Request $request)
    {

        $cred = $request->validate([
            'email'     => 'required|email:dns',
            'password'  => 'required'
        ]);
        $user = $this->accountModel::where('email', $cred['email'])->first();
        if ($user && password_verify($cred['password'], $user->password)) {
            if (Auth::attempt($cred)) {
                $dataAkun = $this->accountModel->getAdminLoginData($user->id);
                if ($user->role_id != 1) {
                    $dataAkun = $this->accountModel->getCustomerLoginData($user->id);
                }
                $request->session()->put('data', $dataAkun);
                $request->session()->regenerate();
                if ($user->role_id != 1) {
                    if (!session()->get('onBuy')) {
                        return redirect()->intended('/');
                    }
                    // return redirect()->to(session()->get('url.intended'));
                    return redirect()->intended('/');
                }
                return redirect()->intended('/dashboard');
            }
        }
        return back()->with('error', 'Email atau Password Salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flash('success', 'Anda Telah Logout');
        return redirect('/');
    }
}
