<?php

namespace Shumonpal\LaravelAppTracker\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class LicenceKeyUser
 * @package Shumonpal\LaravelAppTracker\Models
 * @version December 8, 2024, 3:24 am UTC
 *
 * @property string $licence_key
 * @property string $domain
 * @property integer $status
 */
class LicenceKeyUser extends Model
{
    public $table = 'shumonpal_licence_key_users';
    

    public $fillable = [
        'licence_key',
        'domain',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'licence_key' => 'string',
        'domain' => 'string',
        'status' => 'integer'
    ];


    
}
