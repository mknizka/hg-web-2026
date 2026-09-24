<?php

  header("Content-type: text/css; charset: UTF-8");

  include "../../../functions/config.inc.php";
  include "../../../functions/fce.engine.php";

  $color_1 = themeSetup('color_1');
  $color_2 = themeSetup('color_2');
  $color_3 = themeSetup('color_3');
  $color_4 = themeSetup('color_4');
  $color_5 = themeSetup('color_5');
  $color_background = themeSetup('color_background');

  $theme = themeSetup('template');

?>

@keyframes move {
    0% {
        -webkit-transform: scale(1.0);
        -moz-transform: scale(1.0);
        -ms-transform: scale(1.0);
        -o-transform: scale(1.0);
        transform: scale(1.0);
    }
    50% {
        -webkit-transform: scale(1.04);
        -moz-transform: scale(1.04);
        -ms-transform: scale(1.04);
        -o-transform: scale(1.04);
        transform: scale(1.04);
    }
    100% {
        -webkit-transform: scale(1.0);
        -moz-transform: scale(1.0);
        -ms-transform: scale(1.0);
        -o-transform: scale(1.0);
        transform: scale(1.0);
    }
}


@-webkit-keyframes scroll-ani {
  0% {
    opacity: 1;
    top: 29%;
  }
  15% {
    opacity: 1;
    top: 50%;
  }
  50% {
    opacity: 0;
    top: 50%;
  }
  100% {
    opacity: 0;
    top: 29%;
  }
}


@keyframes arrow
{
0% {opacity:0}
40% {opacity:1}
80% {opacity:0}
100% {opacity:0}
}

@-webkit-keyframes arrow /*Safari and Chrome*/
{
0% {opacity:0}
40% {opacity:1}
80% {opacity:0}
100% {opacity:0}
}

@keyframes fade {
    from { opacity: 1.0; }
    50% { opacity: 0.5; }
    to { opacity: 1.0; }
}
@-webkit-keyframes fade {
    from { opacity: 1.0; }
    50% { opacity: 0.5; }
    to { opacity: 1.0; }
}

*,
:after,
:before {
    box-sizing: inherit
}

body {
    padding: 0;
    margin: 0;
    color: <?php echo $color_2; ?>;
    background: #f1f1f1;
    font-family: 'Roboto', sans-serif;
    font-size: 13px;
    line-height: 23px;
    font-weight: normal;
    position: relative;
    overflow-x: hidden!important;
    overflow-y: scroll;
    min-height: 100vh;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-shadow: 1px 1px 1px rgba(0,0,0,0.004)
}

.blink {
  animation:fade 1000ms infinite;
  -webkit-animation:fade 1000ms infinite;
}

.arrows path.a1 {
    animation-delay:-1s;
    -webkit-animation-delay:-1s; /* Safari å’Œ Chrome */
}

.arrows path.a2 {
    animation-delay:-0.5s;
    -webkit-animation-delay:-0.5s; /* Safari å’Œ Chrome */
}

.arrows path.a3 {
    animation-delay:0s;
    -webkit-animation-delay:0s; /* Safari å’Œ Chrome */
}

input, textarea, button, #rf-button, #rooms-filter, #rbi_step, header ul li a {
-webkit-appearance: none;
-moz-appearance: none;
appearance: none;
outline: none;
}

header ul li {
	position: relative;
	height: 50px
}

header ul li a img {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	opacity: .5;
	width: 16px;
	transition: 400ms
}

header ul li a:hover img {
	opacity: 1
}

.row {
  margin-right: 0!important;
  margin-left: 0!important;
}

input[type='number'] {
    -moz-appearance:textfield;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
}

::-webkit-scrollbar {
    width: 8px;  /* remove scrollbar space */
    background: #f1f1f1;  /* optional: just make scrollbar invisible */
}

::-webkit-scrollbar-thumb {
    background: <?php echo $color_2; ?>;
}


/* END ANIMATIONS */

img {
    max-width: 100%
}

p:empty {
   display: none;
}

section {
  position: relative;
}

a.basic-btn {
    display: inline-block;
    background: <?php echo $color_2; ?>!important;
    color: <?php echo $color_background; ?>!important;
    padding: 4px 14px;
    border-radius: 3px;
    text-decoration: none!important;
    font-size: 14px;
    margin: 5px 10px;
    transition: 400ms linear;
    cursor: pointer
}


.frame-wrapp {
    position: relative;
    height: 0;
    overflow: hidden;
}

.frame-wrapp {
    padding-bottom: 56%;
}

.frame-wrapp iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
	border: none
}

.homepage-button {
    display: table;
    margin: 20px auto;
    background: <?php echo $color_1; ?>!important;
    color: <?php echo $color_2; ?>!important;
    text-decoration: none;
    padding: 5px 20px;
    font-size: 15px;
    line-height: 26px;
    text-transform: none;
    border-radius: 3px;
    font-weight: 500;
	transition: 400ms;
    cursor: pointer;
}

.homepage-button:hover {
	background: <?php echo $color_2; ?>!important;
    color: <?php echo $color_1; ?>!important;
}

a.basic-btn:hover {
  background: #bbe4d0!important;
  color: <?php echo $color_2; ?>!important
}

#paybutton {
    text-decoration: none;
    background: #191c4a;
    color: <?php echo $color_background; ?>;
    padding: 6px 20px 7px;
    border-radius: 3px;
    text-transform: none;
    font-weight: normal;
    margin: 10px auto;
    display: inline-block;
    font-size: 16px;
    letter-spacing: 1px;
}

.animated {
    visibility: hidden
}

.animated-image {
      -webkit-animation: move 15s infinite forwards;
    -moz-animation: move 15s infinite forwards;
    animation: move 15s infinite forwards;
}

.animated-image-slow {
      -webkit-animation: move 65s infinite forwards;
    -moz-animation: move 65s infinite forwards;
    animation: move 65s infinite forwards;
}

::selection {
    background: #d2d2d2;
}

.bk-change-type {
	position: absolute;
	top: 0;
	right: 0
}



.break {
    width: 0px;
    height: 0px;
    line-height: 0px;
    font-size: 0px;
    border: 0px none;
    margin: 0px;
    padding: 0px;
    float: none;
    clear: both;
    visibility: hidden;
}

.container-fluid {
    margin-right: auto;
    margin-left: auto;
    padding-right: 0;
    padding-left: 0
}

.row {
    margin-right: 0!important;
    margin-left: 0!important;
    width: 100%
}

.col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9 {
    padding-left: 0;
    padding-right: 0
}




.wrapper-30-0 {
    padding: 30px 0;
    min-height: 1px;
    display: block
}

.wrapper-60 {
    padding: 60px;
    min-height: 1px;
    display: block
}

.wrapper-60-0 {
    padding: 60px 0;
    min-height: 1px;
    display: block
}

.wrapper-90 {
    padding: 90px;
    min-height: 1px;
    display: block
}

.wrapper-90-0 {
    padding: 90px 0;
    min-height: 1px;
    display: block
}

.wrapper-120 {
    padding: 120px;
    min-height: 1px;
    display: block
}

.wrapper-120-0 {
    padding: 120px 0;
    min-height: 1px;
    display: block
}


.container {
    margin-left: auto;
    margin-right: auto;
}

main {
    padding-bottom: 100px
}

header {
    background: <?php echo $color_2; ?>;
    color: <?php echo $color_background; ?>;
    height: 50px
}

header h1 {
    margin: 5px;
    text-align: left;
    font-size: 17px;
    line-height: 18px;
    margin-top: 8px;
}

header ul {
    list-style: none;
    float: right;
    margin: 0;
}

header ul li {
    float: left;
    display: inline-block;
    padding: 0px;
    margin: 0 5px;
}

header ul li a {
    color: <?php echo $color_4; ?>;
    text-decoration: none;
    background: rgba(255, 255, 255, 0.2);
    padding: 0px 30px;
    height: 50px;
    line-height: 50px;
    display: inline-block;
    text-transform: uppercase;
    font-weight: 500;
    cursor: pointer;
    transition: all 300ms
}

header ul li:first-child a, header ul li:nth-child(2) a {
	background: transparent!important;
	padding: 10px 18px;
}

header ul li a:hover {
    color: <?php echo $color_background; ?>;
    background: rgba(255, 255, 255, 0.3);
}

header ul li:last-child, header ul li:last-child  a {
    margin-right: 0;
}

#calendar-block {
    position: absolute;
    display: flex;
    margin: 20px auto;
    padding: 30px 10px;
    -ms-flex-pack: center;
    -webkit-box-pack: center;
    justify-content: center;
    text-align: center;
    background: <?php echo $color_background; ?>;
    width: 660px;
    max-width: 100%;
    left: 50%;
    top: 40px;
    transform: translateX(-50%);
    z-index: 9;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    z-index: 9999;
}

#rf-button {
    display: table;
    background: <?php echo $color_2; ?>;
    color: <?php echo $color_background; ?>;
    padding: 5px 18px;
    border-radius: 50px;
    text-transform: uppercase;
    cursor: pointer;
    font-weight: 500;
    transition: 500ms all;
    margin: 10px auto;
}



#rf-button:hover {
    background: <?php echo $color_1; ?>;
    color: <?php echo $color_2; ?>;
    animation: none!important
}

#rf-rooms {
    text-decoration: underline;
    font-size: 11px;
    cursor: pointer;
    width: 150px;
    margin: auto
}

.hi-logo {
    width: 100%;
    max-width: 270px;
    margin-top: 12px;
    margin-bottom: 0;
    padding: 0 10px;
}

.roomcounter {
    margin-top: -5px;
    background: <?php echo $color_2; ?>;
    color: <?php echo $color_background; ?>;
    padding: 5px 12px;
    font-weight: 600;
}

#rf-button-rooms {
    display: none
}

#js-cb-next, #js-cb-prev {
  position: absolute;
  width: 25px;
  height: 25px;
  top: 10px;
  cursor: pointer;
  z-index: 3;
}

#js-cb-next.disabled, #js-cb-prev.disabled {
  opacity: .2
}

#js-cb-next {
    left: calc(50% + 40px);
    transform: translateX(-50%);
}

#js-cb-prev {
  left: calc(50% - 40px);
    transform: translateX(-50%);
}

#js-calendar:empty #js-cb-next, #js-calendar:empty #js-cb-prev {
    display: none
}

#js-cb-next {
    background: <?php echo $color_2; ?>;
    background-image: url('/vs/icons/arrow.png');
    background-position: 50% 50%;
    background-size: 12px 12px;
    background-repeat: no-repeat;
    border-radius: 50%;
}

#js-cb-prev {
   background: <?php echo $color_2; ?>;
    background-image: url('/vs/icons/arrow.png');
    background-position: 50% 50%;
    background-size: 12px 12px;
    background-repeat: no-repeat;
    border-radius: 50%;
    transform: rotate(180deg)
}


#js-calendar .mb-content {
    width: 300px;
    max-width: 100%;
    float: left
}

.month-block {
  float: left;
    margin: 10px;
}

.mb-day, .mb-empty, .caldayname {
    width: 14.28%;
    display: inline-block;
    text-align: center;
    float: left;
    line-height: 30px;
    height: 30px;
    margin-top: 5px;
    margin-bottom: 5px;
}

.mb-empty {
  opacity: 0.3;
  text-decoration: line-through;
}

