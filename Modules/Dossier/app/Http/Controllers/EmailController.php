<?php

namespace Modules\Dossier\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Modules\Dossier\Emails\ContactMeMail;

class EmailController extends Controller
{

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $data = $request->all();

        Mail::to('hmzah.liaqat@gmail.com')->send(new ContactMeMail($data));

        return response()->json([
            'status' => JsonResponse::HTTP_OK,
            'message' => 'Your message has been sent successfully!'
        ] , JsonResponse::HTTP_OK);

    }

}
