<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
// use App\Mail\SendMail;
use Illuminate\Support\Facades\Session;
// use App\Jobs\SendMailJob;

class SendEmailController extends Controller
{
    public function index()
    {
        return view('email.send_email');
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email_pengirim' => 'required|email',
            'email' => 'required|email',
            'subject' => 'required',
            'body' => 'required',
        ]);

        $data = array(
            'name' => $request->name,
            'email_pengirim' => $request->email_pengirim,
            'email' => $request->email,
            'subject' => $request->subject,
            'body' => $request->body,
        );

        // dispatch(new SendMailJob($data));

        Mail::send('email.dynamic_email_template', $data, function ($message) use ($data) {
            $message->from($data['email_pengirim'], $data['name']);
            $message->to($data['email']);
            $message->subject($data['subject'] . ' - From ' . $data['name']);
            $message->replyTo($data['email_pengirim'], $data['name']);
        });

        toastr()->success('Email berhasil dikirim');

        return redirect()->back();
    }
}
