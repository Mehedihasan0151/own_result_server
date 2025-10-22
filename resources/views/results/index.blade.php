<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Result System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-center">📊 Student Result System</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('upload.pdf') }}" method="POST" enctype="multipart/form-data" class="mb-8">
        @csrf
        <label class="block font-semibold mb-2">Upload Results PDF</label>
        <input type="file" name="pdf" accept="application/pdf" required class="border rounded w-full p-2 mb-3">
        <button class="bg-blue-600 text-white px-4 py-2 rounded w-full">Upload & Process</button>
    </form>

    <hr class="my-6">

    <a href="{{ route('search') }}">
        <h2>Go search page</h2>
    </a>
</div>
</body>
</html>
