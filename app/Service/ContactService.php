<?php

namespace App\Service;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactService
{
    /**
     * @return Contact[]
     */
    public static function index(): array
    {
        return Contact::all()->all();
    }

    public static function show(int $id): ?Contact
    {
        return Contact::find($id);
    }

    public static function store(StoreContactRequest $request): Contact
    {
        $validated = $request->validate();
        return Contact::create($validated);
    }

    /**
     * @throws \HttpException
     */
    public static function update(StoreContactRequest $request, int $id): Contact
    {
        $contact = self::find($id);
        $validated = $request->validate();
        $contact->update($validated);
        return $contact;
    }

    public static function delete(int $id): void
    {
        $contact = self::find($id);
        $contact->delete();
    }

    /**
     * @throws \HttpException
     */
    protected static function find(int $id): ?Contact
    {
        $contact = Contact::find($id);
        if (!$contact) {
            throw new \HttpException('Contact not found');
        }
        return $contact;
    }
}