.mb-day {
    position: relative;
    cursor: pointer;
    opacity: .3;
    text-align: center ;
    text-decoration: line-through ;
}

.mb-content div.minstay {
    opacity: .999 !important;
    text-align: center !important;
    background: whitesmoke;
    color: rgba(255,255,255,.8)!important;
    margin: 0;
    height: 40px;
    line-height: 40px;
}

.mb-content div.minstay:hover {
    background: whitesmoke!important
}

.mb-day::before {
    content: '';
    position: absolute;
    top: -5px;
    right: 0;
    bottom: -5px;
    left: 0;
    background: #f5f5f5;
    z-index: -1;
    opacity: .3
}

.mb-content div.minstay::before {
    content: '';
    position: absolute;
    top: 5px;
    right: 0;
    bottom: 5px;
    left: 0;
    opacity: 1;
    background: <?php echo $color_5; ?>;
    color: <?php echo $color_background; ?>;
    z-index: -1;
}

.mb-day.selectable:hover {
    background: <?php echo $color_2; ?>;
    color: <?php echo $color_background; ?>;
}

.today {
    background: <?php echo $color_1; ?>;
    margin-top: 0;
    margin-bottom: 0;
    height: 40px;
    line-height: 40px;
}

.nostart::after {
    content: '';
    width: 26px;
    height: 26px;
    background: rgba(233, 30, 99, 0.2);
    border-radius: 100%;
    position: absolute;
    z-index: -1;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
}

.nostartno.nostart::after {
    display: none
}

.mb-day.selectable.nostart:hover {
    background: transparent!important;
    color: inherit!important;

}

@keyframes blink {
  0% { background: rgba(233, 30, 99, 0.2) }
  50% { background: rgba(233, 30, 99, 0.5) }
  100% { background: rgba(233, 30, 99, 0.2) }
}
@-webkit-keyframes blink {
 0% { background: rgba(233, 30, 99, 0.2) }
  50% { background: rgba(233, 30, 99, 0.5) }
  100% { background: rgba(233, 30, 99, 0.2) }
}

.mb-day.selectable.nostart:hover:after {
    -webkit-animation: blink 1s linear infinite;
    -moz-animation: blink 1s linear infinite;
    animation: blink 1s linear infinite;
}

.mb-day.selectable.nostartno:hover {
    background: <?php echo $color_2; ?>!important;
    color: <?php echo $color_background; ?>!important;
}

.mb-day.selectable.nostartno.minstay:hover {
    background: whitesmoke!important
}

.nostart.minstay::after {
    display: none
}

a {
    color: <?php echo $color_2; ?>;
    text-decoration: underline;
}

h1 {
    text-transform: uppercase;
    margin-top: 30px;
    letter-spacing: 1px
}

h1 small {
    letter-spacing: 0;
    display: block;
    text-transform: none;
    font-size: 12px;
    font-weight: normal
}

h1 small a {
    color: <?php echo $color_2; ?>;
    display: inline-block;
    text-decoration: underline;
    display: block;
    margin: 0;
    padding: 0;
    line-height: 8px;
}

#rbi_step::before {
    content: '';
    background: <?php echo $color_background; ?>;
    width: 100%;
    height: 44px;
    display: block;
    position: absolute;
    left: 0;
    right: 0;
    border-bottom: 1px solid #e4e6ea;
}

@-webkit-keyframes fadeIn {
  from {
    opacity: 0;
  }

  to {
    opacity: 1;
  }
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }

  to {
    opacity: 1;
  }
}

#rbi_step {
  height: 43px;

}

#rbi_step ul {
    display: flex;
    list-style: none;
    -ms-flex-pack: center;
    -webkit-box-pack: center;
    justify-content: center;
    text-align: center;
    padding: 0;
    margin: 0;
    background: <?php echo $color_background; ?>;
    -webkit-animation-name: fadeIn;
  animation-name: fadeIn;
  animation-duration: 2s
}

#rbi_step ul li {
    display: inline-block;
    padding: 10px 20px;
    margin: 0;
    width: 33.33333%;
    font-size: 13px;
    text-transform: uppercase;
    font-weight: 400;
    opacity: 1;
    position: relative;
}

#rbi_step ul li.empty {opacity:.2}

#rbi_step ul li.rbi_act {
    opacity: 1;
    background: #f5f5f5;
    z-index: 13;
    position: relative;
}

#rbi_step ul li.rbi_act::before {
    content: '';
    width: 30px;
    height: 30px;
    background: #f5f5f5;
    position: absolute;
    right: 10px;
    top: 50%;
    transform: rotate(45deg)translateY(-65%);
    z-index: -1;
}

#rbi_step ul li:last-child.rbi_act::before {
    display: none;
}

#rbi_step span {
    display: none
}

.js-show-calendar {
    display: inline-block;
    margin: 10px;
    font-size: 18px;
    background: <?php echo $color_1; ?>;
    color: <?php echo $color_2; ?>;
    padding: 7px 15px;
    border-radius: 2px;
    cursor: pointer;
    transition: 300ms all;
    z-index: 10001;
    position: relative;
}

.js-show-calendar:hover {
      color: <?php echo $color_1; ?>;
      background: <?php echo $color_2; ?>;
}

.js-peoples {
    display: flex;
    -ms-flex-pack: center;
    -webkit-box-pack: center;
    justify-content: center;
    text-align: center;
}

.bfc-count, .input-number-group {
    position: absolute;
    top: 50%;
    right: 0;
    transform: translateX(-15%)translateY(-50%);
    display: flex;
}

.bfc-count input, .input-number-group input {
    width: 40px!important;
    border:none;
    height: 30px;
    text-align: center;
    background: #F5F5F5;
    border-radius: 0;
    float: none;
    margin: 0;
    color: <?php echo $color_2; ?>;
    font-size: 14px!important;
    font-weight: 600;
    outline: none;
    display: block;
    position: relative;
}

.bfc-plus, .bfc-minus, .input-group-button span, .bcr-plus, .bcr-minus {
    display: inline-block;
    line-height: 30px;
    padding: 0 5px;
    background: <?php echo $color_2; ?>;
    color: <?php echo $color_background; ?>;
    width: 25px;
    font-size: 17px;
    cursor: pointer;
    text-align: center
}

.bfc-plus, .input-number-increment, .bcr-plus {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}

.bfc-minus, .input-number-decrement, .bcr-minus {
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px
}

.selectable {
    opacity: 1;
    text-decoration: none
}

.selectable::before {
    opacity: 1
}

.selecteddays {
    background: <?php echo $color_5; ?>;
    color: <?php echo $color_background; ?>;
    line-height: 30px;
    height: 30px;
    margin-top: 5px;
    text-decoration: none!important
}

.cancelactual {
    display: table;
    margin: -5px auto 15px;
    background: red!important;
    border: 2px solid red!important;
    color: white!important;
    text-decoration: none;
    padding: 2px 15px!important;
    border-radius: 100px!important;
    font-size: 12px!important;
    line-height: 17px!important;
    font-weight: 500!important;
    cursor: pointer;
    transition: 400ms
}

.cancelactual:hover {
    background: white!important;
    border: 2px solid red!important;
    color: red!important
}

.startdate {
    background: <?php echo $color_2; ?>;
    color: #f5f5f5;
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
        margin-right: -2px;
        margin-left: 2px;
        line-height: 30px;
    height: 30px;
    margin-top: 5px;
    margin-bottom: 5px;
    opacity: 1;
    text-decoration: none
}
.enddate {
    background: <?php echo $color_2; ?>;
    color: #f5f5f5;
    border-top-right-radius: 20px;
    border-bottom-right-radius: 20px;
    line-height: 30px;
    margin-left: -2px;
    margin-right: 2px;
    height: 30px;
    margin-top: 5px;
    margin-bottom: 5px;
     opacity: 1;
    text-decoration: none
}
.today::before {
    top: 0px;
    bottom: 0px
}

.selecteddays::before, .startdate::before, .enddate::before {
    top: -5px;
    bottom: -5px
}

.startdate::before {
    left: -2px;
}

.enddate::before {
    right: -2px
}

.mb-title {
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px
}

#calendar-wrapper {
    width: calc(320px * 15);
    position: absolute;
    display: flex;
    left: 0;
    top: 0;
}

#js-calendar {
    position: relative;
    width: 635px;
    height: 360px;
    overflow: hidden;

}

#calendar-block {
  display: none;
}

#rooms-filter {
    position: relative;
}

#js-peoples, #js-rooms {
    position: absolute;
    width: 330px;
    left: 50%;
    transform: translateX(-50%);
    background: <?php echo $color_background; ?>;
    padding: 20px;
    top: 50px;
    display: none;
    z-index: 9999;
}

.bfc-block {
    display: flex;
    position: relative;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    margin: 16px;

}

.imhot {
   -moz-animation:fade normal 0.8s infinite ease-in-out; /* Firefox */
    -webkit-animation:fade normal 0.8s infinite ease-in-out; /* Webkit */
    -ms-animation:fade normal 0.8s infinite ease-in-out; /* IE */
    animation:fade normal 0.8s infinite ease-in-out; /* Opera */
}

.imhot:hover {
  animation: none
}

.p_blok, .r_blok {
    position: relative;
    text-align: left;
    margin: 20px;
}

.p_counts {
  text-align: center;
}

#rf-peoples {
    display: inline-block;
    position: relative;
    -webkit-box-pack: center;
    justify-content: center;
    text-align: center;
    background: <?php echo $color_1; ?>;
    color: <?php echo $color_2; ?>;
    border-radius: 2px;
    padding: 8px 20px 7px;
    cursor: pointer;
    font-size: 16px;
    margin: 0 10px;
    line-height: 23px;
    font-weight: 500;
    text-transform: uppercase;
    transition: all 300ms;
        z-index: 10001;
    position: relative;
}

#rf-peoples:hover {
  color: <?php echo $color_1; ?>;
  background: <?php echo $color_2; ?>;
}

.js-closepersons, .js-closecalendar, .js-closerooms {
    display: block;
    position: absolute;
    top: 12px;
    right: 12px;
    width: 24px;
    height: 24px;
    background: <?php echo $color_2; ?>;
    border-radius: 100%;
    background-size: 20px 20px;
    cursor: pointer;
    font-weight: 400;
}

.js-closepersons:hover , .js-closecalendar:hover , .js-closerooms:hover {
    background: <?php echo $color_1; ?>;
}

#nostart-modal {
	position: absolute;
    top: 50%;
    left: 50%;
    width: 280px;
    margin: 0 auto;
    text-align: center;
    transform: translate(-50%,-50%);
    z-index: 66666666;
    height: auto;
    padding: 20px 30px;
    max-width: calc(100% - 60px);
    box-shadow: 0 0 40px rgba(0, 0, 0, 0.2);
    background: <?php echo $color_1; ?>;
    color: <?php echo $color_2; ?>;
    font-size: 14px;
    border-radius: 3px;
	display: none
}

.js-nostart-close {
    display: block;
    position: absolute;
    top: 0px;
    right: 0px;
    width: 24px;
    height: 24px;
    border-radius: 100%;
    background-size: 20px 20px;
    cursor: pointer;
    font-weight: 400;
    transition: 400ms
}

.js-nostart-close::before {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    content: "\d7";
    font-size: 25px;
    color: <?php echo $color_2; ?>;
    line-height: 50px;
    text-align: center;
    font-weight: 400;
}

