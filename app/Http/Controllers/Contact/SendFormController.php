<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\SendFormRequest;
use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendFormController extends Controller
{
    public function __invoke(SendFormRequest $request)
    {
        $data = $request->validated();

        Mail::to(auth()->user())->send(new ContactForm($data));

        return back();
    }
}
