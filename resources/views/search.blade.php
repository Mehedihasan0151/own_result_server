<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Search Results</h1>
        <form action="{{ route('search') }}" method="POST" class="space-y-4">
            @csrf
            <label class="block font-semibold text-gray-700">Search by Roll Number</label>
            <input type="text" name="roll" value="{{ request('roll') }}" class="border rounded w-full p-2 focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Enter roll number">
            <button class="bg-green-600 text-white px-4 py-2 rounded w-full hover:bg-green-700 transition">Search</button>
        </form>

        @if(isset($result))
            @if($result)
                <div class="mt-6 bg-gray-50 p-4 rounded-lg shadow-md">
                    <h2 class="font-bold text-lg text-gray-800 mb-2">Result for Roll: {{ $result->roll }}</h2>
                    <div class="space-y-2">
                        <p class="text-gray-700"><span class="font-semibold">GPA 1:</span> {{ $result->gpa1 }}</p>
                        <p class="text-gray-700"><span class="font-semibold">GPA 2:</span> {{ $result->gpa2 }}</p>
                        <p class="text-gray-700"><span class="font-semibold">GPA 3:</span> {{ $result->gpa3 }}</p>
                        <p class="text-gray-700"><span class="font-semibold">GPA 4:</span> {{ $result->gpa4 }}</p>
                    </div>
                </div>
            @else
                <p class="mt-6 text-gray-600 text-center">No result found for roll <span class="font-semibold">{{ request('roll') }}</span>.</p>
            @endif
        @endif

        <a href="{{ route('index') }}">
            <h2>Go pdf submit page</h2>
        </a>
    </div>
</body>
</html>