<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $connection = 'sqlite';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'firstname',
        'name',
        'email',
        'password',
        'admin',
        'landlord'
    ];

    /**
     * Les biens de l'utilisateur
     */
    public function roles()
    {
        return $this->belongsToMany(Estate::class, 'users_estates');
    }

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

}
