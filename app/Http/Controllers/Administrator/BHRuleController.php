<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\BoardingHouseRule;
use Illuminate\Http\Request;

class BHRuleController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');

    }

    public function index(){
        return view('administrator.bh-rules');
    }

    public function getBhRules(Request $req){
        return BoardingHouseRule::with(['bhouse'])->paginate($req->perpage);

    }


}
