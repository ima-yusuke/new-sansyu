<x-dash-layout>
    <div class="flex justify-center">
        <div class="w-full mx-4 max-w-5xl">

            {{--タイトル箇所--}}
            <section class="flex flex-col gap-6 mb-10">
                <aside class="flex items-center gap-4">
                    <div class="text-gray-500 text-sm">{{$selectedEvent["date"]}}</div>
                    <div class="text-xs bg-baseColor text-white px-2 py-1 rounded-4">{{$selectedEvent["category_name"]}}</div>
                </aside>
                <p class="text-3xl font-bold">{{$selectedEvent["title"]}}</p>
            </section>

            {{--テキスト箇所--}}
            <div id="editor" class="mb-10">

            </div>

            {{--Axios通信のため--}}
            <input type="hidden" value="{{$selectedEvent["id"]}}" id="selected_id">

            <div class="flex justify-center py-10">
                <button id="submit_btn" type="button" data-route="{{ route('posts') }}" class="btn btn-border shadow-xl text-sm px-10 py-3 text-center">登録</button>
            </div>

        </div>
    </div>

    @vite(['resources/js/detail.js'])
</x-dash-layout>

<script>

    window.Laravel = {};
    window.Laravel.data = @json($data);

</script>


