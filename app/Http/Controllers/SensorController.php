<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class SensorController extends Controller
{
    //

    public function changeState($sensor){
        //dd($sensor);
        $object = DB::table('sensor')->where('id', $sensor)->get();
        $home_id = $object[0]->home_id;
        $changedValue = ($object[0]->active == 0) ? 1 : 0;
        $result = DB::table('sensor')->where('id', $sensor)->update(['active' => $changedValue]);

        return redirect('homes/'.$home_id);
    }
}
