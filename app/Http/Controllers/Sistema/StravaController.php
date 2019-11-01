<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Iamstuartwilson\StravaApi;
use App\Models\Outros\Strava;

class StravaController extends Controller
{
    public function index(Request $request)
    {
    	$result = apiRequest('GET', 'strava', ['query' => ['dia' => $request->dia]]);

    	if ($result->statusCode == 200) {
			return view('sistema.strava.index', (array) $result);
		}

		error($result->error);
    }

    public function callback(Request $request)
    {
    	try {
	    	$user 	= auth()->user();
	    	$api    = new StravaApi($user->strava_client_id, $user->strava_client_secret);
		    $result = $api->tokenExchange($request->code);

		    $api->setAccessToken($result->access_token, $result->refresh_token, $result->expires_at);

		    $atleta 	= $api->get('athlete');
		    $atividades = $api->get('athlete/activities', ['per_page' => 100]);
		} catch(Exception $e) {
		    print $e->getMessage();
		    die();
		}
    }
}
