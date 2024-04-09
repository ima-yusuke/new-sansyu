<x-dash-layout>
    <div class="flexColumn items-center gap-16 py-10">
        {{--現在の一覧表示--}}
        <section class="w-[90%] flexColumn gap-8 sm:rounded-lg">
            <x-dash-title title="イベント一覧" en="Event List"></x-dash-title>

            <div class="overflow-y-auto overflow-x-auto h-300 ">
             <table class="whitespace-nowrap shadow-md w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-center">
                    <th scope="col" class="px-6 py-3 _sticky_b">
                        編集
                    </th>
                    <th scope="col" class="px-6 py-3 _sticky_b">
                        詳細編集
                    </th>
                    <th scope="col" class="px-6 py-3 _sticky_b">
                        削除
                    </th>
                    <th scope="col" class="px-6 py-3 _sticky_b">
                        イベント名
                    </th>
                    <th scope="col" class="px-6 py-3 _sticky_b">
                        イベント開催日
                    </th>
                    <th scope="col" class="px-6 py-3 _sticky_b">
                        カテゴリー
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $key=>$value)
                    {{--最初表示されるtr--}}
                    @foreach($value->category as $idx=>$val)
                        <tr class="h-24 text-center originalTr bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                <div class="flexCenter">
                                    <a class="editBtn font-medium text-blue-600 dark:text-blue-500 hover:underline">編集</a>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flexCenter">
                                    <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline">詳細編集</a>
                                </div>
                            </td>
                            <livewire:event-livewire :id="$val['id']"></livewire:event-livewire>
                            <td class="px-6 py-4">{{$val["title"]}} </td>
                            <td class="px-6 py-4">{{$val["date"]}} </td>
                            <td class="px-6 py-4">{{$value["category_name"]}} </td>
                        </tr>


                        {{--hidden (編集用tr)--}}
                        <tr class="h-24 text-center editTr bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <form method="post" action="{{route('updateEvent',$val)}}">
                                @csrf
                                @method("patch")
                                <td class="px-6 py-4">
                                    <x-dashboard_btn></x-dashboard_btn>
                                </td>
                                <livewire:event-livewire :id="$val['id']"></livewire:event-livewire>
                                <td class="px-6 py-4"><input type="text" name="title" value="{{$val["title"]}}" class="text-sm text-dashInputColor" required> </td>
                                <td class="px-6 py-4"><input type="date" name="date" value="{{$val["date"]}}" class="text-sm text-dashInputColor" required></td>
                                <td class="px-6 py-4">
                                    <select name="category_name" class="text-sm text-dashInputColor" required>
                                        @foreach($categories as $category_value)
                                            <option class="text-sm" value="{{$category_value["id"]}}" @if($val["category_id"]== $category_value["id"]) selected @endif>{{$category_value["category_name"]}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
            </div>
        </section>

        {{--ADD Category--}}
        <section class="w-[90%] flexColumn gap-8">
            <x-dash-title title="カテゴリー追加" en="New Category"></x-dash-title>
            <form class="Form flexColumn gap-8" method="post" action="{{route("add-category")}}">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">新規カテゴリー</label>
                        <input type="text" id="category_name" name="category_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="新規カテゴリー" required />
                    </div>
                </div>

                <x-register_btn></x-register_btn>
            </form>
        </section>

        {{--ADD Event--}}
        <section class="w-[90%] flexColumn gap-8">
            <x-dash-title title="イベント追加" en="New Event"></x-dash-title>
            <form class="Form flexColumn gap-8" method="post" action="{{route("add-event")}}">
                @csrf
{{--                <input type="hidden" name="id" value="{{$value["id"]}}">--}}
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span class="bg-red-500 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded-8">必須</span> イベント名
                        </label>
                        <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="イベント名" required />
                    </div>
                    <div>
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span class="bg-red-500 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded-8">必須</span> イベント開催日</label>
                        <input type="date" name="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                    <div>
                        <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span class="bg-red-500 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded-8">必須</span> イベントカテゴリー</label>
                        <select name="category_id" id="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach($categories as $val)
                                <option value="{{$val["id"]}}">{{$val["category_name"]}}</option>
                            @endforeach
                        </select>
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

</script>