.js-closepersons::before, .js-closecalendar::before, .js-closerooms::before {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    content: "\d7";
    font-size: 25px;
    color: white;
    line-height: 50px;
    text-align: center;
    font-weight: 400;
}

.js-closepersons:hover::before, .js-closecalendar:hover::before, .js-closerooms:hover::before {
    color: <?php echo $color_2; ?>
}

.clp-button {
	background: <?php echo $color_2; ?>;
    position: relative;
    margin: 5px auto;
    display: table;
    letter-spacing: 0.5px;
    width: auto;
    color: <?php echo $color_background; ?>;
    border-radius: 3px;
    font-weight: 600;
    text-transform: uppercase;
    padding: 4px 18px;
    cursor: pointer;
    transition: 400ms
}

.clp-button:hover {
	background: <?php echo $color_1; ?>;
	color: <?php echo $color_2; ?>
}

.clp-button::before {
    display: none!important
}


#booking-result {
    display: block;
    width: 96%;
    position: relative;
    max-width: 1170px;
    margin: 0 auto;
}

@keyframes spin {
  from {
    -webkit-transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(360deg);
  }
}
@-webkit-keyframes spin {
  from {
    -webkit-transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(360deg);
  }
}
body {
  margin: 0;
  padding: 0;
}

#br-preloader, #bb-preloader {
  height: 80px;
  width: 80px;
  min-height: 80px;
  position: relative;
  display: none;
  top: 5%;
  left: 50%;
  transform: translateX(-50%);
  margin-top: 40px;
  margin-bottom: 40px;
  transition: 300ms
}

#bb-preloader {
    display: block
}

#br-preloader div, #bb-preloader div {
  position: absolute;
}
#br-preloader div:first-child, #bb-preloader div:first-child {
  height: 80px;
  width: 80px;
  border-radius: 60px;
  border-top: solid 2px <?php echo $color_2; ?>;
  animation: spin 2s infinite;
  -webkit-animation: spin 2s infinite;
  animation-timing-function: linear;
  -webkit-animation-timing-function: linear;
}
#br-preloader div:nth-child(2), #bb-preloader div:nth-child(2) {
    height: 60px;
    width: 60px;
    border-radius: 55px;
    border-top: solid 2px <?php echo $color_2; ?>;
    top: 10px;
    left: 10px;
    animation: spin 1.5s infinite;
    -webkit-animation: spin 1.5s infinite;
    animation-timing-function: linear;
    -webkit-animation-timing-function: linear;
}

#br-result {
    margin: 40px auto;
}

.room_img {
    background-size: cover!important;
    background-position: 50% 50%!important;
    min-height: 250px;
    z-index: 3;
    position: relative;
    cursor: pointer
}

.room_img::before {
    content: '';
    z-index: 4;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
     width: 100%;
    background: <?php echo $color_2; ?>;
    opacity: 0.2;
    transition: 300ms
}

.room_img::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: url('/vs/icons/zoom.svg') 50% 50% no-repeat;
    background-size: 40px;
    opacity: 0.6;
    z-index: 6;
    width: 80px;
    height: 80px;
    transition: 800ms all
}



.room_img:hover::after {
    opacity: .6;
    background-size: 60px;
     transition: 800ms all  0
}

.room_img:hover::before {
    opacity: .5;
    transition: 300ms
}

.bk-result-in {
    position: relative;
    margin: 1rem 0;
    background: <?php echo $color_background; ?>;
    border-radius: 4px;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);
    overflow: hidden
}

.bk-result-in .col-md-8 {
    background: <?php echo $color_background; ?>;
    padding: 1rem 2rem!important;
    position: relative;
}

div.minstay {
    display: block;
    text-align: right;
}

.minstay .minstay {
    display: inline;
    background: #c3264e;
    color: <?php echo $color_background; ?>;
    padding: 5px 10px;
    font-weight: 500;
    border-radius: 15px;
}

.bk-result-in h4 {
    font-size: 19px;
    line-height: 25px;
    margin: 5px 0;
}

.bk-result-in h4 small {
    display: inline-block;
    background: <?php echo $color_1; ?>;
    margin: 2px 10px;
    padding: 2px 14px;
    border-radius: 30px;
    font-size: 12px;
    line-height: 17px;
    font-weight: 500;
    transform: translateY(-2px);
}

.flexirate-buttons {
    position: absolute;
    top: 0;
    right: 0;
}

.rbi_tags {
    display: inline-block;
    margin-left: 20px;
    position: relative;
    margin-right: 10px;
}

.rbi_tags::before {
    content: '';
    display: block;
    position: absolute;
    left: -22px;
    top: 2px;
    width: 20px;
    height: 20px;
    background-color: <?php echo $color_2; ?>;
    -webkit-mask: url(/vs/icons/tag.svg) 50% 50% no-repeat;
    clip-path: url(/vs/icons/tag.svg);
    -webkit-mask-size: 14px;
    mask-size: 14px;
}

.rbi_detail {
    display: none;
}

.rbi_tags_wrapper {
    margin-bottom: 20px;
}

.beforeprice {
    color: #c3264e;
    text-decoration: line-through;
}

.beforeprice_percent {
    background: rgba(93, 202, 58, 0.35);
    color: <?php echo $color_2; ?>;
    padding: 0px 3px;
    border-radius: 0px;
    margin: 0 8px 0 6px;
    height: 15px;
    line-height: 15px;
    font-weight: bold;
    font-size: 10px;
    display: inline-block;
    border-radius: 5px;
    transform: translateY(8px);
}

.rbi_price small {
    position: absolute;
    top: 16px;
}



.final_price {
    font-size: 17px;
    font-weight: bold;
    position: relative;
}

.rbi_price_span {
    min-width: 30%;
    display: inline-block;
}

.flexiterm {
    background: <?php echo $color_1; ?>;
    color: <?php echo $color_2; ?>;
    padding: 5px 15px 5px 15px;
    display: table;
    position: relative;
    float:right;
    cursor: pointer;
    z-index: 77;
}

.fixedterm {
    background: <?php echo $color_2; ?>;
    color: <?php echo $color_background; ?>;
    padding: 5px 15px 5px 15px;
    display: table;
    position: relative;
    float:right;
    cursor: pointer;
    z-index: 33;
}

.nextday_percent {
    color: rgb(1, 107, 40);
    background: rgb(218, 242, 231);
    display: inline-block;
    float: right;
    bottom: -10px;
    left: 0;
    right: 0;
    text-align: center;
    padding: 2px 12px;
    margin: 10px 0;
    border-radius: 3px;
}

.nextday_percent span {
    margin: 5px;
    text-transform: uppercase;
    background: #016b28;
    color: <?php echo $color_background; ?>;
    font-size: 10px;
    padding: 8px 10px;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
    margin: 5px -11px 5px 10px;
}

.off_img {
    min-height: 150px;
    width: 40%;
    background-size: cover!important;
    background-position: 50% 50%!important;
    margin: 0%;
    float: left;
    margin-right: 1rem;
}

.bk-result-in .offer-wrapper {
    margin: 1rem;
    background: rgba(13, 45, 85, 0.05);
    height: 150px;
    position: relative;
    border-radius: 3px;
    overflow: hidden;
    background: rgb(243, 244, 246);
    background: -moz-linear-gradient(left, rgb(247, 247, 247) 0%,rgb(243, 244, 246) 100%);
    background: -webkit-linear-gradient(left, rgb(247, 247, 247) 0%,rgb(243, 244, 246) 100%);
    background: linear-gradient(to right, rgb(247, 247, 247) 0%,rgb(243, 244, 246) 100%);
}

.offer-wrapper .showinfo, .rbi_price .showinfo {
    position: absolute;
    top: 0;
    right: 0;
    width: 30px;
    height: 30px;
    cursor: pointer
}

.offer-wrapper .showinfo::before {
    content: "i";
    position: absolute;
    display: block;
    right: 7px;
    top: 5px;
    width: 16px;
    height: 16px;
    line-height: 16px;
    font-size: 14px;
    font-style: italic;
    font-weight: 500;
    color: <?php echo $color_background; ?>;
    background: <?php echo $color_2; ?>;
    text-align: center;
    border-radius: 50%;
    font-family: serif;
    opacity: 1;
    text-transform: lowercase;
    transition: all 300ms;
    cursor: pointer;
}

.offer-wrapper .showinfo:hover::before {
    color: <?php echo $color_2; ?>;
    background: <?php echo $color_1; ?>;
}

.off_name {
    font-size: 18px;
    text-transform: uppercase;
    margin: 1rem auto 0;
    font-weight: 500;
    position: relative;
    cursor: pointer;
    width: 100%!important;
}

.col-md-6 .off_name {
    margin: 25px auto 0;
}

.off_confirm {
    margin: 1rem 0;
}

.off_des {
    display: none;
}

.bk-result-in .col-md-12 h4 {
    font-size: 15px;
    line-height: 22px;
    /* font-style: italic; */
    margin: 0;
    border-top: 1px dashed <?php echo $color_4; ?>;
    padding: 16px 1rem 0px;
    font-weight: 500;
    z-index: 2;
    text-transform: uppercase;
    position: relative;
    margin-top: -1px;
    letter-spacing: 0.8px;
    background: border-box;
    text-align: center;
    background: <?php echo $color_background; ?>;
}

header a.act {
    display: none;
}

#lang a {
    margin: 0 5px;
    padding: 0 5px;
    background: none;
}

#step-title {
    position: relative;
    z-index: 10000;
}

#step-title h1 {
    margin-bottom: 0;
}

.rbi_price {
    display: flex;
    padding: 0.2rem;
    margin: 5px 0;
    background: rgb(255,255,255);
    background: -moz-linear-gradient(right, rgb(247, 247, 247) 0%,rgb(243, 244, 246) 100%);
    background: -webkit-linear-gradient(right, rgba(255,255,255,1) 0%,rgb(243, 244, 246) 100%);
    background: linear-gradient(to left, rgba(255,255,255,1) 0%, rgb(243, 244, 246) 100%);
    border-radius: 2px;
}

.rbi_price_div {
    width: 60%;
    font-size: 15px;
    padding-left: 25px;
    padding-top: 4px;
    position: relative;
    cursor: pointer
}

.rbi_price_div::before {
    content: 'i';
    position: absolute;
    display: block;
    left: 3px;
    top: 50%;
    transform: translateY(-50%);
    width: 16px;
    height: 16px;
    line-height: 16px;
    font-size: 14px;
    font-style: italic;
    font-weight: 500;
    color: <?php echo $color_background; ?>;
    background: <?php echo $color_2; ?>;
    text-align: center;
    border-radius: 50%;
    font-family: serif;
    opacity: 1;
    transition: all 300ms
}


.rbi_price .rbi_price {
    width: 50%;
    padding: 0 15px;
    margin: 0;
    line-height: 30px;
    box-shadow: none;
    background: transparent;
    text-align: right;
    justify-content: flex-end;
    position: relative;
}

.rbi_confirm, .off_confirm, .rbi_confirm_btn {
    background: <?php echo $color_2; ?>;
    color: <?php echo $color_background; ?>;
    text-align: center;
    width: 100px;
    height: 30px;
    line-height: 30px;
    border-radius: 3px;
    cursor: pointer;
    transition: all 300ms;
        display: inline-block;
}

.disabled {
  opacity: .3
}

