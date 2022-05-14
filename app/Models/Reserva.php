<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reserva
 * 
 * @property int $id_reserva
 * @property int $id_usuario
 * @property int $estado
 * @property Carbon $fecha_hora_inicio
 * @property Carbon $fecha_hora_fin
 * @property int $numero_personas
 * 
 * @property User $user
 * @property Collection|Mesa[] $mesas
 *
 * @package App\Models
 */
class Reserva extends Model
{
	protected $table = 'reservas';
	protected $primaryKey = 'id_reserva';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'estado' => 'int',
		'numero_personas' => 'int'
	];

	protected $dates = [
		'fecha_hora_inicio',
		'fecha_hora_fin'
	];

	protected $fillable = [
		'id_usuario',
		'estado',
		'fecha_hora_inicio',
		'fecha_hora_fin',
		'numero_personas'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'id_usuario');
	}

	public function mesas()
	{
		return $this->belongsToMany(Mesa::class, 'reservas_mesas', 'numero_reserva', 'numero_mesa')
					->withPivot('asistentes');
	}
}
