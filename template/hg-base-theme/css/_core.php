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

p:empty {
    display: none;
}

body .editable {
    padding: 0;
    margin: 0;
    background: none;
    cursor: pointer
}

#modaleditor {
    position: fixed;
    z-index: 999;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    background: rgba(2, 13, 25, 0.8);
    display: none;
}

#modal-close, #modal-save {
    display: inline-block;
    background: #ff0045;
    color: <?php echo $color_background; ?>;
    cursor: pointer;
    padding: 5px 20px;
    margin: 20px 15px;
    border-radius: 3px;
    text-transform: uppercase;
    font-weight: 600;
    width: 50px;
    border-radius: 30px;
    transition: 400ms;
    outline: none
}

#modal-close:hover {
    background: #bf0739;
}

#modal-save {
    background: #76c11e;
    margin-left: 0;
    margin-right: 10px;
}

#modal-save:hover {
    background: #528a10;
}

#modal-in textarea {
    margin: 0px;
    width: 800px;
    min-height: 280px;
    resize: vertical;
    border: none;
    border-radius: 3px;
    padding: 10px;
    font-size: 15px;
    color: <?php echo $color_2; ?>;
}

#modal-in .cke_chrome {
    border: none;
    border-radius: 4px;
    overflow: hidden;
    box-shadow: 0 0 20px <?php echo $color_2; ?>;
}

#modal-buttons {
    position: fixed;
    bottom: 14px;
    right: 100px;
    text-align: center;
    display: none;
}

.cke_dialog_background_cover {
    background-color: <?php echo $color_2; ?>!important
}

.cke_dialog_body {
    z-index: 1;
    background: #eaeaea;
    border: 1px solid #b2b2b2;
    border-bottom-color: #999;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 5px;
    overflow: hidden;
    }

    .cke_dialog_body {
    z-index: 1;
    background: <?php echo $color_background; ?>!important;
    border: 1px solid <?php echo $color_background; ?>!important;
    border-bottom-color: <?php echo $color_background; ?>!important;
    color: <?php echo $color_2; ?>!important;
}

.cke_dialog_title {
    font-weight: bold;
    font-size: 13px;
    cursor: move;
    position: relative;
    color: <?php echo $color_2; ?>!important;
    background: <?php echo $color_background; ?>!important;
    text-shadow: none;
    }

    .cke_dialog_footer {
    text-align: right;
    position: relative;
    border: 0!important;
    outline: 1px solid <?php echo $color_background; ?>!important;
}

a.cke_dialog_ui_button {
    display: inline-block;
    padding: 4px 0;
    margin: 0;
    text-align: center;
    color: <?php echo $color_background; ?>!important;
    vertical-align: middle;
    cursor: pointer;
    border: none!important;
    border-bottom-color: none!important;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px!important;
    background: #E91E63!important;
    transition: 400ms
}

a.cke_dialog_ui_button:hover {
    background: #bd0033!important;
}

a.cke_dialog_ui_button span {
    color: <?php echo $color_background; ?>!important
}

a.cke_dialog_ui_button span {
    text-shadow: none!important
}

a.cke_dialog_ui_button_ok {
    background: #69b10b!important;
}

a.cke_dialog_ui_button_ok:hover {
    background: #558e13!important
}

::selection {
    background: <?php echo $color_1; ?>;
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

*,
:after,
:before {
    box-sizing: inherit
}

body {
    padding: 0;
    margin: 0;
    width: 100%;
    overflow-x: hidden;
    color: <?php echo $color_2; ?>;
    background: <?php echo $color_background; ?>;
    font-family: 'Roboto', sans-serif;
    font-size: 13px;
    line-height: 23px;
    font-weight: normal;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-shadow: 1px 1px 1px rgba(0,0,0,0.004)
}

.wrapper-10-0 {
    padding: 10px 0;
    min-height: 1px;
    display: block
}

.wrapper-20-0 {
    padding: 20px 0;
    min-height: 1px;
    display: block
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

#frontendeditor {
    position: fixed;
    bottom: 0;
    left: 0;
    height: 100px;
    width: 120px;
    background: transparent;
    display: block;
    z-index: 99999999999999;
}

.switch {
    position: absolute;
    display: inline-block;
    width: 60px;
    height: 34px;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

#popupbanner {
    position: fixed;
    display:none;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.65);
    z-index: 88888;
}

#popupbanner a {
    display: block;
    position: relative;
    width: 600px;
    max-width: 100%;
    margin: 0px auto;
}

.popupcontent {
    width: 600px;
    max-width: 90%;
    margin: 90px auto;
    text-align: center;
    background: <?php echo $color_background; ?>;
    border-radius: 4px;
    box-shadow: 0 0 10px black;
    position: relative
}

#bannerclose {
    position: absolute;
    width: 600px;
    margin: 100px auto 0;
    max-width: 90%;
    height: 0px;
    display: block;
    background: transparent;
    display: block;
    z-index: 99999;
    left: 50%;
    top: -10px;
    cursor:pointer;
    transform: translateX(-50%);
}

#bannerclose::before {
    position: absolute;
    top: -35px;
    right: 0;
    content: "\d7";
    font-size: 35px;
    color: <?php echo $color_background; ?>;
    line-height: 25px;
    text-align: center;
    font-weight: 500;
}

.popuptext {
    padding: 10px 40px;
}

.popuptext h2 {
    font-size: 30px;
    line-height: 40px;
    margin-top: 25px;
    margin-bottom: 25px;
}

.popuptext p {
    font-size: 14px;
    line-height: 24px;
    padding: 0 35px;
}

.popupimg {
    padding-bottom: 55%;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px
}

.gal-img-box {
    margin: 10px 20px 50px;
}

.gal-img img {
    max-width: 100%;
    max-height: 270px;
}

.gal-img-name {
    font-size: 18px;
    line-height: 28px;
    font-weight: 600;
}

.like-button {
    background: #ffcc02;
    color: #1b0c51;
    display: inline-block;
    padding: 5px 30px;
    border-radius: 26px;
    text-transform: uppercase;
    font-weight: 900;
    cursor: pointer;
    transition: 400ms
}


.like-button:hover {
    color: #ffcc02;
    background: #1b0c51;
}

.like-button.ivoted, .like-button.ivoted:hover {
    background: whitesmoke;
    color: silver;
    cursor: no-drop;
}

.likecounter {
    font-size: 25px;
    margin: 5px 0 15px;
    padding: 0 20px;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: <?php echo $color_background; ?>;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #75c11d;
}

