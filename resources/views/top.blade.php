<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>だんご屋 トップ</title>
    <style>
body {
    font-family: "Hiragino Kaku Gothic ProN", "Meiryo", sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #f6f5f2; /* ☕淡いカフェトーン背景 */
}

.container {
    width: 500px;
    background: #fffdf9; /* やや暖色がかった白 */
    border: 1px solid #ddd;
    border-radius: 16px;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1); /* やわらかい影 */
    text-align: center;
    padding: 30px;
}

h1 {
    font-size: 26px;
    font-weight: bold;
    color: #3e3e3e;
    letter-spacing: 2px;
    margin-bottom: 20px;
}

.photo {
    width: 100%;
    height: 250px;
    overflow: hidden;
    border-radius: 16px; /* やわらかい角丸 */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* 写真に影をつける */
    margin-bottom: 40px;
}

.photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    border-radius: 16px;
}

.buttons {
    display: flex;
    justify-content: center;
    gap: 40px;
}

.btn {
    width: 120px;
    padding: 10px 0;
    border: none;
    border-radius: 12px;
    font-size: 18px;
    cursor: pointer;
    transition: 0.3s;
    color: #fff;
}

.btn-menu {
    background-color: #8ac4d0; /* 柔らかい青緑 */
}

.btn-staff {
    background-color: #dba39a; /* くすみピンク */
}

.btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    opacity: 0.9;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>だんご屋</h1>

<div class="photo">
    <img src="{{ asset('images/dango.jpg') }}" alt="店舗写真" style="width:100%; height:100%; object-fit:cover;">
</div>


        <div class="buttons">
            <button class="btn btn-menu">メニュー</button>
            <button class="btn btn-staff">スタッフ</button>
        </div>
    </div>
</body>
</html>