.rbi_confirm:hover, .off_confirm:hover {
    background: <?php echo $color_1; ?>;
    color: <?php echo $color_2; ?>;
}

.pop-bg {
    position: absolute;
    top: 94px;
    left: 0;
    bottom: -200%;
    right: 0;
    background: rgba(255,255,255, 1);
    z-index: 9999;
    display: none
}

#popup {
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    background: rgba(6, 13, 25, 0.62);
    z-index: 9999999999999;
    display: none
}

.popup-wrapper {
    position: relative;
    height: 100%
}

#popup-content {
    background: <?php echo $color_background; ?>;
    min-height: 100px;
    height: calc(100vh - 135px);
    max-height: fit-content;
    overflow-y: scroll;
    overflow-x: hidden;
    border-radius: 3px;
    position: absolute;
    top: 60px;
    left: 0;
    width: 100%;
    background: <?php echo $color_background; ?>;
    box-shadow: 0 0 80px rgba(26, 45, 79, 0.2);
    padding: 4%;
}

#popup-close {
    width: 50px;
    height: 50px;
    background: transparent;
    position: absolute;
    top: -4px;
    right: -3px;
    color: <?php echo $color_background; ?>;
    opacity: .7;
    cursor: pointer;
    transition: all 500ms
}

#popup-close:hover {
    opacity: 1
}

#popup-close::after {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    content: "\d7";
    font-size: 35px;
    color: <?php echo $color_2; ?>;
    line-height: 50px;
    text-align: center;
    font-weight: 100;
}

#js-fade-if-pre {
    display: none;
}

#js-popup-content {
    text-align: left;
    margin: 1rem;
}

#js-popup-content h3 {
    text-transform: uppercase;
    font-weight: 600;
    font-size: 20px;
    margin-bottom: 5px;
}

.tbi_top {
    position: relative;
    padding-left: 25px;
    width: 60%;
    font-size: 15px;
    line-height: 28px;
}

.tbi_top .showinfo {
    position: absolute;
    top: 0;
    left: 0;
    width: 30px;
    height: 30px;
}

.tbi_top .showinfo::before {
    content: 'i';
    position: absolute;
    display: block;
    left: 3px;
    top: 50%;
    transform: translateY(-50%);
    width: 16px;
    height: 16px;
    line-height: 16px;
    font-size: 14px;
    font-style: italic;
    font-weight: 500;
    color: <?php echo $color_background; ?>;
    background: <?php echo $color_2; ?>;
    text-align: center;
    border-radius: 50%;
    font-family: serif;
    opacity: 1;
    cursor: pointer;
    transition: all 300ms
}

.showinfo:hover::before {
        color: <?php echo $color_2; ?>;
    background: <?php echo $color_1; ?>;
}

.result_block_room, .result_sub_block {
    width: 100%;
    margin: 0;
    background: <?php echo $color_background; ?>;
    text-align: left;
    overflow: hidden;
}

.result_sub_block {
    padding: 1%;
    width: 98%;
}

#js-step-2-l, #js-step-3-l {
    border-right: 1px dashed <?php echo $color_5; ?>;
    background: <?php echo $color_background; ?>;
}

.result_block_room {
    background: <?php echo $color_background; ?>;
    padding-top: 5px;
}

.room-head {
    background: transparent;
    display: block;
    width: 100%;
    padding: 8px 4%;
    color: <?php echo $color_2; ?>;
    font-weight: 500;
    position: relative;
    padding-left: 40px;
    font-size: 15px;
}

.rbi2_name {
    padding: 1% 4%;
    line-height: 16px;
    font-size: 15px;
    padding-top: 10px

}

.room-head::before {
    content: '';
    display: block;
    position: absolute;
    width: 35px;
    height: 35px;
    top: 50%;
    transform: translateY(-50%);
    left: 5px;
    background-color: <?php echo $color_2; ?>;
    -webkit-mask: url(/vs/icons/bed.svg) 50% 50% no-repeat;
    clip-path: url(/vs/icons/bed.svg);
    -webkit-mask-size: 20px;
    mask-size: 20px;
}

.rbi2_checkin, .rbi2_checkout {
    width: 50%;
    float: left;
    padding: 1% 4%;
     line-height: 16px;
    font-size: 15px;
}

.result_block_room small {
    font-size: 10px;
    margin: 0;
    font-weight: 400;
    opacity: .5
}

.rbi2_price {
    padding: 1% 4%;
     line-height: 16px;
    font-size: 15px;
    float: none;
    clear: both;
}

.rbi_selectedinfo {
    padding: 1% 4%;
    line-height: 16px;
    font-size: 13px;
    margin-top: 10px
}

.rbi_selectedinfo p {
    padding: 10px 0 20px;
    margin: 0;
    line-height: 19px;
    font-size: 12px;
    font-style: italic;
}

.rbi2_price-include {
    display: none
}

.service-head {
    color: <?php echo $color_2; ?>;
    width: 100%;
    display: block;
    text-align: left;
    padding: 8px;
    font-weight: 500;
    font-size: 16px;
    padding-left: 18px;
    text-transform: uppercase;
}

.rsb_half {
    width: 50%;
    float: left;
}

.servicecategory, .servicecontent {
    padding: 1% 4%;
}

.servicecontent {
    padding-left: 4%;
    display: none;
}

.servicecategory {
    background: <?php echo $color_3; ?>;
    margin: 2%;
        margin-bottom: 10px;
    font-size: 14px;
    font-weight: 500;
    border-radius: 3px;
    padding: 7px;
    padding-left: 35px;
    position: relative;
    cursor: pointer;
}

.servicecategory::before {
    content: '';
    width: 8px;
    height: 8px;
    position: absolute;
    left: 14px;
    top: 50%;
    display: inline-block;
    padding: 3px;
    border: solid <?php echo $color_2; ?>;
    border-width: 0 2px 2px 0;
    transform: translateY(-65%)rotate(45deg);
    -webkit-transform: translateY(-65%)rotate(45deg);
    transition: 400ms all;
    transition-delay: 0;
    cursor: pointer;
}

.rbi_service_name {
    width: 100%;
    display: inline-block;
}

.rbi_services_price_2 {
    width: 50%;
    font-size: 10px;
    line-height: 15px;
    padding-left: 15px
}

.rbi_services_group {
    display: flex
}

.rbi_services_group{
    position: absolute;
    top: 50%;
    right: 0;
    transform: translateY(-50%)
}

 .rbi_services_group input {
    width: 30px!important;
    border: none;
    height: 24px;
    text-align: center;
    background: #F5F5F5;
    border-radius: 0;
    float: none;
    margin: 0;
    color: <?php echo $color_2; ?>;
    font-size: 14px!important;
    font-weight: 600;
    outline: none;
    display: block;
    position: relative;
}

.rbi_services-minus, .rbi_services-plus {
    display: inline-block;
    line-height: 24px;
    padding: 0 5px;
    background: <?php echo $color_2; ?>;
    color: <?php echo $color_background; ?>;
    width: 22px;
    font-size: 17px;
    cursor: pointer;
    text-align: center
}

 .rbi_services-plus {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}

 .rbi_services-minus {
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px
}

.rbi2_persons {
    padding: 1% 4%;
    line-height: 21px;
    font-size: 14px;
}

.result_block_price {
    margin: 2%;
    background: <?php echo $color_background; ?>;
    border-radius: 0;
    text-align: left;
    overflow: hidden;
    width: 46%;
    margin-left: 50%;
    border-top: 1px dashed <?php echo $color_5; ?>;
    margin-top: 5%;
        padding-top: 2%;
}

.result_block_price  h3 {
    background: <?php echo $color_background; ?>;
    color: <?php echo $color_2; ?>;
    margin: 0;
    padding: 1%!important;
    text-align: left;
    padding: 8px;
    font-weight: 500;
    font-size: 14px;
    text-transform: uppercase;
    display: none;
}

.rbi_services_item {
    padding: 10px 10px 5px;
    position: relative;
    background: <?php echo $color_background; ?>;
}

.rbi_services_item:nth-child(even){
        background: rgb(255,255,255);
    background: -moz-linear-gradient(right, rgb(247, 247, 247) 0%,rgb(243, 244, 246) 100%);
    background: -webkit-linear-gradient(right, rgba(255,255,255,1) 0%,rgb(243, 244, 246) 100%);
    background: linear-gradient(to left, rgba(255,255,255,1) 0%, rgb(243, 244, 246) 100%);
    border-radius: 3px
}

.rbi_services_item:first-child {
    margin-top: -10px;
}

#totalprices_2 div {
    margin: 0px 3%;
    font-size: 13px;
    line-height: 23px;
    overflow:  hidden;
}

#totalprices_2 div span {
    float: right
}

.rbi_services_name {
    padding-right: 100px;
    line-height: 16px;
        padding-left: 15px;
        cursor: pointer;
}



.rbi_personal_item textarea:focus,
.rbi_personal_item textarea:active,
.rbi_personal_item textarea:visited,
.rbi_personal_item select:focus,
.rbi_personal_item select:active,
.rbi_personal_item select:visited,
.rbi_personal_item input:focus,
.rbi_personal_item input:active,
.rbi_personal_item input:visited {
    outline: none;
    resize:none
}
.rbi_red {
    border: none!important;
    background: rgba(223, 23, 74, 0.3)!important;
    color: #002d58!important;
}

#rbi_cond_bck,
#rbi_marketing_bck,
#rbi_gdpr_bck {
    display: block;
    width: 20px;
    height: 20px;
    line-height: 20px;
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    border-radius: 20px;
    text-align: center;
    float: left;
}

#booking_form .rbi_red_bck input {
    transform: translateX(0px)translateY(-2px)
}

/* Checkbox */

label {
    position: relative;
}

.control__indicator {
  position: absolute;
    top: 50%!important;
    left: 0!important;
    height: 20px;
    width: 20px;
    background: <?php echo $color_3; ?>;
    border: 1px solid <?php echo $color_4; ?>;
    border-radius: 2px;
    cursor: pointer;
    transform: translateY(-45%)
}

#rbi_cond_bck.rbi_red_bck .control__indicator, #rbi_cond_gdpr.rbi_red_bck .control__indicator,
#rbi_gdpr_bck.rbi_red_bck .control__indicator, #rbi_gdpr_gdpr.rbi_red_bck .control__indicator {
    background: rgba(223, 23, 76, 0.45)!important;
}

.calsetcat_item .control__indicator {
    top: 50%!important;
    left: 0!important;
    margin-top: 5px;
}

.formelement input[type="checkbox"] {
    position: absolute;
    z-index: -1;
    opacity: 0
}


.sortable input[type="checkbox"] {
    opacity: 0;
    z-index: 1;
    position: relative;
}

.sortable .control__indicator {
    display: inline;
    left: 10px!important;
    height: 14px;
    width: 14px;
}

.sortable label.control--checkbox {
    display: inline
}

.bloggy .control__indicator {
    position: absolute;
    left: 3px!important;
    height: 14px;
    width: 14px;
    background: #eaecfc;
    border-radius: 2px;
}


