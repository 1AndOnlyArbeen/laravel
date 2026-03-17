<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<div class="min-h-screen bg-gradient-to-br from-emerald-50 via-white to-amber-50 py-12 px-4 sm:px-6 lg:px-8">

<div class="max-w-md mx-auto">

<!-- Header -->
<div class="text-center mb-8">
<div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl shadow-lg mb-4">
<svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
d="M5 12h14M12 5l7 7-7 7"/>
</svg>
</div>

<h1 class="text-4xl font-bold text-gray-900 mb-2">Welcome Back</h1>
<p class="text-gray-600">Login to your account</p>
</div>


<!-- Login Card -->

<div class="bg-white rounded-3xl shadow-2xl p-8 md:p-10">

<form action="{{ route('login') }}" method="POST" class="space-y-6">
@csrf

<!-- Email -->

<div>
<label class="block text-sm font-semibold text-gray-700 mb-2">
Email Address
</label>

<input
type="email"
name="email"
value="{{old('email')}}"
placeholder="your@email.com"
class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 outline-none"
>

<span class="text-red-500 text-sm">
@error('email')
{{$message}}
@enderror
</span>

</div>


<!-- Password -->

<div>

<label class="block text-sm font-semibold text-gray-700 mb-2">
Password
</label>

<input
type="password"
name="password"
placeholder="••••••••"
class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 outline-none"
>

<span class="text-red-500 text-sm">
@error('password')
{{$message}}
@enderror
</span>

</div>


<!-- Remember -->

<div class="flex items-center justify-between">

<label class="flex items-center gap-2">
<input type="checkbox" name="remember" class="text-emerald-600">
<span class="text-sm text-gray-600">Remember me</span>
</label>

<a href="#" class="text-sm text-emerald-600 hover:underline">
Forgot password?
</a>

</div>


<!-- Button -->

<button
type="submit"
class="w-full bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-bold py-4 rounded-xl hover:from-emerald-600 hover:to-emerald-700 transition"
>
Login
</button>


<!-- Register link -->

<div class="text-center text-gray-600">

Don't have an account?

<a href="/register" class="text-emerald-600 font-semibold hover:underline">
Create Account
</a>

</div>

</form>

</div>

</div>

</div>

</body>
</html>