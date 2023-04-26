<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Time and Date</title>
    <link rel="stylesheet" href="">
    <style>
    body {
    
}

#datetime {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 15vh;
    margin-left: 170vh;
}

#date {
    font-size: 20px;
    font-weight: bold;
    color: white;
    margin-right: 2rem;
    font-family: Orbitron;
}

#time {
    margin-top: 10px;
    margin-right: 20px;
    font-size: 20px;
    font-weight: bold;
    color: white;
    font-family: Orbitron;
}
</style>


</head>
<body>



    <div id="datetime">
        <span id="time"></span>
        <span id="date"></span>
        
    </div>
    <script>
    
    const dateSpan = document.getElementById('date');
const timeSpan = document.getElementById('time');

function updateDateTime() {
    const date = new Date();
    const options = {
        weekday: 'long',
        month: 'long',
        day: 'numeric',
        year: 'numeric'
    };
    dateSpan.textContent = date.toLocaleDateString('en-US', options);
    timeSpan.textContent = date.toLocaleTimeString('en-US', { hour12: true, hour: 'numeric', minute: 'numeric', second: 'numeric' });
}

updateDateTime();
setInterval(updateDateTime, 1000);
</script>


</body>
</html>


<?php
    date_default_timezone_set('UTC');
    $date = date('l, F jS Y');
    $time = date('h:i:s A');
?>

