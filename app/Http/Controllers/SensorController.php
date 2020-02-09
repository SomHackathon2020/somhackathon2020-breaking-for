<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

use App\{
    Http\Requests\CreateSensorRequest, Home, Sensor
};

class SensorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($home){
        return view('createSensor', compact('home'));
    }

    public function store(CreateSensorRequest $request, $home)
    {
        $request->createSensor($home);

        return redirect()->route('home');
    }

    public function changeState($sensor){
        //dd($sensor);
        $object = DB::table('sensor')->where('id', $sensor)->get();
        $home_id = $object[0]->home_id;
        $changedValue = ($object[0]->active == 0) ? 1 : 0;
        $result = DB::table('sensor')->where('id', $sensor)->update(['active' => $changedValue]);

        return redirect('homes/'.$home_id);
    }

    public function destroy(Sensor $sensor)
    {
        $sensor->delete();

        return redirect()->route('home');
    }
}
