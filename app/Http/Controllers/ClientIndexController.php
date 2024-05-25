<?php

namespace App\Http\Controllers;

class ClientIndexController extends Controller {
    public function clientIndex() {
        return view("/client-index");
    }
}
