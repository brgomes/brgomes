<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outros\Strava;

class StravaController extends Controller
{
    public function index()
    {
        return Strava::all();
    }

    public function store(Request $request)
    {
        if ($strava = Strava::create($request->all())) {
            return response(['status' => 'success', 'strava' => $strava], 200);
        }

        return response(['status' => 'error'], 500);
    }

    public function show($id)
    {
        return Strava::find($id);
    }

    public function update(Request $request, $id)
    {
        $strava = Strava::find($id);

        if ($strava->update($request->all())) {
            return response(['status' => 'success', 'strava' => $strava], 200);
        }

        return response(['status' => 'error'], 500);
    }

    public function destroy($id)
    {
        return $strava->delete($id);
    }
}
