<?php

namespace App\modules\chirp\Controller;

use App\Events\chirpUploaded;
use App\Http\Controllers\Controller;
use App\Models\Chirp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChirpController extends Controller
{

    public function create()
    {
        return 'create';
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'text' => 'required|string|max:255'
        ]);
        $created = Chirp::create([
            'user_id' => Auth()->user()->id,
            'Chirp' => $validated['text']
        ]);
        chirpUploaded::dispatch($created->load('User'));
        return redirect()->route('dashboard');
    }
}
