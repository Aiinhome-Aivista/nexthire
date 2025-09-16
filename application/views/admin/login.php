<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SahajJobs | Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    body {
        font-family: 'Nunito', Arial, sans-serif;
    }
</style>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-300 via-white to-gray-600">
    <!-- Admin Login Section -->
    <section class="w-full max-w-md px-6">
        <div class="text-center mb-10 animate-fade-in-down">
            <!-- Logo -->
            <div class="flex justify-center mb-4">
                <img src="<?= base_url('assets/images/sahajjobs1.png'); ?>" alt="SahajJOB"
                    style="height:50px; width:135px;">
            </div>
            <h1 class="text-4xl font-extrabold text-gray-900 mb-3 tracking-tight">Admin Login</h1>
            <p class="text-gray-600 text-base">Secure access to the admin dashboard</p>
        </div>

        <!-- Login Card -->
        <div
            class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-2xl border border-gray-100 animate-fade-in-up transition duration-300 hover:shadow-3xl">
            <div class="p-8 space-y-6">
                <!-- Error Messages -->
                <div id="error-container"
                    class="hidden bg-red-50 text-red-700 px-4 py-3 rounded-xl mb-4 animate-shake border border-red-200 text-sm font-medium">
                    <!-- Errors will appear here -->
                </div>

                <form id="login-form" class="space-y-6" action="<?php echo base_url('admin/dashboard'); ?>"
                    method="POST">
                    <input type="hidden" name="role" value="admin">

                    <!-- Email Field -->
                    <div class="space-y-1">
                        <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                        <div class="relative group">
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-3 border-0 ring-1 ring-gray-300 rounded-xl placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all duration-200 group-hover:ring-indigo-200 peer"
                                placeholder="Enter your email">
                            <svg class="w-5 h-5 absolute right-3 top-3.5 text-gray-400 group-hover:text-indigo-500 peer-focus:text-indigo-500 transition-colors"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-1">
                        <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                        <div class="relative group">
                            <input type="password" id="password" name="password" required
                                class="w-full px-4 py-3 border-0 ring-1 ring-gray-300 rounded-xl placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition-all duration-200 group-hover:ring-indigo-200 peer"
                                placeholder="••••••••">
                            <svg class="w-5 h-5 absolute right-3 top-3.5 text-gray-400 group-hover:text-indigo-500 peer-focus:text-indigo-500 transition-colors"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full py-3 px-6 bg-[#FFF44F] hover:bg-yellow-300 text-gray-900 font-semibold rounded-xl shadow-lg transition-all duration-200 transform hover:-translate-y-0.5 hover:shadow-xl active:scale-95">
                        Sign In
                    </button>
                </form>
            </div>
        </div>
    </section>

    <style>
        @keyframes fade-in-down {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            10%,
            30%,
            50%,
            70%,
            90% {
                transform: translateX(-5px);
            }

            20%,
            40%,
            60%,
            80% {
                transform: translateX(5px);
            }
        }

        .animate-fade-in-down {
            animation: fade-in-down 0.6s ease-out;
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.6s ease-out;
        }

        .animate-shake {
            animation: shake 0.5s ease-in-out;
        }
    </style>

    <script>
        // Simple form validation and error display
        document.getElementById('login-form').addEventListener('submit', function (e) {
            e.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const errorContainer = document.getElementById('error-container');

            // Clear previous errors
            errorContainer.classList.add('hidden');
            errorContainer.innerHTML = '';

            let errors = [];

            if (!email) {
                errors.push('Email is required');
            } else if (!/\S+@\S+\.\S+/.test(email)) {
                errors.push('Email is invalid');
            }

            if (!password) {
                errors.push('Password is required');
            } else if (password.length < 6) {
                errors.push('Password must be at least 6 characters');
            }

            if (errors.length > 0) {
                errorContainer.classList.remove('hidden');
                errors.forEach(error => {
                    const errorElement = document.createElement('p');
                    errorElement.className = 'flex items-center space-x-2';
                    errorElement.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                clip-rule="evenodd" />
            </svg>
            <span>${error}</span>
          `;
                    errorContainer.appendChild(errorElement);
                });
            } else {
                this.submit();
            }
        });
    </script>
</body>

</html>