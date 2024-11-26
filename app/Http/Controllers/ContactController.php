<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::all();
        return view('contacts', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newContact = new Contact();

        $newContact->nama = $request['nama'];
        $newContact->alamat = $request['alamat'];
        $newContact->telepon = $request['telepon'];
        $newContact->email = $request['email'];
        $newContact->lahir = $request['lahir'];

        $newContact->save();

        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kontak =  Contact::find($id);
        return view('contacts-edit', compact('kontak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kontak = Contact::find($id);

        $kontak->nama = $request['nama'];
        $kontak->alamat = $request['alamat'];
        $kontak->telepon = $request['telepon'];
        $kontak->email = $request['email'];
        $kontak->lahir = $request['lahir'];

        $kontak->save();

        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kontak = Contact::find($id);
        $kontak->delete();
        return redirect()->route('contacts.index');
    }
}
