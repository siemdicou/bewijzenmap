<?php
    date_default_timezone_set('Europe/Amsterdam');

    //$_GET['user'] = 'Herman';    // debug
    //$_GET['school'] = 'Horizon';
    //$_GET['talent'] = array('beeldtalent', 'rekentalent', 'menstalent');
    //$_GET['mindmap'] = '1161b6ab17100ac895dfacd4b3cc7171';   // user access token
    //$_GET['skill'] = array('dansen', 'praaaaten', 'leveeen', 'vliegeeen', 'lopen');

    if(!isset($_GET['user'])   ||
       !isset($_GET['school']) ||
	   !isset($_GET['talent']) ||
	   !isset($_GET['skill']) ||
       !isset($_GET['mindmap']))
    {
        die('invalid data');
    }

    $user = $_GET['user'];
    $school = $_GET['school'];
    $talent = $_GET['talent'];
    $skills = $_GET['skill'];
    $date = date('d-m-y');
    $mindmap = $_GET['mindmap'];

    $skills = array_slice($skills, 0, 3);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Certificaat</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">

@font-face {
    font-family: 'blackjackregular';
    src: url('fonts/black_jack-webfont.eot');
    src: url('fonts/black_jack-webfont.eot?#iefix') format('embedded-opentype'),
    url('fonts/black_jack-webfont.woff2') format('woff2'),
    url('fonts/black_jack-webfont.woff') format('woff'),
    url('fonts/black_jack-webfont.ttf') format('truetype'),
    url('fonts/black_jack-webfont.svg#blackjackregular') format('svg');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'desyrelregular';
    src: url('fonts/desyrel_-webfont.eot');
    src: url('fonts/desyrel_-webfont.eot?#iefix') format('embedded-opentype'),
    url('fonts/desyrel_-webfont.woff2') format('woff2'),
    url('fonts/desyrel_-webfont.woff') format('woff'),
    url('fonts/desyrel_-webfont.ttf') format('truetype'),
    url('fonts/desyrel_-webfont.svg#desyrelregular') format('svg');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'fontinbold';
    src: url('fonts/fontin-bold-webfont.eot');
    src: url('fonts/fontin-bold-webfont.eot?#iefix') format('embedded-opentype'),
    url('fonts/fontin-bold-webfont.woff2') format('woff2'),
    url('fonts/fontin-bold-webfont.woff') format('woff'),
    url('fonts/fontin-bold-webfont.ttf') format('truetype'),
    url('fonts/fontin-bold-webfont.svg#fontinbold') format('svg');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'estrangelo_edessaregular';
    src: url('fonts/estre-webfont.eot');
    src: url('fonts/estre-webfont.eot?#iefix') format('embedded-opentype'),
    url('fonts/estre-webfont.woff2') format('woff2'),
    url('fonts/estre-webfont.woff') format('woff'),
    url('fonts/estre-webfont.ttf') format('truetype'),
    url('fonts/estre-webfont.svg#estrangelo_edessaregular') format('svg');
    font-weight: normal;
    font-style: normal;

}

body, html {
    background-color: #FFF2DC;
    margin: 0;
    padding: 0;
    height: 100%;
    -webkit-print-color-adjust: exact;
}

#wrap {
    border: 30px solid #D2C8B2;
    min-height: 100%;
    min-height: calc(100% - 60px);
    min-height: -webkit-calc(100% - 60px);
}

table {
    width: 100%;
}

table td {
    vertical-align: top;
    box-sizing: border-box;
}

#heading, #stars, #participation {
    text-align: center;
}

#heading td {
    padding: 30px 0;
}

#name {
    font-family: 'fontinbold';
    font-size: 20px;
    color: #767A7D;
    text-transform: uppercase;
}

#name_middle {
    text-align: center;
    vertical-align: middle;
}

#name_middle span {
    transform: scaleY(1.8);
    display: block;
}

#name_decoration_right {
    text-align: right;
}

#stars td {
    padding: 16px 0 0 0;
}

#participation {
    font-family: 'estrangelo_edessaregular';
    font-size: 21px;
    color: #B7A58D;
    line-height: 36px;
}

#participation span {
    display: inline-block;
    transform: scaleY(1.7);
}

#talents td {
    padding: 0 25px;
}

#talents_container {
    background: url(images/talents_left.png) top left no-repeat, url(images/talents_right.png) top right no-repeat;
}

#talents_container h2 {
    font-family: 'blackjackregular';
    font-weight: normal;
    font-size: 17px;
    margin: 20px 10px 10px 56px;
    color: #767A7D;
    display: inline-block;
    transform: scale(1.1, 1.7);
    letter-spacing: 1.4px;
}

#talents_container_wrap {
    list-style: none;
    margin: 0;
    padding: 0 56px;
    display: table;
    width: 100%;
    box-sizing: border-box;
}

#talents_container_wrap li {
    display: table-cell;
    width: 40%;
    position: relative;
}

