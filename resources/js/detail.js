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
            ["image",'video'],

            //URLリンク
            ['link'] ,
            ['clean']
        ],
    },
    placeholder: 'こちらにご入力ください...',
    theme: 'snow', // or 'bubble'
    bounds: document.body
});

// =========================================================[img]================================================================

function selectLocalImage() {
    const input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.click();

    // Listen upload local image and save to server
    input.onchange = () => {
        const file = input.files[0];

        // file type is only image.
        if (/^image\//.test(file.type)) {
            // saveToServer(file);
        } else {
            console.warn('You could only upload images.');
        }
    };
}
quill.getModule('toolbar').addHandler('image', () => {
    selectLocalImage();
});

// ======================================[エディター内にデータを表示する]================================================================
//表示させる文章データを取得
let json_data = Laravel.data
let setdata = [

]
json_data.forEach((value,idx)=>{
    setdata.push({"insert":JSON.parse(value["insert"]),"attributes":JSON.parse(value["attributions"])})
})

//データを表示
quill.setContents(setdata);

// ======================================[データをlaravelへ受け渡し]================================================================
document.getElementById('submit_btn').addEventListener('click', (e) => {
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

    const route = e.target.getAttribute('data-route');
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
})

