<br>
<form action="{{ url()->current() }}" method="POST"
    class="max-w-md mx-auto bg-gray-100 p-6 rounded-lg shadow-md space-y-4">
    @csrf

    <label for="number" class="block text-gray-700 font-semibold">Enter a number</label>
    <input required type="number" name="number" id="number" min="0" placeholder="e.g., {{ rand(1, 100) }}"
        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">

    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition-colors">
        Submit
    </button>
</form>
