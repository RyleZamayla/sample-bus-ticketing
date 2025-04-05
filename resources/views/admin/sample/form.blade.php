<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FORM DOCUMENT</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    @if ($errors->any())
        <div class="max-w-lg mx-auto p-4 border border-red-500 rounded bg-red-100 text-red-700">
            <ul class="list-none p-0 m-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="p-6 max-w-lg mx-auto mt-10 bg-white rounded-lg shadow-md">
        <form action="{{ isset($dispatcher) ? route('admin.update-dispatchers', $dispatcher->id) : route('admin.store-dispatchers') }}" method="POST" class="w-full">
            @csrf
            @if(isset($dispatcher))
                @method('PUT')
            @endif
            
            <div class="mb-2">
                <label for="fname" class="block font-semibold mb-2">First Name:</label>
                <input type="text" name="fname" id="fname" value="{{ old('fname', $dispatcher->fname ?? '') }}" required class="w-full p-2 border border-gray-300 rounded">
            </div>
    
            <div class="mb-2">
                <label for="mname" class="block font-semibold mb-2">Middle Name:</label>
                <input type="text" name="mname" id="mname" value="{{ old('mname', $dispatcher->mname ?? '') }}" required class="w-full p-2 border border-gray-300 rounded">
            </div>
    
            <div class="mb-2">
                <label for="lname" class="block font-semibold mb-2">Last Name:</label>
                <input type="text" name="lname" id="lname" value="{{ old('lname', $dispatcher->lname ?? '') }}" required class="w-full p-2 border border-gray-300 rounded">
            </div>
    
            <div class="mb-2">
                <label for="gender" class="block font-semibold mb-2">Gender:</label>
                <select name="gender" id="gender" class="w-full p-2 border border-gray-300 rounded">
                    <option value="">--- Select Gender ---</option>
                    <option value="MALE" {{ old('gender', $dispatcher->gender ?? '') == 'MALE' ? 'selected' : '' }}>MALE</option>
                    <option value="FEMALE" {{ old('gender', $dispatcher->gender ?? '') == 'FEMALE' ? 'selected' : '' }}>FEMALE</option>
                    <option value="OTHERS" {{ old('gender', $dispatcher->gender ?? '') == 'OTEHRS' ? 'selected' : '' }}>OTHERS</option>
                </select>
            </div>
    
            <div class="mb-2">
                <label for="suffix" class="block font-semibold mb-2">Suffix:</label>
                <select name="suffix" id="suffix" class="w-full p-2 border border-gray-300 rounded">
                    <option value="">--- Select Suffix ---</option>
                    <option value="Mr." {{ old('suffix', $dispatcher->suffix ?? '') == 'Mr.' ? 'selected' : '' }}>MR.</option>
                    <option value="Ms." {{ old('suffix', $dispatcher->suffix ?? '') == 'Ms.' ? 'selected' : '' }}>MS.</option>
                    <option value="Mrs." {{ old('suffix', $dispatcher->suffix ?? '') == 'Mrs.' ? 'selected' : '' }}>MRS.</option>
                    <option value="Dr." {{ old('suffix', $dispatcher->suffix ?? '') == 'Dr.' ? 'selected' : '' }}>DR.</option>
                    <option value="Prof." {{ old('suffix', $dispatcher->suffix ?? '') == 'Prof.' ? 'selected' : '' }}>PROF.</option>
                </select>
            </div>
    
            <div class="mb-2">
                <label for="phone" class="block font-semibold mb-2">Phone:</label>
                <input type="number" name="phone" id="phone" value="{{ old('phone', $dispatcher->phone ?? '') }}" class="w-full p-2 border border-gray-300 rounded">
            </div>
    
            <div class="mb-2">
                <label for="address" class="block font-semibold mb-2">Address:</label>
                <textarea name="address" id="address" rows="2" required class="w-full p-2 border border-gray-300 rounded">{{ old('address', $dispatcher->address ?? '') }}</textarea>
            </div>
    
            <div class="mb-2">
                <label for="email" class="block font-semibold mb-2">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email', $dispatcher->email ?? '') }}" required class="w-full p-2 border border-gray-300 rounded">
            </div>
    
            @if(!isset($dispatcher))
                <div class="mb-2">
                    <label for="password" class="block font-semibold mb-2">Password:</label>
                    <input type="password" name="password" id="password" required class="w-full p-2 border border-gray-300 rounded">
                </div>
    
                <div class="mb-2">
                    <label for="password_confirmation" class="block font-semibold mb-2">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full p-2 border border-gray-300 rounded">
                </div>
            @endif
            
            <div class="text-left">
                <button type="submit" class="px-4 py-2 w-24 bg-blue-500 text-white rounded hover:bg-blue-600">{{ isset($dispatcher) ? 'Update' : 'Save' }}</button>
                <a href="{{ route('admin.get-dispatchers') }}" class="px-4 py-2 w-24 inline-block text-center bg-red-500 text-white rounded hover:bg-gray-600">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>