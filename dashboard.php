<?php
include('authentication.php');  // This checks if the user is logged in
$page_title = "Dashboard Page";

include('includes/header.php');
include('includes/navbar.php');
?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
            <?php

if(isset($_SESSION['status']))
{
    echo "<div class='alert alert-warning'>".$_SESSION['status']."</div>";
    unset($_SESSION['status']);  // Clear the message after displaying it
}
?>

<style>

 
.card {
    max-width: 600px;
    margin: 20px auto;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    background: #f9f9f9;
    font-family: Arial, sans-serif;
}

.card-header {
    background: linear-gradient(to right, #4e54c8, #8f94fb);
    color: #fff;
    padding: 16px;
    text-align: center;
}

.card-header h4 {
    margin: 0;
    font-size: 1.5rem;
    font-weight: bold;
}

.card-body {
    padding: 20px;
    text-align: center;
}

.card-body h2 {
    font-size: 2rem;
    color: #333;
    margin-bottom: 10px;
}

.card-body h5 {
    font-size: 1rem;
    color: #555;
    margin: 8px 0;
}

.card-body hr {
    border: 0;
    height: 1px;
    background: #ddd;
    margin: 20px 0;
}

</style>

                <div class="card">
                    <div class="card-header">
                    <h5>Welcome:<?=$_SESSION['auth_user']['username']?></h5>
                        <!-- <h5>Email:<?=$_SESSION['auth_user']['email']?></h5>
                        <h5>Phone:<?=$_SESSION['auth_user']['phone']?></h5> -->
                    </div>
                    <div class="card-body">
                        <h2>Welcome to Dashboard!!</h2>
                        <hr>
                       <h5>Enhance your productivity and have fun.</h5> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Host your event</title>
    <style>
        /* Add styles here for form, table, etc. */
        .calendar { display: flex; flex-direction: column; margin: 20px; }
        .event { display: flex; justify-content: space-between; padding: 10px; background-color: #f4f4f4; margin-bottom: 10px; }
        .event-actions button { margin-left: 10px; }
    </style>
     <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
</head>
<body>
<div class="clk-container">
        <div class="clock">

           <div style="--clr:#ff3d58; --h:72px;" class="hand" id="hour"><i></i></div>
           <div style="--clr:#00a6ff; --h:84px" class="hand" id="minute"><i></i></div>
           <div style="--clr:#000; --h:94px;" class="hand" id="second"><i></i></div>

            <span style="--i:1"><b>1</b></span>
            <span style="--i:2"><b>2</b></span>
            <span style="--i:3"><b>3</b></span>
            <span style="--i:4"><b>4</b></span>
            <span style="--i:5"><b>5</b></span>
            <span style="--i:6"><b>6</b></span>
            <span style="--i:7"><b>7</b></span>
            <span style="--i:8"><b>8</b></span>
            <span style="--i:9"><b>9</b></span>
            <span style="--i:10"><b>10</b></span>
            <span style="--i:11"><b>11</b></span>
            <span style="--i:12"><b>12</b></span>
        </div>
    </div>
<!--Styling for the clock-->
    <style>
.clk-container{
        position:relative;
        display:flex;
        justify-content:center;
    }

    .clock{
        width:300px;
        height: 300px;
        border-radius:50%;
box-shadow:0 0 25px rgba(255,255,0,0.9);
border:2px solid red;

display:flex;
justify-content: center;
align-items: center;
    }
    .clock span{
        position:absolute;
        transform:rotate(calc(30deg*var(--i)));
        inset:12px;
        text-align: center;
    }

    .clock span b{
        transform:rotate(calc(-30deg*var(--i)));
       display: inline-block;
       font-size:20px;
    }
/* Now, I will make a white dot at the center using the before property see  */
.clock::before{
content:'';
position:absolute;
height:8px;
width:8px;
border-radius: 50%;
background-color:  blue;


}

.hand{
    position:absolute;
    display:Flex;
    justify-content:center;
    align-items: flex-end;
}
.hand i{
    position:absolute;
background-color:aqua;
width:4px;
height:75px;
border-radius:8px;
background-color:var(--clr);
height:var(-h);
z-index:2;

}

</style>

<script>
let min = document.getElementById('minute');  
let sec = document.getElementById('second');  

function displayTime() {
    let date = new Date();

    let hh = date.getHours();
    let mm = date.getMinutes();
    let ss = date.getSeconds();

    let hRotation = 30 * hh + mm / 2;
    let mRotation = 6 * mm;
    let sRotation = 6 * ss;

  
    hour.style.transform = `rotate(${hRotation}deg)`;  
    min.style.transform = `rotate(${mRotation}deg)`;   
    sec.style.transform = `rotate(${sRotation}deg)`;   
}

// Call displayTime function every second
setInterval(displayTime, 1000);

</script>
 
<div id="clock">
    <span id="hours">00</span>:<span id="minutes">00</span>:<span id="seconds">00</span>
    <span id="ampm">AM</span>
</div>

<style>
/* Clock Container */
#clock {
    font-family: 'Poppins', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px;
    background: linear-gradient(135deg, #2193b0, #6dd5ed);
    color: white;
    
    padding: 20px 40px;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    font-size: 2.5rem;
    text-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
    width: max-content;
    margin: 50px auto;
}

/* Time Section */
#clock span {
    display: inline-block;
    padding: 5px 10px;
    border-radius: 5px;
}

#hours, #minutes, #seconds {
    background: rgba(255, 255, 255, 0.15);
}

/* AM/PM Styling */
#ampm {
    font-size: 1.2rem;
    padding: 2px 8px;
    background: rgba(0, 0, 0, 0.15);
    border-radius: 3px;
}

  </style>

  <script>
// Function to update the clock every second
function startClock() {
    const clock = document.getElementById("clock");
    const hours = document.getElementById("hours");
    const minutes = document.getElementById("minutes");
    const seconds = document.getElementById("seconds");
    const ampm = document.getElementById("ampm");


    
    function updateTime() {
        const now = new Date();
        let hr = now.getHours();
        const min = now.getMinutes();
        const sec = now.getSeconds();
        const isAm = hr < 12;

        // Convert 24-hour format to 12-hour format
        hr = hr % 12 || 12;

        // Update DOM elements
        hours.textContent = hr.toString().padStart(2, "0");
        minutes.textContent = min.toString().padStart(2, "0");
        seconds.textContent = sec.toString().padStart(2, "0");
        ampm.textContent = isAm ? "AM" : "PM";
    }

    // Update the time every second
    setInterval(updateTime, 1000);
    updateTime(); // Call immediately to avoid initial delay
}

startClock(); // Start the clock

    </script>
<br><br><br><br><br>
<!--Random Quote HTML  -->
<div class="quote-box">
<h2>Quote of the day</h2>
<blockquote id="quote">Loading...</blockquote>
<span id="author">Loading...</span>
<div>
    <button onclick="getquote(api_url)">New Quote</button>
    <button onclick="tweet()"><img height="40px" width="40px" src="twitterlogo.jpg">Tweet</button>
</div>

<style>
  .quote-box {
    background: #fff;
    width: 700px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 40px;
    margin:50px auto;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 10px 20px 0px rgba(0, 0, 0, 0.15);
    font-optical-sizing: auto;
    font-weight: 600;
    font-style: normal;
}

.quote-box h2 {
    font-size: 32px;
    margin-bottom: 40px;
    position: relative;
}

.quote-box h2::after {
    content: '';
    width: 75px;
    height: 3px;
    border-radius: 3px;
    background: blue;
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
}

.quote-box blockquote {
    font-size: 26px;
    min-height: 110px;
    margin: 0;
}

.quote-box span {
    display: block;
    margin-top: 10px;
    position: relative;
    color: #333;
}

.quote-box div {
    width: 100%;
    margin-top: 50px;
    display: flex;
    justify-content: center;
}

