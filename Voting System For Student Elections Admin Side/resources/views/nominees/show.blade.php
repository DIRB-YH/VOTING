@extends('layouts.app')

@section('title', 'View Nominee')

@section('header', 'Nominee Details')

@section('content')
<div class="bg-white shadow overflow-hidden sm:rounded-lg">

    <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{ $nominee->name }}
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Running for: {{ $nominee->position }}
            </p>
        </div>
        <div>
            <a href="{{ route('nominees.edit', $nominee->id) }}" class="text-green-600 hover:text- green-900 mr-4">Edit</a>
            <form action="{{ route('nominees.destroy', $nominee->id) }}" method="POST" class="inline-block">

                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return

confirm('Are you sure you want to delete this nominee?')">Delete</button>
            </form>
        </div>
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
        <dl class="sm:divide-y sm:divide-gray-200">
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Photo
                </dt>

                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    @if($nominee->photo)
                    <img src="{{ asset($nominee->photo) }}" alt="{{ $nominee->name }}" class="h-32

w-32 object-cover rounded">

                    @else
                    <div class="h-32 w-32 bg-gray-200 rounded flex items-center justify-center">
                        <span class="text-gray-500">No photo available</span>
                    </div>
                    @endif
                </dd>
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Name
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $nominee->name }}
                </dd>
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Position
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $nominee->position }}
                </dd>

            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Description
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $nominee->description ?? 'No description provided' }}
                </dd>
            </div>
        </dl>
    </div>
</div>
<div class="mt-5">
    <a href="{{ route('nominees.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font- bold py-2 px-4 rounded">
        Back to All Nominees
    </a>
</div>
@endsection