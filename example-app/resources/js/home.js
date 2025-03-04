// TODO::タブの処理をJSで切り替え処理をする
console.log('ファイルの読み込み');


// ボタンタップイベントで取得するためのメニュー要素 //
const all = document.getElementById('all');
const chest = document.getElementById('chest');
const shoulder = document.getElementById('shoulder');
const arm = document.getElementById('arm');
const back = document.getElementById('back');
const leg = document.getElementById('leg');

// ボタンがタップされた時部位ごとのメニューを表示させる //
all.addEventListener('click', () => {
    searchMenu('all');
});

chest.addEventListener('click', () => {
    searchMenu('chest');
});

shoulder.addEventListener('click', () => {
    searchMenu('shoulder');
});

arm.addEventListener('click', () => {
    searchMenu('arm');
});

back.addEventListener('click', () => {
    searchMenu('back');
});

leg.addEventListener('click', () => {
    searchMenu('leg');
});

// 該当メニューの検索と抽出 //
function searchMenu(TrainingEventName) {
    fetch('/Home/search', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ eventName: TrainingEventName })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}