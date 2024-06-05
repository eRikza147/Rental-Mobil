@extends('admin.template')
@section('title')
    Halaman Merk Mobil
@endsection
@section('content')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
      <h2
        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
      >
        Tables
      </h2>
      <!-- CTA -->
      <div class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-blue-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <svg
                class="w-5 h-5 mr-2"
                fill="currentColor"
                viewBox="0 0 20 20"
            >
                <path
                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                ></path>
            </svg>
            <span class="text-lg font-semibold text-white">Merk Data Tables</span>
        </div>
        <div>
            <a href="{{ route('tambahmerk') }}" class="text-md font-semibold text-white">Tambah Merk</a>
        </div>
      </div>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach ($merk as $i => $m)
        <div class="bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden">
          <div class="flex flex-col items-center pb-10">
            <div class="w-full h-48 flex items-center justify-center px-10 mt-4 mb-3">
              <img class="max-h-full object-contain" src="{{ asset('logo/'.$m->logo) }}" alt="Logo-Merk"/>
            </div>
            <div class="text-center">
              <h5 class="mb-2 text-xl font-medium text-gray-900 dark:text-white">{{ $m->merk }}</h5>
              <div class="flex mt-4 space-x-3">
                <a href="{{ route('editmerk', $m->id) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</a>
                <a href="{{ route('deletemerk', $m->id) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Hapus</a>
              </div>
            </div>
          </div>
        </div>        
        @endforeach     
      </div>
  </main>
@endsection