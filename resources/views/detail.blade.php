
<x-layout title="キクカワエンタープライズ">

    {{--ヘッダー--}}
    <x-header></x-header>

    {{--メインパート--}}
    <div class="flex justify-center mt-32">
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
            <div id="viewer" class="mb-10">

            </div>
        </div>
    </div>

    <x-footer></x-footer>
    @vite(['resources/js/show-detail.js'])
</x-layout>

<script>

    window.Laravel = {};
    window.Laravel.data = @json($data);

</script>
