<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-white to-blue-200 p-4 sm:p-6 md:p-10">

    <!-- Decorative animated shapes -->
    <div class="absolute top-0 left-0 w-40 sm:w-60 h-40 sm:h-60 bg-blue-300 opacity-30 rounded-full blur-3xl -z-10 animate-pulse"></div>
    <div class="absolute bottom-0 right-0 w-48 sm:w-72 h-48 sm:h-72 bg-green-200 opacity-40 rounded-full blur-3xl -z-10 animate-pulse"></div>

    <!-- Main card -->
    <div class="w-full max-w-md sm:max-w-lg md:max-w-2xl bg-white/90 backdrop-blur-lg p-6 sm:p-8 md:p-10 rounded-2xl shadow-2xl border border-gray-100 transition-all duration-300 hover:shadow-blue-300">
        <h1 class="text-2xl sm:text-3xl font-extrabold mb-6 text-center text-gray-800 tracking-tight">
            📊 Student Result System
        </h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center shadow-sm text-sm sm:text-base">
                {{ session('success') }}
            </div>
        @endif

        <!-- Upload Form -->
        <form action="{{ route('upload.pdf') }}" method="POST" enctype="multipart/form-data" class="mb-8 space-y-5">
            @csrf
            <div>
                <label class="block font-semibold text-gray-700 mb-2 text-sm sm:text-base">
                    Upload Results PDF
                </label>
                <input 
                    type="file" 
                    name="pdf" 
                    accept="application/pdf" 
                    required 
                    class="border border-gray-300 rounded-lg w-full p-2 sm:p-3 text-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
            </div>

            <button 
                class="bg-blue-600 text-white px-4 py-2 sm:py-3 rounded-lg w-full font-semibold text-sm sm:text-base shadow-md hover:bg-blue-700 hover:shadow-lg hover:scale-[1.02] transition-all duration-300">
                📤 Upload & Process
            </button>
        </form>

        <hr class="my-6 border-gray-200">

        <!-- Navigation -->
        <div class="text-center">
            <a href="{{ route('search') }}" 
               class="inline-block text-blue-700 font-semibold text-base sm:text-lg underline decoration-blue-400 hover:decoration-blue-600 hover:text-blue-900 transition-all duration-200 hover:scale-105">
                🔍 Go to Search Page
            </a>
        </div>
    </div>

</body>
</html>
