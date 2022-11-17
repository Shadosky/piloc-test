<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    protected $connection = 'sqlite';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'estates';

    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'number',
        'street',
        'postcode',
        'city',
        'surface',
        'amount',
        'status'
    ];

    /**
     * Les proprietaires du bien
     */
    public function roles()
    {
        return $this->belongsToMany(User::class, 'users_estates');
    }

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

}
