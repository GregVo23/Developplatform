<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\EmailContact;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class ContactController extends Controller {
    
    /**
     * Send the email.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function contact(Request $request)
    {
        $email = env('MAIL_FROM_ADDRESS');
        $rules = array(

            'name' => 'required|string|min:3',
            'texte' => 'required|min:20|max:2000',
            'email' => 'required|string|email',

        );
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return Redirect()->route('welcome')
                ->withErrors($validator);
        } else {

            $message = "Votre demande à été envoyée aux administrateurs du site, nous vous répondrons dans les plus brefs délais.";
            $title = "Message d'un membre de Developplatform";
            $name = $request->input('name');
            $texte = $request->input('texte');
            $email = ucfirst($request->input('email'));
            $mailData = [
                'title' => $title,
                'name' => $name,
                'texte' => $texte,
                'email' => $email,
            ];
    
            Mail::to($email)->send(new EmailContact($mailData));
    
            $request->session()->regenerate();
            Session::flash('success', $message);
            return redirect()->route('welcome')->with($message);
        }
    }
}