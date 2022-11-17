<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Estate extends Model
{
    use SoftDeletes;

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
    public function users()
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
