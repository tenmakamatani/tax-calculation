<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaxCreateRequest;

class TaxController extends Controller
{
    public function create(TaxCreateRequest $req) {
        return redirect('/');
    }
}
