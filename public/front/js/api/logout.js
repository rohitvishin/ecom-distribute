$("#logout-button").click(function (event) {
    event.preventDefault();
    console.log("Logout button clicked");

    const logoutBtn = document.getElementById('logout-button');
    logoutBtn.innerHTML = 'Logging out...';

    $.ajax({
        url: `${url}/api/logout`,
        type: 'POST',
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('auth_token'),
            'Content-Type': 'application/json'
        },
        success: function(response) {
            console.log('successfully logged out', response);
            // Clear client-side storage
            localStorage.removeItem('auth_token');
            localStorage.removeItem('user_data');
            
            // Redirect to home page
            window.location.href = './';
        },
        error: function(xhr, status, error) {
            console.error('Logout error:', error);
            // localStorage.removeItem('auth_token');
            // localStorage.removeItem('user_data');
            if (xhr.status === 401) {
                // Handle unauthorized access
                window.location.href = './';
            }else{
                alert('Logout failed. Please try again.');
            }
            
        },
        complete: function() {
            // Reset button state (though redirect will likely happen first)
            logoutBtn.innerHTML = 'Log Out';
        }
    });
});
