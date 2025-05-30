@extends('admin.layouts.app')

@section('content')
{{-- Main content --}}
<main class="flex-1 p-6 overflow-auto">
    <h2 class="text-xl font-semibold mb-6">Dashboard</h2>

    {{-- Stats --}}
    <div class="grid grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-4 rounded-xl shadow text-center">
            <p class="text-gray-500">Projects</p>
            <h3 class="text-2xl font-bold text-purple-700">21</h3>
        </div>
        <div class="bg-white p-4 rounded-xl shadow text-center">
            <p class="text-gray-500">Tasks</p>
            <h3 class="text-2xl font-bold text-purple-700">145</h3>
        </div>
        <div class="bg-white p-4 rounded-xl shadow text-center">
            <p class="text-gray-500">Members</p>
            <h3 class="text-2xl font-bold text-purple-700">12</h3>
        </div>
        <div class="bg-white p-4 rounded-xl shadow text-center">
            <p class="text-gray-500">Stages</p>
            <h3 class="text-2xl font-bold text-purple-700">18</h3>
        </div>
    </div>

    {{-- Latest Events --}}
    <div class="bg-white p-6 rounded-xl shadow mb-6">
        <h3 class="text-lg font-semibold mb-4">Latest Events</h3>
        <ul class="space-y-3">
            <li class="flex justify-between items-center">
                <span class="text-gray-600">Add new task: <strong>Develop a visual concept</strong></span>
                <span class="text-sm text-gray-400">12:45</span>
            </li>
            <li class="flex justify-between items-center">
                <span class="text-gray-600">Added Members: <strong>Cornelia Owen</strong></span>
                <span class="text-sm text-gray-400">11:32</span>
            </li>
            <li class="flex justify-between items-center">
                <span class="text-gray-600">Add Stages: <strong>Effective Advertising</strong></span>
                <span class="text-sm text-gray-400">11:08</span>
            </li>
        </ul>
    </div>

    {{-- Projects List --}}
    <div class="grid grid-cols-2 gap-4">
        <div class="bg-white p-4 rounded-xl shadow">
            <h4 class="text-md font-semibold mb-3">Develop Chat App</h4>
            <div class="flex justify-between text-sm text-gray-500">
                <span>Deadline: 09.25.2025</span>
                <span>21 Tasks</span>
            </div>
            <div class="mt-2">
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-purple-500 h-2 rounded-full" style="width: 48%"></div>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <h4 class="text-md font-semibold mb-3">Web Application Development</h4>
            <div class="flex justify-between text-sm text-gray-500">
                <span>Deadline: 09.25.2025</span>
                <span>21 Tasks</span>
            </div>
            <div class="mt-2">
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-purple-500 h-2 rounded-full" style="width: 40%"></div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
