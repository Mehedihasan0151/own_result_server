<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-100 via-white to-gray-100 min-h-screen flex items-center justify-center p-4 sm:p-6 md:p-10">

    <div class="w-full max-w-2xl bg-white p-6 sm:p-8 md:p-10 rounded-2xl shadow-2xl border border-gray-100 transition-all duration-300 hover:shadow-green-300">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-center text-gray-800 mb-8">
            🎓 Search Student Result
        </h1>

        <!-- Search Form -->
        <form action="{{ route('search') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block font-semibold text-gray-700 mb-2">Search by Roll Number</label>
                <input 
                    type="text" 
                    name="roll" 
                    value="{{ request('roll') }}" 
                    class="border border-gray-300 rounded-lg w-full p-3 text-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                    placeholder="Enter roll number">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <button 
                    class="bg-green-600 text-white px-4 py-3 rounded-lg w-full font-semibold shadow hover:bg-green-700 hover:shadow-lg hover:scale-[1.02] transition-all duration-300">
                    🔍 Search
                </button>
            </div>
        </form>

        <!-- Search Result Section -->
        @if(isset($result))
            @if($result)
                <div class="mt-8 bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-xl shadow-inner border border-green-200">
                    <h2 class="font-bold text-lg sm:text-xl text-green-800 mb-4 text-center">
                        Result for Roll: <span class="text-gray-900">{{ $result->roll }}</span>
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-700">
                        <p><span class="font-semibold">GPA 1:</span> {{ $result->gpa1 }}</p>
                        <p><span class="font-semibold">GPA 2:</span> {{ $result->gpa2 }}</p>
                        <p><span class="font-semibold">GPA 3:</span> {{ $result->gpa3 }}</p>
                        <p><span class="font-semibold">GPA 4:</span> {{ $result->gpa4 }}</p>
                    </div>
                </div>
            @else
                <div class="mt-8 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-md text-center">
                    <h3 class="font-bold text-lg mb-1">⚠️ Error: Result Not Found</h3>
                    <p>
                        No result found for roll <span class="font-bold">{{ request('roll') }}</span>. Please check the number and try again.
                    </p>
                </div>
            @endif
        @endif

        <div class="mt-8 text-center">
            <a href="{{ route('index') }}" 
               class="inline-block text-green-700 font-semibold hover:text-green-900 transition">
                <h2 class="text-base sm:text-lg underline decoration-green-400 hover:decoration-green-600">
                    📄 Go to PDF Submit Page
                </h2>
            </a>
        </div>
    </div>

</body>
</html>
