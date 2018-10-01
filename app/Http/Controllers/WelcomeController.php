<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class WelcomeController extends Controller
{
    public function contact(Request $request) {
        // dd($request->name);

        $data = array('nom'=>$request->name, 'email' => $request->email, 'sujet' => $request->subject, 'body' => $request->comments);
        Mail::send('emails.contact', $data, function($message) use ($request) {
            $message->to('contact@transversaldeveloppement.com', 'Transversal Developpement')
                    ->cc($request->email)
                    ->subject($request->subject);
            $message->from($request->email, $request->name);
        });

        return redirect('/?send=true');
    }
}