.control--radio .control__indicator {
  border-radius: 50%;
}
.control:hover input ~ .control__indicator {
  background: <?php echo $color_4; ?>;
}
#rbi_cond_bck .control input:checked ~ .control__indicator,
#rbi_gdpr_bck .control input:checked ~ .control__indicator,
#rbi_marketing_bck .control input:checked ~ .control__indicator {
   background: <?php echo $color_2; ?>!important;
   border: <?php echo $color_2; ?>;
}
#rbi_cond_bck .control:hover input:not([disabled]):checked ~ .control__indicator,
#rbi_gdpr_bck .control:hover input:not([disabled]):checked ~ .control__indicator,
#rbi_marketing_bck .control:hover input:not([disabled]):checked ~ .control__indicator,
#rbi_cond_bck .control input:checked:focus ~ .control__indicator,
#rbi_gdpr_bck .control input:checked:focus ~ .control__indicator,
#rbi_marketing_bck .control input:checked:focus ~ .control__indicator  {
  background: <?php echo $color_2; ?>!important;
    border: <?php echo $color_2; ?>;
}
.control input:disabled ~ .control__indicator {
  background: #e6e6e6;
  opacity: 0.6;
  pointer-events: none;
}
.control__indicator:after {
  content: '';
  position: absolute;
  display: none;
}
.control input:checked ~ .control__indicator:after {
  display: block;
}
.control--checkbox .control__indicator:after {
    left: 7px;
    top: 3px;
    width: 6px;
    height: 12px;
    border: solid <?php echo $color_background; ?>;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
}
.control--checkbox input:disabled ~ .control__indicator:after {
  border-color: #eff0ff;
}
.control--radio .control__indicator:after {
  left: 7px;
  top: 7px;
  height: 6px;
  width: 6px;
  border-radius: 50%;
  background: <?php echo $color_background; ?>;
}
.control--radio input:disabled ~ .control__indicator:after {
  background: #eff0ff;
}
.select {
  position: relative;
  display: inline-block;
  margin-bottom: 15px;
  width: 100%;
}
.select select {
  display: inline-block;
  width: 100%;
  cursor: pointer;
  padding: 10px 15px;
  outline: 0;
  border: 0;
  border-radius: 0;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
}
.select select::-ms-expand {
  display: none;
}
.select select:disabled {
  opacity: 0.5;
  pointer-events: none;
}
.select__arrow {
  position: absolute;
  top: 16px;
  right: 15px;
  width: 0;
  height: 0;
  pointer-events: none;
  border-style: solid;
  border-width: 8px 5px 0 5px;
  border-color: #7b7b7b transparent transparent transparent;
}
.select select:hover ~ .select__arrow,
.select select:focus ~ .select__arrow {
  border-top-color: #000;
}
.select select:disabled ~ .select__arrow {
  border-top-color: #ccc;
}

input[type="checkbox"] {
    position: absolute;
    z-index: -1;
    opacity: 0;
}

.inbill {
    left: 14px!important;
}

.control--checkbox .control__indicator.inbill::after {
    left: 6px;
    top: 3px;
    width: 3px;
    height: 6px;
    border: solid <?php echo $color_background; ?>;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
}

label.control--checkbox {
    display: block;
    position: relative;
    width: 100%;
    height: 100%;
    max-width: 20px;
    margin-top: 0!important;
}

label.check_small {
    max-width: 25px
}

label.check_small .control__indicator {
    position: absolute;
    top: 50%!important;
    left: 50%!important;
    height: 15px;
    width: 15px;
    background: <?php echo $color_4; ?>;
    border-radius: 2px;
    cursor: pointer;
    translateY(-50%)translateX(-50%)
}

label.check_small .control__indicator:after {
    left: 5px;
    top: 2px;
    width: 2px;
    height: 7px;
    border: solid <?php echo $color_background; ?>;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
}

.custom-file-upload {
    border: 1px solid #d1d4ec;
    border-radius: 3px;
    display: inline-block;
    padding: 4px 12px;
    cursor: pointer;
    background: #f9f9fd;
    font-size: 13px;
    transition: all 1000ms ease-in
}

.custom-file-upload:hover {
    background: rgba(218, 220, 236, 0.6);
    transition: all 300ms linear
}

input#picture, input#importfile, input[type='file'] {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}

label img {
    vertical-align: middle;
}

label.custom-file-upload span {
        padding: 5px 6px;
    min-width: inherit;
    line-height: 6px;
    font-size: 12px;
    font-weight: 600;
    color: #404255;
}

.calsetcat_item {
    margin: 1% 0 3%
}

/* Checkbox END */

.step_2, .step_3 {
    margin: 1rem 0;
    background: <?php echo $color_background; ?>;
    border: 1px solid <?php echo $color_3; ?>;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 2px 2px rgba(0,0,0,0.2)
}

.servicecategory.opened::before {
    transform: translateY(-15%)rotate(-135deg);
    -webkit-transform: translateY(-15%)rotate(-135deg);
}

.booking-next, #rbi-send-form {
    background: <?php echo $color_2; ?>;
    color: <?php echo $color_background; ?>;
    text-decoration: none;
    padding: 10px 20px 8px;
    text-transform: uppercase;
    float: right;
    margin: 1% 4%;
    font-weight: 500;
    font-size: 15px;
    cursor: pointer;
    border-radius: 3px;
    margin-bottom: 20px;
    transition: all 300ms
}

.booking-next:hover, #rbi-send-form:hover {
    color: <?php echo $color_2; ?>;
    background: <?php echo $color_1; ?>;
}

.rbi_services, .rbi_service {
    padding: 1% 4%;
}

.rbi_services {
    font-size: 15px;
    font-weight: 500;
}

.total-price {
    padding: 6% 4% 6%;
    text-align: center;
    font-weight: 500;
    font-size: 16px;
    margin-top: 20px;
    background: <?php echo $color_3; ?>
}

.rbi_header {
    display: none;
}

.rbi_personal_item {
    width: 50%;
    float: left;
}

.rbipright {
    width: 100%;
}


#booking-result .rbi-header {
    display: none;
}

#rbi_pi_form h3 {
    margin-top: 30px!important;
    float: left;
    width: 100%;
    display: block;
    clear: both;
    font-size: 18px;
    font-weight: 500;
    text-transform: uppercase;
    margin-bottom: 7px;
}

#rbi_pi_form input, #rbi_pi_form textarea {
    border: 1px solid <?php echo $color_4; ?>!important;
    background: <?php echo $color_3; ?>;
    padding: 8px 10px;
    font-size: 14px;
    border-radius: 2px;
    cursor: text;
    margin-left: 0;
    display: inline-block;
    text-align: left;
    float: left;
    width: calc(100% - 10px);
    transition: all 400ms
}

 textarea {
    width: calc(100% - 10px);
    min-height: 150px;
    resize: none;
 }

 #rbi_pi_form input:hover, #rbi_pi_form textarea:hover, #rbi_pi_form input:active, #rbi_pi_form textarea:active, #rbi_pi_form input:visited, #rbi_pi_form textarea:visited {
    background: <?php echo $color_5; ?>;
 }

#rbi_pi_form label {
    position: relative;
    display: block;
    float: none;
    text-align: left;
        margin-top: 10px;
}

#rbi_pi_form {
    width: 80%;
    margin: 4% auto;
    -ms-flex-pack: start;
    -webkit-box-pack: start;
    justify-content: flex-start;
    text-align: start;
}

.rbi_sml {
    margin: 10px 0 0;
    display: inline-block;
}


select {
    font-size: 13px;
    padding: 2px 55px 2px 10px;
    border: none;
    line-height: 30px;
    color: <?php echo $color_2; ?>;
    font-weight: 500;
    height: 37px;
    border-radius: 2px;
    margin-right: 5px;
    clear: right;
    -webkit-appearance: initial;
    min-width: 302px!important;
    max-width: 100%;
    background: <?php echo $color_3; ?>;
    background-image: url(/vs/icons/arrow-down.png);
    background-size: 15px 15px;
    border: 1px solid <?php echo $color_4; ?>;
    background-position: 95% 50%;
    background-repeat: no-repeat;
}
select option {
-webkit-appearance:none;
}
select[multiple] {
height: 100px;
}

.rbi_fleft {
    width: 20px;
    height: 20px;
    display: inline-block;
}

.rbi_sml span {
    padding-left: 5px;
}

#fixbuttons {
    float: right;
    margin-top: 2rem;
}

.rbi_services_name span {
    display: block;
    position: absolute;
    top: 11px;
    left: 7px;
    background: transparent;
    width: 14px;
    height: 14px;
}

.rbi_services_name span::before {
    content: 'i';
    background: <?php echo $color_2; ?>;
    color: <?php echo $color_background; ?>;
    position: absolute;
    font-family: serif;
    font-style: italic;
    border-radius: 50%;
    width: 13px;
    height: 13px;
    font-size: 10px;
    line-height: 12px;
    top: 50%;
    left: 50%;
    text-align: center;
    transform: translate(-50%, -50%);
    transition: all 300ms
}

.rbi_services_name:hover span::before {
    background: <?php echo $color_1; ?>;
    color:<?php echo $color_2; ?>;
}

#error_blue {
    font-size: 17px;
    line-height: 27px;
    width: 600px;
    margin: 10px auto;
    max-width: 90%;
}

#rbi_pi_form .popup {
    position: relative;
    cursor: pointer;
}

#rbi_pi_form .popup::after {
    content: 'i';
    background: <?php echo $color_2; ?>;
    color: <?php echo $color_background; ?>;
    position: relative;
    display: inline-block;
    font-family: serif;
    font-style: italic;
    border-radius: 50%;
    width: 16px;
    height: 16px;
    font-size: 14px;
    line-height: 16px;
    font-weight: 700;
    text-align: center;
    margin-left: 4px;
    transition: all 300ms;
}

#rbi_pi_form .popup:hover::after {
  background: <?php echo $color_1; ?>;
    color: <?php echo $color_2; ?>;
}

.bookingallert {
        padding: 0 2rem;
    font-size: 15px;
}

.paymenttext {
    font-size: 18px;
    width: 600px;
    margin: 10px auto;
    max-width: 90%;
}

.rbi_service_price {
    font-size: 10px;
    line-height: 12px;
}

#br-result input[type=submit] {
    background: <?php echo $color_2; ?>;
    font-size: 16px;
    color: <?php echo $color_background; ?>;
    padding: 15px 25px;
    text-transform: uppercase;
    font-weight: 500;
    border: none;
    border-radius: 2px;
    cursor: pointer;
    transition: 400ms
}

#br-result input[type=submit]:hover {
    background: #b6ddca;
    color: <?php echo $color_2; ?>
}

.lc-room-name {
    font-size: 18px;
    margin-top: 40px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: inline-block
}

footer {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
}

footer .container-fluid {
    border-top: 1px solid rgba(128,128,128,0.2);
    text-align: center!important;
    width: calc(100% - 40px);
    padding: 0 20px;
}

footer .container-fluid a {
    text-decoration: none;
    color: grey;
    font-weight: 100;
    font-style: italic;
}

#wait {
    position: absolute;
    top: 93px;
    left: 0;
    width: 100%;
    bottom: 0!important;
    right: 0;
    background: <?php echo $color_background; ?>;
    z-index: 99999999;
}

#wait .line {
  width: 100%;
  height: 4px;
  background: <?php echo $color_background; ?>;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 998;
  overflow: hidden;
}

#wait .line::before {
  content: "";
  height: 4px;
  width: 100%;
  position: absolute;
  top: 128px;
  left: 0;
  overflow: hidden;
  background-color: <?php echo $color_background; ?>;
  z-index: 999;
}
#wait .line::after {
    display: block;
    position: absolute;
    content: "";
    top: 0;
    left: -200px;
    width: 200px;
    height: 2px;
    background-color: <?php echo $color_4; ?>;
    z-index: 9999999999;
    animation: loading 2s linear infinite;
}

