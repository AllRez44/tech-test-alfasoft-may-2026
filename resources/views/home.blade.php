@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="p-8">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-medium capitalize">Contact list</h2>
            <a href="{{ route('contacts.create') }}">
                <div class="flex items-center space-x-2 bg-gray-700 rounded px-2 py-1.5 text-white hover:bg-gray-600">
                    <i class="fa-solid fa-plus"></i>
                </div>
            </a>
        </div>
        <br />
        <div>
            <ul>
                @foreach($contacts as $contact)
                    <a href="{{ route('contacts.show', $contact->id) }}">
                        <li class="text-lg font-medium cursor-pointer mb-1.5 bg-gray-200 p-2 rounded hover:bg-gray-300">
                                <div class="flex float-left w-8 h-8 justify-center align-center text-white bg-blue-500 rounded-full">
                                    <span class="leading-none flex self-center">{{$contact->name[0]}}</span>
                                </div>
                                <span class="leading-8 ml-2">
                                    {{ $contact->name }}
                                </span>
                        </li>
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
