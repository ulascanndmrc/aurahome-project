<x-app-layout>
    <x-slot name="header">
        <h2 class='font-bold text-2xl text-gray-800 leading-tight italic'>Müşteri Bilgilerini Güncelle</h2>
    </x-slot>

    <div class='py-12 bg-gray-50'>
        <div class='max-w-3xl mx-auto sm:px-6 lg:px-8'>
            <div class='bg-white shadow-2xl sm:rounded-3xl border border-gray-100 p-10'>
                <form action='{{ route("admin.users.update", $user->id) }}' method='POST' class='space-y-6'>
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label class='block text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2'>Müşteri Adı</label>
                        <input type='text' name='name' value='{{ $user->name }}' class='w-full border-gray-100 rounded-xl bg-gray-50 focus:ring-black focus:border-black font-bold'>
                    </div>

                    <div>
                        <label class='block text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2'>E-Posta Adresi</label>
                        <input type='email' name='email' value='{{ $user->email }}' class='w-full border-gray-100 rounded-xl bg-gray-50 focus:ring-black focus:border-black font-bold'>
                    </div>

                    <div>
                        <label class='block text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2'>Cüzdan Bakiyesi (TL)</label>
                        <input type='number' name='balance' step='0.01' value='{{ $user->balance }}' class='w-full border-gray-100 rounded-xl bg-gray-50 focus:ring-black focus:border-black font-black text-green-600'>
                    </div>

                    <div class='flex items-center justify-between pt-4'>
                        <a href='{{ route("admin.users.index") }}' class='text-[10px] font-black uppercase text-gray-400 hover:text-black transition-colors'>İptal Et</a>
                        <button type='submit' class='bg-black text-white px-8 py-3 rounded-xl font-bold uppercase text-xs hover:bg-gray-800 transition-all shadow-lg'>Bilgileri Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