input:focus + .slider {
  box-shadow: 0 0 1px #75c11d;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

h1, h2, h3, h4 {
    font-size: 48px;
    line-height: 58px;
    font-weight: 600;
    letter-spacing: -1px;
    text-transform: none;
    font-family: 'Montserrat', sans-serif;
    color: <?php echo $color_2; ?>;
    z-index: 2;
}

h1 {
    text-transform: uppercase;
    margin-bottom: 55px;
}

h2 {
    font-size: 30px;
    line-height: 40px;
    margin-top: 48px;
    margin-bottom: 55px;
}

h3 {
    font-size: 24px;
    line-height: 34px;
    margin-bottom: 55px;
}

p {
    font-size: 17px;
    line-height: 27px;
    color: <?php echo $color_2; ?>;
    font-weight: normal;
}

a {
    cursor: pointer!important;
    text-decoration: none
}

#article-cont a {
    color: <?php echo $color_2; ?>;
    font-weight: 700;
    font-family: 'Roboto' , sans-serif;
    font-size: 17px;
}

.swiper-container-homepage {
    width: 100%;
    height: 100vh;
    min-height: 800px;
}

.hero-heading {
    position: absolute;
    width: 1100px;
    max-width: 90%;
    text-align: center;
    left: 50%;
    z-index: 20;
    top: 50%;
    transform: translate(-50%,-50%);
}

.hero-heading span {
    font-size: 50px;
    line-height: 60px;
    color: <?php echo $color_1; ?>;
    font-family: 'Montserrat', sans-serif;
    font-weight: 900;
    text-shadow: 0 0 20px <?php echo $color_2; ?>;
}



#main-menu li:hover .sub-menu {
    z-index:100;
    opacity:1
}

#main-menu li:hover .sub-menu.subsub {
    opacity:0
}

.sub-menu {
    position: absolute;
    margin: 0;
    padding: 0;
    min-width: 230px;
    top: 49px;
    margin-left:-115px;
    left: 50%;
    visibility: hidden;
    z-index: 10;
    opacity: 0;
    transition: opacity linear .15s;
}

.ww .sub-menu {
    top: 35px
}

.subsub {
    transform: translateX(100%)translateY(-63px);
}

#left-menu {
    text-align: center
}

 #right-menu {
    text-align: right;
    margin-left: 60px;
}

#main-menu li a {
    padding: 12px 15px;
    text-decoration: none;
    color: <?php echo $color_background; ?>;
    font-size: 15px;
    text-transform: uppercase;
    font-weight: 600;
    transition: all 300ms ease-in;
}

#main-menu li a:hover {
    color: <?php echo $color_1; ?>
}


#main-menu li:last-child a {
    background: <?php echo $color_1; ?>;
    border: 2px solid <?php echo $color_1; ?>;
    color: <?php echo $color_2; ?>;
    font-weight: bold;
    transition: 400ms;
    border-radius: 3px;
    padding: 7px 22px;
    margin-left: 15px;
}

#main-menu li:last-child a:hover {
    background: transparent;
    color: <?php echo $color_1; ?>
}

#main-menu li {
    display: inline;
    position: relative;
}

#main-menu {
    list-style: none;
    padding: 0;
    margin: 25px 0;
    display: inline-block;
}

#sidie {
    position: absolute;
    right: 35px;
    color: <?php echo $color_background; ?>;
    top: 50%;
    transform: translateY(-50%);
}

#sidie a {
    text-decoration: none;
}

header {
    position: absolute;
    z-index: 2;
    left: 0;
    top: 0;
    width: 100%;
}

header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    background: <?php echo $color_2; ?>;
    opacity: .85
}

#roominfo {
    list-style: none;
    padding: 0;
    margin: 10px 0;
    display: block;
    color: <?php echo $color_2; ?>;
}

#roominfo li {
    font-size: 15px;
    display: inline-block;
    margin: 2px;
    padding-left: 28px;
    position:relative
}

#roominfo li::before {
    content: '';
    display: block;
    position: absolute;
    left: 5px;
    top: 2px;
    width: 20px;
    height: 20px;
    background: url('/template/hg-base-theme/booking_v4/tag.png') 50% 50% no-repeat;
    background-size: 14px;
}

#voucherorder {
    background: <?php echo $color_background; ?>;
    padding: 20px 0;
}

#voucher-form .rbi_personal_item {
    width: 50%;
    float: left;
}

#voucher-form .rbi_personal_item.rbipright {
    width: 100%;
    margin: 4px 0;
}

.paymenttext {
    border-radius: 3px;
    color: <?php echo $color_background; ?>;
    background: #8BC34A;
    padding: 2%;
    font-size: 16px;
    line-height: 26px;
}

#gdpr-form-text  {
    margin-left: 50px;
    text-align: left;
    font-size: 12px;
    line-height: 16px;
    color:<?php echo $color_5; ?>
}

.form_block .form_block {
    display: block;
    width: calc(100% - 20px);
    float: left;
    margin: 0px 10px 10px;
}

.form_block .form_block  .control__indicator {
    position: absolute;
    top: 50%!important;
    left: 8px!important;
    height: 24px;
    width: 24px;
    background: <?php echo $color_3; ?>;
    border: none;
    border-radius: 2px;
    cursor: pointer;
    transform: translateY(50%);
}

.form_block .form_block .control:hover input ~ .control__indicator {
    background: <?php echo $color_2; ?>;
}

 .form_block .form_block .form_error .control__indicator {
    background: #fabdc8
}

 .form_block .form_block .control input:checked ~ .control__indicator{
    background: <?php echo $color_2; ?>
}

.form_block .form_block .control--checkbox .control__indicator:after {
    left: 9px;
    top: 3px;
    width: 7px;
    height: 14px;
    border: solid <?php echo $color_background; ?>;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
}

 #smallorder .form_block #submitform {
    width: 100px;
    background: <?php echo $color_1; ?>;
    color: <?php echo $color_2; ?>;
    display: flex;
    margin: 15px auto;
    text-align: center;
    float: none;
    padding: 6px 18px;
    font-weight: 600;
    text-transform: uppercase;
    border-radius: 3px;
    transition: 400ms;
    flex-basis: 100%;
    flex-direction: column;
}

#article-cont #smallorder .form_block #submitform {
    width: 100px;
    background: <?php echo $color_1; ?>;
    display: flex;
    margin: 0px auto;
    text-align: center;
    float: left;
    padding: 6px 18px;
    font-weight: 600;
    text-transform: uppercase;
    border-radius: 2px;
    transition: 400ms;
    font-weight: 500;
    flex-basis: 100%;
    flex-direction: column;
}

