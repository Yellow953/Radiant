<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMailer;

class ContactController extends Controller
{
    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'idea' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $image = Image::make($file);
            $image->fit(300, 300, function ($constraint) {
                $constraint->upsize();
            });
            $image->save(public_path('uploads/ideas/' . $filename));
            $path = '/uploads/ideas/' . $filename;
        }

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'idea' => $request->idea,
            'image' => $path ?? null,
        ]);

        Mail::to('joemazloum953@gmail.com')->send(new ContactMailer($request->all()));

        return redirect()->back()->with('success', 'Your Idea was successfully submitted!');
    }
}
