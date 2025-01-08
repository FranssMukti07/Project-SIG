<head>
    <title>WebGIS Pemetaan Instansi Pendidikan DKI Jakarta</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" href="assets/logo/tut-wuri-handayani-logo-790E3A1EF3-seeklogo.com.png">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin="">
    </script>

    <style>
        body {
            background-color: #e3ddcc;
        }

        .sidenav {
            height: 100%;
            position: sticky;
            top: 0;
            left: 0;
            background-color: #eee;
            padding: 10px 10px;
        }

        .sidenav div {
            margin: 10px 0;
        }

        #schoolSearch {
            width: 200px;
        }

        #searchResults {
            list-style: none;
            width: auto;
            max-height: 70%;
            overflow-y: scroll;
            order: 1;
            padding: 0;
            margin: 0;
            position: absolute;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        #searchResults li {
            padding: 10px;
            cursor: pointer;
        }

        .circle-jakpus {
            display: flex;
            gap: 10px;
        }

        .jakpus {
            width: 15px;
            height: 15px;
            background: #ff1900;
            border: 1px solid black;
            border-radius: 100%;
        }

        .circle-jaktim {
            display: flex;
            gap: 10px;
        }

        .jaktim {
            width: 15px;
            height: 15px;
            background: #15ff00;
            border: 1px solid black;
            border-radius: 100%;
        }

        .circle-jakut {
            display: flex;
            gap: 10px;
        }

        .jakut {
            width: 15px;
            height: 15px;
            background: #ff7800;
            border: 1px solid black;
            border-radius: 100%;
        }

        .circle-jakbar {
            display: flex;
            gap: 10px;
        }

        .jakbar {
            width: 15px;
            height: 15px;
            background: #0d00ff;
            border: 1px solid black;
            border-radius: 100%;
        }

        .circle-jaksel {
            display: flex;
            gap: 10px;
        }

        .jaksel {
            width: 15px;
            height: 15px;
            background: #ff00d9;
            border: 1px solid black;
            border-radius: 100%;
        }

        .checkbox {
            width: 20px;
            height: 20px;
        }

        label {
            font-size: 23px;
        }

        .main {
            width: 100%;
            padding: 10px;
        }

        .content {
            display: flex;
        }

        .map {
            border: 5px solid #a86232;
            z-index: 1;
        }

        footer {
            text-align: center;
            width: 100%;
            background-color: #eee;
            left: 0;
            padding: 5px 0;
        }
    </style>
</head>