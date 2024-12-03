<?php

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SQLite3;

require_once dirname(__DIR__) . '/vendor/autoload.php';


$db = new SQLite3(dirname(__DIR__) . '/db/db_user.db');
$app = \DI\Bridge\Slim\Bridge::create();

$app->addBodyParsingMiddleware();
$app->addErrorMiddleware(true, true, true);
$app->addRoutingMiddleware();  


$db->exec('
    CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT NOT NULL UNIQUE,
        password TEXT NOT NULL,
        email TEXT NOT NULL UNIQUE,
        phone TEXT NULL,
        avatar TEXT NULL,
        birthdate DATE NULL
    );
');
$db->exec('
    CREATE TABLE IF NOT EXISTS posts (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER NOT NULL,
        title TEXT NOT NULL,
        description TEXT NOT NULL, 
        image TEXT NOT NULL,
        link TEXT NOT NULL,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    );
');

 

$app->get('/', function(RequestInterface $request, ResponseInterface $response) use ($db) {
    return $response->withStatus(302)->withHeader('Location', '/login');
});

$app->get('/feed', function(RequestInterface $request, ResponseInterface $response) use ($db) {
    $content = render('pages/feed', []);
    $response->getBody()->write($content);

    return $response;
});

$app->post('/feed', function(RequestInterface $request, ResponseInterface $response) use ($db): void {

});

$app->get('/login', function(RequestInterface $request, ResponseInterface $response) use ($db) {
    $content = render('pages/login', []);
    $response->getBody()->write($content);

    return $response;
});

$app->post('/login', function(RequestInterface $request, ResponseInterface $response) use ($db) {
    $data = $request->getParsedBody();

    ['username' => $username, 'password' => $password] = $data;

    $stm = $db->prepare('SELECT * FROM users WHERE username IS :username');
    $stm->bindParam('username', $username);
    $user = $stm->execute()->fetchArray(SQLITE3_ASSOC);

    if(!$user) {
        $content = render('pages/login', ['error' => 'Пользователь не найден']);
        $response->getBody()->write($content);

        return $response;
    }

    if(!password_verify($password, $user['password'])) {
        $content = render('pages/login', ['error' => 'Не верный пароль']);
        $response->getBody()->write($content);

        return $response;
    }

    $_SESSION['user_id'] = $user['id'];

    return $response->withStatus(301)->withHeader('Location', '/profile');
});

$app->get('/logout', function(RequestInterface $request, ResponseInterface $response) use ($db) {
    unset($_SESSION['user_id']);

    return $response->withStatus(301)->withHeader('Location', '/feed');
});

$app->get('/register', function(RequestInterface $request, ResponseInterface $response) use ($db) {
    $content = render('pages/register', []);
    $response->getBody()->write($content);

    return $response;
});

$app->post('/register', function(RequestInterface $request, ResponseInterface $response) use ($db) {
    $data = $request->getParsedBody();

    ['username' => $username, 'password' => $password, 'email' => $email] = $data;

    $stm = $db->prepare('SELECT * FROM users WHERE username IS :username OR email IS :email');
    $stm->bindParam('username', $username);
    $stm->bindParam('email', $email);
    $user = $stm->execute()->fetchArray(SQLITE3_ASSOC);

    if($user) {
        $content = render('pages/register', ['error' => 'Такой пользователь уже существует!']);
        $response->getBody()->write($content);

        return $response;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stm = $db->prepare('INSERT INTO users (username, password, email) VALUES (:username, :password, :email)');

    $stm->bindParam('username', $username);
    $stm->bindParam('password', $hash);
    $stm->bindParam('email', $email);
    $stm->execute();

    return $response->withStatus(301)->withHeader('Location', '/login');
});

$app->get('/profile', function(RequestInterface $request, ResponseInterface $response) use ($db) {
    if(!$_SESSION['user_id'])
        return $response->withStatus(301)->withHeader('Location', '/login');

    $stm = $db->prepare('SELECT * FROM users WHERE id IS :id' );
    $stm->bindValue('id', $_SESSION['user_id']);
    $user = $stm->execute()->fetchArray(SQLITE3_ASSOC);

    $content = render('pages/profile', ['user' => $user]);
    $response->getBody()->write($content);

    return $response;
});

session_start();

$app->run();

function render(string $path, array $data = []) {
    if(!file_exists( dirname(__DIR__) . '/templates/' . $path . '.php'))
        throw new Exception('Template file not found');

    ob_start();
    (function($path, $data) {
        extract($data);

        require dirname(__DIR__) . '/templates/' . $path . '.php'; 
    })($path, $data);
    return ob_get_clean();
}