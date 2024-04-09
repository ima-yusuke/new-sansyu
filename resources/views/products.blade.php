<x-dash-layout>
    <div class="flexColumn items-center gap-16 py-10">
        {{--現在の一覧表示--}}
        <section class="w-[90%] flexColumn gap-8 sm:rounded-lg">
            <x-dash-title title="製品一覧" en="Product List"></x-dash-title>

            <div class="overflow-y-auto overflow-x-auto h-600">
                <table class="whitespace-nowrap shadow-md w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-center">
                    <th scope="col" class="px-6 py-3 _sticky_b">
                        編集
                    </th>
                    <th scope="col" class="px-6 py-3 _sticky_b">
                        削除
                    </th>
                    <th scope="col" class="px-6 py-3 _sticky_b">
                        商品名
                    </th>
                    <th scope="col" class="px-6 py-3 _sticky_b">
                        商品画像
                    </th>
                    <th scope="col" class="px-6 py-3 _sticky_b">
                        リンク
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $key=>$value)
                    {{--最初表示されるtr--}}
                    <tr class="h-44 text-center originalTr bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            <div class="flexCenter">
                                <a class="editBtn font-medium text-blue-600 dark:text-blue-500 hover:underline">編集</a>
                            </div>
                        </td>
                        <livewire:product-livewire :id="$value->id"></livewire:product-livewire>
                        <td class="px-6 py-4 w-180">{{$value["p_name"]}} </td>
                        <td class="px-6 py-4 flexCenter">
                            <img src="{{asset($value->path)}}" class="w-4/12 rounded-8 shrink-0 object-cover">
                        </td>
                        <td class="px-6 py-4 w-180">{{$value["link"]}} </td>
                    </tr>

                    {{--hidden (編集用tr)--}}
                    <tr class="h-44 editTr text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <form method="post" action="{{route('update-product',$value)}}" enctype="multipart/form-data">
                            @csrf
                            @method("patch")
                            <td class="px-6 py-4">
                                <x-dashboard_btn></x-dashboard_btn>
                            </td>
                            <livewire:product-livewire :id="$value->id"></livewire:product-livewire>

                            <td class="px-6 py-4"><input type="text" name="p_name" value="{{$value["p_name"]}}" class="text-dashInputColor" required></td>
                            <td class="px-6 py-4">
                                <div class="flexColumnCenter gap-2">
                                    <label class="py-2 px-4 bg-black hover:cursor-pointer">
                                        <input type="file" accept="image/jpeg,image/png"  name="image" class="imgInput hidden">
                                        <i class="iconDefault fa-solid fa-file-arrow-up text-white"></i>
                                        <i class="iconHidden hidden fa-regular fa-circle-check text-white"></i>
                                        <span class="fileSpan text-white">ファイル選択</span>
                                    </label>
                                    <div class="flexColumnCenter">
                                        <img src="{{asset($value->path)}}" class="w-4/12 rounded-8 shrink-0 object-cover">
                                        <p class="text-xs">※現在の画像</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4"><input type="text" name="link" value="{{$value["link"]}}" class="text-dashInputColor"></td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </section>

        {{--Add product--}}
        <section class="w-[90%] flexColumn gap-8">
            <x-dash-title title="製品追加" en="New Product"></x-dash-title>

            <form class="Form flexColumn gap-8" method="post" action="{{route("add-product")}}" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="p_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span class="bg-red-500 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded-8">必須</span> 製品名</label>
                        <input type="text" name="p_name" id="p_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="製品名" required />
                    </div>
                    <div>
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span class="bg-red-500 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded-8">必須</span> 製品画像</label>
                        <input type="file" accept="image/jpeg,image/png" name="image" id="image" class="bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full" required />
                    </div>
                    <div>
                        <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> リンク</label>
                        <input type="text" name="link" id="link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="リンク" />
                    </div>
                </div>
                <x-register_btn></x-register_btn>
            </form>
        </section>
    </div>
</x-dash-layout>

<script>
    // テーブルinput表示・非表示切り替え(eventFlagにはdiplay:node)
    let editTr = document.getElementsByClassName("editTr");
    let originalTr = document.getElementsByClassName("originalTr");
    let editBtn = document.getElementsByClassName("editBtn");
    let closeBtn = document.getElementsByClassName("closeBtn");

    for(let i = 0;i<editTr.length;i++){
        dashTrToggle(i)
    }

    // inputファイルのデザイン変更
    let imgInput = document.getElementsByClassName("imgInput");
    let fileSpan = document.getElementsByClassName("fileSpan");
    let iconHidden = document.getElementsByClassName("iconHidden");
    let iconDefault = document.getElementsByClassName("iconDefault");

    for(let i = 0;i<imgInput.length;i++){
        resetInputValue(i);
        uploadFile(i)
    }

</script>

