@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
    <h1 class="text-2xl font-semibold mb-6">Nominee Dashboard</h1>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full text-left text-sm">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">Photo</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Position</th>
                    <th class="px-6 py-3">Description</th>
                    <th class="px-6 py-3">Created</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($nominees as $nominee)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        @if($nominee->photo)
                        <img src="{{ asset($nominee->photo) }}" alt="photo" class="w-12 h-12 rounded-full object-cover">
                        @else
                        <span class="text-gray-400 italic">No photo</span>
                        @endif
                    </td>

                    <td class="px-6 py-4 font-medium text-gray-800">{{ $nominee->name }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $nominee->position }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $nominee->description }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $nominee->created_at->format('Y-m-d') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection