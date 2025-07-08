<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

{{-- <form action="/AddTraining" method="post"> --}}
    @csrf
<div>
    <h2>部位</h2>
    <select name="part" id="part">
        @foreach ($menuPart as $part)
        <option value="{{ $part }}">{{ $part }}</option>
        @endforeach
    </select>

    <h2>種目</h2>
    <input type="text" name="trainingExerciseName" id="trainingExerciseName">

    <h2>曜日</h2>
    <select name="weekday" id="weekday">
        @foreach ($menuDay as $day)
        <option value="{{ $day }}">{{ $day }}</option>
        @endforeach
    </select>

    <button id="add_button">登録</button>

</div>
{{-- </form> --}}

@vite('resources/js/AddTraining.js')