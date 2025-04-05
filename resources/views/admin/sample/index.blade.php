<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dispatcher View</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-center text-3xl font-bold mb-6">Hello, World!</h1>
        <p class="text-center text-gray-600">Welcome to the sample Laravel application.</p>
        
        <div class="text-right mt-10 mb-4">
            <a href="{{ route('admin.create-dispatchers') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add New Dispatcher</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if(isset($data) && $data->isNotEmpty())
            <div class="mt-10 overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">First Name</th>
                            <th class="px-4 py-2 border">Middle Name</th>
                            <th class="px-4 py-2 border">Last Name</th>
                            <th class="px-4 py-2 border">Gender</th>
                            <th class="px-4 py-2 border">Phone</th>
                            <th class="px-4 py-2 border">Address</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $dispatcher)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $dispatcher->fname }}</td>
                                <td class="px-4 py-2">{{ $dispatcher->mname }}</td>
                                <td class="px-4 py-2">{{ $dispatcher->lname }}</td>
                                <td class="px-4 py-2">{{ $dispatcher->gender }}</td>
                                <td class="px-4 py-2">{{ $dispatcher->phone }}</td>
                                <td class="px-4 py-2">{{ $dispatcher->address }}</td>
                                <td class="px-4 py-2">{{ $dispatcher->email }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('admin.edit-dispatchers', $dispatcher->id) }}" class="text-yellow-500 hover:text-yellow-600" title="Edit Dispatcher">
                                        <i class="mdi mdi-pencil-outline text-lg"></i>
                                    </a>
                                    <form action="{{ route('admin.delete-dispatchers', $dispatcher->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this dispatcher?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-600" title="Delete Dispatcher">
                                            <i class="mdi mdi-trash-can-outline text-lg"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif(isset($data) && $data->isEmpty())
            <p class="text-center text-gray-500">No dispatchers found.</p>
        @endif
    </div>
</body>
</html>
