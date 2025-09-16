<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SahajJobs | Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    body {
        font-family: 'Nunito', Arial, sans-serif;
    }

    .text-danger {
        color: red;
    }
</style>

<body class="min-h-screen flex items-center justify-center" style="background-color: #f7f8fa;">
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
                    method="POST" autocomplete="off" novalidate>
                    <input type="hidden" name="role" value="admin">

                    <!-- Email Field -->
                    <div class="space-y-1">
                        <label for="email" class="block" style="color:#0c0c0c">Email<span
                                style="color:#e42e2e;">*</span></label>
                        <div class="relative group">
                            <input type="email" id="email" name="email" class="w-full px-4 py-3"
                                placeholder="Enter your email"
                                style="border: 1.5px solid #808080;border-radius: 8px;outline: none;">
                            <svg class="w-5 h-5 absolute right-3 top-3.5 text-gray-400" style="color:#808080"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            <small id="email-error" class="text-danger" style="display:none; font-size: 0.85em;">Please
                                enter a
                                valid email (must include .com)</small>
                        </div>
                        <small id="email-error" class="text-danger" style="display:none; font-size: 0.85em;">Please
                            enter a
                            valid email (must include .com)</small>

                    </div>

                    <!-- Password Field -->
                    <div class="space-y-1">
                        <label for="password" class="block" style="color:#0c0c0c">Password<span
                                style="color:#e42e2e;">*</span></label>
                        <!-- <div class="relative group">
                            <input type="password" id="password" name="password" required class="w-full px-4 py-3"
                                style="border: 1.5px solid #808080;border-radius: 8px;outline: none;"
                                placeholder="Enter your password">
                            <svg class="w-5 h-5 absolute right-3 top-3.5" style="color:#808080"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div> -->
                        <div class="relative group">
                            <input type="password" id="password" name="password" class="w-full px-4 py-3 pr-10"
                                style="border: 1.5px solid #808080; border-radius: 8px; outline: none;"
                                placeholder="Enter your password" />
                            <span id="toggle-password" class="absolute right-3 top-3 cursor-pointer text-gray-500">
                                <i class="far fa-eye-slash"></i> <!-- Requires FontAwesome -->
                            </span>
                            <small id="password-error" class="text-danger"
                                style="display:none; font-size: 0.85em;">Please enter your
                                password</small>
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
        .error-text {
            color: red;
            font-size: 0.85em;
            margin-top: 0.25rem;
        }

        .input-error {
            border-color: red !important;
        }

        #toggle-password {
            position: absolute;
            top: 11px;
            right: 10px;
            cursor: pointer;
            color: #808080;
            user-select: none;
        }

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

    <!-- <script>
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
    </script> -->
    <script>
        const loginForm = document.getElementById('login-form');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const emailError = document.getElementById('email-error');
        const passwordError = document.getElementById('password-error');
        const togglePasswordBtn = document.getElementById('toggle-password');
        const toggleIcon = togglePasswordBtn.querySelector('i');

        function validateEmail(email) {
            return email.includes('.com'); // only check for '.com'
        }

        function validatePassword(pwd) {
            return pwd.length >= 6;
        }

        loginForm.addEventListener('submit', function (e) {
            let valid = true;

            emailError.style.display = 'none';
            emailError.textContent = '';
            passwordError.style.display = 'none';
            passwordError.textContent = '';
            emailInput.classList.remove('input-error');
            passwordInput.classList.remove('input-error');

            const emailVal = emailInput.value.trim();
            if (!emailVal) {
                emailError.style.display = 'block';
                emailError.textContent = 'Email is required';
                emailInput.classList.add('input-error');
                valid = false;
            } else if (!validateEmail(emailVal)) {
                emailError.style.display = 'block';
                emailError.textContent = 'Please enter a valid email (must include .com)';
                emailInput.classList.add('input-error');
                valid = false;
            }

            const pwdVal = passwordInput.value.trim();
            if (!pwdVal) {
                passwordError.style.display = 'block';
                passwordError.textContent = 'Password is required';
                passwordInput.classList.add('input-error');
                valid = false;
            } else if (!validatePassword(pwdVal)) {
                passwordError.style.display = 'block';
                passwordError.textContent = 'Password must be at least 6 characters';
                passwordInput.classList.add('input-error');
                valid = false;
            }

            if (!valid) {
                e.preventDefault();  // prevent submit if invalid
            }
        });

        togglePasswordBtn.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            }
        });

        emailInput.addEventListener('input', () => {
            const val = emailInput.value.trim();
            if (!val) {
                emailError.style.display = 'block';
                emailError.textContent = 'Email is required';
                emailInput.classList.add('input-error');
            } else if (!validateEmail(val)) {
                emailError.style.display = 'block';
                emailError.textContent = 'Please enter a valid email (must include .com)';
                emailInput.classList.add('input-error');
            } else {
                emailError.style.display = 'none';
                emailError.textContent = '';
                emailInput.classList.remove('input-error');
            }
        });

        passwordInput.addEventListener('input', () => {
            const val = passwordInput.value.trim();
            if (!val) {
                passwordError.style.display = 'block';
                passwordError.textContent = 'Password is required';
                passwordInput.classList.add('input-error');
            } else if (!validatePassword(val)) {
                passwordError.style.display = 'block';
                passwordError.textContent = 'Password must be at least 6 characters';
                passwordInput.classList.add('input-error');
            } else {
                passwordError.style.display = 'none';
                passwordError.textContent = '';
                passwordInput.classList.remove('input-error');
            }
        });
    </script>



</body>

</html>