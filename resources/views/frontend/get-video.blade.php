<!DOCTYPE html>
<html lang="fr">

<head>
    <title>{{ $titre }}</title>
</head>

<body width="100%" >
    <video id="myvideo" width="100%" autoplay controls disablepictureinpicture controlslist="nodownload">

        <source type="video/mp4" src="{{ asset("assets/courses/".$url_video) }}" />

    </video>
</body>
    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
    </script>
<html>