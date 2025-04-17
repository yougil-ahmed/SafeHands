@extends('admin.layouts.layout')

@section('admin_page_title')
    Create Review
@endsection

@section('admin_layout')
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md p-6 space-y-6">
        <h2 class="text-lg font-semibold text-gray-800">Rate the Service</h2>

        <!-- Star rating -->
        <div class="flex items-center space-x-1 rtl:space-x-reverse">
            <template x-for="i in 5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="w-6 h-6 cursor-pointer transition-transform transform hover:scale-110"
                    :class="i <= rating ? 'text-yellow-400' : 'text-gray-300'" @click="rating = i">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                </svg>
            </template>
        </div>

        <!-- Comment input -->
        <div>
            <label for="comment" class="block text-sm font-medium text-gray-700">Your Comment</label>
            <textarea id="comment" name="comment" rows="4" placeholder="Write your feedback here..."
                class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"></textarea>
        </div>

        <!-- Image upload -->
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Attach an Image (Optional)</label>
            <input type="file" id="image" name="image" accept="image/*"
                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                       file:rounded-md file:border-0
                       file:text-sm file:font-semibold
                       file:bg-blue-50 file:text-blue-700
                       hover:file:bg-blue-100" />
        </div>

        <!-- Submit button -->
        <button
            class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
            Submit Review
        </button>
    </div>
@endsection