#talents_container_wrap li:not(:last-of-type):after {
    background: url(images/talent_separator.png) no-repeat;
    width: 10px;
    height: 101px;
    content: '';
    display: block;
    top: 0;
    right: 40px;
    position: absolute;
}

#talents_container_wrap li h3 {
    color: #E0CBA6;
    font-family: 'desyrelregular';
    font-weight: normal;
    font-size: 18px;
    margin: 4px 0 0 -10px;
    transform: scaleY(1.2);
}

#talents_container img {
    height: 101px;
    width: auto;
}

#skills td {
    padding: 0 25px 5px 25px;
}

#skills_container {
    background: url(images/skills_left.png) bottom left no-repeat, url(images/skills_right.png) bottom right no-repeat;
    padding-bottom: 30px;
}

#skills_container h2 {
    font-family: 'blackjackregular';
    font-weight: normal;
    font-size: 17px;
    margin: 20px 10px 10px 56px;
    color: #767A7D;
    display: inline-block;
    transform: scaleY(1.7);
}

#skills_container_wrap {
    list-style: none;
    margin: 0;
    padding: 0 56px;
    display: table;
    width: 100%;
    box-sizing: border-box;
}

#skills_container_wrap li {
    display: table-cell;
    width: 40%;
    position: relative;
}

#skills_container_wrap li:not(:last-of-type):after {
    background: url(images/skills_separator.png) no-repeat;
    width: 10px;
    height: 101px;
    content: '';
    display: block;
    top: 0;
    right: 40px;
    position: absolute;
}

#skills_container_wrap li h3 {
    color: #E0CBA6;
    font-family: 'desyrelregular';
    font-weight: normal;
    font-size: 18px;
    margin: 4px 0 0 -10px;
    transform: scaleY(1.2);
}

#print {
    display: none;
}

@page {
    margin: 0;
}

@media screen {

    #wrap {
        width: 820px;
        margin: 20px auto;
        position: relative;
    }

    #print {
        background-color: rgba(255, 233, 194, 0.8);
        width: 100%;
        height: 100%;
        display: block;
        position: fixed;
        text-align: center;
        z-index: 400;
        top: 0;
        left: 0;
        line-height: 820px;
    }

    #print h2 {
        font-family: 'fontinbold';
        font-size: 20px;
        color: #767A7D;
        text-transform: uppercase;
        transform: scaleY(1.8);
        display: block;
    }

    #print a {
        color: inherit;
        text-decoration: none;
    }

    #print a:hover {
        text-decoration: underline;
    }

}

</style>
</head>
<body>
<div id="print">
    <h2>
        <a href="javascript:void(0);">Print/save certificaat</a>
    </h2>
</div>
<div id="wrap">
    <table>
        <tr id="heading">
            <td colspan="3">
                <img src="images/heading.png" alt="Certificaat" />
            </td>
        </tr>
        <tr id="name">
            <td>
                <img src="images/name_decoration_left.png" alt="" />
            </td>
            <td id="name_middle">
                <span><?php print $user; ?></span>
            </td>
            <td id="name_decoration_right">
                <img src="images/name_decoration_right.png" alt="" />
            </td>
        </tr>
        <tr id="stars">
            <td colspan="3">
                <img src="images/stars.png" alt="Stars" />
            </td>
        </tr>
        <tr id="participation">
            <td colspan="3">
                <p>
                    <span>heeft met goed gevolg deelgenomen aan Project Paspoort</span>
                    <br />
                    <span>en heeft gegeven te beschikken over inzicht in eigen</span>
                    <br />
                    <span>talenten en vaardigheden.</span>
                </p>
            </td>
        </tr>
        <tr id="talents">
            <td colspan="3">
                <div id="talents_container">
                    <h2>top 3 talenten:</h2>
                    <ul id="talents_container_wrap">
                        <?php
                        foreach($talent as $item) {
                            print '<li class="talent">
								<img src="img/'.$item.'.png" alt="'.$item.'" />
								<h3>'.$item.'</h3>
							</li>';
                        }
                        ?>
                    </ul>
                </div>
            </td>
        </tr>
        <tr id="skills">
            <td colspan="3">
                <div id="skills_container">
                    <h2>top 3 vaardigheden:</h2>
                    <ul id="skills_container_wrap">
                        <?php
                        foreach($skills as $item) {
                            $item2 = str_replace(" ", "_", strtolower($item));
                            print '<li class="skill">
                                    <img src="img/'.$item2.'.png" alt="'.$item.'" />
                                    <h3>'.$item2.'</h3>
                                </li>';
                        }
                        ?>
                    </ul>
                </div>
            </td>
        </tr>
    </table>
</div>
<script rel="script" type="text/javascript" defer>
    window.onload = function() {

        var print = document.getElementById("print").getElementsByTagName("a")[0];

        print.onclick = function(e) {

            (e || window.event).preventDefault();

            window.print();

        };

        window.print();

    };
</script>
</body>
</html>