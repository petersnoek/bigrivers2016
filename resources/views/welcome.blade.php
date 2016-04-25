@extends('_layout_frontend')

@section('title')
    Home
@stop

@section('modals')

@stop

@section('content')
    <div class="first-page">
        <div class="header">
            <image src="/pictures_layout/promo_group_back.png" class="img_header"></image>
            <div class="date_div">
                <p>1 Mei 2016</p>
                <p>Zondag 10:00 uur</p>
                <hr>
            </div>
            <div class="triangle_div">
                <p>Gratis</p>
                <p>Toegang</p>
            </div>
            <div class="place_div">
                <p>Slikveld 1</p>
                <p>Dordrecht, Nederland</p>
                <hr>
            </div>
            <div class="content">
                <h1 class="title">Big Rivers</h1>
                <span class="border">Het leukste festival van Dordrecht</span>
            </div>
            <div class="footer">
                <a href="https://www.facebook.com/events/1473066383005869/"><i class="facebook sm"></i></a>
                <a href="https://twitter.com/BigRivers16"><i class="twitter sm"></i></a>
                <a href="https://www.youtube.com/watch?v=ac7E-zDXrjQ&list=PLTa_arvy-Vo6KjmTM4UTim-wWDmdsD4LL" target="_blank"><i class="youtube sm"></i></a>
                <a href="https://www.instagram.com/bigrivers16/"><i class="instagram sm"></i></a>
            </div>
        </div>
    </div>
    <img src="/pictures_layout/border_01.png" alt="" class="gradient">
    <div class="second-page">
        <div class="header">
            <h1>Big rivers festival Dordrecht</h1>
        </div>
        <div class="content">
            <img src="/pictures_layout/Big_Rivers_Vrijdag.jpg" alt="" class="text-helper">
            <p>
                Lorem Ipsum (afgekort: lipsum) is de benaming van een tekst die vaak door drukkers, zetters, grafisch ontwerpers en dergelijke gebruikt wordt om te kijken hoe een tekst of lettertype eruit ziet, bijvoorbeeld in letterproeven, op een webpagina of op een kaft van een boek. De standaardversie van het Lorem Ipsum stamt uit circa 1500 en begint als volgt:

                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <p>
                Op deze tekst bestaan echter talloze varianten, die alleen de eerste zinsnede (Lorem ipsum dolor sit amet, consectetur adipisicing elit) steeds gemeen hebben. Zo is bijvoorbeeld ook de volgende tekst in omloop:

                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus libero leo, pellentesque ornare, adipiscing vitae, rhoncus commodo, nulla. Fusce quis ipsum. Nulla neque massa, feugiat sed, commodo in, adipiscing ut, est. In fermentum mattis ligula. Nulla ipsum. Vestibulum condimentum condimentum augue. Nunc purus risus, volutpat sagittis, lobortis at, dignissim sed, sapien. Fusce porttitor iaculis ante. Curabitur eu arcu. Morbi quam purus, tempor eget, ullamcorper feugiat, commodo ullamcorper, neque.
            </p>
        </div>
    </div>
    <img src="/pictures_layout/border_01.png" alt="" class="gradient" style="transform: scaleY(-1);">
    <div class="third-page">
        <iframe width="100%" height="512" src="https://www.youtube.com/embed/6BXMepvdwb4" frameborder="0" allowfullscreen></iframe>
    </div>

    <img src="/pictures_layout/border_01.png" alt="" class="gradient" style="transform: scaleX(-1);">
    <div class="fourth-page">
        <div class="header">
            <h1>Programma</h1>
            <p>
                <ul>
                    <li id="click_don" onclick="program_select('don')">Donderdag</li>
                    <li id="click_vri" onclick="program_select('vri')">Vrijdag</li>
                    <li id="click_zat" onclick="program_select('zat')">Zaterdag</li>
                    <li id="click_zon" onclick="program_select('zon')">Zondag</li>
                </ul>
            </p>
        </div>
        <div class="content">
            <div id="day-don">
                <p><span class="time">11:00</span> KISS</p>
            </div>
            <div id="day-vri" style="display: none">
                <p><span class="time">12:00</span> KISS2</p>
            </div>
            <div id="day-zat" style="display: none">
                <p><span class="time">13:00</span> KISS3</p>
            </div>
            <div id="day-zon" style="display: none">
                <p><span class="time">14:00</span> KISS4</p>
            </div>

            {{--@foreach($program_items as $program_item)--}}

            {{--@endforeach--}}
        </div>
    </div>
    <img src="/pictures_layout/border_01.png" alt="" class="gradient" style="transform: scaleY(-1);">

    <img src="/pictures_layout/border_01.png" alt="" class="gradient" style="transform: scaleX(-1);">
    <div class="fifth-page">
        <div class="header">
            <h1>Artiesten</h1>
        </div>
        <div class="content">
            <a href=""><img src="/pictures_layout/Big_Rivers_Vrijdag.jpg" alt="Foto niet beschikbaar" class="img-show"></a>
            <a href=""><img src="/pictures_layout/Big_Rivers_Vrijdag.jpg" alt="Foto niet beschikbaar" class="img-show"></a>
            <a href=""><img src="/pictures_layout/Big_Rivers_Vrijdag.jpg" alt="Foto niet beschikbaar" class="img-show"></a>
            <a href=""><img src="/pictures_layout/Big_Rivers_Vrijdag.jpg" alt="Foto niet beschikbaar" class="img-show"></a>
            <a href=""><img src="/pictures_layout/Big_Rivers_Vrijdag.jpg" alt="Foto niet beschikbaar" class="img-show"></a>
            <a href=""><img src="/pictures_layout/Big_Rivers_Vrijdag.jpg" alt="Foto niet beschikbaar" class="img-show"></a>
            <a href=""><img src="/pictures_layout/Big_Rivers_Vrijdag.jpg" alt="Foto niet beschikbaar" class="img-show"></a>
            <a href=""><img src="/pictures_layout/Big_Rivers_Vrijdag.jpg" alt="Foto niet beschikbaar" class="img-show"></a>
            <a href=""><img src="/pictures_layout/Big_Rivers_Vrijdag.jpg" alt="Foto niet beschikbaar" class="img-show"></a>
        </div>
    </div>
    <img src="/pictures_layout/border_01.png" alt="" class="gradient" style="transform: scaleY(-1) scaleX(-1);">

    <img src="/pictures_layout/border_01.png" alt="" class="gradient" style="transform: scaleX(1);">
    <div class="sixth-page">
        <div class="header">
            <h1>Koop donderdag tickets</h1>
        </div>
        <div class="content">

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum hic sed voluptas! Asperiores consectetur cum eveniet excepturi expedita fugiat fugit ipsa ipsam libero magni nam numquam quos recusandae, repellat sunt?</p>

            <div class="block block1">
                <p class="title">jdfgjhjnkdlof tester</p>
                <p class="price">&euro; 25,00</p>
                <button>koop nu</button>
            </div>
            <div class="block block2">
                <p class="title">lorem iposding</p>
                <p class="price">&euro; 100,00</p>
                <button>koop nu</button>
            </div>
        </div>
    </div>
    <img src="/pictures_layout/border_01.png" alt="" class="gradient" style="transform: scaleY(-1) scaleX(-1);">

    <img src="/pictures_layout/border_01.png" alt="" class="gradient" style="transform: scaleX(1);">
    <div class="seventh-page">
        <div class="header">
            <h1>Sponsoren</h1>
        </div>
        <div class="content">
            <a href=""><img src="/pictures_layout/Big_Rivers_Vrijdag.jpg" alt="Foto niet beschikbaar" class="img-show"></a>
            <a href=""><img src="/pictures_layout/Big_Rivers_Vrijdag.jpg" alt="Foto niet beschikbaar" class="img-show"></a>
            <a href=""><img src="/pictures_layout/Big_Rivers_Vrijdag.jpg" alt="Foto niet beschikbaar" class="img-show"></a>
            <a href=""><img src="/pictures_layout/Big_Rivers_Vrijdag.jpg" alt="Foto niet beschikbaar" class="img-show"></a>
            <a href=""><img src="/pictures_layout/Big_Rivers_Vrijdag.jpg" alt="Foto niet beschikbaar" class="img-show"></a>
            <a href=""><img src="/pictures_layout/Big_Rivers_Vrijdag.jpg" alt="Foto niet beschikbaar" class="img-show"></a>
            <div class="buttonholder">
                <button>Word ook sponsor</button>
            </div>
        </div>
    </div>
    <img src="/pictures_layout/border_01.png" alt="" class="gradient" style="transform: scaleY(-1) scaleX(-1);">

    <img src="/pictures_layout/border_01.png" alt="" class="gradient" style="transform: scaleX(1);">
    <div class="ninth-page">
        <div class="header">
            <h1>Contact</h1>
        </div>
        <div class="content">
            <div class="scrolllock"></div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2466.6418625142637!2d4.658928817818171!3d51.8127042668729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c42ed1def4415f%3A0xf12d657582b4d26!2sSlikveld+1%2C+3311+VT+Dordrecht!5e0!3m2!1snl!2snl!4v1458039373983" width="100%" height="450" frameborder="0" style="border:0; margin-left: auto; margin-right: auto; display: block;" allowfullscreen></iframe>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        function program_select(day) {
            $("li[id^='click_']").css({
                'border': 'solid white 0px',
                'border-bottom-style': 'none',
            });
            $('#click_'+day).css({
                'border': 'solid white 5px',
                'border-bottom-style': 'none',
            });
            $("div[id^='day-']").css({
                'display': 'none',
            });
            $('#day-'+ day).css({
                'display': 'block',
            });
        }
    </script>
@endsection