.quote-box button {
    background: rgb(23, 124, 229);
    color: #fff;
    border-radius: 25px;
    border: 1px solid blue;
    width: 150px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 5px;
    cursor: pointer;
    transition: background 0.3s;
}

.quote-box button:hover {
    background: rgba(23, 124, 229, 0.8);
}

.quote-box button img {
    width: 50px;
    margin-right: 5px;
}

.quote-box button:nth-child(2) {
    background: transparent;
    color: #333;
    border: 1px solid #ccc;
}
  </style>

    </div>

<script>
    const quote=document.getElementById("quote");
    const author=document.getElementById("author");
const api_url= "http://api.quotable.io/random";

async function getquote(url)
{
    const response=await fetch(url);
    var data=await response.json();
 
    quote.innerHTML=data.content;
    author.innerHTML=data.author;
}

getquote(api_url);

function tweet() {
    const tweetText = encodeURIComponent(`"${quote.innerHTML}" -- by ${author.innerHTML}`);
    const tweetURL = `https://twitter.com/intent/tweet?text=${tweetText}`;
    window.open(tweetURL, "Tweet Window", "width=600, height=300");
}

    </script>
<!-- Creating a pomodoro timer-->
<style>

.pomodoro-timer {
  width: 300px;
  background: #fff;
  border: 1px solid #ccc;
  border-radius: 10px;
  font-family: Arial, sans-serif;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  padding: 20px;
  overflow: hidden;
 margin: 0 auto;
}

.pomodoro-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.pomodoro-header span {
  font-weight: bold;
}

.pomodoro-dots span {
  display: inline-block;
  width: 8px;
  height: 8px;
  background: #ddd;
  border-radius: 50%;
  margin: 0 2px;
}

.pomodoro-dots span.active {
  background: #333;
}

.pomodoro-minimize {
  background: none;
  border: none;
  font-size: 18px;
  cursor: pointer;
}

.pomodoro-content {
  transition: max-height 0.3s ease, opacity 0.3s ease;
  max-height: 500px;
  opacity: 1;
  overflow: hidden;
}

.pomodoro-content.minimized {
  max-height: 0;
  opacity: 0;
}

.pomodoro-display {
  text-align: center;
  margin-bottom: 20px;
}

.pomodoro-time {
  font-size: 48px;
  font-weight: bold;
  margin-bottom: 10px;
}

.pomodoro-controls button {
  background: #008000;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  cursor: pointer;
  margin: 5px;
}

.pomodoro-controls .pomodoro-reset {
  background: #ff0000;
}

.pomodoro-modes {
  display: flex;
  justify-content: space-between;
  
}

.pomodoro-mode {
  flex: 1;
  text-align: center;
  align-items:center;
  padding: 10px;
  margin: 0 10px 0 0;
  background: #3f3f3f;
  border: 1px solid #ccc;
  cursor: pointer;
  transition: background 0.3s;
}

.pomodoro-mode.active {
  background: #008000;
  color: #fff;
  font-weight: bold;
}

.pomodoro-mode:not(:last-child) {
  border-right: none;
}


    </style>
