<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ReservasMesa
 * 
 * @property int $numero_mesa
 * @property int $numero_reserva
 * @property int $asistentes
 * 
 * @property Mesa $mesa
 * @property Reserva $reserva
 *
 * @package App\Models
 */
class ReservasMesa extends Model
{
	protected $table = 'reservas_mesas';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numero_mesa' => 'int',
		'numero_reserva' => 'int',
		'asistentes' => 'int'
	];

	protected $fillable = [
		'asistentes'
	];

	public function mesa()
	{
		return $this->belongsTo(Mesa::class, 'numero_mesa');
	}

	public function reserva()
	{
		return $this->hasOne(Reserva::class, 'id_reserva', 'numero_reserva');
	}
}
