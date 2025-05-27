@extends('layouts.app')

@section('title', 'Manage Nominees')

@section('header', 'Manage Nominees')

@section('content')
<div class="mb-4">
    <a href="{{ route('nominees.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font
-bold py-2 px-4 rounded">
        Add New Nominee
    </a>
</div>

@if (session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative
mb-4" role="alert">
    <span class="block sm:inline">{{ session('success') }}</span>
</div>
@endif

<div class="overflow-x-auto">
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font- semibold text-gray-700 uppercase tracking-wider">Photo</th>
                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font- semibold text-gray-700 uppercase tracking-wider">Name</th>

                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font- semibold text-gray-700 uppercase tracking-wider">Position</th>
                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font- semibold text-gray-700 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nominees as $nominee)
            <tr>
                <td class="py-2 px-4 border-b border-gray-200">
                    @if($nominee->photo)
                    <img src="{{ asset($nominee->photo) }}" alt="{{ $nominee->name }}" class="h-16

w-16 object-cover rounded-full">

                    @else
                    <div class="h-16 w-16 bg-gray-200 rounded-full flex items-center justify-center">
                        <span class="text-gray-500">No photo</span>
                    </div>
                    @endif
                </td>
                <td class="py-2 px-4 border-b border-gray-200">{{ $nominee->name }}</td>
                <td class="py-2 px-4 border-b border-gray-200">{{ $nominee->position }}</td>
                <td class="py-2 px-4 border-b border-gray-200">
                    <a href="{{ route('nominees.show', $nominee->id) }}" class="text-blue-500

hover:text-blue-700 mr-2">View</a>

                    <a href="{{ route('nominees.edit', $nominee->id) }}" class="text-green-500

hover:text-green-700 mr-2">Edit</a>
                    <form action="{{ route('nominees.destroy', $nominee->id) }}" method="POST" class="inline-block">

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700" onclick="return

confirm('Are you sure you want to delete this nominee?')">Delete</button>

                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection