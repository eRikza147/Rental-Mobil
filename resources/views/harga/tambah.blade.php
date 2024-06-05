@extends('admin.template')
@section('title')
    Tambah Daftar Harga
@endsection
@section('content')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
      <h2
        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
      >
        Forms
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
            <span class="text-lg font-semibold text-white">Form Daftar Harga</span>
        </div>
      </div>
      <div
        class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
      >
      <form action="{{ route('saveharga') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Merk</span>
            <select name="model" id="carSelect" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option value="">Pilih Model Mobil</option>
                @foreach ($car as $i => $a)
                    <option value="{{ $a->id }}" data-img-src="{{ asset('foto_mobil/'.$a->foto_mobil) }}">{{ $a->model }}</option>
                @endforeach
            </select>
            
            <div class="w-full h-auto flex items-center justify-center px-2 mt-4">
                <img 
                    id="carImage"
                    class="max-w-full max-h-full rounded-md shadow-lg object-contain"
                    style="max-width: 50%; max-height: 50%;"
                    src=""
                />
            </div>
          </label>

        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Nomor Plat</span>
          <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Nomor Plat Mobil"
            type="text"
            name="plat"
          />
        </label>
        <br>
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Harga Sewa /hari</span>
            <input
              class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
              placeholder="Harga Sewa Mobil /Hari"
              type="text"
              name="harga"
            />
        </label>
          <br>
        <div class="flex items-center">
          <div>
          <button
          class=" px-4 py-2 text-md font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple"
          type="submit"
          >
            Simpan
        </button>
      </div>
      <div class="px-4">
        <a
          class=" px-4 py-2 text-md font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple"
          href="{{ route('harga') }}"
          >
            Batal
        </a>
      </div>  
        </div>
        
      </form>
    </div>
</main>
@endsection