<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collaborative Story Writing</title>	
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="login-container">
        <form id="login-form">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="button" onclick="login()">Login</button>
        </form>
    </div>

    <div id="story-container" style="display:none;"></div>
    <textarea id="user-input" placeholder="Contribute to the story..." style="display:none;"></textarea>
    <button onclick="submitContribution()" style="display:none;">Submit</button>

    <script>
        async function fetchStory() {
            const response = await fetch('api.php', {
                headers: {
                    'Authorization': 'Basic ' + btoa('your_username:your_password')
                }
            });
            if (response.status === 401) {
                // Unauthorized, show login form
                document.getElementById('login-container').style.display = 'block';
            } else {
                // Hide login form and show story content
                document.getElementById('login-container').style.display = 'none';
                document.getElementById('story-container').style.display = 'block';

                const story = await response.json();
                document.getElementById('story-container').innerText = story.story;
            }
        }

        async function login() {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            const response = await fetch('api.php', {
                method: 'GET',
                headers: {
                    'Authorization': 'Basic ' + btoa(username + ':' + password)
                }
            });

            if (response.status === 200) {
                // Successful login, fetch story content
                fetchStory();
            } else {
                alert('Login failed. Please try again.');
            }
        }

        async function submitContribution() {
            const userInput = document.getElementById('user-input').value;
            await fetch('api.php', {
                method: 'POST',
                body: userInput,
                headers: {
                    'Authorization': 'Basic ' + btoa('your_username:your_password')
                }
            });

            // Refresh the story after submission
            fetchStory();
        }

        // Initial fetch when the page loads
        fetchStory();
    </script>
</body>
</html>
