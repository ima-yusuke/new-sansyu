<x-layout title="キクカワエンタープライズ">
    <x-header></x-header>

    <main class="bg-main flex flex-col items-center h-full">
        <h1>test1</h1>


        {{--ヘッダービジュアル--}}
        <section id="home" class="flexColumn lg:flexBetween relative z-10 w-full pb-16">
            <div class="flexColumn md:gap-12 gap-6 text-baseColor pt-24 lg:pt-0 2xl:pt-12 pl-3 md:pl-12 2xl:pl-24">
                <p class="text-sm md:text-base 2xl:text-xl font-medium">キクカワエンタープライズ株式会社 採用特設サイト</p>
                <aside class="flexColumn items-start gap-6 md:gap-10 2xl:gap-16">
                    <div class="flexColumn text-2xl md:text-5xl 2xl:text-6xl font-bold md:gap-y-3">
                        <h2><i>KIKUKAWA</i>で見つけよう、</h2>
                        <h2>わたしのミライ。</h2>
                    </div>
                    <h4 class="text-base md:text-2xl 2xl:text-3xl font-bold">あなたの情熱、私たちと共有しませんか？</h4>
                </aside>
            </div>
            <div>
                <img src="{{asset("img/kikukawaPic01.png")}}" class="max-w-full ml-auto pl-5 mt-60 md:mt-100 object-cover" alt="image">
            </div>
        </section>

        {{--ヘッダー背景ボール--}}
        <div class="rounded-1019 shadow-headBall h-1000 2xl:h-1200 w-1000 2xl:w-1200 absolute left-428 top-413 bg-gradient-to-r from-headLinerStart from-32.36% to-headLinerEnd to-79.42%"></div>

        {{--開催情報--}}
        <section class="commonSectionStyles w-full">
            <div class="w-[90%] lg:w-[75%] md:events flexColumnCenter flex-wrap md:flex-row md:justify-between md:items-start gap-12 lg:gap-24">
                @foreach($categories as $key=>$value)
                    @if(count($value->category)>0)
                        <article class="flexColumnCenter gap-9 shrink-0 w-full md:w-[45%]">
                            <h3 class="text-base font-bold leading-7">
                                    {{$value["category_name"]}}
                            </h3>

                            @foreach($value->category as $idx =>$val)
                                <div class="flexBetween w-full self-stretch border border-solid border-titleBlack p-4 rounded-8 bg-white shadow-border">
                                    <aside class="flexColumn items-start gap-2">
                                        <p class="text-xs font-normal">{{$val["date"]}}</p>
                                        <p class="text-sm font-normal">{{$val["title"]}}</p>
                                    </aside>
                                    <div><i class="fa-solid fa-caret-right"></i></div>
                                </div>
                            @endforeach
                        </article>
                    @endif
                @endforeach
            </div>
        </section>

        {{--会社紹介--}}
        <section id="about" class="flex flex-col-reverse gap-12 md:flexCenter py-24 lg:py-32 mx-4">
            <img src="{{asset("img/kikukawaPic02.jpg")}}" class="rounded-15 shrink-0 object-cover md:w-[40%]" alt="image">
            <article class="flexColumnCenter gap-12 md:w-[40%]">
                <div class="flex flex-col items-start gap-9">
                    {{--タイトル--}}
                    <x-title>会社紹介</x-title>

                    <aside>
                        <p class="text-xl md:text-2xl font-bold text-aboutCompany capitalize">明治30年創業。</p>
                        <p class="text-xl md:text-2xl font-bold text-aboutCompany capitalize leading-8 md:leading-9">
                            加工機のパイオニアとして、現在も世界のモノづくりを牽引しています
                        </p>
                    </aside>
                    <p class="text-base leading-7">
                        1897（明治30）年、日本初の製材・木工機械メーカーとして伊勢で創業。「切る・削る・磨く」技術の革新をし続け、常に新しい様々な分野の加工機を製造・販売しています。</p>
                </div>
                <div>
                    <a class="flex items-center justify-between w-48 py-1.5 px-6 border border-solid border-baseColor rounded-button">詳しく見る<i
                            class="fa-solid fa-arrow-up-right-from-square"></i></a></div>
            </article>
        </section>

        {{--製品紹介--}}
        <section class="commonSectionStyles md:mx-4">
            <div class="lg:w-2/3  flex flex-col items-start gap-8 mx-4">
                <article class="flex flex-col items-start gap-9 mx-4">
                    {{--タイトル--}}
                    <x-title>製品紹介</x-title>

                    <p class="text-xl md:text-2xl font-bold text-aboutCompany capitalize leading-8 md:leading-9 self-stretch">
                        製材機械から鉄道、スマートフォンなど暮らしのあらゆるものに関わっています</p>
                    <p class="text-base leading-7"><i>KIKUKAWA</i>の技術は人々の暮らしの中に幅広く溶け込んで長年にわたりご愛顧いただいております。
                    </p>
                </article>

                {{--コンテンツ--}}
                <article class="flex flex-col justify-center items-start gap-16">
                    <div class="flex items-start justify-center content-start gap-6 flex-wrap w-full">
                        @foreach($products as $key=>$value)
                            <aside class="shadow-item flexColumn overflow-hidden h-230 2xl:h-300 items-center gap-2 pb-4 rounded-8 w-[90%] md:w-[48%] lg:w-[31%]">
                                <img src="{{asset($value->path)}}" class="h-[85%] w-full rounded-8 shrink-0 object-cover" alt="image">
                                <p>{{$value["p_name"]}}</p>
                            </aside>
                        @endforeach
                    </div>
                </article>
            </div>
            <div class="mt-8 md:mt-12">
                <a class="flex items-center justify-between w-48 py-1.5 px-6 border border-solid border-baseColor rounded-button">製品を見る<i
                        class="fa-solid fa-arrow-up-right-from-square"></i></a></div>
        </section>

        {{--メッセージ--}}
        <section id="messages" class="commonSectionStyles md:items-start lg:items-center relative overflow-hidden [&>*:not(:first-child)]:mx-4">

            {{--背景ボール--}}
            <div class="opacity-40 rounded-1019 shadow-headBall h-1000 w-1000 absolute right-650 bottom-470 bg-gradient-to-r from-headLinerEnd from-21.73% to-headLinerStart to-77.55%"></div>

            <div id="test" class="flexColumn items-start gap-8 lg:w-9/12">
                {{--タイトル--}}
                <x-title>メッセージ</x-title>


                    @foreach($messages as $key=>$value)
                        {{--1名のメッセージ--}}
                        <article class="flexColumn md:flex-row items-center gap-12">
                            <aside class="w-full md:w-auto">
                                <div class="w-full md:w-270 md:h-330 flex justify-start items-start relative">
                                    <img src="{{asset($value["path"])}}"
                                         class="rounded-8 w-full h-full object-cover" alt="image">
                                    <img src="{{asset("img/messageBg.jpg")}}"
                                         class="bottom-5 left-0 right-0 m-auto m-0 absolute rounded-8" alt="image">
                                    <aside
                                        class="flexColumn items-center gap-px absolute left-0 right-0 m-0 m-auto bottom-12">
                                        @if($value["role"]!=null)
                                            <p class="text-profile text-center text-xs capitalize">{{$value["role"]}}</p>
                                        @endif
                                        <p class="leading-6 text-center text-profileName capitalize">{{$value["name"]}}</p>
                                    </aside>
                                </div>
                            </aside>
                            <aside class="flexColumn items-start gap-4">
                                <div
                                    class="flex justify-center items-start gap-2.5 pl-4 border-l-4 border-solid border-baseColor">
                                    <p class="font-bold leading-7 capitalize">{{$value["title"]}}</p>
                                </div>
                                <div class="leading-7 capitalize flex flex-col gap-y-8 w-full">
                                   <p class="whitespace-pre-wrap">{{$value["msg"]}}</p>
                                </div>
                            </aside>
                        </article>
                    @endforeach
                </div>
        </section>

        {{--社員インタビュー--}}
        <section id="interviews" class="commonSectionStyles bg-headLinerEnd">
            {{--タイトル--}}
            <div class="mx-4 flex justify-center items-start py-2 px-9 gap-2.5 rounded-4 border-l-8 border-solid border-baseColor bg-white">
                <p class="text-2xl font-semibold text-baseColor leading-6">社員インタビュー</p>
            </div>

            {{--コンテンツ--}}
            <livewire:modal :interviews="$interviews"></livewire:modal>
        </section>

        {{--募集職種・募集要項--}}
        <section id="jobs" class="commonSectionStyles mx-4 w-full 2xl:w-[85%]">
            {{--タイトル--}}
            <x-title>募集職種・募集要項</x-title>

            <div class="flexColumnCenter md:flex-row md:flex-wrap md:items-start lg:justify-between gap-y-14 md:w-[90%]">
                {{--各部門--}}
                @foreach($job_recruits as $value)
                    <article class="flexColumn items-start gap-2.5 relative  w-11/12 lg:w-[47%] rounded-8 bg-white shadow-depart overflow-hidden">
                        {{--背景ボール--}}
                        <div>
                            <div class="absolute -top-8 lg:-top-12 -left-12 md:-left-8 w-275 h-277 rounded-277 bg-gradient-to-r from-departStart from-0% to-departEnd to-100%"></div>
                            {{--                            <div class="absolute lg:-top-10 -top-5 right-200 md:right-600 lg:right-410 w-275 h-277 rounded-277 bg-gradient-to-r from-departStart from-0% to-departEnd to-100%"></div>--}}
                        </div>
                        {{--部門詳細テキスト--}}
                        <div class="flexColumn items-start gap-4 p-6 z-30">
                            <p class="text-profileName text-2xl font-bold opacity-90">{{$value["title"]}}</p>
                            <aside class="flex flex-col items-start gap-9">
                                <div>
                                    @foreach($value->job_opening as $key=>$val)
                                        <aside class="md:text-base text-sm">
                                            @if($val["job_title"]!=null)
                                                <p>■{{$val["job_title"]}}</p>
                                            @endif

                                            @if($val["job_content"]!=null)
                                                <p>{{$val["job_content"]}}</p>
                                            @endif
                                        </aside>
                                    @endforeach
                                </div>

                                {{--募集人数などあれば表示、なければスキップ--}}
                                <div class="flexColumn items-start gap-4 self-stretch">
                                    @if($value["job_target"]!=null)
                                        <aside class="flexColumn items-start gap-2 self-stretch">
                                            <div
                                                class="flex items-start gap-2.5 py-0.5 px-2 rounded-4 bg-titleBlack">
                                                <p class="text-white font-bold text-xs">募集対象</p>
                                            </div>
                                            <p class="md:text-base text-sm">{{$value["job_target"]}}</p>
                                        </aside>
                                     @endif
                                    @if($value["recruit_number"]!=null)
                                        <aside class="flexColumn items-start gap-2 self-stretch">
                                            <div
                                                class="flex items-start gap-2.5 py-0.5 px-2 rounded-4 bg-titleBlack">
                                                <p class="text-white font-bold text-xs">募集人数</p>
                                            </div>
                                            <p class="md:text-base text-sm">{{$value["recruit_number"]}}</p>
                                        </aside>
                                    @endif
                                    @if($value["ideal_emp"]!=null)
                                        <aside class="flexColumn items-start gap-2 self-stretch">
                                            <div
                                                class="flex items-start gap-2.5 py-0.5 px-2 rounded-4 bg-titleBlack">
                                                <p class="text-white font-bold text-xs">希望する人材像</p>
                                            </div>
                                            <p class="md:text-base text-sm">{{$value["ideal_emp"]}}</p>
                                        </aside>
                                    @endif
                                </div>
                            </aside>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        {{--待遇・福利厚生--}}
        <section class="commonSectionStyles mx-4 w-full 2xl:w-[85%]">
            {{--タイトル--}}
            <x-title>待遇・福利厚生</x-title>
            {{--コンテンツ--}}
            <div class="flex flex-col items-center gap-8 md:w-[90%]">
                <?php $counter =0; ?>
                <div class="flexColumnCenter md:flex-row md:items-start md:justify-between flex-wrap gap-y-8">
                    @foreach($benefits as $key=>$value)
                        <x-benefit :value="$value"></x-benefit>
                    @endforeach
                </div>
            </div>
        </section>

        {{--採用フロー--}}
        <section class="commonSectionStyles mx-4 w-[90%] lg:w-full 2xl:w-[85%]">
            {{--タイトル--}}
            <x-title>採用フロー</x-title>
            {{--コンテンツ--}}
            <div class="flexColumnCenter md:flex-row md:items-start gap-16 lg:w-[90%]">

                {{--フロー--}}
                <div class="flexColumn items-start gap-12 shadow-border py-16 px-6 md:px-12 md:w-[50%] rounded-4 bg-white">
                    {{--フロー図--}}
                    <aside class="flexColumn justify-center items-start gap-2 self-stretch">
                        @foreach($recruit_flow as $value)
                            <div class="flex items-start gap-6 self-stretch">
                                <div class="flexColumn items-center gap-4">
                                    <div class="flexCenter w-30 h-30 md:w-36 md:h-36 shrink-0 rounded-30 bg-headLinerEnd">
                                        <p class="text-white text-base lg:text-xl font-semibold leading-6 shrink-0">{{$value["num"]}}</p>
                                    </div>
                                    @if($value["num"]!=6)
                                        <div class="h-30 w-0.5 bg-headLinerEnd"></div>
                                    @endif
                                </div>

                                <p class="flex justify-start items-center h-30 md:h-36 text-base lg:text-xl">{{$value["title"]}}</p>
                            </div>
                        @endforeach
                    </aside>

                    {{--フロー図下部テキスト--}}
                    <aside class="flexColumn items-start gap-3 text-sm md:text-base">
                        <p class="leading-4 font-bold">※説明会・選考での交通費等について</p>
                        <p>公共交通機関は当社が負担いたします。 遠方の場合、制限はありますが、ご相談ください。</p>
                    </aside>
                </div>

                {{--提出書類--}}
                <div class="flexColumnCenter gap-6 p-9 shadow-border w-full md:w-[50%] rounded-8 bg-white">
                    <p class="font-bold">提出書類</p>
                    <aside class="flexColumn items-start gap-4">
                        @foreach($recruit_documents as $value)
                            <div class="flex items-center gap-2.5">
                                <img src="{{asset("img/kikukawaPic11.jpg")}}" class="w-20 h-20" alt="image">
                                <p class="font-medium">{{$value}}</p>
                            </div>
                        @endforeach
                    </aside>
                </div>
            </div>
        </section>

        {{--よくある質問--}}
        <section class="commonSectionStyles overflow-hidden relative w-full 2xl:w-[85%]">
            {{--スクエア背景--}}
            <div class="w-1820 h-507 opacity-50 absolute top-0 rotate-45 bg-gradient-to-r from-square from-7.08% to-headLinerEnd to-98.07% shrink-0"></div>
            {{--タイトル--}}
            <x-title>よくある質問</x-title>
            {{--コンテンツ--}}
            <div class="w-full lg:w-[90%] mx-4 flexColumnCenter flex-wrap md:flex-row lg:justify-between md:items-start gap-4 z-50 overflow-hidden ">
                @foreach($questions as $idx=>$values)
                    {{--各質問--}}
                    <div class="qa__item z-50 py-6 px-2 flexColumn justify-center gap-6 bg-white shadow-question border border-solid border-questionBorder rounded-15 w-[90%] md:w-[80%] lg:w-[47%] shrink-0">
                        {{--質問--}}
                        <div class="questionTitle qa__head js-ac flex items-center gap-4 ml-4">
                            <div class="flexCenter w-30 h-30 md:h-42 md:w-42 rounded-10 bg-questionIcon">
                                <i class="fa-solid fa-chevron-down questionIcon"></i>
                            </div>
                            <p class="text-xs md:text-base lg:text-lg font-bold leading-6 opacity-90">{{$values["question"]}}</p>
                        </div>
                        {{--回答（最初非表示）--}}
                        <div class="qa__body">
                            <p>{{$values["answer"]}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{--フッター--}}
       <x-footer></x-footer>
    </main>
</x-layout>

