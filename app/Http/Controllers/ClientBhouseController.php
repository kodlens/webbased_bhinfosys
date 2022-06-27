<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\BoardingHouse;

class ClientBhouseController extends Controller
{
    //

    public function __construct(){

    }

    public function getBhouses(Request $req){



        $key = $req->key;
        $cat = $req->category;

        if($cat == 'bhouse'){
            $data = BoardingHouse::with(['province', 'city', 'barangay'])
                ->where('bhouse_name', 'like', '%' .$key .'%')
                ->get();
        }else if($cat == 'rule'){
            $data = BoardingHouse::with(['province', 'city', 'barangay'])
                ->where('bhouse_rule', 'like', '%' . $key .'%')
                ->get();
        }else if($cat == 'amenities'){
            $data = BoardingHouse::with(['province', 'city', 'barangay'])
                ->where('amenities', 'like', '%' .$key .'%')
                ->get();
        }else if($cat == 'location'){
            $data = BoardingHouse::with(['province', 'city', 'barangay'])
                ->where('street', 'like', '%' .$key .'%')
                ->get();
        }else{
            $data = BoardingHouse::with(['province', 'city', 'barangay'])
                ->get()->take(3);
        }


        //return $req;
        $data = BoardingHouse::with(['province', 'city', 'barangay', 'amenities', 'rooms'])
            ->where('bhouse_name', 'like', '%' .$req->bhousename .'%')
            ->get();


        return $data;
    }


    public function showBhouseDetail($id){

        $data = DB::table('boarding_houses as a')
            ->join('users as b', 'a.user_id', 'b.user_id')
            ->join('provinces as c', 'a.province', 'c.provCode')
            ->join('cities as d', 'a.city', 'd.citymunCode')
            ->join('barangays as e', 'a.barangay', 'e.brgyCode')
            ->where('a.bhouse_id', $id)
            ->select('a.*', 'b.lname', 'b.fname', 'b.mname', 'b.contact_no', 'c.*', 'd.*', 'e.*')
            ->get();

            //return $data;

        //$data = BoardingHouse::find($id);
        return view('client-bhouse-detail')->with('id', $id)
            ->with('data', $data);
    }

    public function getBhouseDetail($id){
        $data = DB::table('boarding_houses as a')
            ->join('users as b', 'a.user_id', 'b.user_id')
            ->join('provinces as c', 'a.province', 'c.provCode')
            ->join('cities as d', 'a.city', 'd.citymunCode')
            ->join('barangays as e', 'a.barangay', 'e.brgyCode')
            ->where('a.bhouse_id', $id)
            ->select('a.*', 'b.lname', 'b.fname', 'b.mname', 'b.contact_no', 'c.*', 'd.*', 'e.*')
            ->get();
        return $data[0];
    }
}
