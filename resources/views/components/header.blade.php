<header class="flexBetween h-16 md:h-70 xl:h-24 w-full px-4 md:px-8 2xl:px-24 fixed md:gap-24 bg-white bg-opacity-75 backdrop-blur-[5px] z-100">
    <div><a href="#"
            class="text-sm md:text-base font-bold text-titleBlack md:px-4">キクカワエンタープライズ株式会社</a>
    </div>
    {{--通常メニュー--}}
    <nav class="hidden xl:flex justify-end items-center gap-12 shrink-0">
        <aside class="flex items-center gap-11">
            @if(Route::currentRouteName() === 'giveInfo')
                <a href="#about" class="text-base font-bold text-baseColor">会社紹介</a>
                <a href="#messages" class="text-base font-bold text-baseColor">メッセージ</a>
                <a href="#interviews" class="text-base font-bold text-baseColor">社員インタビュー</a>
                <a href="#jobs" class="text-base font-bold text-baseColor">募集職種</a>
            @else
                <a href="{{ route('giveInfo').'#about' }}" class="text-base font-bold text-baseColor">会社紹介</a>
                <a href="{{ route('giveInfo').'#messages' }}" class="text-base font-bold text-baseColor">メッセージ</a>
                <a href="{{ route('giveInfo').'#interviews' }}" class="text-base font-bold text-baseColor">社員インタビュー</a>
                <a href="{{ route('giveInfo').'#jobs' }}" class="text-base font-bold text-baseColor">募集職種</a>
            @endif
        </aside>
        <a href="https://www.kikukawa.co.jp/contact/recruit.php" target="_blank" class="flexCenter gap-2 py-3.5 px-9 text-white shadow-buttonShadow rounded-button bg-gradient-to-r from-buttonLinerStart from-0% to-buttonLinerEnd to-100%">エントリーする→</a>
    </nav>
    {{--ハンバーガーメニュー--}}
    <div class="xl:hidden flex items-center justify-between">
        <button id="hamburger-btn" type="button" class="flexCenter p-2 w-10 h-10 text-sm text-gray-500">
            <i class="fa-solid fa-bars text-2xl" id="hamburgerIcon"></i>
        </button>
        <div class="w-full hideFlag absolute top-12 right-0" id="navbar-hamburger">
            <ul class="flexColumn font-medium mt-4 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                @if(Route::currentRouteName() === 'giveInfo')
                    <li class="navLink">
                        <a href="#about"
                           class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">会社紹介</a>
                    </li>
                    <li class="navLink">
                        <a href="#messages"
                           class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">メッセージ</a>
                    </li>
                    <li class="navLink">
                        <a href="#interviews"
                           class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white">社員インタビュー</a>
                    </li>
                    <li class="navLink">
                        <a href="#jobs"
                           class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">募集職種</a>
                    </li>
                    <li class="navLink">
                        <button class="py-2 px-3"><a>エントリーする</a></button>
                    </li>
                @else
                    <li class="navLink">
                        <a href="{{ route('giveInfo').'#about' }}"
                           class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">会社紹介</a>
                    </li>
                    <li class="navLink">
                        <a href="{{ route('giveInfo').'#messages' }}"
                           class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">メッセージ</a>
                    </li>
                    <li class="navLink">
                        <a href="{{ route('giveInfo').'#interviews' }}"
                           class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white">社員インタビュー</a>
                    </li>
                    <li class="navLink">
                        <a href="{{ route('giveInfo').'#jobs' }}"
                           class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">募集職種</a>
                    </li>
                    <li class="navLink">
                        <button class="py-2 px-3"><a>エントリーする</a></button>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</header>
