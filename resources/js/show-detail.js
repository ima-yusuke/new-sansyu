import Quill from "quill";
import 'quill/dist/quill.core.css';
import 'quill/dist/quill.snow.css';
function QuillPageMake() {

    let quill; //エディタ情報
    let json_data; //エディタに表示させるデータ（json形式）

    //エディタの情報を生成
    quill = new Quill("#viewer", {
        //ツールバー無デザイン
        readOnly: true
    });

    //表示させる文章データを取得
    json_data = Laravel.data
     let setdata = [

     ]
    json_data.forEach((value,idx)=>{
        setdata.push({"insert":JSON.parse(value["insert"]),"attributes":JSON.parse(value["attributions"])})
    })

    //データを表示
    quill.setContents(setdata);

    return quill;
}

QuillPageMake();


