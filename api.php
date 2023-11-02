<?php

$config = include 'config.php';

$allowedUser = $config['allowedUser'];
$allowedPassword = $config['allowedPassword'];

include 'story.php';

// Handle GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get the current story content
    $storyContent = getStoryContent();
    
    // Output the story content as JSON
    echo json_encode(['story' => $storyContent]);
} 
// Handle POST request
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the raw POST data
    $data = file_get_contents('php://input');
    
    // Basic validation: Check if the content is not empty
    if (empty($data)) {
        http_response_code(400); // Bad Request
        echo json_encode(['error' => 'Empty contribution']);
        exit;
    }

    // Sanitize the input (you might want to use a more sophisticated sanitization method)
    $sanitizedData = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');

    // Basic user authentication
    $username = $_SERVER['PHP_AUTH_USER'] ?? '';
    $password = $_SERVER['PHP_AUTH_PW'] ?? '';

    if (!authenticateUser($username, $password)) {
        header('WWW-Authenticate: Basic realm="Restricted Area"');
        http_response_code(401); // Unauthorized
        echo json_encode(['error' => 'Unauthorized']);
        exit;
    }

    // Append sanitized content to the story
    appendToStory($sanitizedData);

    // Respond with a success message
    echo json_encode(['message' => 'Contribution added successfully']);
} 
// Handle other HTTP methods
else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Method Not Allowed']);
}

?>

