<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaxCreateRequest;
use App\Http\Requests\TaxCalculateRequest;
use App\Tax;
use DateTime;

class TaxController extends Controller
{
    public function index() {
        $taxes = Tax::orderBy('date', 'asc')->get();
        return view('index', [
            'taxes' => $taxes,
            'result' => ""
        ]);
    }

    public function create(TaxCreateRequest $req) {
        $item = Tax::where('date', $req->date_create)->first();
        if ($item != null) {
            $item->percent = $req->percent;
            $item->save();
            return redirect('/');
        } else {
            $tax = new Tax;
            $tax->date = $req->date_create;
            $tax->percent = $req->percent;
            $tax->save();
            return redirect('/');
        }
    }

    public function delete($id) {
        Tax::find($id)->delete();
        return redirect('/')->withInput();
    }

    public function calculate(TaxCalculateRequest $req) {
        $taxes = Tax::orderBy('date', 'asc')->get();
        $date = new DateTime($req->date_calculate);
        $items = Tax::where('date', '<=', $date)->get();
        $tax = $items[0];
        foreach ($items as $item) {
            if ($tax->date < $item->date) {
                $tax = $item;
            }
        }
        $result = round($req->money*(1+$tax->percent/100));
        return view('index', [
            'taxes' => $taxes,
            'result' => $result,
            'money' => $req->money,
            'date' => $req->date_calculate,
        ]);
    }
}
