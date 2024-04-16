<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\EventDetails;
use App\Models\EventView;
use App\Models\Message;
use App\Models\Product;
use App\Models\Question;
use App\Models\Interview;
use App\Models\JobOpening;
use App\Models\Benefit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class kikukawaController extends Controller
{
    //
    public function giveInfo()
    {

//        $eventInfos = Event::all();

        $categories = Category::all();

        $products = Product::all();

        $messages = Message::all();

        $questions = Question::all();

        $interviews = Interview::all();

        $job_recruits = JobOpening::all();

        $benefits = Benefit::all();

        $recruit_flow = [
            ["num" => 1, "title" => "エントリー"],
            ["num" => 2, "title" => "説明会(対面・WEB)"],
            ["num" => 3, "title" => "エントリーシート提出(随時)"],
            ["num" => 4, "title" => "書類選考"],
            ["num" => 5, "title" => "筆記試験・役員面接"],
            ["num" => 6, "title" => "内々定"]
        ];

        $recruit_documents = ["履歴書(写真付き)", "成績証明書", "卒業見込証明書"];


        return view("kikukawa", compact("categories", "products", "messages", "recruit_flow", "recruit_documents", "questions", "interviews", "job_recruits", "benefits"));
    }

    //ユーザー側イベントページ表示
    public function openDetail($id)
    {
        //上記$idはevent_detailsのevent_id（eventsのid）

        $selectedEvent = EventView::where('id', $id)->first();

        $data= EventDetails::where("event_id",$id)->get();

//        foreach (json_decode($data[0]->attributions) as $idx=>$val){
//            var_dump($idx);
//        }

        return view("detail",compact("selectedEvent","data"));
    }

    //管理側イベントページ表示
    public function openEditDetail($id)
    {
        $selectedEvent = EventView::where('id', $id)->first();
        $data= EventDetails::where("event_id",$id)->get();

        return view("edit-detail",compact("selectedEvent","data"));
    }


    //管理画面で作成したデータをDBに保存
    public function storeData(Request $request)
    {

        DB::beginTransaction();
        try {
            $id = $request->id;

            // レコードを削除
            EventDetails::where("event_id",$id)->delete();

            foreach ($request->ops as $value){
                $posts = new EventDetails();
                $posts->event_id = $id;
                $posts->insert = $value["insert"];
                if (isset($value["attributes"])) {
                    $posts->attributions = json_encode($value["attributes"]);
                } else {
                    $posts->attributions = null;
                }
                $data[] = $posts;
                $posts->save();
            };

            DB::commit();
            return ['data' => $data];
        } catch (\Exception $e) {
            DB::rollback();
            return ['msg' => $e->getMessage(), 'request' => $request->all()];
        }
    }

    public function editImg()
    {
        return view("edit-img");
    }
}

