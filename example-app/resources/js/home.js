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
            displayMenu(data);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}

// jsonデータをliとして表示させる //
function displayMenu(menu) {
    const menuList = document.getElementById('tore_menu');
    menuList.innerHTML = ''; // 既存のリストをクリア

    menu.eventNameJson.forEach(item => {
        const newlistTag = document.createElement('li');
        newlistTag.textContent = item.trainingExerciseName;
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