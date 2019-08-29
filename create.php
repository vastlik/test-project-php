<?php
/** @var App $app */
$app = require "./core/app.php";


/**
 * @var string $name
 * @return true if name is valid, otherwise false
 */
function isNameValid($name) {
    return !empty($name);
}

/**
 * @var string $email
 * @return true if name is valid, otherwise false
 */
function isEmailValid($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * @var string $city
 * @return true if city is valid, otherwise false
 */
function isCityValid($city) {
    return !empty($city);
}


if($_SERVER["REQUEST_METHOD"] != "POST") {
    header('Location: index.php');
}

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$city = trim($_POST['city']);
$phone = trim($_POST['phone']);

$flashMessages = [];
$valid = true;

if( !isNameValid($name) ) {
    $valid = false;
    $flashMessages[] = [
            'type' => 'danger',
            'text' => "Invalid username.",
    ];
}

if( !isEmailValid($email) ) {
    $valid = false;
    $flashMessages[] = [
            'type' => 'danger',
            'text' => "Invalid email.",
    ];
}

if( !isCityValid($city) ) {
    $valid = false;
    $flashMessages[] = [
            'type' => 'danger',
            'text' => "Invalid city.",
    ];
}

if($valid) {
    $flashMessages[] = [
            'type' => 'success',
            'text' => "User was successfully added.",
    ];

    $name = mysqli_real_escape_string($app->db->mysqli, $name);
    $email = mysqli_real_escape_string($app->db->mysqli, $email);
    $city = mysqli_real_escape_string($app->db->mysqli, $city);
    $phone = mysqli_real_escape_string($app->db->mysqli, $phone);

    $user = new User($app->db);
    $user->insert([
        'name' => $name,
        'email' => $email,
        'city' => $city,
        'phone' => $phone
    ]);
}

$user = [
    'name' => $name,
    'email' => $email,
    'city' => $city,
    'phone' => $phone
];

$response = [
    'status' => $valid ? 'OK' : 'Error',
    'user' => $user,
    'flash_messages' => $flashMessages,
];

header('Content-Type: application/json');
echo json_encode($response);