@keyframes loading {
    from {left: -200px; width: 30%;}
    50% {width: 20%;}
    70% {width: 70%;}
    80% { left: 50%;}
    95% {left: 120%;}
    to {left: 100%;}
}

#js-step-2-r {
    position: relative;
}

#js-half-<?php echo $color_background; ?> {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(255, 255, 255, .7);
    z-index: 2;
    display: none;

}

.bookingallert h2 {
    margin: 0;
    position: relative;
    text-align: center;
}

.bookingallert h2::before {
    content: '';
    display: block;
    width: 70px;
    height: 70px;
    margin: 10px auto;
    background-size: 62px;
    background-color: <?php echo $color_2; ?>;
    -webkit-mask: url('/vs/icons/alert.svg') 50% 50% no-repeat;
    clip-path: url('/vs/icons/alert.svg');
    -webkit-mask-size: 55px;
    mask-size: 55px;
}

#nofreerooms_center {
    display: block
}

#nofreerooms_center .left-calendar, .flexi-content .left-calendar {
    margin: 2% 5px;
    width: calc(50% - 10px);
    padding: 0% 1% 2%;
    float: left;
    display: block;
    background: #ffffff;
    border-radius: 3px;
    overflow: hidden;
    box-shadow: 0 2px 2px rgba(0,0,0,0.2)
}

#nofreerooms_center .caldayname, #nofreerooms_center .calday, #nofreerooms_center .celdayno, #nofreerooms_center a.free , #nofreerooms_center .free,
.flexi-content .caldayname, .flexi-content .calday, .flexi-content .celdayno, .flexi-content a.free, .flexi-content .free {
    width: calc(100% / 7);
    float: left;
    text-align: center;
    text-decoration: none;
    padding: 2px;
}

 #nofreerooms_center .calday, #nofreerooms_center a.free, #nofreerooms_center .free,
 .flexi-content .calday,.flexi-content a.free, .flexi-content .free {
    background: #e7efde;
	cursor: pointer
}

#nofreerooms_center a.free, .flexi-content a.free, .flexi-content .free {
    cursor: pointer;
    transition: 500ms ease-in
}

#nofreerooms_center a.free:hover, #nofreerooms_center .free:hover, .flexi-content a.free:hover, .flexi-content .free:hover {
    background: #cde0ba;
}

#nofreerooms_center .left-calendar .start, #nofreerooms_center .left-calendar .end, #nofreerooms_center .left-calendar .slctd, .flexi-content .left-calendar .start, .flexi-content .left-calendar .end, .flexi-content .left-calendar .slctd {
    background: #b7cea0!important;
}

 #nofreerooms_center .empty, .flexi-content .empty {
    opacity: 1;
    background: #ffcccc;
    color: rgba(233, 30, 99, 0.5);
}

.lc-daynumber {
    font-size: 12px;
	font-weight: 500
}

.lc-room {
    float: none;
    clear: both;
    width: 100%;
    margin: 10px auto;
    font-size: 16px;
}

.lc-inoffer, .lc-price {
    display: inline-block;
    font-size: 11px;
    opacity: .8
}

.lc-price {
	position: relative
}

.lc-price.start::before {
	content: '';
	position: absolute;
	top: 50%;
	left: 50%;
	width: 125%;
	height: 20px;
	background: <?php echo $color_1; ?>;
	border-radius: 30px;
	transform: translate(-50%,-50%);
	z-index: -1
}


.cl-n {
    display: none;
}

.left-calendar-block::after {
    content: '';
    display: block;
    width: 100%;
    clear: both;
    float: none;
    min-height: 1px;
    background: transparent;
}

.lc-month-name {
    position: relative!important;
    width: calc(100% + 30px)!important;
    background: <?php echo $color_2; ?>!important;
    color: <?php echo $color_background; ?>!important;
    margin: 0 -15px!important;
    font-size: 14px;
    font-weight: 600;
    padding: 5px;
}

span.caldayname {
    font-weight: bold
}

.cl-next {
    position: absolute;
    width: 20px;
    height: 20px;
    left: 100%;
    top: 50%;
    transform: translate(-50%,-50%)translateY(1px);
    background: <?php echo $color_2; ?>;
    background-image: url(/vs/icons/arrow.png);
    background-position: 50% 50%;
    background-size: 12px 12px;
    background-repeat: no-repeat;
    border-radius: 50%;
    cursor: pointer
}

.cl-prev {
    position: absolute;
    width: 20px;
    height: 20px;
    left: 0%;
    top: 50%;
    transform: translate(-50%,-50%)translateY(1px)rotateZ(-180deg);
    background: <?php echo $color_2; ?>;
    background-image: url(/vs/icons/arrow.png);
    background-position: 50% 50%;
    background-size: 12px 12px;
    background-repeat: no-repeat;
    border-radius: 50%;
    cursor: pointer
}

#booking-result .flexi-content .left-calendar {
    width: 98%;
    border: none;
}

#booking-result .flexi-content .left-calendar-block {
    width: 49.5%;
  margin-top: 30px;
}

#booking-result .flexi-content .lc-month-name {
    position: relative;
    width: 200px;
    margin: 10px auto;
    font-size: 13px;
    text-align: center;
    font-weight: bold;
    text-transform: uppercase;
    margin: 10px auto -10px;
}

#booking-result .flexi-content .lc-room {
    float: none;
    clear: both;
    width: 100%;
    margin: 10px auto;
    font-size: 13px;
    text-align: center;
    margin-top: -10px;
}

#nofreerooms_center a.free:hover, .flexi-content a.free:hover {
    background: <?php echo $color_3; ?>;
}

.flexi-content a.free,.flexi-content .empty, .flexi-content .free {
    padding: 0px;
    padding-top: 5px;
    min-height: 50px
}

.flexi-content .lc-daynumber {
    font-size: 12px;
    line-height: 8px;
    padding: 5px
}

.flexi-content .lc-price {
    display: inline-block;
    font-size: 10px;
    line-height: 10px;
    opacity: .8;
    margin: 0;
}

.flexi-content .lc-room-block {
    display: block;
    width: 100%;
    float: left;
}

.flexi-content  .lc-room-name {
    font-size: 18px;
    margin-top: 40px;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: inline-block;
    text-align: center;
    font-weight: 500;
    width: 100%;
}

.flexi-content .lc-calendar {
    width: 100%;
    display: block;
    float: left;
}

#booking-result .flexi-content .left-calendar {
    width: 48%!important;
    margin: 1%!important
}

#chckresp {
    font-size: 16px;
    text-align: center;
    margin: 0 0 20px;
}

#coupon-wrapper input {
    background: #ececec;
    color: <?php echo $color_2; ?>;
    border: none;
    padding: 10px;
    margin: 0 auto;
    width: 200px;
    display: block;
    border-radius: 50px;
    text-align: center;
    font-weight: bold;
}

#rb-check-coupon {
    display: block;
    margin: 19px auto;
    width: 200px;
    text-align: center;
    background: <?php echo $color_2; ?>;
    padding: 4px 22px;
    border-radius: 2px;
    color: <?php echo $color_background; ?>;
    text-transform: uppercase;
    font-size: 15px;
    max-width: fit-content;
    cursor: pointer;
}

.oferfreerooms {
  display: inline-block;
    background: <?php echo $color_2; ?>;
    margin: 2px 10px;
    padding: 2px 14px;
    border-radius: 30px;
    font-size: 12px;
    line-height: 17px;
    font-weight: 500;
    transform: translateY(-2px);
}

.br-offer-block {
    overflow: hidden;
    margin-top: 25px;
    box-shadow: 0 2px 2px rgba(0,0,0,0.2);
    border-radius: 5px;
}

.br-offer-block .room_img {
  height: unset;
    min-height: 250px;
}

.br-offer-block .offer-desc {
    text-align: left;
    z-index: 22;
    color: <?php echo $color_2; ?>;
    padding: 20px 40px;
    padding-bottom: 0;
    background: <?php echo $color_background; ?>;
}

.br-offer-block .room_img:hover::before, .br-offer-block .room_img:hover::after {
  opacity:1
}

.br-offer-block .room_img:hover::before {
    opacity: .5
}

.br-offer-block .offer-desc h4 {
    text-transform: uppercase;
    font-size: 26px;
    line-height: 34px;
    margin-bottom: 6px;
    margin-top: 4px;
}

.br-offer-block .offer-desc small {
    color: <?php echo $color_4; ?>;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 400;
}

.br-offer-block .offer-desc p {
    font-size: 15px;
    padding: 0;
    font-weight: 500;
}

#br-result.resultsoffer {
    margin-top: -16px;
    width: 100%;
}

#br-result.resultsoffer  .bookingallert {
    padding: 0 2rem;
    font-size: 15px;
    padding-top: 30px;
}

#error_red {
    text-align: center;
	width: calc(100% - 40px);
    padding: 20px;
    font-size: 18px;
    margin: 15px auto 0;
}

.of-block {
    background-size: cover!important;
    background-position: center center!important;
    height: 190px;
    position: relative;
    overflow: hidden;
}

#br-result.offerslist {
    margin: 30px auto 90px;
}

.offerslistname {
  margin-top: 30px;
  margin-bottom: 0;
}

.br-offer-block .room_img::before, .br-offer-block .room_img::after {
  display: none;
}

.of-block h3 {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    text-align: center;
    color: <?php echo $color_background; ?>;
    text-transform: uppercase;
    font-size: 16px;
    letter-spacing: 0.8px;
    margin-bottom: 0;
    font-weight: 500;
    padding-top: 10px;
    width: 100%;
    padding: 5px 20px 0;
    background: <?php echo $color_2; ?>;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.offer-desc .date_start, .offer-desc .date_end, .offer-desc .price_from, .offer-desc .inday, .offer-desc .nights {
    background: <?php echo $color_2; ?>;
    color: white;
    display: inline-block;
    padding: 4px 14px;
    font-weight: 500;
    border-radius: 3px;
    float: none;
    margin: 7px 5px 0 5px;
}

.br-offer-block .offer-desc .calltobook {
    color: rgb(1,107,40);
    display: inline-block;
    background: #ebf4e3;
    border: 1px solid rgba(0, 107, 40, 0.3);
    text-align: center;
    padding: 7px 18px 7px 30px;
    margin: 20px 0 1px 0px;
    border-radius: 3px;
    text-transform: none;
    display: inline-block;
    float: left;
    text-align: left;
    font-size: 14px;
    letter-spacing: 0;
    position: relative
}

.br-offer-block .offer-desc .calltobook::before {
    content: 'i';
    position: absolute;
    display: block;
    left: 8px;
    top: 50%;
    transform: translateY(-50%);
    width: 16px;
    height: 16px;
    line-height: 16px;
    font-size: 14px;
    font-style: italic;
    font-weight: 500;
    color: #ebf4e3;
    background: rgb(1,107,40);
    text-align: center;
    border-radius: 50%;
    font-family: serif;
    opacity: 1;
    cursor: pointer;
    transition: all 300ms;
}


@keyframes blinkback {
  0% { color: <?php echo $color_2; ?> }
  50% { color: <?php echo $color_1; ?> }
  100% { color: <?php echo $color_2; ?>}
}
@-webkit-keyframes blinkback {
 0% { color: <?php echo $color_2; ?>}
  50% { color: <?php echo $color_1; ?> }
  100% { color: <?php echo $color_2; ?> }
}

#btn-offer-open-cal {
    background:  <?php echo $color_1; ?> ;
    color: <?php echo $color_2; ?> ;
    display: inline-block;
    margin: 20px -40px 0 -40px;
    width: calc(100% + 82px);
    padding: 9px 12px;
    font-size: 16px;
    text-align: center;
    text-transform: uppercase;
    border-radius: 0;
    font-weight: 500;
    cursor: pointer;
    transition: 400ms;
    -webkit-animation: blinkback 3s linear infinite;
    -moz-animation: blinkback 3s linear infinite;
    animation: blinkback 3s linear infinite;
}

