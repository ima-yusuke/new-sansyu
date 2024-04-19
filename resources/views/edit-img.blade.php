<x-dash-layout>

    <div class="md:flex">
        <ul id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist" class="flex-column space-y space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0">
            <li class="me-2" role="presentation">
{{--                <a href="#" id="profile-tab" data-tabs-target="#profile" role="tab" aria-controls="profile" aria-selected="false" class="whitespace-nowrap inline-flex items-center gap-2 px-4 py-3 text-white bg-blue-700 rounded-lg active w-full" aria-current="page">--}}
                    <i class="fa-solid fa-arrow-down pr-1"></i>プレビュー
{{--                </a>--}}
            </li>
            <li class="me-2" role="presentation">
                <a href="#" id="profile-tab" data-tabs-target="#profile" role="tab" aria-controls="profile" aria-selected="false" class="whitespace-nowrap inline-flex items-center gap-2 px-4 py-3 text-white bg-blue-700 rounded-lg active w-full" aria-current="page">
                    <i class="fa-solid fa-arrow-down pr-1"></i>画像読込み
                </a>
            </li>
            <li class="me-2" role="presentation">
                <a href="#" id="dashboard-tab" data-tabs-target="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false" class="whitespace-nowrap inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full">
                    <i class="fa-solid fa-up-right-and-down-left-from-center pr-1"></i>サイズ変更
                </a>
            </li>
            <li class="me-2" role="presentation">
                <a href="#" id="settings-tab" data-tabs-target="#settings" role="tab" aria-controls="settings" aria-selected="false" class="whitespace-nowrap inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full">
                    <i class="fa-solid fa-scissors pr-1"></i>トリミング
                </a>
            </li>
            <li class="me-2" role="presentation">
                <a href="#" id="contacts-tab" data-tabs-target="#contacts" role="tab" aria-controls="contacts" aria-selected="false" class="whitespace-nowrap inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full">
                    <i class="fa-solid fa-file-arrow-down pr-1"></i>ダウンロード
                </a>
            </li>
        </ul>

        <div id="default-tab-content" class="p-6 bg-gray-50 text-medium text-gray-500 rounded-lg w-full">
            <!-- 画像を選択するためのファイル入力フィールド -->
            <div class="hidden p-4 rounded-lg bg-gray-50" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <input type="file" id="fileInput" accept="image/*">
            </div>

            {{--サイズ変更--}}
            <div class="flex gap-8 p-4 rounded-lg bg-gray-50" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
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

            {{--トリミング用の画像--}}
            <div style='width: 600px; height: 400px;' id="trimming">
                {{--トリミング用の画像--}}
                {{--                <img id="trimmingImg" src="#">--}}
            </div>


            <div class="p-4 rounded-lg bg-gray-50" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                <div>
                    <button id="cutButton" type="button" class="btn btn-border shadow-xl text-sm px-10 py-3 text-center">
                        <i class="fa-solid fa-scissors pr-1"></i>トリミング
                    </button>
                </div>
            </div>

            <!-- ダウンロードリンク -->
            <div class="hidden p-4 rounded-lg bg-gray-50 " id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                <a id="downloadLink" download="resized_image.png" style="display: none;" class="btn btn-border shadow-xl text-sm px-8 py-3 text-center h-full">
                    <i class="fa-solid fa-file-arrow-down pr-1"></i>ダウンロード
                </a>
            </div>
        </div>
    </div>

    <!-- リサイズ後の画像を描画するためのCanvas -->
    <canvas id="canvas" style="display: none;"></canvas>

    <!-- 画像のプレビュー -->
    <img id="imagePreview" src="#" alt="プレビュー" class="py-6">


    <script>
        let trimmingImg = null;
        let preview = document.getElementById('imagePreview');
        let cropper = null;
        let imageDataUrl =null;
        let flag = true;
        let uniqueId = null;

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

                // ファイル再読み込み時の処理
                if(flag===false) {
                    cropper.destroy()
                    createTrimImg()
                }
            };
            reader.readAsDataURL(file); // ファイルを読み込む
        });

        // ===================================[トリミング]===========================================
        let btn_A = document.getElementById("profile-tab");
        let btn_B = document.getElementById("dashboard-tab");
        let btn_C = document.getElementById("contacts-tab");
        let btns = [btn_A,btn_B,btn_C];
        btns.forEach((value)=>{
            value.addEventListener("click",function (){
                cropper.destroy()
                removeTrimmingImg()
                flag = true;
            })
        })


        document.getElementById("settings-tab").addEventListener("click",function (){
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
            inp.setAttribute('value', widthInPixels);
        }

        document.getElementById("dashboard-tab").addEventListener("click",setImgWidth);

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
                downloadLink.style.display = 'block'; // ダウンロードリンクを表示
            }
        });

    </script>
</x-dash-layout>
