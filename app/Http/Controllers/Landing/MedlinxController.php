<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MedlinxController extends Controller
{
    public function index(){
        return view('medlinx.landing.app');
    }

    public function sendMessage(Request $req){
        if (is_null($req->subject)) {
            $subject = 'Umum - '.$req->type;
            $to = 'customercare@medlinx.co.id';
        }else{
            $subject = 'Solusi - '.$req->subject;
            $to = 'sales@medlinx.co.id';
        }

        try {
            Mail::send('mail.template', ['data' => $req], function ($message) use ($req, $to, $subject) {
                $message->subject($subject);
                $message->from(env('MAIL_USERNAME'), env('MAIL_ALIAS'));
                $message->to($to);
            });

            $ret = [
                'status' => true,
                'message' => 'success',
            ];

        } catch (\Exception $e) {
            $ret = [
                'status' => false,
                'message' => $e->getMessage(),
            ];
        }

        return response()->json($ret);
    }
}
