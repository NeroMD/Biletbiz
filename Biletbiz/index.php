<?php
include_once './headerindex.php'
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bilet Biz</title>
<link rel="stylesheet" href="css/index.css">

    <script defer src="http://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>
<style>
  
    div.partpage {
        overflow: hidden;
        width: 100%;

    }

    div.sol {
        width: 50%;
        float: left;
        margin-left: 59px;
        margin-top: 50px;
    }

    div.sol1 {
        width: 50%;
        float: left;
        margin-left: 25px;
        margin-top: 5px;
    }

    div.sag {
        margin-top: 50px;
        float: left;
        width: 580px;
        padding: 10px;
    }

    div.sag1 {
        margin-top: 650px;
        margin-left: 980px;
        width: 500px;
        padding: 10px;
    }

    div.sag2 {
        margin-top: 380px;
        margin-left: 980px;
        width: 500px;
        padding: 10px;
    }
    .footer {
        background: #634a4a;
        margin-top: 0px;
        height: 200px;
    }

    .footertext {
        font-size: 20px;
        text-align: center;
        line-height: 180px;
    }
    .calenderlist {
        width: 500px;
        margin: 0 auto;
    }

    .calenderlist ul {
        list-style: none;
        font-size: 15px;
        font-family: cursive;
        padding: 0;
        margin-bottom: 4em;
        text-align: center;

    }

    .calenderlist .calender {
        position: relative;
        padding: 15px 20px;
        background-color: #702929c0;
        text-decoration: none;
        cursor: pointer;
        transition: 0.5s;
        color: white;
        width: 520px;
    }

    .calenderlist .calender:hover {
        text-decoration: none;
        letter-spacing: 3px;
        background-color: #702929c0;
    }

