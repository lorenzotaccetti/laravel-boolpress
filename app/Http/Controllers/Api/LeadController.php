<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lead;
use Illuminate\Support\Facades\Validator;
use App\Mail\NewContactMail;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request){

        $form_data = $request->all();

        $validator = Validator::make($form_data, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'message' => 'required|max:60000'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $new_lead = new Lead();
        $new_lead->fill($form_data);
        $new_lead->save();

        Mail::to('customerservice@boolpress.it')->send(new NewContactMail($new_lead));

        return response()->json([
            'success' => true,
        ]);
    }
}
