<?php
// функция подключения
function Connect_dataBase() // подключаем базу данных 
{
  $serverName = "localhost";// имя хоста, на котором выполняется текущий скрипт
  $db_user = "root";// константа-логин для инициализации и подключения к базе данных
  $db_pass = "";//константа-пароль для инициализации и подключения к базе данных
  $db_name = "my_bd"; // название базы данных

  $dataBase = new mysqli($serverName, $db_user, $db_pass, $db_name);//конструктор, в который передаются настройки подключения
  return $dataBase;//прекращение выполнения текущей функции и возвращение аргумента как значения данной функции
}

// нажатие на кнопку Авториззоваться
if (isset($_GET['autorisation'])) {//начало условия, isset () вернёт false при проверке переменной которая была установлена значением null, вернет true, если все параметры определены
  $login = $_GET['login'];//$_GET - автоматическая глобальная переменная
  $password = $_GET['password']; //присваивание переменной
  if ($login != null && $password != null) {// если переменные логин и пароль определены
    $dataBase = Connect_dataBase(); //подключение к бд

    $request = "SELECT login, password FROM users WHERE login = '$login' AND password = '$password'"; //$_REQUEST дает удобный доступ к данным запроса, когда нам все равно как данные передаются
    //выбрать пользователей, у которых логин и пароль имеют заданные значения

    $result = mysqli_fetch_assoc($dataBase->query($request));//выбирает следующую строку из набора результатов и помещает её в ассоциативный массив

    if($result != null){ //если переменная определена правильно
      header("Location: site.php");//напрвляем на сайт
    }
    else {// иначе
      header("Location: index.php");//возращаем на форму авторизации
    }

    $dataBase->close();//закрывает ранее открытое соединение с базой данных
  } else {//иначе
    readfile('index.php');//читает файл и записывает его в буфер вывода
  }
}

// нажатие на кнопку Зарегистрироваться
if (isset($_GET['registration'])) {//начало условия, isset () вернёт false при проверке переменной которая была установлена значением null, вернет true, если все параметры определены
  $login = $_GET['login'];//присваивание переменной
  $password = $_GET['password'];//присваивание переменной
  $repeatPassword = $_GET['repeat_password'];//повторить ввод переменной
  if ($login != null && $password != null && $repeatPassword != null) {// если логин, пароль и поторно введенный пароль совпадают со значениями из бд
    if ($password == $repeatPassword) {//если пароль совпадает с повторно введенным
      $dataBase = Connect_dataBase();//подключение к бд

      // написать проверку на существование такого аккаунта с таким же логином с использованием SELECT
      // (как использовать SELECT смотрите в нажатии на кнопку Авторизоваться)
      $sql = 'SELECT count(login) as count FROM users WHERE login=?'; //записываем sql в котором считаем количество найденных логинов
      $query = $dataBase->prepare($sql); 
      $query->execute([$login]);
      $count_users = $query->fetch(); //получаем одну строчку
      if ((int)$count_users['count'] === 0) { //если таких пользователей больше 0
      //здесь код регистрации
      } else {
      exit('Логин уже занят'); //делаем выход из скрипта.
      }

      $sql = 'SELECT login, FROM users WHERE login=?';
      $query = $dataBase->prepare($sql);
      $query->execute([$login]);
      $user= $query->fetch();
      if ($user) { 
          // вывести ошибку "такой пользователь уже зарегистрирован".
      } else {
          // твой код на вставку
      }

      $request = "INSERT INTO users (login, password) VALUES ('$login', '$password')";//вставить значения переменных в заданные поля
      $dataBase->query($request);//выполняет запрос и буферизует на клиенте результат этого запроса
      header('Location: index.php');
      $dataBase->close();
    }
    else{//иначе
      header("Location: registr.php");//переходим на главную страницу сайта
    }
  } else {//иначе
    header("Location: registr.php");//переходим на главную страницу сайта
  }

  
}