#voucher-form .rbi_personal_item input {
    background: <?php echo $color_3; ?>;
    border: none;
    padding: 8px;
    width: calc(100% - 30px);
    font-size: 14px;
    color: <?php echo $color_2; ?>;
    display: inline-block;
    line-height: 26px;
    outline: none;
    border-radius: 3px;
        font-weight: bold;
}

#voucher-form .rbi_personal_item input.rbi_red {
    background: #fabdc8
}

#voucher-form .rbi_personal_item textarea {
    width: calc(100% - 30px);
    border: none;
    height: 140px;
    resize: vertical;
    padding: 5px 8px;
    outline: none;
    font-size: 14px;
    background: <?php echo $color_3; ?>;
    display: inline-block;
    border-radius: 3px;
    line-height: 26px;
        font-weight: bold;
    font-family: 'Roboto',sans-serif;
}

#voucher-form .rbi_personal_item label {
    display: block;
    font-size: 12px;
    font-weight: 500;
    margin-bottom: 0px;
    margin-top: 8px;
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
    border: none;
    border-radius: 2px;
    cursor: pointer;
    transform: translateY(-45%)
}

#rbi_cond_bck.rbi_red_bck .control__indicator, #rbi_cond_gdpr.rbi_red_bck .control__indicator,
#rbi_gdpr_bck.rbi_red_bck .control__indicator, #rbi_gdpr_gdpr.rbi_red_bck .control__indicator {
    background: rgba(223, 23, 76, 0.45)!important;
}

#error_red {
    background: #e80253;
    display: inline-block;
    width: 100%;
    padding: 2%;
    color: <?php echo $color_background; ?>;
    font-size: 16px;
    font-weight: 500;
    font-style: italic;
    border-radius: 3px;
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
    background: <?php echo $color_2; ?>;
    border-radius: 2px;
}


.control--radio .control__indicator {
  border-radius: 50%;
}
.control:hover input ~ .control__indicator {
  background: <?php echo $color_2; ?>;
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
  background: #191d4a!important;
    border: #002d58;
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
  border-color: <?php echo $color_3; ?>;
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
  background: <?php echo $color_3; ?>;
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
  background: #e6e6e6;
  color: #7b7b7b;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
}
.select select::-ms-expand {
  display: none;
}
.select select:hover,
.select select:focus {
  color: #000;
  background: #ccc;
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

.control__indicator.inbill {
    position: absolute;
    top: 10px;
    left: 0;
    height: 16px;
    width: 16px;
    background: <?php echo $color_2; ?>;
    border-radius: 2px;
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
    margin-top: 4px!important;
}

.control__indicator.selectall {
    background: <?php echo $color_2; ?>;
    margin-top: 10px
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
    background: <?php echo $color_3; ?>;
    border-radius: 2px;
    cursor: pointer;
    translateY(-50%)translateX(-50%)
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
    background-image: url(/template/booking_v4/arrow-down.png);
    background-size: 15px 15px;
    border: 1px solid <?php echo $color_4; ?>;
    background-position: 95% 50%;
    background-repeat: no-repeat;
    outline: none
}
select option {
-webkit-appearance:none;
}
select[multiple] {
height: 100px;
}

#voucherdetailform select {
    background: <?php echo $color_3; ?>;
    background-image: url(/template/booking_v4/arrow-down.png);
    background-size: 15px 15px;
    background-position: 95% 50%;
    background-repeat: no-repeat;
    color: <?php echo $color_2; ?>!important;
    border: none
}

.rbi_fleft {
    width: 20px;
    height: 20px;
    display: inline-block;
}

.rbi_sml span {
    padding-left: 5px;
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
    border: 1px solid <?php echo $color_4; ?>;
    border-radius: 3px;
    display: inline-block;
    padding: 4px 12px;
    cursor: pointer;
    background: <?php echo $color_background; ?>;
    font-size: 13px;
    transition: all 1000ms ease-in
}

.custom-file-upload:hover {
    background: <?php echo $color_5; ?>;
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
    color: <?php echo $color_3; ?>;
}

.calsetcat_item {
    margin: 1% 0 3%
}

/* Checkbox END */


.pop-bg {
    position: absolute;
    top: 94px;
    left: 0;
    bottom: -200%;
    right: 0;
    background: <?php echo $color_background; ?>;
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

#popup-content::-webkit-scrollbar {
    display:none
}

#voucher-form #error_blue {
    background: #75c11d;
    color: <?php echo $color_background; ?>;
    padding: 10px 20px;
    border-radius: 3px;
    font-size: 16px;
    line-height: 26px;
    display: inline-block;
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
    border: solid 0px <?php echo $color_5; ?>;
    height: 24px;
    text-align: center;
    background: <?php echo $color_3; ?>;
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
    border-top: 1px dashed <?php echo $color_3; ?>;
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
        background: <?php echo $color_background; ?>;
    background: -moz-linear-gradient(right, rgb(247, 247, 247) 0%,rgb(243, 244, 246) 100%);
    background: -webkit-linear-gradient(right, rgba(255,255,255,1) 0%,rgb(243, 244, 246) 100%);
    background: linear-gradient(to left, rgba(255,255,255,1) 0%, rgb(243, 244, 246) 100%);
    border-radius: 3px
}

.rbi_services_item:first-child {
    margin-top: -10px;
}

#voucher-form h3 {
    margin-bottom: 10px;
    margin-top: 35px;
    display: inline-block;
    width: 100%;
    text-align: left;
}

#leftlogo {
    text-align: left;
}

#leftlogo a {
    position: relative;
    display: block;
}

#leftlogo img {
    width: 245px;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}

address {
    background: <?php echo $color_3; ?>;
    padding: 14px 20px;
    margin: 10px auto;
    display: inline-block;
    min-width: 600px;
    max-width: 100%;
    border-radius: 3px;
}

