@extends('layouts.app')

@section('title', 'View Contact')

@section('content')
    <div class="p-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-medium capitalize">Contact Details</h2>
            <div class="flex space-x-2">
                <a href="{{ route('home') }}" class="btn btn-secondary">
                    <div class="flex items-center space-x-2 bg-gray-500 rounded px-3 py-1.5 text-white hover:bg-gray-400">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>Back</span>
                    </div>
                </a>
                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary">
                    <div class="flex items-center space-x-2 bg-blue-500 rounded px-3 py-1.5 text-white hover:bg-blue-400">
                        <i class="fa-solid fa-pen"></i>
                        <span>Edit</span>
                    </div>
                </a>
            </div>
        </div>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-lg">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <p class="text-gray-900 text-lg">{{ $contact->name }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <p class="text-gray-900 text-lg">
                    <a href="mailto:{{ $contact->email }}" class="text-blue-500 hover:underline">{{ $contact->email }}</a>
                </p>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Contact</label>
                <p class="text-gray-900 text-lg">{{ $contact->contact }}</p>
            </div>
        </div>
    </div>
@endsection
