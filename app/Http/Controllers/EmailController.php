<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Success;
use App\CalonMagang;
use Illuminate\Support\Facades\Mail;
use Validator;

class EmailController extends Controller
{
    public function create()
    {
        return view('news-letter-view');
    }

      public function store(Request $request)
    {
        $this->validate($request, [
            'email'=>'required|distinct'
        ]);
        $newsletter = new CalonMagang();
        $newsletter->email = $request->input('email');
        if ($newsletter->save())
        {
            Mail::send('emails.success', ['email' => $newsletter->email], function ($message)
            {
                $message->from('revinaaniver@gmail.com', 'Goodness Kayode');
                $message->to('revinaaniver@gmail.com');
            });
            return redirect()->back()->with('alert','You have successfully applied for our Newsletter');
        }else{
            return redirect()->back()->withErrors($validator);
        }
    }

    public function autoMail(Request $request)
    {
        $this->validate($request, [
            'email'=>'required|distinct'
        ]);
        $newsletter = new CalonMagang();
        $newsletter->email = $request->input('email');
         if ($newsletter->save())
        {
            Mail::to($newsletter->email)->send(new Success($newsletter));
            return redirect()->back()->with('alert','You have successfully applied for our Newsletter');
        }else{
            return redirect()->back()->withErrors($validator);
        }
    }
}

