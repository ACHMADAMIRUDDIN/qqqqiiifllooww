@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Pesan Pasien</h2>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100 text-left text-gray-600 text-sm">
                <tr>
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">Pesan</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                @foreach($pesans as $pesan)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium">{{ $pesan->nama }}</td>
                    <td class="px-6 py-4">{{ $pesan->isi }}</td>
                    <td class="px-6 py-4">
                        <form action="{{ route('pesan.reply', $pesan->id) }}" method="POST" class="flex space-x-2 items-center">
                            @csrf
                            <input type="text" name="balasan" placeholder="Balas pesan"
                                   class="border rounded px-3 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full max-w-xs">
                            <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded transition">
                                Kirim
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
