
<x-layout title="キクカワエンタープライズ">

    {{--ヘッダー--}}
    <x-header></x-header>

    {{--メインパート--}}
    <div class="mt-32 w-full md:ml-64">

        {{--タイトル箇所--}}
        <section class="flex flex-col gap-6 mb-10">
            <aside class="flex items-center gap-4">
                <div class="text-gray-500 text-sm">2023.12.1</div>
                <div class="text-xs bg-baseColor text-white px-2 py-1 rounded-4">説明会</div>
            </aside>
            <p class="text-3xl font-bold">オフライン説明会開催の案内</p>
        </section>

        {{--テキスト箇所--}}
        <div id="text-wrapper" class="mb-10">

        </div>
    </div>

    <x-footer></x-footer>
    @vite(['resources/js/detail.js'])
</x-layout>
