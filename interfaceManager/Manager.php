<?php
class Manager
{
    public $originalLanguage = [
        'русский' => 'RU',
        'английский' => 'EN',
        'немецкий' => 'GR',
        'французский' => 'FR',
        'итальянский' => 'IT',
        'испанский' => 'SP'
    ];
    public $originalTranslate = [
        'русский' => 'RU',
        'английский' => 'EN',
        'немецкий' => 'GR',
        'французский' => 'FR',
        'итальянский' => 'IT',
        'испанский' => 'SP'
    ];

    public function saveText() {
        if (isset($_POST['done'])) {
            $textForTranslate = $_POST['text'];
            $textForTranslate = trim($textForTranslate);
            if (empty($textForTranslate)) {
                echo 'Текст не введен!';
            }
        } else {
            $fd = fopen("text.txt", 'w') or die("не удалось создать файл");
            $str = $textForTranslate;
            fwrite($fd, $str);
            fclose($fd);
        }



    }
        <form method="POST">
<input type="text" name="first" />
<input type="submit" name="ok_go" value="GO" />
</form>
<?php
if(isset($_POST['ok_go'])){
    $first_var = $_POST['first'];
    $first_var = trim($first_var);
    if(empty($first_var)) echo 'Пусто';
    else {
        $fd = fopen("hello.txt", 'w') or die("не удалось создать файл");
        $str = $first_var;
        fwrite($fd, $str);
        fclose($fd);
        echo 'Вы ввели:';

        $fd = fopen("hello.txt", 'r') or die("не удалось открыть файл");
        while(!feof($fd))
        {
            $str = htmlentities(fgets($fd));
            echo $str;
        }
        fclose($fd);
    }

}

}

