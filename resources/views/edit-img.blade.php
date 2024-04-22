<x-dash-layout>

    <div class="md:flex">
        {{--アップロード後のtabメニュー--}}
        <ul id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist" style="display: none" class="flex-column space-y space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0">
            <li class="me-2" role="presentation">
                <a href="#" id="read-img-tab" data-tabs-target="#read-img" role="tab" aria-controls="read-img" aria-selected="false" class="whitespace-nowrap inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-blue-50 hover:bg-gray-100 w-full">
                    <i class="fa-solid fa-upload pr-1"></i>画像読込み
                </a>
            </li>
            <li class="me-2" role="presentation">
                <a href="#imagePreview" id="preview-img-tab" aria-selected="false" class="whitespace-nowrap inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full">
                    <i class="fa-solid fa-arrow-down pr-1"></i>プレビュー
                </a>
            </li>
            <li class="me-2" role="presentation">
                <a href="#" id="size-img-tab" data-tabs-target="#size-img" role="tab" aria-controls="size-img" aria-selected="false" class="whitespace-nowrap inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full">
                    <i class="fa-solid fa-up-right-and-down-left-from-center pr-1"></i>サイズ変更
                </a>
            </li>
            <li class="me-2" role="presentation">
                <a href="#" id="trimming-img-tab" data-tabs-target="#trimming-img" role="tab" aria-controls="trimming-img" aria-selected="false" class="whitespace-nowrap inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full">
                    <i class="fa-solid fa-scissors pr-1"></i>トリミング
                </a>
            </li>
            <li class="me-2" role="presentation">
                <a href="#" id="download-img-tab" data-tabs-target="#download-img" role="tab" aria-controls="download-img" aria-selected="false" class="whitespace-nowrap inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full">
                    <i class="fa-solid fa-file-arrow-down pr-1"></i>ダウンロード
                </a>
            </li>
        </ul>

        {{--最初のtabメニュー--}}
        <ul id="first-ul" class="flex-column space-y space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0">
            <li class="me-2" role="presentation">
                <a href="#" class="text-blue-600 whitespace-nowrap inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full">
                    <i class="fa-solid fa-upload pr-1"></i>画像読込み
                </a>
            </li>
            <li class="me-2" role="presentation">
                <a class="inactiveImg whitespace-nowrap inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full">
                    <i class="fa-solid fa-arrow-down pr-1"></i>プレビュー
                </a>
            </li>
            <li class="me-2" role="presentation">
                <a href="#" class="inactiveImg whitespace-nowrap inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full">
                    <i class="fa-solid fa-up-right-and-down-left-from-center pr-1"></i>サイズ変更
                </a>
            </li>
            <li class="me-2" role="presentation">
                <a href="#" class="inactiveImg whitespace-nowrap inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full">
                    <i class="fa-solid fa-scissors pr-1"></i>トリミング
                </a>
            </li>
            <li class="me-2" role="presentation">
                <a href="#" class="inactiveImg whitespace-nowrap inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full">
                    <i class="fa-solid fa-file-arrow-down pr-1"></i>ダウンロード
                </a>
            </li>
        </ul>

        <div id="default-tab-content" class="p-6 bg-gray-50 text-medium text-gray-500 rounded-lg w-full">
            <!-- 画像アップロード -->
            <div class="hidden p-4 rounded-lg bg-gray-50" id="read-img" role="tabpanel" aria-labelledby="read-img-tab">
                <input type="file" id="fileInput" accept="image/*">
            </div>

            {{--サイズ変更--}}
            <div class="flex gap-8 p-4 rounded-lg bg-gray-50" id="size-img" role="tabpanel" aria-labelledby="size-img-tab">
                <div>
                    <label for="sizeInput">画像サイズ:</label>
                    <input type="number" id="sizeInput">
                </div>
                <div>
                    <button id="resizeButton" type="button" class="btn btn-border shadow-xl text-sm px-10 py-3 text-center">
                        <i class="fa-solid fa-up-right-and-down-left-from-center pr-1"></i>変更
                    </button>
                </div>
            </div>

            {{--トリミング--}}
            <div class="p-4 rounded-lg bg-gray-50" id="trimming-img" role="tabpanel" aria-labelledby="trimming-img-tab">
                <div>
                    <button id="cutButton" type="button" class="btn btn-border shadow-xl text-sm px-10 py-3 text-center">
                        <i class="fa-solid fa-scissors pr-1"></i>トリミング
                    </button>
                </div>
            </div>

            <!-- ダウンロードリンク -->
            <div class="hidden p-4 rounded-lg bg-gray-50 " id="download-img" role="tabpanel" aria-labelledby="download-img-tab">
                <a id="downloadLink" download="resized_image.png" class="btn btn-border shadow-xl text-sm px-8 py-3 text-center block w-[200px] h-full">
                    <i class="fa-solid fa-file-arrow-down pr-1"></i>ダウンロード
                </a>
            </div>

            {{--トリミング用の画像--}}
            <div style='width: 600px; height: 400px;' id="trimming">

            </div>
        </div>
    </div>

    <!-- リサイズ後の画像を描画するためのCanvas -->
    <canvas id="canvas" style="display: none;"></canvas>

    <!-- 画像のプレビュー -->
    <div class="flex justify-center">
        <img id="imagePreview" src="#" alt="プレビュー" class="py-6">
    </div>


    <script>
        let preview = document.getElementById('imagePreview');
        let cropper = null;
        let imageDataUrl =null;
        let flag = true;
        let uniqueId = null;

        // ファイルアップロード前の他のボタンを押すとアラート
        let lists =document.getElementsByClassName("inactiveImg");

        Array.from(lists).forEach((value)=>{
            value.addEventListener("click",function (){
                alert("ファイルを選択してください")
            })
        })

        function removeTrimmingImg() {
            document.getElementById(uniqueId).remove();
        }

        function createTrimImg(){
            let newImg = document.createElement("img");
            uniqueId = "trimmingImg_" + Date.now(); // 一意のidを生成
            newImg.setAttribute('id', uniqueId);
            newImg.setAttribute('src', imageDataUrl);
            let trimDiv = document.getElementById("trimming");
            trimDiv.appendChild(newImg);
            cropper = new Cropper(newImg);
        }

        // ===============================[ファイルinputにアップロード時にプレビュー表示]==============================
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0]; // 選択されたファイルを取得
            const reader = new FileReader(); // FileReaderオブジェクトを作成

            reader.onload = function(event) {
                imageDataUrl = event.target.result; // 画像のデータURLを取得
                preview.src = imageDataUrl;

                // プレビュー画像のリセット
                preview.style.width = null;
                preview.style.height =null;

                // ファイル再読み込み時の処理
                if(flag===false) {
                    cropper.destroy()
                    createTrimImg()
                }

                document.getElementById("first-ul").style.display = "none";
                document.getElementById("default-tab").style.display = "block";
            };
            reader.readAsDataURL(file); // ファイルを読み込む
        });

        // ===================================[トリミング]===========================================
        let btn_A = document.getElementById("read-img-tab");
        let btn_B = document.getElementById("size-img-tab");
        let btn_C = document.getElementById("download-img-tab");
        let btns = [btn_A,btn_B,btn_C];
        btns.forEach((value)=>{
            value.addEventListener("click",function (){
                cropper.destroy()
                removeTrimmingImg()
                flag = true;
            })
        })


        document.getElementById("trimming-img-tab").addEventListener("click",function (){
            if(flag===true) {
                createTrimImg();
                flag = false;
            }
        })

        let cutBtn = document.getElementById('cutButton');
        cutBtn.addEventListener('click', function () {
            // トリミングパネル内のcanvasを取得
            let canvas = cropper.getCroppedCanvas()

            // canvasをbase64に変換しpreviewにセットする
            preview.src = canvas.toDataURL();
        });

        // ===================================[画像のwidth取得しinput valueに追加]===========================================
        function setImgWidth() {
            let widthInPixels = parseInt(preview.clientWidth);
            let inp = document.getElementById("sizeInput");
            inp.value = null;
            inp.value= widthInPixels;
        }

        document.getElementById("size-img-tab").addEventListener("click",setImgWidth);

        // ===================================[サイズ変更]===========================================
        // サイズ変更ボタンをクリック時の処理
        document.getElementById('resizeButton').addEventListener('click', function() {
            let size = document.getElementById('sizeInput').value; // サイズを取得

            if (size) { // サイズが入力されている場合
                const canvas = document.getElementById('canvas'); // キャンバス要素を取得
                const ctx = canvas.getContext('2d'); // 2Dコンテキストを取得

                // サイズに基づいて画像をリサイズ
                preview.style.width = size + 'px'; // 幅を設定
                preview.style.height = 'auto'; // 高さを自動設定
                canvas.width = size; // キャンバスの幅を設定
                canvas.height = preview.height; // キャンバスの高さを画像の高さに合わせる
                ctx.drawImage(preview, 0, 0, size, preview.height); // 画像をリサイズして描画
                const dataUrl = canvas.toDataURL('image/png'); // Canvasを画像データURLに変換
                const downloadLink = document.getElementById('downloadLink'); // ダウンロードリンクを取得
                downloadLink.href = dataUrl; // ダウンロードリンクのhref属性に画像データURLを設定
            }
        });

    </script>
</x-dash-layout>
