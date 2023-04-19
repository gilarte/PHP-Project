<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class account
 *
 * @property $AccountNumber
 * @property $balance
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Transaction[] $transactions
 * @property user $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Account extends Model
{
    protected $primaryKey = 'AccountNumber';
    static $rules = [
		'AccountNumber' => 'required',
		'balance' => 'required',
		'user_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['AccountNumber','balance','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Transaction', 'AccountNumber', 'AccountNumber');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\user', 'id', 'user_id');
    }
    

}