<div class="pomodoro-timer">
        <div class="pomodoro-header">
          <span>Personal Timer</span>
          <div class="pomodoro-dots">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
          </div>
          <button style="background-color:skyblue;" class="pomodoro-minimize">−</button>
        </div>
        <div class="pomodoro-content">
          <div class="pomodoro-display">
            <div class="pomodoro-time">25:00</div>
            <div class="pomodoro-controls">
              <button class="pomodoro-start">Start</button>
              <button class="pomodoro-pause" style="display: none;">Pause</button>
              <button class="pomodoro-reset">
                <i class="fa-solid fa-rotate-right"></i> Reset
              </button>
            </div>
          </div>
          <div class="pomodoro-modes">
            <button class="pomodoro-mode active" data-time="25">Pomodoro</button>
            <button class="pomodoro-mode" data-time="5">Short Break</button>
            <button class="pomodoro-mode" data-time="15">Long Break</button>
          </div>
        </div>
      </div>
      <script>
    document.addEventListener("DOMContentLoaded", () => {
  const timerDisplay = document.querySelector(".pomodoro-time");
  const startButton = document.querySelector(".pomodoro-start");
  const pauseButton = document.querySelector(".pomodoro-pause");
  const resetButton = document.querySelector(".pomodoro-reset");
  const minimizeButton = document.querySelector(".pomodoro-minimize");
  const modeButtons = document.querySelectorAll(".pomodoro-mode");
  const content = document.querySelector(".pomodoro-content");

  let timerID = null;
  let timeLeft = 25 * 60;
  let isPaused = false;

  // Function to format time
  const formatTime = (seconds) => {
    const mins = Math.floor(seconds / 60);
    const secs = seconds % 60;
    return `${mins.toString().padStart(2, "0")}:${secs.toString().padStart(2, "0")}`;
  };

  // Update timer display
  const updateTimerDisplay = () => {
    timerDisplay.textContent = formatTime(timeLeft);
  };

  // Start timer
  const startTimer = () => {
    if (timerID) return; // Prevent multiple timers
    isPaused = false;
    startButton.style.display = "none";
    pauseButton.style.display = "inline-block";

    timerID = setInterval(() => {
      if (timeLeft > 0) {
        timeLeft--;
        updateTimerDisplay();
      } else {
        clearInterval(timerID);
        timerID = null;
        alert("Time's up!");
      }
    }, 1000);
  };

  // Pause timer
  const pauseTimer = () => {
    if (timerID) {
      clearInterval(timerID);
      timerID = null;
      isPaused = true;
      startButton.style.display = "inline-block";
      pauseButton.style.display = "none";
    }
  };

  // Reset timer
  const resetTimer = () => {
    clearInterval(timerID);
    timerID = null;
    isPaused = false;
    startButton.style.display = "inline-block";
    pauseButton.style.display = "none";
    timeLeft = parseInt(
      document.querySelector(".pomodoro-mode.active").dataset.time,
      10
    ) * 60;
    updateTimerDisplay();
  };

  // Switch modes
  modeButtons.forEach((button) => {
    button.addEventListener("click", () => {
      modeButtons.forEach((btn) => btn.classList.remove("active"));
      button.classList.add("active");
      resetTimer();
    });
  });

  // Minimize content
  minimizeButton.addEventListener("click", () => {
    content.classList.toggle("minimized");
    minimizeButton.textContent = content.classList.contains("minimized") ? "+" : "−";
  });

  // Attach event listeners
  startButton.addEventListener("click", startTimer);
  pauseButton.addEventListener("click", pauseTimer);
  resetButton.addEventListener("click", resetTimer);

  // Initialize display
  updateTimerDisplay();
});
 
    
    </script>

 <!--Todo List--> 
 <div class="todo-container">
        <h1>My To-Do List</h1>
        <form id="todoForm">
            <input type="text" id="todoText" placeholder="Enter your task..." required>
            <button class="todobtn" type="submit">Add To-Do</button>
        </form>
        <ul id="todoList"></ul>
    </div>