.voucher_item_prices input {
    background: <?php echo $color_3; ?>;
    border: none;
    font-size: 32px;
    line-height: 32px;
    height: 40px;
    padding: 0;
    padding: 4px;
    padding-left: 22px;
    margin: 0;
    color: <?php echo $color_2; ?>;
    width: 75px;
    margin: 0;
    text-align: center;
    font-weight: bold;
    cursor: none;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.input-number-decrement {
    background: <?php echo $color_1; ?>;
    color: <?php echo $color_2; ?>;
    width: 40px;
    height: 40px;
    line-height: 40px;
    font-size: 25px;
    border-top-left-radius: 25px;
    border-bottom-left-radius: 25px;
    transform: translateY(-3px);
    cursor: pointer;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    display: inline-block;
}

.input-number-increment {
    background: <?php echo $color_1; ?>;
    color: <?php echo $color_2; ?>;
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    font-size: 25px;
    border-top-right-radius: 25px;
    border-bottom-right-radius: 25px;
    cursor: pointer;
    transform: translateY(-3px);
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.input-group-button {
    display: inline-block;
    text-align: center
}

.spec img {
    max-width: 80px
}

#headcont img {
    width: 14px;
    margin-right: 6px;
    transform: translateY(3px);
}

#headcont a {
    color: <?php echo $color_background; ?>;
    margin-left: 20px;
    opacity: .5;
    transition: 400ms;
}

#headcont {
    opacity: 1;
    padding: 6px 0;
    position: relative;
}

#headcont::after {
    content: '';
    position: absolute;
    bottom: 0;
    right: 0;
    height: 2px;
    width: 100%;
    background: -moz-linear-gradient(left, rgba(0,0,0,0) 0%, rgba(255,255,255,0.15) 100%);
background: -webkit-linear-gradient(left, rgba(0,0,0,0) 0%,rgba(255,255,255,0.15) 100%);
background: linear-gradient(to right, rgba(0,0,0,0) 0%,rgba(255,255,255,0.15) 100%);
}


#headcont a:hover {
    opacity: 1
}

#lang a span {
    background: <?php echo $color_1; ?>;
    color: <?php echo $color_2; ?>;
    width: 30px;
    height: 30px;
    line-height: 30px;
    display: inline-block;
    text-align: center;
    text-transform: uppercase;
    border-radius: 2px;
    font-size: 12px;
    font-weight: 600;
    transition: 400ms;
    opacity: 1;
}

#lang a span:hover {
    background: <?php echo $color_2; ?>;
    color: <?php echo $color_1; ?>;
}

#bookpanel {
    z-index: 333;
    left: 50%;
    transform: translateX(-50%);
    background: <?php echo $color_2; ?>;
    color: <?php echo $color_1; ?>;
    width: 600px;
    display: block;
    max-width: 100%;
    position: absolute;
    bottom: -40px;
}

#cookies_bar {
    width: 100%;
    position: fixed;
    bottom: 0;
    left: 0;
    z-index: 99;
    background: <?php echo $color_1; ?>;
    color: <?php echo $color_2; ?>;
}

#cookies_content {
    display: block;
    width: 90%;
    padding: 10px 5% 5px;
    text-align: center;
    font-weight: bold;
}

#cookies_text, #cookies_content a  {
    display: inline-block;
    padding: 3px;
    color: <?php echo $color_2; ?>;
}

#cookies_content a {
    text-decoration: underline
}

#cookies_accept {
    display: inline-block;
    margin: 5px;
    background: <?php echo $color_2; ?>;
    border: 2px solid <?php echo $color_2; ?>;
    border-radius: 3px;
    color: <?php echo $color_1; ?>;
    text-decoration: none;
    padding: 3px 12px;
    transition: 400ms;
    font-weight: bold;
    cursor: pointer
}

#cookies_accept:hover {
    background: transparent;
    color: <?php echo $color_2; ?>
}

#bookpanel {
    position: absolute;
    bottom: 180px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 99;
    background: <?php echo $color_2; ?>;
    width: 600px;
    max-width: 100%;
}

#bookpanel a {
    color: <?php echo $color_1; ?>
}

#article-cont h2 {
    font-size: 32px;
    line-height: 42px;
    font-weight: 600;
    margin-top: 48px;
    font-family: 'Montserrat', sans-serif;
}

#article-cont a {
    color: <?php echo $color_2; ?>;
    font-size: 16px;
    text-decoration: underline;
    line-height: 26px;
}

#article-cont a.but {
    text-decoration: none;
    width: fit-content;
    padding: 6px 20px;
}

#article-cont a.but:hover {
    color: <?php echo $color_1; ?>;
}

#article-cont a.onleft {
    float: left
}

#article-cont {
    padding-bottom: 100px
}

#term {
    position: absolute;
    left: 0;
    bottom: 0;
    background: <?php echo $color_1; ?>;
    padding: 20px;
    padding-bottom: 10px
}

#term .day {
    font-size: 34px;
    color: <?php echo $color_2; ?>;
    font-weight: bold;
    font-family: 'Montserrat',sans-serif;
}

#term .month {
    display: block;
    text-transform: uppercase;
    color: <?php echo $color_2; ?>;
    opacity: .5;
    margin-top: -7px;
}

.container {
    width: 71rem;
    max-width: 100%
}

#map-holder {
    position: relative;
}

.direction {
    position: absolute;
    width: 300px;
    background: <?php echo $color_1; ?>;
    z-index: 8;
    text-align: center;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%)
}

.direction h3 {
    font-size: 15px;
    text-transform: uppercase;
    margin-bottom: 0
}

.direction input {
    border: 0;
    padding: 8px;
    text-align: center;
    border-radius: 50px;
    font-size: 14px;
}

.direction #mydestination {
    display: inline-block;
    /* width: 120px; */
    margin: 10px auto;
    background: <?php echo $color_2; ?>;
    border-radius: 4px;
    padding: 2px 12px;
    color: <?php echo $color_1; ?>;
    text-transform: uppercase;
    font-weight: bold;
}

.contactico {
    width: 140px;
    height: 140px;
    background: <?php echo $color_1; ?>;
    margin: 60px auto 0;
    text-align: center;
    border-radius: 50%;
    position: relative;
}

.contactico img {
    width: 60px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%)
}

#bookban .date {
    color: <?php echo $color_1; ?>;
    cursor: pointer;
    transition: 400ms
}

#bookban .date:hover {
    background: <?php echo $color_1; ?>;
    color: <?php echo $color_5; ?>;
}

#bookban .date .day {
    font-size: 36px;
    font-family: 'Montserrat', sans-serif;
    font-weight: 600;
    line-height: 40px;
}

#bookban .date .popis {
    text-transform: uppercase;
    font-size: 15px;
    line-height: 25px;
    padding-top: 20px;
    display: inline-block;
    letter-spacing: 2px;
    opacity: .3;
}

