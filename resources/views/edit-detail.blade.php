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
            <button id="submit_btn" type="button" data-route="{{ route('posts') }}">submit</button>

        </div>
    </div>

    @vite(['resources/js/detail.js'])
</x-dash-layout>

