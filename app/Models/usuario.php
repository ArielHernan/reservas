<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;



class usuario extends Model implements AuthenticatableContract
{
    use HasFactory,Authenticatable;

    protected $table="usuario";
    protected $primaryKey="id_usuario";

    protected $fillable = [
        'name',
        'email',
        'password',
        'telefono',
        "perfilUser",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reservas()
	{
		return $this->hasMany(reserva::class, 'id_usuario');
	}

    // public function reser() {
    //     return $this->belongsToMany('App\Models\lienzos',"usuarios_has_lienzos","idUsu","idLie");
    // }
}
