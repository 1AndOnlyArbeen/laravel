<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Upload</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-emerald-50 via-white to-amber-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md mx-auto">
        <div class="bg-white rounded-3xl shadow-2xl p-8">
            <div class="text-center mb-8">
                <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl shadow-lg mx-auto flex items-center justify-center mb-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Upload File</h2>
                <p class="text-gray-600 mt-2">Drag and drop your file here</p>
            </div>

            <form action="{{ route('fileupload.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                @if(session('success'))
                    <div class="mb-4 p-4 bg-emerald-100 border border-emerald-400 text-emerald-700 rounded-xl">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="border-2 border-dashed border-gray-200 rounded-2xl p-8 text-center hover:border-emerald-400 transition-colors cursor-pointer">
                    <input type="file" id="file" name="photo" class="hidden" accept="image/*" />
                    <div id="fileError" class="text-red-500 text-sm mb-2 hidden">Please select a file first</div>
                    @error('photo')
                        <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
                    @enderror
                    <label for="file" class="cursor-pointer block" id="fileLabel">
                        <div class="text-emerald-600 mb-4">
                            <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <p class="text-gray-700 font-medium" id="fileText">Click to browse files</p>
                        <p class="text-gray-400 text-sm mt-1">Maximum file size: 10MB</p>
                    </label>
                </div>

                <button type="submit" class="w-full mt-6 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-bold py-4 rounded-xl hover:from-emerald-600 hover:to-emerald-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                    Upload File
                </button>
            </form>
        </div>
    </div>

    {{-- Display Uploaded Images Section --}}
    @if(isset($images) && $images->count() > 0)
        <div class="max-w-6xl mx-auto mt-12">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Uploaded Images</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($images as $image)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                        <div class="aspect-square overflow-hidden bg-gray-100">
                            <img 
                                src="{{ $image->cloudinary_url }}" 
                                alt="Uploaded image" 
                                class="w-full h-full object-cover hover:scale-110 transition-transform duration-300"
                                loading="lazy"
                            >
                        </div>
                        <div class="p-4">
                            <p class="text-sm font-medium text-gray-700 truncate">
                                {{ $image->file_name }}
                            </p>
                            <p class="text-xs text-gray-400 mt-1">
                                {{ $image->created_at->format('M d, Y H:i') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="max-w-md mx-auto mt-12 text-center py-12">
            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <p class="text-gray-500 text-lg">No images uploaded yet.</p>
        </div>
    @endif

    {{-- // not letting submit if file is not selected  --}}

    <script>
        const fileInput = document.getElementById('file');
        const fileError = document.getElementById('fileError');
        const fileText = document.getElementById('fileText');

        document.querySelector('form').addEventListener('submit', function(e) {
            if (!fileInput.files.length) {
                e.preventDefault();
                fileError.classList.remove('hidden');
            }
        });

        fileInput.addEventListener('change', function() {
            if (fileInput.files.length) {
                fileError.classList.add('hidden');
                fileText.textContent = fileInput.files[0].name;
            }
        });
    </script>
</body>
</html>
