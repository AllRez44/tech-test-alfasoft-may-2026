<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Service\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = ContactService::index();
        return view('home', [
            'contacts' => $contacts,
        ]);
    }

    public function storeView()
    {
        return view('create');
    }

    public function store(StoreContactRequest $request)
    {
        ContactService::store($request);
        return redirect()->route('home')->with('success', 'Contact created successfully.');
    }

    public function show(int $id)
    {
        try {
            $contact = ContactService::show($id);
            return view('show', compact('contact'));
        } catch (\Exception) {
            return redirect()->route('home')->with('error', 'Contact not found.');
        }
    }

    public function updateView(int $id)
    {
        try {
            $contact = ContactService::show($id);
            return view('edit', compact('contact'));
        } catch (\Exception) {
            return redirect()->route('home')->with('error', 'Contact not found.');
        }
    }

    public function update(StoreContactRequest $request, int $id)
    {
        ContactService::update($request, $id);
        return redirect()->route('home')->with('success', 'Contact updated successfully.');
    }

    public function delete(int $id)
    {
        ContactService::delete($id);
        return redirect()->route('home')->with('success', 'Contact deleted successfully.');
    }
}