<style>
.todo-container {
    width: 80%;
    max-width: 500px;
    margin: 100px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.todobtn{
  padding: 10px 15px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
h1 {
    text-align: center;
    color: #333;
}

#todoForm {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

#todoText {
    width: 80%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 4px;
}
 /* Styled Delete Button */
 button {
            background-color: #ff4d4f;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #d9363e;
            transform: scale(1.05);
        }

        button:active {
            background-color: #b32428;
        }
  </style>
    <script src="mytodo.js"></script>
    <h1 style="text-align:Center;">My Events</h1>

    <!-- Form to Add Events -->
    <form class="cform" action="dashboard.php" method="POST" autocomplete="off">
        <input style="padding:10px; text-align:center;" class="align" type="text" name="event_name" placeholder="Event Name" required>
        <input style="text-align:center;display:flex; justify-content:center;padding:15px;" class="align" type="date" name="event_date" required>
        <textarea  style="padding:20px; text-align:center;" class="align" name="event_description" placeholder="Event Description" required></textarea>
        <button  class="eb" type="submit" name="add_event">Add Event</button>
    </form>

    <style>
.cform {
    max-width: 600px;
    margin: 0 auto;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.cform input,
.cform textarea {
    width: calc(100% - 40px);
    margin: 10px 20px;
    padding: 10px 15px;
    font-size: 1rem;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
}

.cform input[type="date"] {
    text-align: center;
    padding: 10px 15px;
    font-size: 1rem;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
    margin: 10px 20px;
}

.cform textarea {
    resize: none;
    height: 120px;
}

.eb {
    display: block;
    width: calc(100% - 40px);
    margin: 20px auto;
    padding: 10px;
    font-size: 1rem;
    color: #fff;
    background: linear-gradient(to right, #4CAF50, #81C784);
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s;
    text-transform: uppercase;
    font-weight: bold;
}

.eb:hover {
    background: linear-gradient(to right, #81C784, #4CAF50);
}

.eb:active {
    transform: scale(0.98);
}

.cform input:focus,
.cform textarea:focus {
    outline: none;
    border-color: #4CAF50;
    box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
}   

.align{
  display:flex;
  justify-content:space-between;
  width:50%;
}

.eb{
    background-color: #007bff; /* Blue background */
    color: white; /* White text */
    border: none; /* Remove border */
    padding: 10px 20px; /* Add padding for more space */
    border-radius: 5px; /* Round the corners */
    cursor: pointer; /* Change cursor to pointer on hover */
    font-size: 16px; /* Increase font size */
    font-weight: bold;
}

.videos {
      height: 100vh;
      width: 100vw;
      overflow-y: scroll;
      scroll-snap-type: y mandatory;
    }

    .vdo-wrapper {
      display: flex;
      flex-direction: column;
    }

    .video-container {
      position: relative;
      height: 100vh;
      width: 100vw;
      scroll-snap-align: start;
    }

    .vdo {
      position: absolute;
      height: 100%;
      width: 100%;
      object-fit: cover;
      object-position: center;
    }

    .info-wrapper {
      position: absolute;
      bottom: 0;
      width: 100%;
      background: rgba(0, 0, 0, 0.7);
      color: white;
      z-index: 2;
      display: flex;
      align-items: center;
      gap: 1rem;
      padding: 1rem;
    }
    .info-wrapper a img {
      width: 50px;
      border-radius: 100%;
    }

    .controls {
      position: absolute;
      top: 1rem;
      right: 1rem;
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
      z-index: 3;
    }

    .controls button {
      background: rgba(0, 0, 0, 0.6);
      color: white;
      border: none;
      border-radius: 50%;
      font-size: 1.5rem;
      padding: 0.5rem;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .controls button:hover {
      background: rgba(0, 0, 0, 0.9);
    }

    .loader {
      position: absolute;
      z-index: 10;
      top: 0;
      left: 0;
      height: 100vh;
      width: 100vw;
      background: #fff;
      display: grid;
      place-items: center;
      font-size: 8rem;
      display: none;
    }

    .loader i {
      animation: spin 1.3s infinite linear;
    }

    @keyframes spin {
      0% {
        transform: rotate(0);
      }
      100% {
        transform: rotate(1turn);
      }
    }
    
        </style>

    <!-- Event List -->
    <div class="calendar">
        <?php
        // Display events from database
        include 'connect.php'; // Ensure this file contains database connection code

        $query = "SELECT * FROM events ORDER BY event_date ASC";
        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)) {
          echo '<div class="event" style="background-color:#f9f9f9; border: 1px solid #ddd; border-radius: 10px; padding: 15px; margin: 15px 100px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); display: flex; justify-content: space-between; align-items: center;">';
          
          echo '<div style="flex: 1; color: #333;">';
          echo '<strong style="font-size: 1.2rem; display: block; margin-bottom: 5px;">' . $row['event_name'] . '</strong>';
          echo '<span style="font-size: 0.9rem; color: #666; display: block; margin-bottom: 8px;">' . $row['event_date'] . '</span>';
          echo '<p style="font-size: 0.95rem; line-height: 1.4; color: #555; margin: 0;">' . $row['event_description'] . '</p>';
          echo '</div>';
          
          echo '<div class="event-actions" style="display: flex; gap: 10px;">';
          
          echo '<form style="display:inline;" method="POST" action="dashboard.php">
                  <input type="hidden" name="event_id" value="' . $row['id'] . '">
                  <button style="padding: 8px 16px; border: none; border-radius: 10px; cursor: pointer; font-size: 14px; background-color: #4CAF50; color: white; font-weight: 500;" type="submit" name="edit_event">Edit</button>
                </form>';
          
          echo '<form style="display:inline;" method="POST" action="dashboard.php">
                  <input type="hidden" name="event_id" value="' . $row['id'] . '">
                  <button style="padding: 8px 16px; border: none; border-radius: 10px; cursor: pointer; font-size: 14px; background-color: #E57373; color: white; font-weight: 500;" type="submit" name="delete_event">Delete</button>
                </form>';
          
          echo '<button class="share-btn" style="padding: 8px 16px; border: none; border-radius: 12px; cursor: pointer; font-size: 14px; background-color: #007bff; color: white; font-weight: 500;" onclick="shareEvent(\'' . $row['event_name'] . '\', \'' . $row['event_description'] . '\', window.location.href)">Share</button>';
          
        
          echo '<a href="https://2f1a6061aa07bb1ba4a1-iuak2vivf-srijan-gajurels-projects.vercel.app/create" style="text-decoration:none;">
                  <button style="padding: 8px 16px; border: none; border-radius: 12px; cursor: pointer; font-size: 14px; background-color: #FFA726; color: white; font-weight: 500;">Start</button>
                </a>';
          
          echo '</div>'; // Close event-actions
          echo '</div>'; // Close event
      }
        

        // Function to generate random color
        function randomColor() {
            return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        }
        ?>
    </div>
    <script>

    function shareEvent(title, text, url) {
        if (navigator.share) {
            navigator.share({
                title: title,
                text: text,
                url: url
            }).then(() => {
                console.log('Event shared successfully!');
            }).catch((error) => {
                console.error('Error sharing event:', error);
            });
        } else {
            alert('Web Share API is not supported on this browser.');
        }
    }
    </script>

</body>
</html>

<?php
include 'connect.php'; // Database connection file

// Add event logic
if (isset($_POST['add_event'])) {
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_description = $_POST['event_description'];

    $sql = "INSERT INTO events (event_name, event_date, event_description) VALUES ('$event_name', '$event_date', '$event_description')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Event added successfully!'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Error adding event.');</script>";
    }
}

// Delete event logic
if (isset($_POST['delete_event'])) {
    $event_id = $_POST['event_id'];

    $sql = "DELETE FROM events WHERE id=$event_id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Event deleted successfully!'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Error deleting event.');</script>";
    }
}

// Edit event logic
if (isset($_POST['edit_event'])) {
    $event_id = $_POST['event_id'];

    // Get event details
    $query = "SELECT * FROM events WHERE id=$event_id";
    $result = mysqli_query($conn, $query);
    $event = mysqli_fetch_assoc($result);

    // Show a form with pre-filled values to edit the event
    echo '<form style="display:flex; justify-content:space-between; flex-direction:column; margin:0 150px;padding: 10px 0;gap:15px;" action="dashboard.php" method="POST">
            <input style="margin:20px 0; height:60px; text-align:center;"   type="hidden" name="event_id" value="' . $event_id . '">
            <input style="margin:20px 0; height:60px; text-align:center;" type="text" name="event_name" value="' . $event['event_name'] . '" required>
            <input style="margin:20px 0; height:60px; text-align:center;" type="date" name="event_date" value="' . $event['event_date'] . '" required>
            <textarea style="text-align:center;"  name="event_description" required>' . $event['event_description'] . '</textarea>
            <button style="padding: 8px 16px;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    background-color:lightgreen;
    padding:15px;
    margin:15px 20px;
    gap:20px;
    
    
    font-size: 14px; margin-right: 10px;" type="submit" name="update_event">Update Event</button>
          </form>';
}

// Update event logic
if (isset($_POST['update_event'])) {
    $event_id = $_POST['event_id'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_description = $_POST['event_description'];

    $sql = "UPDATE events SET event_name='$event_name', event_date='$event_date', event_description='$event_description' WHERE id=$event_id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Event updated successfully!'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Error updating event.');</script>";
    }
}


?>


<h1 style="text-align:center; margin-top:50px;">Motivational Shorts</h1>


<main class="videos">
  <div class="vdo-wrapper">
    <?php
   
    $videos = [
      ["src" => "fifth.mp4", "poster" => "", "title" => "Real life advice", "How to handle stress in your life" => "You are not alone."],
      ["src" => "donteverlose.mp4", "poster" => "", "title" => "Still there is time", "description" => "Start from now on."],
      ["src" => "unstoppable.mp4", "poster" => "", "title" => "Be unstoppable", "description" => "Study like nobody does."]
    ];

    foreach ($videos as $video) {
      echo '
      <div class="video-container">
        <video
          src="' . $video['src'] . '"
          poster="' . $video['poster'] . '"
          muted class="vdo"
        ></video>
        <div class="play-icon">
          <i class="fa-solid fa-play"></i>
        </div>
        <div class="controls">
          <button class="save-btn">
            <i class="fa-solid fa-download"></i>
          </button>
          <button class="mute-toggle">
            <i class="fa-solid fa-volume-mute"></i>
          </button>
        </div>
        <div class="info-wrapper">
          <h5>' . $video['title'] . '</h5>
          <p>' . $video['description'] . '</p>
        </div>
      </div>';
    }
    ?>
  </div>
</main>

    <!-- Music Player Section -->
    <h1 style="text-align:center; margin-top:50px;">Music Player</h1>
    <div class="track">
        <img style="height:50px; width:50px;"  src="std.png" alt="Sonder">
        <h3>Study music</h3>
        <p>Best to focus</p>
        <audio id="sonder-audio" src="study.mp3"></audio>
        <button  id="sonder-play-pause"><i class="fa-solid fa-play"></i></button>
        <a style="background-color:lightgreen" href="study.mp3" download><i class="fa-solid fa-download"></i></a>
        <span id="sonder-time">00:00</span>
    </div>

    <div class="track">
        <img style="height:50px; width:50px;"  src="std.png" alt="Silent Wood">
        <h3>Lofi Beats</h3>
        <p>Good concerntration</p>
        <audio id="silent-wood-audio" src="study2.mp3"></audio>
        <button id="silent-wood-play-pause"><i class="fa-solid fa-play"></i></button>
        <a style="background-color:lightblue"  href="study2.mp3" download><i class="fa-solid fa-download"></i></a>
        <span id="silent-wood-time">00:00</span>
    </div>

    <style>
      .track {
    border: 1px solid #ccc;
    padding: 20px;
    margin-bottom: 20px;
}


.track img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
}

