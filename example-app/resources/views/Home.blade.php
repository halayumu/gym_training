<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="menu_box">
        <div class="label">
            <input type="radio" class="" id="all" checked>
            <label for="all">All</label>
    
            <input type="radio" class="" id="chest" checked>
            <label for="chest">胸</label>
    
            <input type="radio" class="" id="shoulder" checked>
            <label for="shoulder">肩</label>
    
            <input type="radio" class="" id="arm" checked>
            <label for="arm">腕</label>
    
            <input type="radio" class="" id="back" checked>
            <label for="back">背中</label>
    
            <input type="radio" class="" id="leg" checked>
            <label for="leg">脚</label>
        </div>
    </div>

    @vite('resources/js/home.js')
</body>