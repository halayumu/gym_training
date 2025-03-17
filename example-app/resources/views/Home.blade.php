@vite('resources/css/app.css')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="menu_box">

        <div class="label">
            <input type="radio" class="tab_button" id="all" checked>
            <label for="all" class="tab_label_right">All</label>
    
            <input type="radio" class="tab_button" id="chest" checked>
            <label for="chest" class="tab_label_right">胸</label>
    
            <input type="radio" class="tab_button   " id="shoulder" checked>
            <label for="shoulder" class="tab_label_right">肩</label>
    
            <input type="radio" class="tab_button" id="arm" checked>
            <label for="arm" class="tab_label_right">腕</label>
    
            <input type="radio" class="tab_button" id="back" checked>
            <label for="back" class="tab_label_right">背中</label>
    
            <input type="radio" class="tab_button" id="leg" checked>
            <label for="leg">脚</label>
        </div>

        <div class="list_box">
            <ul id="tore_menu">
            </ul>
        </div>
    </div>

    <div class="circle_button">
        <span>+</span>
    </div>

    @vite('resources/js/home.js')
</body>