#btn-offer-open-cal:hover {
  background: <?php echo $color_2; ?>;
  color: <?php echo $color_background; ?>;
  animation: none
}

#offer-room {
    width: 90%;
    background: #f5f5f5;
    border-radius: 4px;
    overflow: hidden;
    margin: 5%;
    text-align: center;
    box-shadow: 0 2px 2px rgba(0,0,0,0.2);
}

#offer-room .oferfreerooms {
    display: none;
}

#offer-room .final_price {
    font-size: 17px;
    font-weight: normal;
    position: relative;
    margin-top: 10px;
    display: inline-block;
}

#br-result.resultsoffer .bk-result-in .col-md-12 h4 {
    font-size: 15px;
    line-height: 22px;
    /* font-style: italic; */
    margin: 0;
    border-top: 1px dashed <?php echo $color_3; ?>;
    padding: 16px 1rem 0px;
    font-weight: 500;
    z-index: 2;
    text-transform: uppercase;
    position: relative;
    margin-top: 2px;
    letter-spacing: 0.8px;
    background: border-box;
    text-align: center;
    background: <?php echo $color_background; ?>;
}

#offer-room .off_name {
    text-align: center;
    cursor: default;
    font-weight: normal;
    text-transform: none;
    margin-top: 0;
    background: <?php echo $color_2; ?>;
    color: white;
    padding: 5px;
    font-size: 14px;
}

#offer-room .off_offer-name {
	margin-top: 10px;
	font-size: 20px;
	color: <?php echo $color_2; ?>;
	padding: 10px 10px 0;

}

#offer-room  .off_date {
	opacity: .7
}

#offer-room .off_img {
    position: relative;
    cursor: pointer;
}

#offer-room .off_img::before {
    content: '';
    z-index: 4;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    background: <?php echo $color_2; ?>;
    opacity: 0.2;
    transition: 300ms;
}

#offer-room .off_img::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: url(/vs/icons/zoom.svg) 50% 50% no-repeat;
    background-size: 55px;
    opacity: 0.6;
    z-index: 6;
    width: 80px;
    height: 80px;
    transition: 800ms all;
}

#offer-room .off_img:hover::before {
    opacity: .5;
    transition: 300ms;
}

#offer-room .off_img:hover::after {
    opacity: .6;
    background-size: 45px;
    transition: 800ms;
}

#offer-d {
    background: <?php echo $color_background; ?>;
    margin: 10px 0 0 0;
    text-decoration: none;
}

a #offer-d div, a #offer-d div span {
    text-decoration: none!important;
}

.offerslist a, .offerprop a {
    box-shadow: 0 2px 2px rgba(0,0,0,0.2);
    display: block;
    overflow: hidden;
    border-radius: 5px;
    margin: 10px;
}

.offerprop h2 {
    margin-top: 80px;
    margin-bottom: 20px;
    letter-spacing: 0px;
    font-weight: 400;
    font-size: 22px;
}

.offerprop .bookingallert h2 {
    margin-top: 0
}

.offer-desc .parex_text {
    font-size: 13px;
    line-height: 20px;
    margin: 13px 0;
}

#offer-d .date {
    background: <?php echo $color_2; ?>;
    color: <?php echo $color_3; ?>;
    text-align: center;
    margin-top: -12px;
    z-index: 33;
    padding-bottom: 10px
}

#offer-d .price_from, #offer-d .nights, #offer-d .off_btn {
    width: 33.333%;
    float: left;
    padding: 10px;
    padding-top: 22px;
    text-decoration: none;
    position: relative;
    text-align: center;
    background: <?php echo $color_background; ?>;
    font-size: 15px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

#offer-d .off_btn  {
    padding-top: 14px;
    padding-bottom: 14px;
    height: 55px;
}

#offer-d .price_from span, #offer-d .nights span {
    color: <?php echo $color_2; ?>;
    position: absolute;
    top: 3px;
    left: 0;
    width: 100%;
    text-align: center;
    font-weight: 400;
    text-transform: uppercase;
    font-size: 11px;
}

#offer-d .selectoffer {
    background: <?php echo $color_2; ?>;
    color: <?php echo $color_background; ?>;
    border-radius: 3px;
    padding: 2px 10px;
    display: inline-block;
    text-transform: uppercase;
    font-size: 14px;
    font-weight: 500;
    margin: 0;
    cursor: pointer;
    transition: 300ms
}

#offer-d .selectoffer:hover, #offer-d:hover .selectoffer, .offerslist a:hover #offer-d .selectoffer  {
    background: <?php echo $color_1; ?>;
    color: <?php echo $color_2; ?>;
}

.offer-desc .date {
    color: <?php echo $color_2; ?>;
    font-size: 15px;
    font-weight: 500;
}

.officons {
        display: inline-block;
    width: 100%;
    float: none;
    margin-left: -5px;
}

header a  {
    display: block;
    color: <?php echo $color_background; ?>;
    text-decoration: none;
}

.normalbookbtn {
    background: <?php echo $color_2; ?>;
    color: <?php echo $color_background; ?>;
    text-decoration: none;
    padding: 7px 20px;
    text-transform: uppercase;
    margin: 10px auto 30px;
    border-radius: 3px;
    font-size: 14px;
        font-weight: 500;
    transition: 300ms;
    cursor: pointer;
}

.normalbookbtn:hover {
    background: <?php echo $color_1; ?>;
    color: <?php echo $color_2; ?>;
}

.offer-room {
    width: 100%;
    display: flex;
    padding: 10px;
}

.resultsoffer .rbi_price {
    background: <?php echo $color_background; ?>;
}

.resultsoffer .oferfreerooms {
    display: inline-block;
    background: <?php echo $color_2; ?>;
    margin: 0px 10px;
    padding: 2px 10px;
    border-radius: 30px;
    font-size: 10px;
    line-height: 17px;
    font-weight: 500;
    transform: translateY(-4px);
    margin-left: 0;
    border-top-left-radius: 0;
}

.resultsoffer .off_confirm {
    margin: 10px auto 15px;
    float: none;
    display: inline-block;
}

.lightgallery {
    list-style: none;
    margin: 0;
    padding: 10px;
}

.lightgallery a {
    display: block;
    position: relative;
    overflow: hidden;
    padding-bottom: 65%;
    background-size: cover!important;
    margin-right: 10px;
    margin-bottom: 10px
}

.lightgallery a img {
    display: none
}

.hotelinfo {
    text-align: left;
    padding: 0;
    margin-top: 15px;
    border-radius: 3px;
    padding: 15px;
}

.hi-text {
    padding: 0 10px;
    margin-top: -15px;
}

.hi-text h2 {
    margin-bottom: 0px;
    font-size: 24px;
  line-height: 32px;
    margin-top: 30px;
}

.hi-text h3 {
    font-size: 16px;
    margin-bottom: -8px;
    font-weight: 600;
}

.hi-text {
    line-height: 18px
}

.hotelinfo .col-md-3 {
    -ms-flex-preferred-size: 33.33333%!important;
    flex-basis: 33.33333%!important;
    max-width: 33.33333%!important;
    padding: 0;
}

#selcal-info {
    display: inline-block;
    text-align: center;
    background: <?php echo $color_2; ?>;
    color: <?php echo $color_background; ?>;
    padding: 5px 15px;
    border-radius: 3px;
}

#sci-start, #sci-end {
    display: inline-block;
    margin: 0 6px;
}

#sci-start span, #sci-end span, #sci-nights span {
    font-weight: bold;
}

#sci-start span, #sci-end span {
    display: inline-block;
    min-width: 70px
}

#rf-end, #rf-start {
    min-width: 120px
}

#js-popup-content .lightgallery {
    padding: 10px 0;
}
#mobile-icons {
    position: absolute;
    top: 0;
    right: 0;
    width: 50px;
    height: 50px;
    z-index: 33;
}
.desktop-hidden {
    display: none;
}
.mobile-hidden {
	display: block
}
.menu-opener {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background: transparent;
    height: 50px;
    width: 50px;
}
#nav-icon {
    width: 30px;
    height: 20px;
    position: relative;
    margin: 15px auto;
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
    -webkit-transition: 400ms ease-in-out;
    -moz-transition: 400ms ease-in-out;
    -o-transition: 400ms ease-in-out;
    transition: 400ms ease-in-out;
    cursor: pointer;
    z-index: 99999;
}

#nav-icon span {
    display: block;
    position: absolute;
    height: 3px;
    width: 100%;
    background: white;
    border-radius: 2px;
    opacity: 1;
    left: 0;
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
    -webkit-transition: .25s ease-in-out;
    -moz-transition: .25s ease-in-out;
    -o-transition: .25s ease-in-out;
    transition: .25s ease-in-out;
}

#nav-icon span:nth-child(1) {
    top: 0;
}
#nav-icon span:nth-child(2) {
    top: 8px;
}
#nav-icon span:nth-child(3) {
    top: 16px;
}

#nav-icon.open span:nth-child(1) {
    top: 10px;
    -webkit-transform: rotate(135deg);
    -moz-transform: rotate(135deg);
    -o-transform: rotate(135deg);
    transform: rotate(135deg);
}
#nav-icon.open span:nth-child(2) {
    opacity: 0;
    left: -60px;
}
#nav-icon.open span:nth-child(3) {
    top: 10px;
    -webkit-transform: rotate(-135deg);
    -moz-transform: rotate(-135deg);
    -o-transform: rotate(-135deg);
    transform: rotate(-135deg);
}

#offer-room .off_img {
	min-height: 185px;
    width: 100%;
    background-size: cover!important;
    background-position: 50% 50%!important;
    margin: 0;
	float: none
}

/* MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE MOBILE */

@media only screen and (max-width: 1150px) {
    .col-md-12 {
        width: 100%;
        text-align: center
    }

.desktop-hidden {
    display: block;
}
.mobile-hidden {
	display: none
}

header {
    position: fixed;
    left: 0;
    top: 0;
    width: 100vw;
    z-index: 9998888
}

#rbi_step {
    height: 43px;
    margin-top: 50px;
}

.mb-title {
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-top: 20px;
    margin-bottom: 10px;
}
#booking-result {
    display: block;
    width: 94%;
    position: relative;
    max-width: 1100px;
    margin: 0 auto;
}

    .col-md-4 {
       width: calc(100%/12*6);
    }

    .col-md-8 {
        width: calc(100%/12*8);
    }

    .col-md-6 {
    width: calc(100%/2);
}

.col-md-3 {
    width: calc(100%/12 * 3);
}

