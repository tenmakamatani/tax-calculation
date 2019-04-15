<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaxCreateRequest;
use App\Tax;

class TaxController extends Controller
{
    public function index() {
        $taxes = Tax::orderBy('date', 'asc')->get();
        return view('index', [
            'taxes' => $taxes
        ]);
    }

    public function create(TaxCreateRequest $req) {
        $tax = new Tax;
        $tax->date = $req->date;
        $tax->percent = $req->percent;
        $tax->save();
        return redirect('/');
    }

    public function delete($id) {
        Tax::find($id)->delete();
        return redirect('/');
    }
}
