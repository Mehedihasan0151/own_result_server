<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Individual Result</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 px-4 sm:p-6">
    <div class="max-w-3xl mx-auto space-y-6">

        @if ($result) 
            <div class="text-center">
                <h1 class="text-2xl sm:text-3xl font-bold text-blue-800">
                    📘 Result for Roll: {{ $result->roll ?? 'N/A' }}
                </h1>
                <h3 class="text-2xl sm:text-2xl" >Diploma in engineering 2022</h3>
            </div>

            @if ($result->gpa4 == null && $result->gpa5 == null)
                <div class="bg-white shadow-md rounded-xl p-5 border-l-4 {{ $result->ref_sub ? 'border-red-400' : 'border-green-400' }}">
                    <div class="flex justify-between items-center mb-3">
                        <h2 class="text-xl font-semibold text-indigo-700">Semester Results</h2>
                        <span class="text-sm px-3 py-1 rounded-full {{ $result->ref_sub ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                            {{ $result->ref_sub ? 'Failed' : 'Passed' }}
                        </span>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-center">
                        <div><p class="font-bold text-gray-700">1st semester</p><p class="text-lg">{{ $result->gpa1 }}</p></div>
                        <div><p class="font-bold text-gray-700">2nd semester</p><p class="text-lg">{{ $result->gpa2 }}</p></div>
                        <div><p class="font-bold text-gray-700">3rd semester</p><p class="text-lg">{{ $result->gpa3 }}</p></div>
                    </div>

                    @if($result->ref_sub)
                        <div class="bg-red-50 border-l-4 border-red-400 text-red-800 p-4 rounded mt-4">
                            <h3 class="font-bold text-red-700 mb-2">⚠️ Failed Subjects</h3>
                            @php
                                $subs = explode(',', $result->ref_sub);
                            @endphp
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach($subs as $sub)
                                    <li>{{ trim($sub) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            @else
                <div class="bg-white shadow-md rounded-xl p-5 border-l-4 {{ $result->ref_sub ? 'border-red-400' : 'border-green-400' }}">
                    <div class="flex justify-between items-center mb-3">
                        <h2 class="text-xl font-semibold text-indigo-700">Semester Results</h2>
                        <span class="text-sm px-3 py-1 rounded-full {{ $result->ref_sub ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                            {{ $result->ref_sub ? 'Failed' : 'Passed' }}
                        </span>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-center">
                        <div><p class="font-bold text-gray-700">1st semester</p><p class="text-lg">{{ $result->gpa1 }}</p></div>
                        <div><p class="font-bold text-gray-700">2nd semester</p><p class="text-lg">{{ $result->gpa2 }}</p></div>
                        <div><p class="font-bold text-gray-700">3rd semester</p><p class="text-lg">{{ $result->gpa3 }}</p></div> <br>
                        <div><p class="font-bold text-gray-700">4th semester</p><p class="text-lg">{{ $result->gpa4 }}</p></div>
                        <div><p class="font-bold text-gray-700">5th semester</p><p class="text-lg">{{ $result->gpa5 }}</p></div>
                    </div>

                    @if($result->ref_sub)
                        <div class="bg-red-50 border-l-4 border-red-400 text-red-800 p-4 rounded mt-4">
                            <h3 class="font-bold text-red-700 mb-2">⚠️ Failed Subjects</h3>
                            @php
                                $subs = explode(',', $result->ref_sub);
                            @endphp
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach($subs as $sub)
                                    <li>{{ trim($sub) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            @endif 
        @else 
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-md text-center">
                <h3 class="font-bold text-lg mb-1">⚠️ Roll Not Found</h3>
                <p>
                    No result was returned. The requested roll number might not exist.
                </p>
            </div>
        @endif

        

        <div class="text-center mt-6">
            <a 
                href="javascript:history.back()" 
                class="inline-block text-blue-600 hover:underline text-sm sm:text-base bg-white px-4 py-2 rounded-lg shadow-sm">
                ← Go Back
            </a>
        </div>
    </div>
</body>
</html>
