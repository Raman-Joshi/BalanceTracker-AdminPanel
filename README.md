# BalanceTracker-AdminPanel
This project is a simple web-based login system paired with a user dashboard. The interface is designed with HTML, Bootstrap (CSS framework), and jQuery (JavaScript library) to provide a clean and responsive user experience.

<h2>Features</h2>
   <ul>
    <li><strong>Login Form:</strong> Allows users to log in using their mobile number.</li>
    <li><strong>AJAX Integration:</strong> The login form uses AJAX to send requests and handle responses from the server (PHP backend or any other server-side tech can be integrated).</li>
    <li><strong>Dynamic Dashboard:</strong> Displays user-specific details like account balance and deposited amount on the dashboard after login.</li>
    <li><strong>Error Handling:</strong> Displays appropriate error messages for invalid login attempts or issues during the AJAX request.</li>
    <li><strong>Responsive Design:</strong> Built with Bootstrap for a mobile-first responsive design, ensuring compatibility across devices.</li>
    <li><strong>Logout:</strong> Users can log out and return to the login page easily.</li>
    <li><strong>Day and Night Mode:</strong> Users can switch between light and dark modes for a customized interface experience.</li>
    <li><strong>Session Management:</strong> Keeps track of user sessions to maintain login status, and automatically logs out users after a certain inactivity period.</li>
    <li><strong>Mobile Number Validation:</strong> Basic client-side validation to ensure mobile number format is correct before sending a login request.</li>
    <li><strong>Activity Tracking:</strong> Logs user activities such as login times and last accessed features.</li>
    <li><strong>Passwordless Login:</strong> Allows users to log in with just a mobile number, without needing a password.</li>
    <li><strong>Real-Time Updates:</strong> Updates the dashboard dynamically with the latest balance or deposited amount without page reloads.</li>
    <li><strong>Success or Failure Animations:</strong> Displays visual feedback (animations) when a login attempt is successful or fails, enhancing user experience.</li>
    <li><strong>User-Friendly Dashboard:</strong> Optimized layout with sections displaying account information and smooth transitions between dashboard elements.</li>
</ul>
    <h2>How It Works</h2>
    <ul>
        <li><strong>Login:</strong> Users enter their mobile number, and an AJAX request is sent to the backend to validate the user.</li>
        <li><strong>Dashboard:</strong> Once validated, the user is directed to a dashboard where their account details are displayed.</li>
        <li><strong>Logout:</strong> Users can log out and return to the login page at any time.</li>
    </ul>
