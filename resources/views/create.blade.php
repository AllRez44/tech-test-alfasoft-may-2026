@extends('layouts.app')

@section('title', 'Create Contact')

@section('content')
    <div class="p-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-medium capitalize">Create Contact</h2>
            <a href="{{ route('home') }}" class="btn btn-secondary">
                <div class="flex items-center space-x-2 bg-gray-500 rounded px-3 py-1.5 text-white hover:bg-gray-400">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Back</span>
                </div>
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <strong class="font-bold">Validation Error!</strong>
                <ul class="list-disc mt-2 ml-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-lg">
            <form action="{{ route('contacts.store') }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Name
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="John Doe" value="{{ old('name') }}" required minlength="5" maxlength="255">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="john@example.com" value="{{ old('email') }}" required>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="contact">
                        Contact (9 digits)
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contact" name="contact" type="text" placeholder="123456789" value="{{ old('contact') }}" required minlength="9" maxlength="9">
                </div>

                <div class="flex items-center justify-end mt-6">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Save Contact
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
