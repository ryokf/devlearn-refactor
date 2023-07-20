<x-admin-layout>
    <div class="">
        <div>
            <!-- Card stats -->
            <div class="flex flex-wrap">
                {{-- @dd($data->coursePercentage) --}}
                <x-author_stastitic_card title="jumlah kursus" value="2" icon='fa-solid fa-book'
                    iconBgColor="bg-primary" percentage="2" arrow="2" />
                <x-author_stastitic_card title="jumlah member" value="2" icon='fa-solid fa-book'
                    iconBgColor="bg-primary" percentage="2" arrow="2" />
                <x-author_stastitic_card title="jumlah transaksi" value="2" icon='fa-solid fa-book'
                    iconBgColor="bg-primary" percentage="2" arrow="2" />
                <x-author_stastitic_card title="jumlah pendapatan" value="2" icon='fa-solid fa-book'
                    iconBgColor="bg-primary" percentage="2" arrow="2" />
            </div>
        </div>


    </div>
</x-admin-layout>