.track audio {
    display: none;
}

.track button, .track a {
    padding: 10px 20px;
    border: none;
    background-color: #ccc;
    color: #333;
    text-decoration: none;
    cursor: pointer;
}

.track button:hover, .track a:hover {
    background-color: #ddd;
}

.track span {
    float: right;
}

    </style>

<script>
const sonderAudio = document.getElementById("sonder-audio");
const sonderPlayPause = document.getElementById("sonder-play-pause");
const sonderTime = document.getElementById("sonder-time");

const silentWoodAudio = document.getElementById("silent-wood-audio");
const silentWoodPlayPause = document.getElementById("silent-wood-play-pause");
const silentWoodTime = document.getElementById("silent-wood-time");

function updateTrackTime(audio, timeSpan) {
    const audioLength = audio.duration;
    const audioCurrentTime = audio.currentTime;
    const minutes = Math.floor(audioCurrentTime / 60);
    const seconds = Math.floor(audioCurrentTime % 60);
    timeSpan.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
}

sonderPlayPause.addEventListener("click", () => {
    if (sonderAudio.paused) {
        sonderAudio.play();
        sonderPlayPause.textContent = "Pause";
        setInterval(() => updateTrackTime(sonderAudio, sonderTime), 1000);
    } else {
        sonderAudio.pause();
        sonderPlayPause.textContent = "Play";
    }
});

