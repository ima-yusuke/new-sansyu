// import "./index.js"

import Quill from 'quill';
import 'quill/dist/quill.core.css';
import 'quill/dist/quill.snow.css';
import Axios from "axios";

const quill = new Quill('#editor', {
    modules: {
        toolbar: [
            [{ header: [1, 2,3,4,5,6,false] }],
            [{ 'font': [] }],
            ['bold', 'italic', 'underline','strike'],
            ['blockquote', 'code-block'],
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            [{ 'indent': '-1' }, { 'indent': '+1' }],
            [{ 'color': [] }, { 'background': [] }],

            [{ 'align': [] }],
            ["image",'video'],
            //数式
            ['formula'],
            //URLリンク
            ['link'] ,
            ['clean']
        ],
    },
    placeholder: 'こちらにご入力ください...',
    theme: 'snow', // or 'bubble'
});



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
            response => console.log(response.data)
        ).catch(
            error => console.log(error)
        )
})

