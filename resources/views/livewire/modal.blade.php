<div class="flex flex-wrap justify-center items-center gap-4 mx-4">
    @foreach($interviews as $key=>$value)
        {{--１名分の詳細--}}
        <article class="w-full md:max-w-[250px] lg:max-w-[320px]">
            <aside class="relative w-full h-277">
                <img src="{{asset($value["path_1"])}}" class="w-full h-full object-cover">
                <p class="absolute top-0 text-white bg-baseColor px-3 py-1">{{$value["job_dpt"]}}</p>
            </aside>
            <aside class="bg-white flex flex-col items-center gap-y-4 py-6">
                <h4 class="text-baseColor font-bold text-xl">{{$value["name"]}}</h4>
                <div class="text-textGray">
                    <P>{{$value["hire_year"]}}入社</P>
                    <p>{{$value["school"]}} {{$value["department"]}}</p>
                    <p>{{$value["faculty"]}} 卒業</p>
                </div>

                {{--Open modalbox--}}
                <div>
                    <button wire:click="openModal({{$value['id']}})" class="flex items-center justify-between w-full py-1.5 px-6 border border-solid border-baseColor rounded-button">インタビューを見る→</button>
                </div>
            </aside>
        </article>
    @endforeach

    @if(isset($selectedEmployee))
        <x-employeeModal :modalData="$selectedEmployee"></x-employeeModal>
    @endif
</div>

{{--スクロール連載防ぐためbodyにcss追加--}}

{{--<script>--}}
{{--    let test = document.getElementsByClassName("test2");--}}

{{--    for(let i= 0; i<test.length;i++){--}}
{{--        test[i].addEventListener("click",function (){--}}
{{--            let body = document.getElementsByTagName("body")[0];--}}
{{--            body.classList.add("test")--}}
{{--        })--}}
{{--    }--}}

{{--</script>--}}