#todaybook span {
    font-size: 35px;
    line-height: 40px;
    text-align: center;
    display: block;
    color: <?php echo $color_1; ?>;
    opacity: 1;
    font-family: 'Montserrat', sans-serif;
    font-weight: 600;
}

#bookban .date .month {
    font-family: serif;
    font-size: 24px;
    display: inline-block;
    padding-bottom: 24px;
}

#todaybook {
    cursor: pointer
}

#article-cont ul {
    font-size: initial;
    color: <?php echo $color_2; ?>;
}

.desktop-hidden {
    display: none
}

.mobile-hidden {
    display: block
}

.slider-main {
    position: relative;
}

.swiper-pagination {
    bottom: 10px;
    left: 50%;
    transform: translateY(-50%);
}

.swiper-pagination-bullet {
    width: 10px;
    height: 10px;
    margin: 0 5px;
    display: inline-block;
    border-radius: 100%;
    background: <?php echo $color_background; ?>;
    opacity: .4;
}

.but, #bf_continue {
    background: <?php echo $color_1; ?>;
    border: 2px solid <?php echo $color_1; ?>;
    color: <?php echo $color_2; ?>;
    font-weight: bold;
    transition: 400ms;
    border-radius: 3px;
    padding: 6px 14px;
    margin: 20px auto;
    display: block;
    width: 150px;
    text-transform: uppercase;
    font-size: 16px;
    outline:none;
    text-decoration: none;
    text-align: center;
    transition: 400ms
}

.but:hover, #bf_continue:hover {
    color: <?php echo $color_1; ?>;
    background: <?php echo $color_2; ?>;
    border-color: <?php echo $color_2; ?>
}

#article-cont #paybutton {
      background: <?php echo $color_1; ?>;
    border: 2px solid <?php echo $color_1; ?>;
    color: <?php echo $color_2; ?>;
    font-weight: bold;
    transition: 400ms;
    border-radius: 3px;
    padding: 6px 14px;
    margin: 20px auto;
    margin-left: 0;
    display: block;
    width: 150px;
    text-transform: uppercase;
    font-size: 16px;
    outline:none;
    text-decoration: none;
    text-align: center;
    transition: 400ms
}

#article-cont #paybutton:hover {
    color: <?php echo $color_1; ?>;
    background: <?php echo $color_2; ?>;
    border-color: <?php echo $color_2; ?>
}

#voucherorder #bf_continue {
    float: right;
    margin-right: 30px;
    margin-top: 60px;
    padding: 11px 14px
}

#bluebg {
    position: relative;
    background: <?php echo $color_2; ?>;
    color: <?php echo $color_background; ?>
}

#bluebg h2 {
    color: <?php echo $color_background; ?>;
    font-size: 40px;
    line-height: 50px;
    margin-top: 48px;
}

.image-inner {
    padding-bottom: 65%;
    position: relative;
}

#event-meta {
    margin-bottom: -40px;
    margin-top: 50px;
    display: block;
    position: relative;
    width: 100%
}

#event-meta #term {
    position: relative;
    background: transparent;
    padding: 0;
}

#event-meta #term .day, #event-meta #term .month {
    display: inline-block;
    font-size: 24px;
    color: <?php echo $color_1; ?>;
    font-weight: bold;
    font-family: 'Montserrat',sans-serif;
}

#article-cont #smallorder {
    width: 700px;
    max-width: 98%;
    margin-top: -50px;
}

#owl-offers-side {
    display: block;
    width: 310px;
    max-width: 100%;
}

#owl-offers-side .onepack {
    background: #f3f3f3;
    border-radius: 4px;
    overflow: hidden;
    margin: 20px 0;
    margin-top: 0;
    text-align: center
}

.onepack {
    background: <?php echo $color_background; ?>;
    border-radius: 4px;
    overflow: hidden;
    margin: 20px;
}

.onepack p {
    font-size: 17px;
    line-height: 27px;
    color: <?php echo $color_2; ?>;
    font-weight: normal;
    font-size: 14px;
    line-height: 24px;
    padding: 10px 20px;
    margin: 0 0 10px 0;
}

.onepack h3 {
    text-transform: uppercase;
    font-size: 18px;
    line-height: 22px;
    letter-spacing: 0.5px;
    margin-bottom: 0;
        padding: 0 20px;
}

.onepack .price {
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translate(-50%);
}

.onepack .price span {
    background: <?php echo $color_1; ?>;
    display: block;
    color: <?php echo $color_2; ?>;
    padding: 4px 14px;
    border-top-right-radius: 7px;
    border-top-left-radius: 7px;
    font-weight: 700;
}

.onepack .but, #news .but {
    background: <?php echo $color_2; ?>;
    border: 2px solid <?php echo $color_2; ?>;
    color: <?php echo $color_background; ?>;
    font-weight: bold;
    transition: 400ms;
    border-radius: 3px;
    padding: 2px 14px;
    margin: 20px auto;
    display: block;
    width: 100px;
    text-transform: uppercase;
    font-size: 13px;
    transition: 400ms;
}

.onepack .but:hover, .onepack:hover .but, #news .but:hover, #news a:hover .but {
        background: <?php echo $color_1; ?>;
    border: 2px solid <?php echo $color_1; ?>;
    color: <?php echo $color_2; ?>;
}

#news h2 {
    font-size: 42px;
    line-height: 52px;
    margin-top: 48px;
    font-family: 'Montserrat', sans-serif!important;
    color: <?php echo $color_2; ?>!important;
    margin-top: 48px;
    margin-bottom: 55px;
    font-weight: bold;
}

#news a {
    display: block;
    margin: 20px 10px;
    text-align: center
}

#news h4 {
    font-size: 26px;
    line-height: 38px;
    font-weight: 600;
    letter-spacing: -1px;
    text-transform: none;
    font-family: 'Montserrat', sans-serif;
    color: <?php echo $color_2; ?>;
    z-index: 2;
}

#news  p {
    font-size: 14px;
    line-height: 22px;
    color: <?php echo $color_2; ?>;
    font-weight: normal;
}

#news .but.bigger {
    width: 230px;
    background: <?php echo $color_1; ?>;
    border: 2px solid <?php echo $color_1; ?>;
    color: <?php echo $color_2; ?>;
    padding: 8px 25px;
}

.line span {
    width: 9px;
    height: 9px;
    background: <?php echo $color_1; ?>;
    display: inline-block;
    border-radius: 50%;
    margin: 0 5px;
    transform: translateY(-10px);
}

