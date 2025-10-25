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
             Search Student Result
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

        <!-- Bangla Warning Text -->
        <div class="mt-10 text-center">
            <p class="text-red-600 font-semibold leading-relaxed">
                ⚠️ এটি আমার বানানো প্রথম রেজাল্টের ওয়েবসাইট। এর মধ্যে যদি কোনোটা এরর দেয় বা ভুল হয় তাহলে জানাবেন। আশা করি এমন হবেনা। এবার ফিডব্যাক ভালো থাকলে পরেরবার কিছু Amazing ফিচার নিয়ে আসব আরও সুন্দরভাবে।
            </p>
        </div>

        <!-- Footer Section -->
        <footer class="mt-8 text-center text-gray-500 text-sm border-t border-gray-200 pt-4">
            &copy; {{ date('Y') }} Developed by <span class="font-semibold text-gray-700">Mehedi Hasan</span>, 6th Semester.
        </footer>

    </div>

</body>
</html>
