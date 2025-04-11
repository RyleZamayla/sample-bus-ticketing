<x-app-layout>
    <div class="container mx-auto mt-10">
        <h1 class="text-center text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100">Hello, World!</h1>
        <p class="text-center text-gray-600 dark:text-gray-400">Welcome to the sample Laravel application.</p>
        
        <div class="text-right mt-10 mb-4">
            <a href="{{ route('admin.create-dispatchers') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700">Add New Dispatcher</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4 dark:bg-green-900 dark:text-green-200">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4 dark:bg-red-900 dark:text-red-200">
                {{ session('error') }}
            </div>
        @endif

        @if(isset($data) && $data->isNotEmpty())
            <div class="mt-10 overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 border dark:border-gray-600 text-gray-900 dark:text-gray-200">First Name</th>
                            <th class="px-4 py-2 border dark:border-gray-600 text-gray-900 dark:text-gray-200">Middle Name</th>
                            <th class="px-4 py-2 border dark:border-gray-600 text-gray-900 dark:text-gray-200">Last Name</th>
                            <th class="px-4 py-2 border dark:border-gray-600 text-gray-900 dark:text-gray-200">Gender</th>
                            <th class="px-4 py-2 border dark:border-gray-600 text-gray-900 dark:text-gray-200">Phone</th>
                            <th class="px-4 py-2 border dark:border-gray-600 text-gray-900 dark:text-gray-200">Address</th>
                            <th class="px-4 py-2 border dark:border-gray-600 text-gray-900 dark:text-gray-200">Email</th>
                            <th class="px-4 py-2 border dark:border-gray-600 text-gray-900 dark:text-gray-200">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $dispatcher)
                            <tr class="border-t dark:border-gray-700">
                                <td class="px-4 py-2 text-gray-900 dark:text-gray-200">{{ $dispatcher->fname }}</td>
                                <td class="px-4 py-2 text-gray-900 dark:text-gray-200">{{ $dispatcher->mname }}</td>
                                <td class="px-4 py-2 text-gray-900 dark:text-gray-200">{{ $dispatcher->lname }}</td>
                                <td class="px-4 py-2 text-gray-900 dark:text-gray-200">{{ $dispatcher->gender }}</td>
                                <td class="px-4 py-2 text-gray-900 dark:text-gray-200">{{ $dispatcher->phone }}</td>
                                <td class="px-4 py-2 text-gray-900 dark:text-gray-200">{{ $dispatcher->address }}</td>
                                <td class="px-4 py-2 text-gray-900 dark:text-gray-200">{{ $dispatcher->email }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('admin.edit-dispatchers', $dispatcher->id) }}" class="text-yellow-500 hover:text-yellow-600 dark:text-yellow-400 dark:hover:text-yellow-500 mr-2" title="Edit Dispatcher">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-2.036a2.5 2.5 0 113.536 3.536L9 21H4v-5l12.732-12.732z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.delete-dispatchers', $dispatcher->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this dispatcher?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-600 dark:text-red-400 dark:hover:text-red-500" title="Delete Dispatcher">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif(isset($data) && $data->isEmpty())
            <p class="text-center text-gray-500 dark:text-gray-400">No dispatchers found.</p>
        @endif
    </div>
</x-app-layout>
