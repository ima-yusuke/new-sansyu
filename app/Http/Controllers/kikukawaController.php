<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Event;
use App\Models\Message;
use App\Models\Product;
use App\Models\Question;
use App\Models\Interview;
use App\Models\JobOpening;
use App\Models\Benefit;
use Illuminate\Http\Request;

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

    public function openDetail($id)
    {
        return view("detail",compact("id"));
    }

}

