<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Certification</title>
    </head>
    <body>
        <div>
            <p
                style="
                    position: absolute;
                    top: 170px;
                    font-size: 22px;
                    right: 350px;
                    font-weight: 600;
                    font-family: cursive;
                "
            >
                {{ $session_num }}
            </p>
            <p
                style="
                    position: absolute;
                    top: 170px;
                    font-size: 22px;
                    right: 500px;
                    font-weight: 600;
                    font-family: cursive;
                    background: white;
                "
            >
                {{  \Carbon\Carbon::createFromFormat(config('panel.date_format'), $session_date)->format('Y / m / d') }}
            </p>
            <p
                style="
                    position: absolute;
                    top: 210px;
                    font-size: 22px;
                    right: 410px;
                    font-weight: 600;
                    font-family: cursive;
                    background: white;
                "
            > 
                {{  \Carbon\Carbon::createFromFormat(config('panel.date_format'), $accepted_from)->format('Y / m / d') }}
            </p>
            <p
                style="
                    position: absolute;
                    top: 250px;
                    font-size: 22px;
                    right: 420px;
                    font-weight: 600;
                    font-family: cursive;
                "
            >
                {{ $mempership_num }}
            </p>
            <img
                src="https://daam.org.sa/public/certificate3.jpg"
                alt=""
                height="500"
                width="750"
            />
        </div>
    </body>
</html>
