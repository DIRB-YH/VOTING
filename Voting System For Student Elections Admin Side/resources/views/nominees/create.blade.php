@extends('layouts.app')

@section('title', 'Add New Nominee')

@section('header', 'Add New Nominee')

@section('content')
<form action="{{ route('nominees.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" name="name" id="name" required class="mt-1 block w-full rounded-md
border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
    </div>

    <div>
        <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
        <input type="text" name="position" id="position" required class="mt-1 block w-full
rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray- 700">Description</label>
        <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded- md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
    </div>

    <div>
        <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
        <input type="file" name="photo" id="photo" class="mt-1 block w-full text-sm text-gray-500
file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue
-50 file:text-blue-700 hover:file:bg-blue-100">
    </div>

    <div class="flex items-center justify-end">

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px- 4 rounded">
            Save Nominee
        </button>
    </div>
</form>
@endsection