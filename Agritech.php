<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}
?>




<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar AgriTech</title>
    <link rel="stylesheet" href="design.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <script src="code.js"></script>
</head>
<body>

    
    <div class="container">
        <header>
            <h1>Solar AgriTech</h1>
            <div class="profile-section">
                <img src="avatar.png" alt="Profile" class="avatar">
                <button class="logout-button" onclick="logout()">
    <img src="logout.png" alt="Logout" width="30" height="30">
</button>

<script>
    function logout() {
        window.location.href = 'logout.php'; 
    }
</script>

                
            </div>
        </header>

        <div class="sidebar">
            <h2>AgriTech</h2>
            <ul>
                <li><a href="#" onclick="showTable('machine-status')">Dashboard</a></li>
                <li><a href="#" onclick="showTable('soilMonitorTable')">Soil Monitor</a></li>
                <li><a href="#" onclick="showTable('seedMonitorTable')">Seed Monitor</a></li>
                <li><a href="#" onclick="showTable('waterLevelTable')">Water Level</a></li>
                <li><a href="#" onclick="showTable('solarInputTable')">Solar Input</a></li>
                <li><a href="#" onclick="showTable('setting')">Setting</a></li>
            </ul>
        </div>
        
       
        <div class="container" id="main-container" style="display: none;">
    <div id="machine-status">
        <h2>Dashboard</h2>
        <p>Machine Status Overview...</p>
    </div>

    <table id="soilMonitorTable" class="data-table">
        <thead>
            <tr><th>Timestamp</th><th>Soil Moisture</th></tr>
        </thead>
        <tbody></tbody>
    </table>

    <table id="seedMonitorTable" class="data-table">
        <thead>
            <tr><th>Timestamp</th><th>Seed Level</th></tr>
        </thead>
        <tbody></tbody>
    </table>

    <table id="waterLevelTable" class="data-table">
        <thead>
            <tr><th>Timestamp</th><th>Water Level</th></tr>
        </thead>
        <tbody></tbody>
    </table>

    <table id="solarInputTable" class="data-table">
        <thead>
            <tr><th>Timestamp</th><th>Solar Input</th></tr>
        </thead>
        <tbody></tbody>
    </table>

    <div id="setting" style="display: none;">
        <h2>Settings</h2>
        <p>Modify your system settings here...</p>
    </div>
</div>


    
 <!-- Machine Status Section with Pie Charts -->
 <section class="machine-status">
    <div class="status-card">
        <h3>Battery Level</h3>
        <canvas id="batteryChart"></canvas>
    </div>
    <div class="status-card">
        <h3>Water Level</h3>
        <canvas id="waterChart"></canvas>
    </div>
    <div class="status-card">
        <h3>Soil Level</h3>
        <canvas id="solarChart"></canvas>
    </div>
    <div class="status-card">
        <h3>Seed Level</h3>
        <canvas id="seedChart"></canvas>
    </div>
</section>
  
</body>
</html>
<script>
    window.history.pushState(null, "", window.location.href);
    window.onpopstate = function() {
        window.history.pushState(null, "", window.location.href);
    };
</script>
