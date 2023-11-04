<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'phone',
        'alamat',
        'account_id'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function profil($id)
    {
        return DB::table('customers')
            ->join('accounts', 'accounts.id', '=', 'customers.account_id')
            ->select('customers.*', 'accounts.id as idAkun', 'accounts.email as emailAkun')
            ->where('customers.id', $id)
            ->first();
    }
}