.line::before {
    content: '';
    height: 2px;
    width: 100px;
    position: absolute;
    left: -20px;
    top: 50%;
    background: <?php echo $color_1; ?>;
    transform: translateY(-50%);
}

.line::after {
    content: '';
    height: 2px;
    width: 100px;
    position: absolute;
    right: -20px;
    top: 50%;
    background: <?php echo $color_1; ?>;
    transform: translateY(-50%);
}

.line {
    position: relative;
    width: 200px;
    max-width: 100%;
    margin: 10px auto;
    height: 2px;
    margin-top: -30px;
    margin-bottom: 30px;
}

#newsletter {
    background: <?php echo $color_2; ?>;
    color: <?php echo $color_background; ?>;
    position: relative;
}

#newsletter::before {
    content: '';
    display: block;
    position: absolute;
    width: 340px;
    height: 179px;
    background: url('/template/<?php echo $theme; ?>/images/env.svg') 50% 50% no-repeat;
    background-size: 270px;
    opacity: .1;
    left: 0;
    top: 0;
    transform: rotate(-30deg);
}

#newsletter h2, #newsletter p {
    color: <?php echo $color_background; ?>
}

#newsletter h2 {
    margin-bottom: 0;
}

#newsletter p {
    margin-top: 0;
}

.crm-text {
    font-size: 11px;
    line-height: 14px;
    font-style: italic;
}

#crm-email {
    margin: 20px auto;
    background: transparent;
    border: none;
    font-size: 18px;
    border-bottom: 3px dashed <?php echo $color_1; ?>;
    color: <?php echo $color_background; ?>;
    font-family: 'Montserrat', sans-serif;
    padding: 16px 45px;
    outline: none;
}

#crm-email::placeholder {
    color: <?php echo $color_background; ?>;
    opacity: .5;
    font-family: 'Montserrat', sans-serif;
}

.crm-send {
    background: <?php echo $color_1; ?>;
    border: 2px solid <?php echo $color_1; ?>;
    color: <?php echo $color_2; ?>;
    padding: 6px 25px;
    width: 120px;
    margin: 0 auto;
    border-radius: 40px;
    font-size: 15px;
    font-weight: bold;
    text-transform: uppercase;
    cursor: pointer;
    transition: 400ms
}

.crm-send:hover {
    background: transparent;
    color: <?php echo $color_1; ?>
}

.logofooter img {
    width: 250px;
    max-width: 100%
}

footer ul {
    list-style: none;
    text-align: left;
    padding: 0;
    margin: 0;
}

footer h3 {
    text-align: left;
    margin-bottom: 6px;
}

footer ul li a {
    color: <?php echo $color_2; ?>;
    font-family: 'Roboto',sans-serif;
    font-size: 14px;
    line-height: 22px;
}

footer ul li a:hover {
    color: <?php echo $color_1; ?>
}

footer .sociallinks {
    display: block;
    width: 100%;
    text-align: center
}

footer .sociallinks ul {
    width: 100%;
    text-align: center;
}

footer .sociallinks li {
    display: inline-block;
}

footer .sociallinks .facebook-ico {
    background-color: <?php echo $color_2; ?>;
    -webkit-mask: url(/template/<?php echo $theme; ?>/images/facebook-ico.svg) 50% 50% no-repeat;
    clip-path: url(/template/<?php echo $theme; ?>/images/facebook-ico.svg);
    -webkit-mask-size: 25px;
    mask-size: 25px;
    display: block;
    width: 60px;
    max-width: 90%;
    height: 60px;
    z-index: 2;
    visibility: visible;
    transition: all 0.5s;
}

footer .sociallinks .instagram-ico {
    background-color: <?php echo $color_2; ?>;
    -webkit-mask: url(/template/<?php echo $theme; ?>/images/instagram-ico.svg) 50% 50% no-repeat;
    clip-path: url(/template/<?php echo $theme; ?>/images/instagram-ico.svg);
    -webkit-mask-size: 25px;
    mask-size: 25px;
    display: block;
    width: 60px;
    max-width: 90%;
    height: 60px;
    z-index: 2;
    visibility: visible;
    transition: all 0.5s;
}

footer .sociallinks .youtube-ico {
    background-color: <?php echo $color_2; ?>;
    -webkit-mask: url(/template/<?php echo $theme; ?>/images/youtube-ico.svg) 50% 50% no-repeat;
    clip-path: url(/template/<?php echo $theme; ?>/images/youtube-ico.svg);
    -webkit-mask-size: 25px;
    mask-size: 25px;
    display: block;
    width: 60px;
    max-width: 90%;
    height: 60px;
    z-index: 2;
    visibility: visible;
    transition: all 0.5s;
}

footer .sociallinks .tripadvisor-ico {
    background-color: <?php echo $color_2; ?>;
    -webkit-mask: url(/template/<?php echo $theme; ?>/images/tripadvisor-ico.svg) 50% 50% no-repeat;
    clip-path: url(/template/<?php echo $theme; ?>/images/tripadvisor-ico.svg);
    -webkit-mask-size: 25px;
    mask-size: 25px;
    display: block;
    width: 60px;
    max-width: 90%;
    height: 60px;
    z-index: 2;
    visibility: visible;
    transition: all 0.5s;
}

footer .sociallinks .instagram-ico:hover, footer .sociallinks .facebook-ico:hover, footer .sociallinks .youtube-ico:hover, footer .sociallinks .tripadvisor-ico:hover {
    background-color: <?php echo $color_1; ?>;
}

footer #copy img {
    width: 160px
}

footer #copy p {
    font-size: 11px;
    line-height: 20px;
    color: <?php echo $color_2; ?>;
    font-weight: normal;
    margin-top: -12px;
    font-style: italic
}

footer #copy a, footer #copy a p {
     opacity: .3;
     transition: 300ms
}

footer #copy a:hover, footer #copy a:hover p  {
    opacity: 1
}

.desktop-hidden {
    display: none
}

.mobile-hidden {
    display: block
}

#slide .cover {
    height: 400px
}

#article-cont .line::after {
    content: '';
    height: 2px;
    width: 100px;
    position: absolute;
    left: 50px;
    top: 50%;
    background: <?php echo $color_1; ?>;
    transform: translateY(-50%);
}

#article-cont .line {
    position: relative;
    width: 200px;
    max-width: 100%;
    margin: 10px 0 0 0;
    height: 2px;
    margin-top: -30px;
    margin-bottom: 30px;
    text-align: left;
}

