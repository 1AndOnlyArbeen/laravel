<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="min-h-screen bg-gradient-to-br from-emerald-50 via-white to-amber-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8 animate-fadeIn">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl shadow-lg mb-4 transform hover:scale-105 transition-transform duration-300">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Join Our Learning Platform</h1>
            <p class="text-gray-600">Start your coding journey today</p>
        </div>

        <!-- Form Card -->


                    

        <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-10">
            <form action="{{route('register')}}" method="POST" class="space-y-6">
                @csrf

                <!-- Name Field -->
                <div class="animate-slideUp" style="animation-delay: 0.1s">
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                            Full Name
                        </span>
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 transition-all duration-200 outline-none hover:border-gray-300"
                        placeholder="Enter your full name"
                        value="{{old('name')}}"
                    >
                    <span class="text-red-500 text-sm mt-1"> @error('name')
                        {{$message}}
                        
                    @enderror </span>
                </div>

                <!-- Email Field -->
                <div class="animate-slideUp" style="animation-delay: 0.2s">
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                            Email Address
                        </span>
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 transition-all duration-200 outline-none hover:border-gray-300"
                        placeholder="your.email@example.com"
                        value="{{old('email')}}"

                    >
                    <span class=" text-red-500 text-sm mt-1">@error('email')
                        {{ $message.'!'}}
                        
                    @enderror</span>
                </div>

                <!-- Password Fields Grid -->
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Password Field -->
                    <div class="animate-slideUp" style="animation-delay: 0.3s">
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                </svg>
                                Password
                            </span>
                        </label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 transition-all duration-200 outline-none hover:border-gray-300"
                            placeholder="••••••••"
                        value="{{old('password')}}"

                        >
                        <span class="text-red-500 text-sm mt-1">@error('email')
                        {{ $message.'!'}}
                        
                    @enderror</span>
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="animate-slideUp" style="animation-delay: 0.4s">
                        <label for="confirm_password" class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Confirm Password
                            </span>
                        </label>
                        <input 
                            type="password" 
                            id="confirm_password" 
                            name="confirm_password"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 transition-all duration-200 outline-none hover:border-gray-300"
                            placeholder="••••••••"
                        value="{{old('confirm_password')}}"

                        >
                        <span class="text-red-500 text-sm mt-1"> @error('confirm_password')
                            {{ $message }}
                        @enderror</span>
                            
                    </div>
                </div>

                <!-- Phone Field -->
                <div class="animate-slideUp" style="animation-delay: 0.5s">
                    <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                            Phone Number
                        </span>
                    </label>
                    <input 
                        type="tel" 
                        id="phone" 
                        name="phone"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 transition-all duration-200 outline-none hover:border-gray-300"
                        placeholder="+977 98XXXXXXXX"
                        value="{{old('phone')}}"

                    >
                    <span class="text-red-500 text-sm mt-1">@error('phone')
                        {{ $message.'!'}}
                        
                    @enderror</span>
                </div>

                <!-- Address Field -->
                <div class="animate-slideUp" style="animation-delay: 0.6s">
                    <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            Address
                        </span>
                    </label>
                    <textarea 
                        id="address" 
                        name="address" 
                        rows="3"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 transition-all duration-200 outline-none hover:border-gray-300 resize-none"
                        placeholder="Enter your full address"
                        value="{{old('address')}}"

                    ></textarea>
                    <span class="text-red-500 text-sm mt-1">@error('address')
                        {{ $message.'!'}}
                        
                    @enderror</span>
                </div>

                <!-- Gender and DOB Grid -->
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Gender Field -->
                    <div class="animate-slideUp" style="animation-delay: 0.7s">
                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"/>
                                </svg>
                                Gender
                            </span>
                        </label>
                        <div class="space-y-3">
                            <label class="flex items-center gap-3 p-3 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-emerald-300 hover:bg-emerald-50 transition-all duration-200 group">
                                <input type="radio" name="gender" value="male" class="w-4 h-4 text-emerald-600 focus:ring-emerald-500">

                                <span class="text-gray-700 group-hover:text-emerald-700 font-medium">Male</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-emerald-300 hover:bg-emerald-50 transition-all duration-200 group">
                                <input type="radio" name="gender" value="female" class="w-4 h-4 text-emerald-600 focus:ring-emerald-500">

                                <span class="text-gray-700 group-hover:text-emerald-700 font-medium">Female</span>
                                
                            </label>
                            
                        </div>
                        <span class="text-red-500 text-sm mt-1">@error('gender')
                        {{ $message.'!'}}
                        
                    @enderror</span>
                    </div>

                    <!-- Date of Birth Field -->
                    <div class="animate-slideUp" style="animation-delay: 0.8s">
                        <label for="date_of_birth" class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                </svg>
                                Date of Birth
                            </span>
                        </label>
                        <input 
                            type="date" 
                            id="date_of_birth" 
                            name="date_of_birth"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 transition-all duration-200 outline-none hover:border-gray-300"
                        value="{{old('date_of_birth')}}"

                        >
                        <span class="text-red-500 text-sm mt-1">@error('date_of_birth')
                        {{ $message.'!'}}
                        
                    @enderror</span>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4 animate-slideUp" style="animation-delay: 1s">
                    <button 
                        type="submit" 
                        class="w-full bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white font-bold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-3 group"
                    >
                        <span class="text-lg">Create Account</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </button>
                </div>

                <!-- Login Link -->
                <div class="text-center text-gray-600 animate-slideUp" style="animation-delay: 1.1s">
                    Already have an account? 
                    <a href="/login" class="text-emerald-600 hover:text-emerald-700 font-semibold hover:underline transition-colors">
                        Sign In
                    </a>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="text-center mt-8 text-sm text-gray-500 animate-fadeIn" style="animation-delay: 1.2s">
            <p>By registering, you agree to our <a href="#" class="text-emerald-600 hover:underline">Terms of Service</a> and <a href="#" class="text-emerald-600 hover:underline">Privacy Policy</a></p>
        </div>
    </div>
</div>

<style>
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.6s ease-out forwards;
    }

    .animate-slideUp {
        animation: slideUp 0.6s ease-out forwards;
        opacity: 0;
    }

    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: #10b981;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #059669;
    }
</style>
    
</body>
</html>