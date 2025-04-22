<?php

namespace Modules\Dossier\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Modules\Dossier\Emails\ContactMeMail;
use Modules\Dossier\Http\Requests\ContactRequest;

class EmailController extends Controller
{

    public function send(ContactRequest $request)
    {
        try {

            $this->sendEmal($request->all());

            return response()->json([
                'status' => 200,
                'message' => 'Your message has been sent successfully!'
            ], 200);
        } catch (\Exception $e) {
            Log::error('Mail sending failed: ' . $e->getMessage());

            return response()->json([
                'status' => 500,
                'message' => 'Email could not be sent. Error: ' . $e->getMessage()
            ], 500);
        }
    }

    private function sendEmal($data)
    {
        Mail::to('hmzah.liaqat@gmail.com')->send(new ContactMeMail($data));
    }

}