#article-cont .line::before {
    display: none;
}

#simpleshare .sharebtn {
    position: sticky;
    top: 80px;
    margin-top: 60px;
    margin-bottom: 30px;
}
#simpleshare a {
    display: block;
    width: 100%;
    text-align: center;
    opacity: 1;
    transition: all 400ms;
    margin-bottom: 30px;
    transform: scale(.9);
}

#simpleshare a:hover {
    transform: scale(1)
}

#simpleshare a img {
    display: inline-block;
    width: 30px;
}

#simpleshare a span {
    display: block;
    width: 100%;
    text-align: center;
    color: #8e8e8e;
    max-width: 70px;
    font-size: 10px;
    line-height: 15px;
    margin: 0 auto;
}

.sticky {
    position: sticky;
    top: 80px;
    margin-top: 60px;
    margin-bottom: 30px;
}

.sidie {
    margin: 20px;
}

.sidie .day {
    background: <?php echo $color_1; ?>;
    text-align: center;
    margin: 10px;
    padding: 10px;
    margin-left: 0;
}

.sidie .day p {
    font-size: 40px;
    font-family: 'Montserrat', sans-serif;
    font-weight: 900;
    margin: 20px;
    margin-top: 10px;
}

.sidie .day:hover {
    background: <?php echo $color_2; ?>;
    color: <?php echo $color_1; ?>;
}

.sidie .day:hover p {
    color: <?php echo $color_1; ?>;
}

.sidie .day span {
    text-transform: uppercase;
    letter-spacing: 2px;
    opacity: 0.6;
    display: inline-block;
    margin-bottom: 0;
}

.sidie h3 {
    font-size: 19px;
    line-height: 28px;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 0;
}

.sidie .onepack h3 {
    padding: 0 20px;
}

#sidebook {
    display: block;
    width: 320px;
    max-width: 100%;
}

#sidebook:active, #sidebook:focus {
    color: <?php echo $color_2; ?>
}

.sidie #todaybook {
    width: calc(100% - 10px);
    background: <?php echo $color_1; ?>;
    color: <?php echo $color_2; ?>;
    text-align: center;
    padding: 10px;
}

#sidebook #todaybook span {
        color: <?php echo $color_2; ?>;
}

#smallorder input, #smallorder textarea {
    border: none;
    background: <?php echo $color_3; ?>;
    padding: 12px;
    font-size: 14px;
    border-radius: 3px;
    color: <?php echo $color_2; ?>;
    width: calc(50% - 5px);
    margin-right: 5px;
    margin-top: 5px;
    float: left;
    outline: none
}

.form_error {
    background: #fddae3!important;
}

.popuphg {
    position:relative;
    cursor:pointer
}

#article-cont .popuphg::after {
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
    cursor:pointer;
    transition: all 300ms;
}

#article-cont .popuphg:hover::after {
    background: <?php echo $color_1; ?>;
    color: <?php echo $color_2; ?>;
}

#smallorder textarea {
    width: calc(100% - 5px);
    min-height: 150px;
    resize: vertical
}

#smallorder {
    width: 320px;
    max-width: 98%;
}

#smallorder #submitform {
    width: 100px;
    background: <?php echo $color_1; ?>;
    display: inline-block;
    margin: 15px auto;
    text-align: center;
    float: none;
    padding: 6px 18px;
    font-weight: 600;
    text-transform: uppercase;
    border-radius: 3px;
    transition: 400ms
}

#smallorder #submitform:hover {
    color: <?php echo $color_1; ?>;
    background: <?php echo $color_2; ?>;
}

#cat {
    position: absolute;
    right: 0;
    top: 0;
}

#cat span {
    background: <?php echo $color_2; ?>;
    color: <?php echo $color_background; ?>;
    padding: 0px 10px;
    margin: 10px;
    display: inline-block;
    border-radius: 3px;
    /* text-transform: uppercase; */
    font-size: 10px;
    letter-spacing: 1px;
    font-style: italic;
    font-weight: 600;
}

ul.lightgallery {
    margin-left: -2px!important;
    margin-right: -2px!important;
    list-style: none!important;
    padding: 0!important;
}

.lightgallery li {
    padding: 2px;
    position: relative;
    display: inline-block;
    cursor: pointer;
    width: 50%;
    float: left
}

.lightgallery li a {
    display: block;
    width: 100%;
    padding-bottom: 65%;
    background-size: cover;
    background-repeat: no-repeat;
    overflow: hidden;
    position: relative;
}

ul.lightgallery li::before {
    width: calc(100% - 4px);
    height: calc(100% - 4px);
    background: <?php echo $color_2; ?>;
    position: absolute;
    top: 2px;
    right: 2px;
    bottom: 2px;
    left: 2px;
    cursor: pointer;
    -webkit-transition: all .55s linear;
    -moz-transition: all .55s linear;
    transition: all .55s linear;
    opacity: 0;
    content: '';
    z-index: 2;
    transform: none
}

ul.lightgallery li::after {
    content: '';
    background: url('/template/<?php echo $theme; ?>/images/s.svg') 50% 50%;
    background-repeat: no-repeat;
    width: 30px;
    height: 30px;
    background-size: 10px;
    top: 50%;
    left: 50%;
    position: absolute;
    font-size: 0;
    z-index: 3;
    -webkit-transform: translateX(-50%) translateY(-50%);
    -ms-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%);
    -webkit-transition: .4s all ease;
    transition: .4s all ease;
    opacity: 0;
}

.lightgallery li a img {
    display: none;
}

ul.lightgallery li:hover::before {
    opacity: .7;
}

.lg-sub-html h4 {
    margin: 0;
    font-size: 16px;
    font-weight: bold;
    color: <?php echo $color_background; ?>;
    letter-spacing: 0;
    font-family: 'Roboto' , sans-serif;
}

ul.lightgallery li:hover::after {
    opacity: .8;
    background-size: 25px;
}

#all-offers-list .item {
    margin: 15px;
}



/*

























*/

@media only screen and (max-width: 1100px) {

.col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
        width: 100%;
        text-align: center
    }

    #logo img {
    width: 180px;
    transition: 800ms;
}

header::before {
    opacity:1
}

#main-menu {
    display: block;
    position: absolute;
    right: 0;
    left: 0;
    list-style: none;
    width: 100vw;
    margin: 0 auto;
    margin-right: -300%;
    padding: 0;
    padding-top: 80px;
    height: 300vh;
    background: <?php echo $color_1; ?>;
}
#main-menu li {
    display: block;
    width: 100%;
}

