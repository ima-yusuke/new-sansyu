<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobOpening;
use App\Models\JobCategory;
use Illuminate\Support\Facades\DB;
use function Livewire\store;


class dashJobOpening extends Controller
{
    //

    public function getCountAmount()
    {
        return DB::table('job_categories')
            ->select('job_opening_id')
            ->selectRaw('COUNT(job_opening_id) as job_opening_id')
            ->groupBy('job_opening_id')
            ->get();
    }



    public function showJobOpeningPage()
    {
        $job_openings = JobOpening::all();
        $job_categories = JobCategory::all();
        $tmp_column_count = 0;
        $column_count = $this->getCountAmount();
        foreach($column_count as $key =>$value){
            if($value->job_opening_id>$tmp_column_count){
                $tmp_column_count = $value->job_opening_id;
            }
        }



        return view("job_opening",compact("job_openings","job_categories","tmp_column_count"));
    }

    public function addJobOpening(Request $request)
    {
        $job_openings = new JobOpening();
        $job_openings->title =$request->title;
        $job_openings->job_target =$request->job_target;
        $job_openings->recruit_number =$request->recruit_number;
        $job_openings->ideal_emp =$request->ideal_emp;
        $job_openings->save();


        $tmpCount = 0;
        $tmpArray = $request->all();

        foreach ($tmpArray as $key=> $value){
            if (strpos($key, 'info_content')!==false){
                $tmpCount++;
            }
        }

        for($i=1;$i<=$tmpCount;$i++){
            $job_categories = new JobCategory();
            $job_categories->job_opening_id =$job_openings->id ;
            $tmp_title ="info_title".$i;
            $tmp_content ="info_content".$i;
            $job_categories->job_title = $request->$tmp_title;
            $job_categories->job_content =$request->$tmp_content;
            $job_categories->save();
        }

        // 元のページに戻る
        return redirect()->route('show-job_opening');
    }

    public function updateJobOpening(Request $request, JobOpening $jobOpening , JobCategory $jobCategory)
    {
        //JobOpening table update
        $jobOpening->update([
            "title" => $request->title,
            "job_target" => $request->job_target,
            "recruit_number"=>$request->recruit_number,
            "ideal_emp"=>$request->ideal_emp ,
        ]);

        //JobCategory table update

        //クリックされたjob_opening_idを持つデータを全てDBから取得
        $plans = JobCategory::where("job_opening_id",$request->job_opening_id)->get();

        //既にDBにあるのをupdate
        $count = 0;
        foreach ($plans as $plan){
            $count++;
            $tmp_title ="info_title".$count;
            $tmp_content ="info_content".$count;

            $plan->update([
                "job_title"=>$request[$tmp_title]
            ]);
            if($request[$tmp_content]!=null){
                $plan->update([
                    "job_content" =>$request[$tmp_content]
                ]);
            };
        }

        //最大の募集職種数を取得
        $tmp_column_count = 0;
        $column_count = $this->getCountAmount();
        foreach($column_count as $key =>$value){
            if($value->job_opening_id>$tmp_column_count){
                $tmp_column_count = $value->job_opening_id;
            }
        }

        //もともとnullで新規でデータを入力し追加
        for($i=$count;$i<$tmp_column_count;$i++){
            $job_categories = new JobCategory();
            $job_categories->job_opening_id =$request->id ;
            $tmp_title ="info_title".$i+1;
            $tmp_content ="info_content".$i+1;
            $job_categories->job_title = $request->$tmp_title;
            $job_categories->job_content =$request->$tmp_content;
            if($request->$tmp_content!=null){
                $job_categories->save();
            }
        }


        return redirect()->route('show-job_opening');
    }
}
