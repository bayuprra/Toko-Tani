<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Account extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'email',
        'password',
        'role_id',
        'aktivasi'
    ];
    protected $appends = ['role'];
    protected $hidden = [
        'password',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function getAdminLoginData($account_id)
    {
        return DB::table('accounts')
            ->join('roles', 'accounts.role_id', '=', 'roles.id')
            ->select('accounts.id', 'accounts.email', 'accounts.role_id', 'roles.nama as nama_role')
            ->where('accounts.id', $account_id)
            ->first();
    }

    public function getCustomerLoginData($account_id)
    {
        return DB::table('accounts')
            ->join('roles', 'accounts.role_id', '=', 'roles.id')
            ->join('customers', 'accounts.id', '=', 'customers.account_id')
            ->select('accounts.id', 'accounts.email', 'accounts.aktivasi', 'accounts.role_id', 'roles.nama as nama_role', 'customers.id as id_customer', 'customers.nama as nama_customer', 'customers.phone as phone_customer', 'customers.alamat as alamat_customer')
            ->where('accounts.id', $account_id)
            ->first();
    }
}