.desktop-hidden {
    display: block
}

.mobile-hidden {
    display: none
}

.menu-opener {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background: transparent;
    height: 51px;
    width: 51px;
}
#mobile-icons {
    position: absolute;
    top: 0;
    right: 0;
    width: 80px;
    height: 80px;
    z-index: 33;
}

#headcont {
    display: none;
}


#nav-icon {
  width: 35px;
  height: 35px;
  position: relative;
  margin: 12px auto;
  -webkit-transform: rotate(0deg);
  -moz-transform: rotate(0deg);
  -o-transform: rotate(0deg);
  transform: rotate(0deg);
  -webkit-transition: 400ms ease-in-out;
  -moz-transition: 400ms ease-in-out;
  -o-transition: 400ms ease-in-out;
  transition: 400ms ease-in-out;
  cursor: pointer;
  z-index: 99999
}

#nav-icon span {
  display: block;
  position: absolute;
  height: 4px;
  width: 100%;
  background: <?php echo $color_1; ?>;
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
  top: 0px;
}

#nav-icon span:nth-child(2) {
  top: 10px;
}

#nav-icon span:nth-child(3) {
  top: 20px;
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

#lang {
    position: absolute;
    top: 50%;
    right: 55px;
    text-transform: uppercase;
    transform: translateY(-50%);
}

#nav-icon.open span {
    background: <?php echo $color_2; ?>;
}

.sear {
    right: 120px;
}

#lang a span {
    opacity: 1
}

.hero-heading span {
    font-size: 40px;
    line-height: 48px;
}


header #main-menu .item, header .ww #main-menu li a {
    padding: 15px 13px 15px;
    font-size: 16px;
    line-height: 25px;
    display: block;
    text-align: center;
    color: <?php echo $color_2; ?>;
}

#mainhead.ww #main-menu {
    top: 49px;
}

#mainhead.ww #mobile-icons {
    height: 50px;
}


#mainhead.ww #nav-icon {
    width: 30px;
    height: 30px;
    position: relative;
    margin: 14px auto;
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
    -webkit-transition: 1s ease-in-out;
    -moz-transition: 1s ease-in-out;
    -o-transition: 1s ease-in-out;
    transition: 1s ease-in-out;
    cursor: pointer;
    z-index: 99999;
}

#bookban .col-md-4 {
    width: 33.33333%;
}

#slide-h {
    width: 100%;
}

#wea {
    display: none;
}

.<?php echo $color_background; ?>bg {
    background: <?php echo $color_background; ?>;
    padding: 30px 5%;
    max-width: 90%;
}

h1 {
    font-size: 40px;
    line-height: 47px;
    letter-spacing: 2px;
}

.oneico {
    width: 33.333%;
    text-align: center;
}

.oneico.mobhalf {
    width: 50%
}

.afterhead {
    margin-top: -30px;
    margin-bottom: 60px;
    font-size: 18px!important;
    max-width: 90%;
    margin-left: 5%;
}

#novinky .fbpost {
    margin: 5px 15px;
    margin-bottom: 44px;
}

footer, footer .text-left, footer .text-left h3, footer .text-right, footer .text-right h3 {
    text-align: center!important
}

#inline ul {
    margin-top: 30px;
}
#inline {
    padding: 20px
}

#todaybook {
    cursor: pointer;
    font-size: 10px;
    line-height: 13px;
    margin-top: 8px;
    padding: 10px 20px;
}

#slide-h span {
    font-size: 40px;
    line-height: 50px;
}

#cookies_text, #cookies_content a {
    display: inline;
    padding: 3px;
}

#cookies_accept {
    display: block;
    margin: 15px auto;
    text-decoration: none;
    padding: 3px 12px;
    transition: 400ms;
    cursor: pointer;
    width: 80px;
}

ul.lightgallery {
    margin-left: 10px!important;
    margin-right: 10px!important;
    list-style: none!important;
    padding: 0!important;
}

p {
    font-size: 16px;
    line-height: 25px;
}

#slide .cover h1 {
    font-size: 40px;
    line-height: 48px;
    padding-left: 15px
}

#article-cont {
    padding-bottom: 100px;
    padding: 15px;
    text-align: left
}


#article-cont h2,
#article-cont h3,
#article-cont h4,
#article-cont ul li {
    text-align: left
}

#sidegall {
    position: relative;
    margin: 20px;
    margin-left: 0;
    margin-right: 20px;
    margin-left: 20px;
}

h3 {
    font-size: 30px;
    line-height: 42px;
    font-weight: 600;
    margin-top: 48px;
}

#map-holder .direction {
    max-width: 95%;
}

#bookban .date .popis {
    text-transform: uppercase;
    font-size: 11px;
}

#todaybook span {
    font-size: 30px;
    line-height: 40px;
}

#copy {
    padding: 0 10%;
}

section {
    padding-left: 15px!important;
    padding-right: 15px!important;
}

section#slider {
      padding-left: 0px!important;
    padding-right: 0px!important;
}

#bookpanel {
    position: absolute;
    bottom: 60px;
}

.swiper-pagination {
    bottom: 10px;
    left: 0;
    width: 100%;
}

#newsletter::before {
    opacity: .04;
}

footer, footer ul, footer h3 {
    text-align: center!important
}

header {
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 80px;
}

#leftlogo {
    text-align: left;
    position: absolute;
    left: 15px;
    top: 0;
    height: 80px;
    width: 70%;
}

#leftlogo img {
    width: 200px;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}

#leftlogo a {
    position: initial;
    display: block;
}

.popuptext {
    padding: 10px 15px;
}

.popuptext p {
    font-size: 14px;
    line-height: 24px;
    padding: 0 5px;
}

section#slide {
    padding-left: 0px!important;
    padding-right: 0px!important;
}

#simpleshare a {
    width: 33.3333%;
    float: left;
}

#simpleshare .sharebtn {
    position: relative;
    top: 5px;
    margin-top: 30px;
    margin-bottom: 25px;
}

#article-cont .line {
    position: relative;
    width: 200px;
    max-width: 100%;
    margin: 10px auto 0 auto;
    height: 2px;
    margin-top: -30px;
    margin-bottom: 30px;
    text-align: center;
}

#sidebook .col-md-6 {
    width: 50%;
    float: left;
}

#article-cont .line::after {
    display: none
}

#article-cont a.onleft {
    float: none;
}

.sidie #todaybook {
    padding: 20px;
}

}
