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
    changeTabColor(all);
});

chest.addEventListener('click', () => {
    searchMenu('胸');
});

shoulder.addEventListener('click', () => {
    searchMenu('肩');
});

arm.addEventListener('click', () => {
    searchMenu('腕');
});

back.addEventListener('click', () => {
    searchMenu('背中');
});

leg.addEventListener('click', () => {
    searchMenu('脚');
});

// タブがタップされた時の色を変える //
function changeTabColor(tab) {
    // TODO::タブの色を変える処理を記述する
}

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
            displayMenu(data);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}

// メニューを表示させる処理 //
function displayMenu(menu) {
    const menuList = document.getElementById('tore_menu');
    menuList.innerHTML = '';

    menu.eventNameJson.forEach(item => {
        const newlistTag = document.createElement('li');
        const url = document.createElement('a');

        // トレーニング内容のURLパラメータを作成
        url.href = `/TrainingInput?id=${item.id}&name=${item.trainingExerciseName}&userId=${item.userId}&part=${item.part}&day=${item.day}`;
        url.textContent = item.trainingExerciseName

        newlistTag.appendChild(url);
        menuList.appendChild(newlistTag);
    });
}

// ページが読み込まれた後に実行 //
document.addEventListener('DOMContentLoaded', function() {
    fetch('/Home/firstMenu', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ user_id: 1 })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success', data);
            displayMenu(data);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
});