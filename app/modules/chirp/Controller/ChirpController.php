<?php

namespace App\modules\chirp\Controller;

use App\Http\Controllers\Controller;
use App\Models\Chirp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChirpController extends Controller
{

    public function create() {
        return 'create';
    }
    public function store(Request $request){
        $validated = $request->validate([
            'text' => 'required|string|max:255'
        ]);
        Chirp::create([
            'user_id' => Auth()->user()->id,
            'Chirp' => $validated['text']
        ]);
        return redirect()->route('dashboard');
    }
}
