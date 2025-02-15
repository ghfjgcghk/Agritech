document.getElementById("toggle-btn").addEventListener("click", function() {
    const loginForm = document.getElementById("login-form");
    const registerForm = document.getElementById("register-form");
    const formTitle = document.getElementById("form-title");

    if (loginForm.style.display === "none") {
        loginForm.style.display = "block";
        registerForm.style.display = "none";
        formTitle.innerText = "Login";
        this.innerText = "Register";
    } else {
        loginForm.style.display = "none";
        registerForm.style.display = "block";
        formTitle.innerText = "Register";
        this.innerText = "Login";
    }
});
document.getElementById("register-form").addEventListener("submit", function(event) {
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirm-password").value;
    let errorMessage = document.getElementById("password-error");

    if (password !== confirmPassword) {
        errorMessage.style.display = "block";
        event.preventDefault(); // Stop form submission
    } else {
        errorMessage.style.display = "none";
    }
});



function showTable(tableId) {
    let tables = document.querySelectorAll('.data-table');
    let machineStatus = document.getElementById('machine-status');
    let settingPanel = document.getElementById('setting');
    let container = document.querySelector('.container');

    // Ipakita ang container kapag may pinindot na sidebar item
    if (container) {
        container.style.display = 'block';
    }

    // Hide all tables
    tables.forEach(table => table.style.display = 'none');
    if (machineStatus) machineStatus.style.display = 'none';
    if (settingPanel) settingPanel.style.display = 'none';

    // Show the selected table
    let selectedTable = document.getElementById(tableId);
    if (selectedTable) {
        selectedTable.style.display = 'table';
    } else {
        console.error("Table not found:", tableId);
    }
}

// Attach event listeners to sidebar links
document.querySelectorAll('.sidebar ul li a').forEach(link => {
    link.addEventListener('click', function() {
        let tableId = this.getAttribute('onclick').match(/'([^']+)'/)[1]; // Extract tableId
        showTable(tableId);
    });
});
