@extends('admin.template')
@section('title')
    Halaman Dashboard Admin
@endsection
@section('content')
<main class="h-full overflow-y-auto">
    <br>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <div class="container px-6 mx-auto grid">
        <!-- CTA -->
        <div class="flex items-center justify-between p-4 text-sm font-semibold text-white bg-blue-600 rounded-lg shadow-md focus:outline-none" href="https://github.com/estevanmaito/windmill-dashboard">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
                <span class="text-lg">Cocokost selalu Dihati</span>
            </div>
        </div>

        <div id="controls-carousel" class="relative w-full mt-6" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Carousel items -->
                @foreach ($harga as $i => $a)
                <div class="hidden duration-700 ease-in-out flex items-center justify-center" data-carousel-item>
                  
                  <div class="bg-white border w-full h-full flex justify-between item-center border-gray-200 rounded-lg shadow-lg overflow-hidden">
                    <div class="flex flex-col items-center pb-2 w-screen h-auto mt-8 ml-6">
                      <div class="w-auto h-72 flex items-center justify-center px-14 mt-6 mb-3 mx-2">
                        <img  class="w-auto h-full rounded-md object-contain px-10" src="{{ asset('foto_mobil/'.$a->foto_mobil) }}" alt="Logo-Merk"/>
                      </div>
                    </div>
                    <div class="justify-end w-96 mx-14 mt-8">
                        <h5 class="text-lg font-medium font-semibold text-gray-900 dark:text-white">{{ $a->merk }}</h5>
                        <h5 class="mb-2 text-2xl font-medium text-gray-900 dark:text-white">{{ $a->model }} <span class="text-xs text-gray-500">{{ $a->warna }}</span></h5>
                        <p class="mb-3 text-md">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis consequatur, soluta id eum, dolore ipsa excepturi voluptate nihil laudantium suscipit cum accusamus ex dignissimos dolor deleniti, tenetur repellendus error possimus.</p>
                        <div class="my-4 w-36 h-14 flex items-center justify-center rounded-md border-gray-900 border-2 bg-gray-200">
                            <div class="w-32 h-10 flex items-center justify-center rounded-sm bg-white border-2">
                                <h5 class="font-bold text-gray-900 text-md">{{ $a->plat }}</h5>
                            </div>
                        </div>
                        <div class="flex items-center justify-start">
                            <h5 class="font-semibold text-gray-700 text-md">Harga Sewa Rp. <span class="text-blue-600">{{ $a->harga }}</span> /hari</h5>
                            <div class="flex items-center justify-center">
                                <a href="{{ route('editmerk', $a->id) }}" class="inline-flex mx-4  items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sewa</a>
                            </div>
                        </div>
                    </div>
                    <div class="w-20"></div>
                </div> 
                 
                </div>
                @endforeach 
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-300 dark:bg-gray-700 group-hover:bg-gray-400 dark:group-hover:bg-gray-600 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-gray-600 dark:text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-300 dark:bg-gray-700 group-hover:bg-gray-400 dark:group-hover:bg-gray-600 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-gray-600 dark:text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
        
        
        
        
        
        
    
    </div>
</main>
@endsection