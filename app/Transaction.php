<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaction
 *
 * @property $id
 * @property $AccountNumber
 * @property $amount
 * @property $type
 * @property $created_at
 * @property $updated_at
 *
 * @property account $account
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Transaction extends Model
{
    
    static $rules = [
		'AccountNumber' => 'required',
		'amount' => 'required',
		'type' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['AccountNumber','amount','type'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function account()
    {
        return $this->hasOne('App\account', 'AccountNumber', 'AccountNumber');
    }
    

}