silentWoodPlayPause.addEventListener("click", () => {
    if (silentWoodAudio.paused) {
        silentWoodAudio.play();
        silentWoodPlayPause.textContent = "Pause";
        setInterval(() => updateTrackTime(silentWoodAudio, silentWoodTime), 1000);
    } else {
        silentWoodAudio.pause();
        silentWoodPlayPause.textContent = "Play";
    }
});
  </script>

<style>
  .videos {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
  }

  .video-container {
    position: relative;
    width: 300px;
    border: 2px solid #fff;
    border-radius: 10px;
    overflow: hidden;
    background: rgba(0, 0, 0, 0.7);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
  }

  video {
    width: 100%;
    height: auto;
    cursor: pointer;
  }

  .play-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 3em;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
    opacity: 0.8;
  }

  .play-icon:hover {
    opacity: 1;
  }

  .controls {
    display: flex;
    justify-content: space-between;
    padding: 10px;
    background: rgba(0, 0, 0, 0.6);
  }

  .controls button {
    background: none;
    border: none;
    color: white;
    font-size: 1.2em;
    cursor: pointer;
  }

  .info-wrapper {
    padding: 10px;
    color: white;
    text-align: left;
  }

  .info-wrapper h5 {
    margin: 0 0 5px;
    font-size: 1.1em;
  }

  .info-wrapper p {
    margin: 0;
    font-size: 0.9em;
    color: #ccc;
  }
