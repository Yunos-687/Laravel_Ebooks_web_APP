<!DOCTYPE html>
<html>
<head>
    <title>Create Token</title>
    <!-- Include your main JavaScript file that imports Axios -->
    @vite('resources/js/app.js') <!-- Vite directive to include JavaScript file -->
</head>
<body>
    <h1>Create a New Token</h1>

    <form id="token-form">
        <label for="token_name">Token Name:</label>
        <input type="text" id="token_name" name="token_name" required>
        <button type="submit">Create Token</button>
    </form>

    <div id="response"></div>

    <script>
        // This script should be included in your JavaScript files if using Laravel Mix
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('token-form').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the form from submitting the traditional way

                // Get the form data
                const tokenName = document.getElementById('token_name').value;

                // Make the POST request using Axios
                axios.post('{{ route('create.token') }}', {
                    token_name: tokenName
                })
                .then(response => {
                    // Handle the response
                    document.getElementById('response').innerHTML = 'Token created successfully: ' + response.data.token;
                })
                .catch(error => {
                    // Handle errors
                    document.getElementById('response').innerHTML = 'Error creating token: ' + error.message;
                });
            });
        });
    </script>
</body>
</html>
