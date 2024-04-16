<x-dash-layout>

    <section class="flex flex-col items-center justify-center gap-4">
        <!-- 画像を選択するためのファイル入力フィールド -->
        <div>
            <input type="file" id="fileInput" accept="image/*">
        </div>

        <!-- 幅を入力するフィールド -->
        <div>
            <label for="widthInput">横幅:</label>
            <input type="number" id="widthInput" min="1">
        </div>

        <!-- 高さを入力するフィールド -->
        <div>
            <label for="heightInput">縦幅:</label>
            <input type="number" id="heightInput" min="1">
        </div>

        <!-- サイズ変更ボタン -->
        <div class="flex justify-center gap-4 py-10">
            <div>
                <button id="resizeButton" type="button" class="btn btn-border shadow-xl text-sm px-10 py-3 text-center">サイズ変更</button>
            </div>
            <div>
                <a id="downloadLink" download="resized_image.png" style="display: none;" class="btn btn-border shadow-xl text-sm px-8 py-3 text-center h-full">ダウンロード</a> <!-- ダウンロードリンク -->
            </div>
        </div>

        <canvas id="canvas" style="display: none;"></canvas> <!-- リサイズ後の画像を描画するためのCanvas -->


        <img id="imagePreview" src="#" alt="プレビュー"> <!-- リサイズされた画像のプレビュー -->

    </section>


    <script>
        // ファイルinputにアップロード時にプレビュー表示
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0]; // 選択されたファイルを取得
            const reader = new FileReader(); // FileReaderオブジェクトを作成

            reader.onload = function(event) {
                const imageDataUrl = event.target.result; // 画像のデータURLを取得
                const img = document.getElementById('imagePreview'); // プレビュー要素を取得
                img.src = imageDataUrl; // プレビュー要素の画像を設定
            };

            reader.readAsDataURL(file); // ファイルを読み込む
        });

        // サイズ変更ボタンをクリック時の処理
        document.getElementById('resizeButton').addEventListener('click', function() {
            const img = document.getElementById('imagePreview'); // プレビュー要素を取得
            const width = document.getElementById('widthInput').value; // 幅を取得
            const height = document.getElementById('heightInput').value; // 高さを取得

            if (width && height) { // 幅と高さが入力されている場合
                img.style.width = width + 'px'; // 幅を設定
                img.style.height = height + 'px'; // 高さを設定
                const canvas = document.getElementById('canvas'); // キャンバス要素を取得
                const ctx = canvas.getContext('2d'); // 2Dコンテキストを取得
                ctx.drawImage(img, 0, 0, width, height); // 画像をリサイズして描画
                const dataUrl = canvas.toDataURL('image/png'); // Canvasを画像データURLに変換
                const downloadLink = document.getElementById('downloadLink'); // ダウンロードリンクを取得
                downloadLink.href = dataUrl; // ダウンロードリンクのhref属性に画像データURLを設定
                downloadLink.style.display = 'block'; // ダウンロードリンクを表示
            }
        });


    </script>
</x-dash-layout>
