import "./index.js"

import Quill from 'quill';
import 'quill/dist/quill.core.css';
import 'quill/dist/quill.snow.css';


const quill = new Quill('#text-wrapper', {
    modules: {
        toolbar: [
            [{ header: [1, 2, false] }],
            ['bold', 'italic', 'underline'],
            ['image', 'code-block'],
        ],
    },
    placeholder: 'Compose an epic...',
    theme: 'snow', // or 'bubble'
});
