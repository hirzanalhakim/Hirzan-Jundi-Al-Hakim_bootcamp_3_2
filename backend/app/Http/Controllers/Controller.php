<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function booking(Request $request){

        //Transaction berguna ketika kita mempunyai banyak input fungsi ini berguna untuk melakukan
        //RollBack apabila ada input yang gagal, dengan menggunakan fungsi DB::rollBack() dibawah
        // Jadi Transaction mempunyain 3 fungsi, yaitu DB::beginTransaction(), DB::commit(), dan DB::rollBack();
        DB::beginTransaction();

        try{
            $this->validate($request, [
            'id_kamar' => 'required',
            'id_customer' => 'required'
            ]);

            $kamar = $request->input('id_kamar');
            $customer = $request->input('id_customer');
            $status = 2;

            $add = DB::insert('insert into sewa (id_kamar, id_customer, id_status_sewa ) values (?, ?, ?)', [$kamar, $customer, $status]);
            $roomlist = DB::select('select * from sewa');
            DB::commit(); // data tidak akan di insert sebelum di commit
            return response()->json($roomlist, 200);
        }
        catch(\Exception $e){

            DB::rollback(); //untuk rollback data ketika data yang dimasukkan mengalami kegagalan
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }
}
