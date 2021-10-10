<?php
$this->load->view('public/header');
$this->load->view('public/heading');
?>
<div class="overlay-desktop"></div>
<!-- header mobile -->
<?php
$this->load->view('public/m_heading');
?>
<!-- CART -->
<?php
$this->load->view('public/cart');
?>
<!DOCTYPE html>
<html lang="en">
<title>Garansi</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body {
        font-family: "Lato", sans-serif
    }

    .mySlides {
        display: none
    }

    body {
        /* text-align: center; */
        background: #fff;
        font-family: sans-serif;
        font-weight: 100;
    }

    h1 {
        color: #1f1f1f;
        font-weight: 100;
        font-size: 40px;
        margin: 40px 0px 20px;
    }

    #clockdiv {
        font-family: sans-serif;
        color: #fff;
        display: inline-block;
        font-weight: 100;
        text-align: center;
        font-size: 30px;
    }

    #clockdiv>div {
        padding: 10px;
        border-radius: 3px;
        background: #fff;
        display: inline-block;
    }

    #clockdiv div>span {
        padding: 15px;
        border-radius: 3px;
        background: #1f1f1f;
        display: inline-block;
    }

    .smalltext {
        padding-top: 5px;
        font-size: 16px;
        color: #1f1f1f;
    }

    footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
    }
</style>

<body>

    <!-- Page content -->
    <div class="w3-content" style="max-width:2000px;margin-top:0px">

        <!-- Automatic Slideshow Images -->
        <img src="" style="width:100%">

        <!-- The Band Section -->
        <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px;margin-bottom: 27px;" id="band">
            <h1>Countdown Release</h1>
            <p>Lorem ipsum dolor sit amet</p>
            <div id="clockdiv">
                <div>
                    <span class="days"></span>
                    <div class="smalltext">Days</div>
                </div>
                <div>
                    <span class="hours"></span>
                    <div class="smalltext">Hours</div>
                </div>
                <div>
                    <span class="minutes"></span>
                    <div class="smalltext">Minutes</div>
                </div>
                <div>
                    <span class="seconds"></span>
                    <div class="smalltext">Seconds</div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $this->load->view('public/footer');
    ?>
</body>

</html>


<script>
    var release_date = "<?= $pre_release->release_date ?>";

    function getTimeRemaining(endtime) {
        const total = Date.parse(endtime) - Date.parse(new Date());
        const seconds = Math.floor((total / 1000) % 60);
        const minutes = Math.floor((total / 1000 / 60) % 60);
        const hours = Math.floor((total / (1000 * 60 * 60)) % 24);
        const days = Math.floor(total / (1000 * 60 * 60 * 24));

        return {
            total,
            days,
            hours,
            minutes,
            seconds
        };
    }

    function initializeClock(id, endtime) {
        const clock = document.getElementById(id);
        const daysSpan = clock.querySelector('.days');
        const hoursSpan = clock.querySelector('.hours');
        const minutesSpan = clock.querySelector('.minutes');
        const secondsSpan = clock.querySelector('.seconds');

        function updateClock() {
            const t = getTimeRemaining(endtime);

            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
                clearInterval(timeinterval);
                location.reload();
            }
        }

        updateClock();
        const timeinterval = setInterval(updateClock, 1000);
    }
    const deadline = new Date(Date.parse(release_date));
    console.log(deadline)
    initializeClock('clockdiv', deadline);
</script>