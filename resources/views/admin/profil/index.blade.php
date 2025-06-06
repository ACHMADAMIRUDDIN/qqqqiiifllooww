@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Profil Klinik</h2>

    <form method="POST" action="{{ route('profil.update') }}" class="bg-white shadow-md rounded-lg p-6 space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Klinik</label>
            <input
                type="text"
                name="nama_klinik"
                value="{{ $profil->nama_klinik }}"
                class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea
                name="deskripsi"
                rows="5"
                class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >{{ $profil->deskripsi }}</textarea>
        </div>

        <div>
            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded transition"
            >
                Update
            </button>
        </div>
    </form>
</div>
@endsection
