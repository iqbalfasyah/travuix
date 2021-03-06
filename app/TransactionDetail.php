<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'transactions_id',
        'username',
        'nationality',
        'is_visa',
        'doe_passport',
    ];

    protected $hidden = [];

    public function Transaction()
    {
        return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
    }
}
