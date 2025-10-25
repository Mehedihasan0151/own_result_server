<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, Juthi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes floatHeart {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-100 via-white to-indigo-100 p-4 sm:p-6 md:p-10 overflow-hidden">

    <!-- Floating decorative shapes -->
    <div class="absolute top-0 left-0 w-40 h-40 bg-purple-300 opacity-30 rounded-full blur-3xl -z-10 animate-pulse"></div>
    <div class="absolute bottom-0 right-0 w-56 h-56 bg-indigo-300 opacity-40 rounded-full blur-3xl -z-10 animate-pulse"></div>

    <div class="w-full max-w-2xl bg-white/90 backdrop-blur-lg p-6 sm:p-8 md:p-10 rounded-2xl shadow-2xl border border-purple-100 hover:shadow-purple-300 transition-all duration-300">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-center text-purple-700 mb-6 tracking-tight">
            Welcome, Lamia Juthi 💜
        </h1>

        <!-- Typed text area -->
        <p id="typedText" class="text-center text-gray-700 text-base sm:text-lg leading-relaxed mb-8 min-h-[80px]"></p>

        <!-- Search Form -->
        <form action="{{ route('search') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block font-semibold text-gray-700 mb-2 text-sm sm:text-base">
                    Search by Roll Number
                </label>
                <input 
                    type="text" 
                    name="roll" 
                    value="{{ request('roll') }}" 
                    class="border border-purple-300 rounded-lg w-full p-3 text-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-purple-400 transition"
                    placeholder="Enter roll number">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <button 
                    class="bg-purple-600 text-white px-4 py-3 rounded-lg w-full font-semibold shadow hover:bg-purple-700 hover:shadow-lg hover:scale-[1.03] transition-all duration-300">
                    🔍 Search Result
                </button>

                <div class="text-center">
                    <a href="{{ route('juthi.result') }}" 
                       class="inline-block bg-indigo-500 text-white px-6 py-3 rounded-lg font-semibold shadow hover:bg-indigo-600 ...">
                        💫 View Your Result
                    </a>
                </div>
            </div>
        </form>

        <!-- Footer link -->
        <div class="mt-8 text-center">
            <a href="{{ route('home') }}" 
               class="inline-block text-purple-700 font-semibold hover:text-purple-900 transition">
                <h2 class="text-base sm:text-lg underline decoration-purple-400 hover:decoration-purple-600">
                    🌸 Go to regular page
                </h2>
            </a>
        </div>
    </div>

    <!-- Typed Text Animation -->
    <script>
        const messages = [
            "Hey Juthi, welcome to your own special version of the result page!",
            "This page is made just for you — because you deserve something beautiful 💫"
        ];
        const textElement = document.getElementById("typedText");
        let msgIndex = 0;
        let charIndex = 0;
        let currentMessage = "";
        let isDeleting = false;

        function typeEffect() {
            currentMessage = messages[msgIndex];
            if (!isDeleting) {
                textElement.textContent = currentMessage.substring(0, charIndex + 1);
                charIndex++;
                if (charIndex === currentMessage.length) {
                    isDeleting = true;
                    setTimeout(typeEffect, 2000); // pause before deleting
                    return;
                }
            } else {
                textElement.textContent = currentMessage.substring(0, charIndex - 1);
                charIndex--;
                if (charIndex === 0) {
                    isDeleting = false;
                    msgIndex = (msgIndex + 1) % messages.length;
                }
            }
            setTimeout(typeEffect, isDeleting ? 40 : 80);
        }

        typeEffect();
    </script>
</body>
</html>
