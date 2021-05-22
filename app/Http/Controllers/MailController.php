<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\SendMail;

class MailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.mail.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
           'file' => 'mimes:docx,doc,pdf,jpeg,png,jpg',
            'body' => 'required'
        ]);
        $file = $request->file('file');
        $details = [
            'body' => $request->body,
            'file' => $file,
        ];

        if($request->department) {
            $users = User::where('department_id', $request->department)->get();
            foreach ($users as $user) {
                \Mail::to($user->email)->send(new SendMail($details));
            }
        } elseif ($request->user) {
            $user = User::where('id', $request->user)->first();
            $userEmail = $user->email;
            \Mail::to($user->email)->send(new SendMail($details));

        } else {
            $users = User::all();
            foreach ($users as $user) {
                \Mail::to($user->email)->send(new SendMail($details));
            }
        }

        return redirect()->back()->with('success', 'Email sent');
    }
}
