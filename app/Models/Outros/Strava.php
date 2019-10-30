<?php

namespace App\Models\Outros;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Strava extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

	protected $table 	= 'strava';
    protected $fillable = [
    	'athlete_id', 'resource_state', 'name', 'distance', 'moving_time', 'elapsed_time',
    	'total_elevation_gain', 'type', 'workout_type', 'external_id', 'start_date',
    	'start_date_local', 'timezone', 'location_city', 'location_state',
    	'location_country', 'start_latitude', 'start_longitude', 'trainer', 'commute',
    	'manual', 'private', 'flagged', 'average_speed', 'max_speed'
    ];

    public $timestamps = false;
}
