<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="flex space-x-6">
    @include('components.sidebar')

    <div class="flex-grow flex flex-col pl-64 max-w-3xl mx-auto">

        <a href="{{ route('community.index') }}" class="inline-flex items-center text-sm text-gray-600 hover:text-gray-800 mb-4">
            ← Kembali ke Forum
        </a>

        <h1 class="text-3xl font-bold mb-2">Buat Thread Baru</h1>
        <p class="text-gray-500 mb-6">Mulai diskusi dan berbagi ide dengan komunitas UMKM F&B</p>

        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Thread Baru</h2>

            <form action="{{ route('community.store') }}" method="POST">
                @csrf

                {{-- Judul Thread --}}
                <div class="mb-4">
                    <label class="block font-medium mb-1">Judul Thread <span class="text-red-500">*</span></label>
                    <input type="text" name="title" class="w-full border rounded-lg p-3" placeholder="Contoh: Tips Pemasaran Digital untuk UMKM F&B" value="{{ old('title') }}">
                    @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Kategori --}}
                <div class="mb-4">
                    <label class="block font-medium mb-1">Kategori <span class="text-red-500">*</span></label>
                    <select id="tagsSelect" name="tags[]" multiple class="w-full border rounded-lg p-3">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" @selected(collect(old('tags'))->contains($tag->id))>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('tags') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>


                {{-- Isi Thread --}}
                <div class="mb-4">
                    <label class="block font-medium mb-1">Isi Thread <span class="text-red-500">*</span></label>
                    <textarea name="content" rows="6" class="w-full border rounded-lg p-3" placeholder="Tulis detail pertanyaan atau topik yang ingin Anda diskusikan...">{{ old('content') }}</textarea>
                    @error('content') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Lampiran (opsional) --}}
                <div class="mb-4">
                    <label class="block font-medium mb-1">Lampiran (Opsional)</label>
                    <input type="file" class="border w-full rounded-lg p-2 bg-gray-50 text-sm">
                    <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, GIF. Maksimal 5MB.</p>
                </div>

                <div class="flex items-center gap-4 mt-6">
                    <a href="{{ route('community.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 flex items-center gap-2">
                        <i class="fa fa-paper-plane"></i> Publikasikan Thread
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mt-6">
            <h3 class="font-semibold mb-2">💡 Tips Membuat Thread yang Baik</h3>
            <ul class="list-disc pl-5 text-sm text-gray-700 space-y-1">
                <li><strong>Judul jelas:</strong> Gunakan judul yang spesifik dan mudah dipahami</li>
                <li><strong>Detail lengkap:</strong> Jelaskan konteks dan latar belakang pertanyaan Anda</li>
                <li><strong>Kategori tepat:</strong> Pilih kategori yang sesuai agar mudah ditemukan</li>
                <li><strong>Sopan santun:</strong> Gunakan bahasa yang baik dan menghormati sesama member</li>
            </ul>
        </div>

    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    new TomSelect("#tagsSelect", {
        plugins: ['remove_button'], // ada tombol hapus di tag
        create: false,              // tidak bisa buat tag baru (kalau mau boleh diganti true)
        maxItems: null,             // bisa pilih banyak
        placeholder: "Pilih kategori...",
        persist: false
    });
});
</script>
</body>
</html>