</style>

<script>
  document.addEventListener("DOMContentLoaded", () => {
  const videos = document.querySelectorAll(".vdo");
  const playIcons = document.querySelectorAll(".play-icon");
  const saveButtons = document.querySelectorAll(".save-btn");
  const muteButtons = document.querySelectorAll(".mute-toggle");

  playIcons.forEach((playIcon, index) => {
    const video = videos[index];

    // Play video when play icon is clicked
    playIcon.addEventListener("click", () => {
      if (video.paused) {
        video.play();
        playIcon.style.display = "none"; // Hide play icon when playing
      }
    });

    // Show play icon when video is paused
    video.addEventListener("pause", () => {
      playIcon.style.display = "flex";
    });

    // Toggle play/pause when video itself is clicked
    video.addEventListener("click", () => {
      if (video.paused) {
        video.play();
        playIcon.style.display = "none";
      } else {
        video.pause();
        playIcon.style.display = "flex";
      }
    });
  });

  // Save video logic
  saveButtons.forEach((btn, index) => {
    btn.addEventListener("click", () => {
      const video = videos[index];
      const a = document.createElement("a");
      a.href = video.currentSrc;
      a.download = `video-${index + 1}.mp4`;
      a.click();
    });
  });

  // Mute/Unmute logic
  muteButtons.forEach((btn, index) => {
    btn.addEventListener("click", () => {
      const video = videos[index];
      if (video.muted) {
        video.muted = false;
        btn.innerHTML = '<i class="fa-solid fa-volume-up"></i>';
      } else {
        video.muted = true;
        btn.innerHTML = '<i class="fa-solid fa-volume-mute"></i>';
      }
    });
  });
});

</script>






<?php include('includes/footer.php'); ?>
