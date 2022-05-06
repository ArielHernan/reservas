<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Mesa
 * 
 * @property int $numero_mesa
 * @property int $numero_comensales
 * 
 * @property Collection|ReservasMesa[] $reservas_mesas
 *
 * @package App\Models
 */
class Mesa extends Model
{
	protected $table = 'mesas';
	protected $primaryKey = 'numero_mesa';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numero_mesa' => 'int',
		'numero_comensales' => 'int'
	];

	protected $fillable = [
		'numero_comensales'
	];

	public function reservas_mesas()
	{
		return $this->hasMany(ReservasMesa::class, 'numero_mesa');
	}
}