.col-md-9 {
    width: calc(100% / 12 * 9);
}

	header ul {
    position: fixed;
    top: 50px;
    padding:0;
    width: 300px;
	max-width: 300px;
    right: -300px;
    text-align: center;
	background: <?php echo $color_2; ?>!important;
	height: 100vh;
	overflow: hidden;
    z-index: 999999;
}

::-webkit-scrollbar {
    width: 0;
}

header ul li {
	display: inline-block;
	width: 300px;
	text-align: center
}

header ul li a, header ul li a:hover {
	background: transparent;
	color: white!important
}

.hotelinfo .col-md-4, .hotelinfo .col-md-8 {
    width: 100%
}

.bk-result-in .col-md-8 {
       width: 100%;
    }

}

@media only screen and (max-width:1000px) {
    .bk-result-in h4 {
    text-align: left;
    }

    .br-offer-block .room_img {
    height: unset;
    min-height: 250px;
    width: 100%;
}

.col-md-4.room_img {
    width: 100%
}

.br-offer-block .room_img {
    height: unset;
    min-height: 250px;
    width: 100%;
}

.offer-desc.col-md-8 {
    width: 100% !important
}

    #rbi_step ul li.rbi_act::before {
    display: none
}

    .bookingallert {
    margin: 0 auto;
    }

    .tbi_top {
    font-size: 14px;
    line-height: 16px;
    text-align: left;
    display: inline-block;
    padding-top: 7px;
    padding-bottom: 6px;
}

   #rbi_pi_form {
    width: 90%;
    margin: 4% auto;
}

.rbi_tags_wrapper {
    margin-bottom: 20px;
    text-align: left;
}

.bk-result-in .offer-wrapper {
    text-align: left
}

#rbi_step ul li {
    padding: 10px;
    font-size: 11px;
}

.off_img {
    background-size: cover!important;
    background-position: 50% 50%!important;
}

.popup-wrapper {
    position: relative;
    height: 100%;
    width: 100%!important;
}

.rbi_price .rbi_price {
    transform: translateY(-5px);
}
}

@media only screen and (max-width: 900px) {
   .tbi_top {
    width: 100%;
    display: block;
}

#br-result.offerslist .col-md-4 {
    width: calc(100%/12*6);
}



        .rbi_price .rbi_price {
    display: inline-block;
    width: 70%;
    line-height: 14px;
    transform: none;
    left: 0;
    margin: 0;
    float: left;
}


.beforeprice_percent {
    transform: translateY(-1px);
}



        .rbi_price small {
            position: relative;
            width: 100%;
            display: block;
            line-height: 13px;
            margin: 0;
            top: 0
        }

 .rbi_confirm {

    transform: translateY(-4px);
}

 .room_img {
    height: 160px;
 }

 .bk-result-in h4 small {
    display: block;
    max-width: fit-content;
    margin: 2px 10px;
    margin-left: 0;
    padding: 2px 14px;
    padding-left: 5px;
    border-radius: 30px;
    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
    font-size: 10px;
    line-height: 17px;
    font-weight: 500;
    transform: translateY(1px);
    }

    .room-head {
    font-size: 13px;
    }


}

@media only screen and (max-width: 800px) {
    #nofreerooms_center .left-calendar, .flexi-content .left-calendar {
    margin: 2% 0;
    width: 100%;
    padding: 0% 1% 2%;
    float: left;
    display: block;
    background: #ffffff;
    border-radius: 3px;
}
.beforeprice_percent {
    transform: translateY(-1px);
}
#offer-room .off_name {
    width: 100%!important
}
}


@media only screen and (max-width: 670px) {

    .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
        width: 100%;
    }

    .rbi_price {
        display: block;
        width: 100%;
        line-height: 20px
        }

    .offerprop h2 {
    font-size: 20px;
    line-height: 26px;
    padding: 0 20px;
}

    #br-result.offerslist .col-md-4 {
    width: calc(100%);
}

    .nextday_percent span {
    margin: 5px;
    text-transform: uppercase;
    background: #016b28;
    color: #ffffff;
    font-size: 13px;
    padding: 8px 10px;
    border-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    margin: 8px -12px -3px -12px;
    display: block;
    width: calc(100% + 24px);
}

.rbi_price .rbi_price {
    width: 100%;
    text-align: center;
}

#booking-result {
    width: 100%
}

    #booking-result .flexi-content .left-calendar-block {
    width: 98%;
    margin-top: 35px;
    }

    #rbi_step ul {
    display: table;
    width: 100%;
    height: 43px;
}

#offer-d .date {
    margin-top: -11.5px;
}

    #rbi_step ul li {
    font-size: 10px;
    line-height: 12px;
    display: table-cell;
    vertical-align: middle;
    padding: 10px;
  }

header ul li {
    width: 100%;
    display: block
}

html {
    width: 100%;
    overflow-x: hidden!important
}

header ul li a {
        color: <?php echo $color_2; ?>;
}

header .col-md-4 {
    width: calc(100%);
}

header h1 {
    padding-left: 15px;
}

.bk-result-in .col-md-8 {
    text-align: left;
    padding: 1rem 1.5rem;
}

.rbi_price  {
    display: block;
    float: right;
    width: 100%;
}

.tbi_top {
    position: relative;
    padding-left: 25px;
    width: 100%;
    font-size: 15px;
    line-height: 20px;
    padding-top: 5px;
}
.rbi_price .rbi_price {
    width: 65%;
    float: none;
    padding: 5px 15px;
    margin: 0;
    line-height: 30px;
    box-shadow: none;
    background: transparent;
    text-align: right;
    /* justify-content: flex-end; */
    position: relative;
}

.beforeprice_percent {
    transform: none
}


.rbi_confirm {
    margin: 10px;
    float: none;
}

.off_confirm {
    float: none
}

#rf-button {
    margin: 20px auto 0;
}

#js-peoples {
    top: 120px;
}

#calendar-block {
    top: 95px
}

#js-calendar .mb-content {
    width: calc(100vw - 38px);
    max-width: 100%;
    float: left;
}
.month-block {
    float: left;
    margin: 10px;
    width: 100%;
}

.rbi_price {
    background: rgb(247, 247, 247);
}

.rsb_half {
    width: 100%;
    float: left;
}

.bk-result-in .offer-wrapper {
    text-align: left
}

#popup-content {
    background: <?php echo $color_background; ?>;
    min-height: 100px;
    height: calc(100vh - 135px);
    max-height: fit-content;
    overflow-y: scroll;
    overflow-x: hidden;
    border-radius: 3px;
    position: fixed;
    top: 60px;
    left: 1vw;
    width: 98vw;
    background: <?php echo $color_background; ?>;
    box-shadow: 0 0 80px rgba(26, 45, 79, 0.2);
    padding: 4%;
}

#rbi_pi_form {
    width: 94%;
    margin: 4% auto;
}

#rbi_pi_form input, #rbi_pi_form textarea {
    font-size: 16px
}

.rsb_half {
    margin-bottom: -5px;
}

.booking-next, #rbi-send-form {
    margin-top: 6%;
}

.rbi_sml span {
    padding-left: 5px;
    display: table;
}

#popup-content {
    position: fixed;
}

.room_img {
    background-size: cover!important;
    background-position: 50% 50%!important;
    height: 195px;
    z-index: 3;
    position: relative;
    cursor: pointer;
}

#js-step-2-l, #js-step-3-l {
    border-right: inherit;
    background: #f3f4f6;
}

#br-preloader {
    height: 80px;
    width: 80px;
    display: none;
    top: 5px;
    left: 50%;
    transform: translateX(-50%);
    margin-top: 30px;
}

}

@media screen and (-webkit-min-device-pixel-ratio:0) {
  textarea,
  input {
    font-size: 16px;
  }

  input[type="text"]:focus,
textarea:focus {
    -webkit-text-size-adjust: 100%;
}

}

@media only screen and (max-width: 440px) {

    #booking-result {
    width: 100%;
   }

    .js-show-calendar, #rf-peoples {
    font-size: 15px;
    padding: 5px 12px;
}
.rbi_sml span {
    padding-left: 5px;
    padding-right: 15px;
    display: table;
}

#nostart-modal {
    position: absolute;
    top: 50%;
    left: 12px;
    width: 280px;
    margin: 0 auto;
    text-align: center;
    transform: translate(0,-50%);
    }

#rbi_step {
    height: 56px;
}
#wait {
    top: 94px;
}

#offer-room .off_name {
    text-align: center;
    cursor: default;
    font-weight: normal;
    text-transform: none;
    margin-top: 0;
    padding: 5px;
    font-size: 14px!important;
    width: calc(100% + 40px)!important;
    margin: -10px!important;
    margin-bottom: 18px!important;
}

.br-offer-block .offer-desc .calltobook::before {
    top: 12px;
    transform: none
}

.br-offer-block .offer-desc {
    padding: 20px!important;
     padding-bottom: 0px!important
}

.br-offer-block .offer-desc h4 {
    font-size: 21px;
    line-height: 27px;
    margin-bottom: 0px;
    margin-top: 4px;
}


#rbi_step::before {
    display: none;
}

#rbi_step ul li {
    font-size: 8px;
    line-height: 12px;
    display: table-cell;
    vertical-align: middle;
    padding: 10px;
}
.bookingallert {
    padding: 0 2rem;
    font-size: 14px;
    margin-top: -25px;
}

.bk-result-in .col-md-8 {
    text-align: left;
    padding: 0.8rem;
}
.rbi_price .rbi_price {
    width: 100%;
    text-align: center;
}
.bk-result-in .offer-wrapper {
    height: unset
}

.off_name {
        padding-right: 0;
    width: 94%;
    margin: 6% 2% 0;
    text-align: center;
    font-size: 16px;
}

.off_price {
    text-align: center;
}

.rbi_confirm, .off_confirm, .rbi_confirm_btn {
    background: <?php echo $color_2; ?>;
    color: <?php echo $color_background; ?>;
    text-align: center;
    width: 100px;
    margin: 8px auto 20px;
    height: 30px;
    line-height: 30px;
    border-radius: 3px;
    cursor: pointer;
    transition: all 300ms;
    display: block;
}

.off_img {
    min-height: 185px;
    width: 100%;
    background-size: cover!important;
    background-position: 50% 50%!important;
    margin: 0%;
}

#step-title {
    position: relative;
    z-index: 10000;
    width: 94%;
    margin: 0 3%;
}

#step-title #step-desc {
    font-size: 11px;
    line-height: 13px;
    display: inline-block;
    margin-top: 10px;
    width: 80%;
}

#booking-result .flexi-content .left-calendar {
    width: 100%!important;
    margin: 1% 0!important;
    box-shadow: none;
}

#rf-rooms {
    text-decoration: underline;
    font-size: 11px;
    cursor: pointer;
    margin: 10px auto;
}

.lc-price {
    position: relative;
    letter-spacing: -0.5px;
    font-size: 10px;
}

.clp-button {
    position: relative;
    margin: 15px auto;
    display: table;
    letter-spacing: 0.5px;
    width: auto;
    border-radius: 3px;
    font-weight: 600;
    text-transform: uppercase;
    padding: 4px 18px;
    cursor: pointer;
    transition: 400ms;
    top: 15px;
    right: 0;
}

#js-peoples, #js-rooms {
    padding: 50px 20px;
}

}

@media only screen and (max-width: 380px) {
    .bk-result-in .col-md-8 {
    background: #ffffff;
    padding: 1rem 1rem!important;
    position: relative;
}

}