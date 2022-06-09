<?php

class UserInfo
{
    public string $ip;
    public string $userAgent;
    public string $method;
    public function __construct()
    {
        $this->ip = $this->setIp();
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->userAgent = $_SERVER['HTTP_USER_AGENT'];
    }
    private function setIp(): string
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $value = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $value = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
            $value = $_SERVER['REMOTE_ADDR'];
        }

        return $value;
    }
}
$userInfo = new UserInfo();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? echo get_class($userInfo); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="container">
            <div class="col">
                <ul class="list-group">
                    <li class="list-group-item"> Ваш ip: <strong><?= $userInfo->ip ?></strong></li>
                    <li class="list-group-item">Ваш UserAgent: <strong><?= $userInfo->userAgent ?></strong></li>
                    <li class="list-group-item">Метод которым Вы пришли: <strong><?= $userInfo->method ?></strong></li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>