<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Dynamic-font.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>{{ config('app.name'), 'Laravel' }}</title>
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li class="custom-font-nav-{{ $customFontSize }} font-theme-{{ $fontTheme }}">{{GoogleTranslate::trans('HomePage', app()->getLocale()) }}</li>
                <li class="custom-font-nav-{{ $customFontSize }} font-theme-{{ $fontTheme }}">{{GoogleTranslate::trans('About', app()->getLocale()) }}</li>
                <li class="custom-font-nav-{{ $customFontSize }} font-theme-{{ $fontTheme }}">{{GoogleTranslate::trans('Contact', app()->getLocale()) }}</li>
                <li class="custom-font-nav-{{ $customFontSize }} font-theme-{{ $fontTheme }}">{{GoogleTranslate::trans('Help', app()->getLocale()) }}</li>
                <li class="custom-font-nav-{{ $customFontSize }} font-theme-{{ $fontTheme }}">{{GoogleTranslate::trans('Setting', app()->getLocale()) }}</li>
            </ul>
        </nav>
        <div class="content">
                <label for="language">Language: </label>
                <select class="language" id="language">
                    <option value="en"  {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                    <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>French</option>
                    <option value="es" {{ session()->get('locale') == 'es' ? 'selected' : '' }}>Spanish</option>
                    <option value="km" {{ session()->get('locale') == 'km' ? 'selected' : '' }}>Khmer</option>
                </select>
            <form action="{{ route('HomePage') }}" method="GET">
                <label for="fontSize">Font Sise:</label>
                <select name="fontSize" id="fontSize">
                    <option value="small">Small</option>
                    <option value="medium">Medium</option>
                    <option value="large">Large</option>
                </select>
                <button type="submit">{{ GoogleTranslate::trans('Apply', app()->getLocale()) }}</button>
            </form>
            <form action="{{ route('HomePage') }}" method="GET">
                <label for="fontTheme">Font Sise:</label>
                <select name="fontTheme" id="fontTheme">
                    <option value="default">Default</option>
                    <option value="serif">serif</option>
                    <option value="monospace">monospace</option>
                </select>
                <button type="submit">{{ GoogleTranslate::trans('Apply', app()->getLocale()) }}</button>
            </form>
            <h1 class="custom-font-content-{{ $customFontSize }} font-theme-{{ $fontTheme }}">{{ GoogleTranslate::trans('Welcome back!', app()->getLocale())}}</h1>
            <p class="custom-font-content-{{ $customFontSize }} font-theme-{{ $fontTheme }}">{{ GoogleTranslate::trans('How are you brother?', app()->getLocale())}}</p>
        </div>
    </div>
        <script type="text/javascript">

        var url = "{{ route('change-lang') }}";

        $(".language").change(function() {
            window.location.href = url + "?lang=" + $(this).val();
        });
        </script>
</body>
</html>