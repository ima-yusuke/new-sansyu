<x-dash-layout>
    <section class="flex flex-col items-center justify-center gap-4">
        <!-- 画像を選択するためのファイル入力フィールド -->
        <div>
            <input type="file" id="fileInput" accept="image/*">
        </div>

        <div>
            <label for="sizeInput">画像サイズ:</label>
            <input type="number" id="sizeInput" min="1" placeholder="100">
        </div>

        <!-- サイズ変更ボタン -->
        <div class="flex justify-center gap-4 py-10">
            <div>
                <button id="resizeButton" type="button" class="btn btn-border shadow-xl text-sm px-10 py-3 text-center">
                    <i class="fa-solid fa-up-right-and-down-left-from-center pr-1"></i>サイズ変更
                </button>
            </div>
            <div>
                <button id="cutButton" type="button" class="btn btn-border shadow-xl text-sm px-10 py-3 text-center">
                    <i class="fa-solid fa-scissors pr-1"></i>トリミング
                </button>
            </div>
            <div>
                <a id="downloadLink" download="resized_image.png" style="display: none;" class="btn btn-border shadow-xl text-sm px-8 py-3 text-center h-full">
                    <i class="fa-solid fa-file-arrow-down pr-1"></i>ダウンロード
                </a> <!-- ダウンロードリンク -->
            </div>
        </div>

        <canvas id="canvas" style="display: none;"></canvas> <!-- リサイズ後の画像を描画するためのCanvas -->

        <div style='width: 600px; height: 400px; display: none;' id="trimmingDiv">
            {{--トリミング用の画像--}}
            <img id="trimmingImg" src="#">
        </div>

        <img id="imagePreview" src="#" alt="プレビュー" class="py-6"> <!-- リサイズされた画像のプレビュー -->

    </section>

    <script>

        const img = document.getElementById('trimmingImg');
        let preview = document.getElementById('imagePreview');

        // ファイルinputにアップロード時にプレビュー表示
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0]; // 選択されたファイルを取得
            const reader = new FileReader(); // FileReaderオブジェクトを作成

            reader.onload = function(event) {
                document.getElementById('trimmingDiv').style.display = 'block';

                const imageDataUrl = event.target.result; // 画像のデータURLを取得
                img.src = imageDataUrl; // プレビュー要素の画像を設定
                preview.src = imageDataUrl;

                // トリミング
                let cropper = new Cropper(img);
                document.getElementById('cutButton').addEventListener('click', function () {
                    // トリミングパネル内のcanvasを取得
                    let canvas = cropper.getCroppedCanvas()

                    // canvasをbase64に変換
                    let data = canvas.toDataURL();

                    // previewにセットする
                    preview.src = data;
                });
            };
            reader.readAsDataURL(file); // ファイルを読み込む
        });

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