</style>
<body>
<div class="container" style="background-image: url(foto/back.jpg);height: 48cm">

    <!--partofpage-->
    <div class="partpage">
        <!--slider-->
        <div class="sol">
            <div class="slider">
                <div class="slides">
                    <input type="radio" name="radio-btn" id="radio1">
                        <input type="radio" name="radio-btn" id="radio2">
                            <input type="radio" name="radio-btn" id="radio3">
                                <input type="radio" name="radio-btn" id="radio4">
                                    <div class="slide first">
                                        <img src="foto/Haber1.jpg" alt="">
                                    </div>
                                    <div class="slide">
                                        <img src="foto/Haber2.jpg" alt="">
                                    </div>
                                    <div class="slide">
                                        <img src="foto/Haber3.jpg" alt="">
                                    </div>
                                    <div class="slide">
                                        <img src="foto/Haber4.jpg" alt="">
                                    </div>
                                    <div class="navigation-auto">
                                        <div class="auto-btn1"></div>
                                        <div class="auto-btn2"></div>
                                        <div class="auto-btn3"></div>
                                        <div class="auto-btn4"></div>
                                    </div>
                                    </div>
                                    <div class="navigation-manual">
                                        <label for="radio1" class="manual-btn"></label>
                                        <label for="radio2" class="manual-btn"></label>
                                        <label for="radio3" class="manual-btn"></label>
                                        <label for="radio4" class="manual-btn"></label>
                                    </div>
                                    </div>
                                    </div>

                                    <!--concert-->
                                    <div class="sag">
                                        <h1>Concert</h1>
                                        <div class="gallery">
                                            <img src="foto/ZeynepBastık.jpg" alt="Cinema" style="width: 150px; height: 100px;">
                                                </a>
                                                <button class="btn success">Zeynep1 Bastık</button>
                                        </div>
                                        <div class="gallery">
                                            <img src="foto/OğuzhanKoç.jpg" alt="Cinema" style="width: 150px; height: 100px;">
                                                </a>
                                                <button class="btn success">Oğuzhan Koç</button>
                                        </div>
                                        <div class="gallery">
                                            <img src="foto/YıldızTilbe.jpg" alt="Cinema" style="width: 150px; height: 100px;">
                                                </a>
                                                <button class="btn success">Yıldız Tilbe</button>
                                        </div>
                                        <div class="gallery">
                                            <img src="foto/LeventYüksel.jpg" alt="Cinema" style="width: 150px; height: 100px;">
                                                </a>
                                                <button class="btn success">LeventYüksel</button>
                                        </div>
                                        <div class="gallery">
                                            <img src="foto/Sıla.jpg" alt="Cinema" style="width: 150px; height: 100px;">
                                                </a>
                                                <button class="btn success">Sıla</button>
                                        </div>
                                        <div class="gallery">
                                            <img src="foto/SertabErener.jpg" alt="Cinema" style="width: 150px; height: 100px;">
                                                </a>
                                                <button class="btn success">Sertab Erener</button>
                                        </div>
                                        <div class="gallery">
                                            <img src="foto/KenanDoğulu.jpg" alt="Cinema" style="width: 150px; height: 100px;">
                                                </a>
                                                <button class="btn success">Kenan Doğulu</button>
                                        </div>
                                        <div class="gallery">
                                            <img src="foto/MabelMatiz.jpg" alt="Mabel Matiz" style="width: 150px; height: 100px;">
                                                </a>
                                                <button class="btn success">Mabel Matiz</button>
                                        </div>
                                    </div>
                                    <!--list-->
                                    <div class="sol1">
                                        <div class="calenderlist">
                                            <h1>Calender</h1>
                                            <ul>
                                                <li><a href="" class="calender" >Sıla Konseri<br>15.01.2022 - 20:30
                                                        <br>Bostanlı Suat Taşer
                                                        Tiyatrosu(İzmir)</a></li><br>
                                                <li><a href="#" class="calender">Bkm ÇGHB<br>17.01.2022 - 21:30
                                                        <br>Beşiktaş Kültür
                                                        Merkezi(İstanbul)</a>
                                                </li><br>
                                                <li><a href="#" class="calender ">TolgShow<br>20.01.2022 - 21:00
                                                        <br>Erciyes Kültür
                                                        Merkezi(Kayseri)</a></li>
                                                <br>
                                                <li><a href="#" class="calender ">Mabel Matiz Konseri<br>20.01.2022 -
                                                        22:30<br>Torium
                                                        Sahne(İstanbul)</a>
                                                </li><br>
                                                <li><a href="#" class="calender">Yasemin Sakallıoğlu
                                                        Stand-Up<br>22.01.2022 - 20:00
                                                        <br>Bostancı Gösteri Merkezi(İstanbul)</a></li><br>
                                                <li><a href="#" class="calender" >Güldür Güldür<br>23.01.2022 - 20:30
                                                        <br>Beşiktaş Kültür
                                                        Merkezi(İstanbul)</a></li><br>
                                                <li><a href="#" class="calender">Ölün Bizi Ayırana Dek<br>26.01.2022
                                                        -
                                                        20:00 <br>Muhsin
                                                        Yazıcıoğlu Kültür
                                                        Merkezi(Sivas)</a></li><br>
                                                <li><a href="#" class="calender">İki Bekar<br>26.01.2022 - 20:30
                                                        <br>Gebze Osman Hamdi Bey
                                                        Kültür
                                                        Merkezi(Kocaeli)</a></li><br>
                                                <li><a href="#" class="calender">Buray Konseri<br>29.01.2022 - 21:00
                                                        <br>Yenimahalle Bld.4
                                                        Mevsim Tiyatro
                                                        Salonu(Ankara)</a></li><br>
                                            </ul>
                                        </div>
                                    </div>

                                    <!---cinema-->
                                    <div class="sag1" >
                                        <h1>Cinema</h1>
                                        <div class="gallery">
                                            <img src="foto/uyumusz.jpg" alt="Uyumsuz" style="width: 100px; height: 100px;">
                                                </a>
                                                <button class="btn success">Uyumsuz</button>
                                        </div>
                                        <div class="gallery">
                                            <img src="foto/harrypotter.jpg" alt="Harry Potter" style="width: 100px; height: 100px;">
                                                </a>
                                                <button class="btn success">Harry Potter</button>
                                        </div>
                                        <div class="gallery">
                                            <img src="foto/joker.jpg" alt="Joker" style="width: 100px; height: 100px;">
                                                </a>
                                                <button class="btn success">Joker</button>
                                        </div>
                                        <div class="gallery">
                                            <img src="foto/labirent.jpg" alt="Labirent" style="width: 100px; height: 100px;">
                                                </a>
                                                <button class="btn success">Labirent</button>
                                        </div>
                                        <div class="gallery">
                                            <img src="foto/amelie.jpg" alt="Amelie" style="width: 90px; height: 100px;">
                                                </a>
                                                <button class="btn success">Amelie</button>
                                        </div>
                                        <div class="gallery">
                                            <img src="foto/marvel.jpg" alt="Marvel" style="width: 90px; height: 100px;">
                                                </a>
                                                <button class="btn success">Marvel</button>
                                        </div>
                                    </div>

                                    <!---theatre-->
                                    <div class="sag2">
                                        <h1>Theatre</h1>
                                        <div class="gallery">
                                            <img src="foto/theatre1.jpg" alt="Zengin Mutfagi" style="width: 90px; height: 100px;">
                                                </a>
                                                <button class="btn success">Zengin Mutfağı</button>
                                        </div>
                                        <div class="gallery">
                                            <img src="foto/theatre2.jpg" alt="Olun Bizi Ayirana Dek" style="width: 90px; height: 100px;">
                                                </a>
                                                <button class="btn success">Ölün Bizi Ayırana Denk</button>
                                        </div>
                                        <div class="gallery">
                                            <img src="foto/theatre3.jpg" alt="Iki Bekar" style="width: 90px; height: 100px;">
                                                </a>
                                                <button class="btn success">İki Bekar</button>
                                        </div>
                                        <div class="gallery">
                                            <img src="foto/theatre4.jpg" alt="7KocaliHurmuz" style="width: 100px; height: 100px;">
                                                </a>
                                                <button class="btn success">7 Kocalı Hürmüz</button>
                                        </div>
                                    </div>
                                    </div>
                                    </div>

                                    <div class="footer">
                                        <p class="footertext" style="color: black;">Copyright &copy; BiletBiz 2021</p>
                                        <?php
                                        include_once 'footer.php'
                                        ?>
                                    </div>