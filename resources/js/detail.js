// import "./index.js"

import Quill from 'quill';
import 'quill/dist/quill.core.css';
import 'quill/dist/quill.snow.css';
import Axios from "axios";

const quill = new Quill('#editor', {
    modules: {
        toolbar: [
            [{ header: [1, 2,3,4,5,6,false] },],
            [{'size':[]}],
            [{ 'font': [] }],
            ['bold', 'italic', 'underline','strike'],
            ['blockquote'],
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            [{ 'indent': '-1' }, { 'indent': '+1' }],
            [{ 'color': [] }, { 'background': [] }],

            [{ 'align': [] }],
            ["image"],

            //URLリンク
            ['link'] ,
            ['clean']
        ],
    },
    placeholder: 'こちらにご入力ください...',
    theme: 'snow', // or 'bubble'
    bounds: document.body
});

let btn = document.getElementById('submit_btn');
let newImg = null;
let flag = false;
let te = null;
// =========================================================[img]================================================================

function selectLocalImage() {
    const input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute("accept", "image/*");
    input.click();

    // Listen upload local image and save to server
    input.onchange = () => {
        const file = input.files[0];

        // FileReader インスタンスを作成
        const reader = new FileReader();

        // 読み込みが完了したときの処理
        reader.onload = () => {

            // プロパティを使用して読み込んだデータにアクセスする
            const base64String = reader.result;
            console.log(base64String);
            newImg = base64String;
            te = quill.getContents().ops;
            showdata()
        };

        // ここで読み込みが完了したときに onload イベントが発生し、上記コールバック関数が呼び出される。
        reader.readAsDataURL(file);
    };
}

// toolbarのimageをクリックしたときに下記selectLocalImage()が実行される
quill.getModule('toolbar').addHandler('image', () => {
    selectLocalImage();
});

// ======================================[エディター内にデータを表示する]================================================================
//表示させる文章データを取得
function showdata() {

    // json_data:すでにデータべースに保存されてるデータ
    let json_data = null;
    if(flag === false) {
        json_data = Laravel.data;
    }else{
        json_data = te;
    }
    console.log(json_data)

    let setdata = []
    json_data.forEach((value, idx) => {
        if(flag===false) {
            setdata.push({"insert": JSON.parse(value["insert"]), "attributes": JSON.parse(value["attributions"])})
        }else{
            setdata.push({"insert": value["insert"], "attributes": value["attributions"]})
        }
    })

    if (newImg !== null) {
        setdata.push({
            "insert": {
                "image": newImg
            }
        });
    }

//データを表示
    quill.setContents(setdata);
    newImg = null;
    flag = true;
}

showdata()
// ======================================[データをlaravelへ受け渡し]================================================================

btn.addEventListener('click', () => {
   senddata(btn);
})

// ======================================[データ受け渡しfunction]================================================================

function senddata(btn){
    const ops = quill.getContents().ops;

    const id = document.getElementById("selected_id").value;

    const datas =[];

    ops.forEach((value)=>{
        if(value.attributes!=="undefined") {
            datas.push({"insert": JSON.stringify(value.insert), "attributes": value.attributes});
        }
    })

    const senddata ={
        "id":id,
        "ops":datas
    }

    const route = btn.getAttribute('data-route');
    console.log(datas)
    Axios.post(route, senddata, {
        headers: {
            'Content-Type': 'application/json',
        }
    }).then(
        alert("登録完了"),
        response => console.log(response.data)
    ).catch(
        error => console.log(error)
    )
}
