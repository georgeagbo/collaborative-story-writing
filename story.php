<?php

$storyFile = 'story.txt';
$allowedUser = 'your_username';
$allowedPassword = 'your_password';

function getStoryContent() {
    global $storyFile;
    return file_get_contents($storyFile);
}

function appendToStory($content) {
    global $storyFile;
    file_put_contents($storyFile, $content, FILE_APPEND | LOCK_EX);
}

function authenticateUser($username, $password) {
    global $allowedUser, $allowedPassword;
    return $username === $allowedUser && $password === $allowedPassword;
}

?>
