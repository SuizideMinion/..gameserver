@extends('ingame')

@section('styles')
    <style>
        * {
            box-sizing: border-box;
        }

        @media screen and (orientation: portrait) {

            body {
                -ms-transform: rotate(-90deg); /* IE 9 */
                -webkit-transform: rotate(-90deg); /* Chrome, Safari, Opera */
                transform: rotate(-90deg);
                overflow: scroll;
            }
        }

        .scene {
            /*border: 1px solid #CCC;*/
            position: relative;
            width: 560px;
            height: 540px;
            margin: 80px auto;
            perspective: 1000px;
            /*padding-left: 40px;*/
            top: 100px;
        }

        @media only screen and (max-height: 600px) {
            .scene {
                /*border: 1px solid #CCC;*/
                position: relative;
                width: 560px;
                height: 100vh;
                margin: 0px auto;
                perspective: 1000px;
                top: 0px;
            }
        }

        .carousel {
            width: 100%;
            height: 100%;
            position: absolute;
            transform: translateZ(-288px);
            transform-style: preserve-3d;
            transition: transform 1s;
        }

        .carousel__cell {
            position: absolute;
            width: 540px;
            height: 520px;
            left: 10px;
            top: 10px;
            line-height: 36px;
            font-size: 30px;
            font-weight: bold;
            color: white;
            text-align: center;
            transition: transform 1s, opacity 1s;
            overflow: hidden;
            transform: rotateY(0deg) translateZ(1031px);
            border-color: white;
            border-style: ridge;
            border-radius: 20px;
            background: hsla(0, 100%, 0%, 0.8);
        }

        @media only screen and (max-height: 600px) {
            .carousel__cell {
                position: absolute;
                width: 540px;
                height: 320px;
                left: 10px;
                top: 40px;
                line-height: 36px;
                font-size: 30px;
                font-weight: bold;
                color: white;
                text-align: center;
                transition: transform 1s, opacity 1s;
                overflow: hidden;
                transform: rotateY(0deg) translateZ(1031px);
                border-color: white;
                border-style: ridge;
                border-radius: 20px;
                background: hsla(0, 100%, 0%, 0.8);
            }
        }

        .carousel__cell:nth-child(1) {
            transform: rotateY(0deg) translateZ(288px);
        }

        .carousel__cell:nth-child(2) {
            transform: rotateY(40deg) translateZ(288px);
        }

        .carousel__cell:nth-child(3) {
            transform: rotateY(80deg) translateZ(288px);
        }

        .carousel__cell:nth-child(4) {
            transform: rotateY(120deg) translateZ(288px);
        }

        .carousel__cell:nth-child(5) {
            transform: rotateY(160deg) translateZ(288px);
        }

        .carousel__cell:nth-child(6) {
            transform: rotateY(200deg) translateZ(288px);
        }

        .carousel__cell:nth-child(7) {
            transform: rotateY(240deg) translateZ(288px);
        }

        .carousel__cell:nth-child(8) {
            transform: rotateY(280deg) translateZ(288px);
        }

        .carousel__cell:nth-child(9) {
            transform: rotateY(320deg) translateZ(288px);
        }


        .carousel-options {
            text-align: center;
            position: relative;
            z-index: 2;
            background: hsla(0, 0%, 100%, 0.8);
        }

        #pfeill {
            width: 50px;
            height: 50px;
            position: fixed;
            top: 50%;
            left: 5px;
            margin-left: 10px;
            margin-top: -25px;
        }

        #pfeilr {
            width: 50px;
            height: 50px;
            position: fixed;
            top: 50%;
            right: 5px;
            margin-left: 10px;
            margin-top: -25px;
        }

        .shape1, .shape2 {
            border-width: 40px;
            border-style: solid;
            height: 0;
            width: 0;
            border-color: #000 transparent transparent transparent;
            top: 10px;
            position: absolute;
        }

        .shape2 {
            top: 0px;
            border-color: #fff transparent transparent transparent;
        }

        .ressMain {
            position: fixed;
            top: 20px;
            display: flex;
            left: 50%;
            margin-left: -325px;
        }

        @media only screen and (max-height: 600px) {
            .ressMain {
                position: fixed;
                top: 10px;
                display: flex;
                left: 50%;
                margin-left: -325px;
            }
        }

        .ress {
            background-color: white;
            border-radius: 13px;
            border: 2px solid dodgerblue;
            height: 29px;
            width: 120px;
            padding: 0px;
            display: flex;
            margin-left: 10px;
        }

        .ress img {
            height: 25px;
            border-radius: 15px;
        }

        .ress p {
            padding-top: 1px;
            padding-left: 6px;
        }
    </style>
@endsection

@section('content')
    <div class="scene">
        <div class="carousel">
            @php $c = 0; @endphp

            @foreach($Technologies as $key => $Technologie)
                @for($i = 1; $i <= 20; $i++)
                    @if( $i == 1)
                        @php
                            $Techno = $Technologie;
                        @endphp
                    @else
                        @if ( $Techno->getUpgrade )
                            @php
                                $Techno = $Techno->getUpgrade;
                            @endphp
                        @else
                            @php
                                break;
                            @endphp
                        @endif
                    @endif
                    @if ($Techno->canBuild() != 1)
                        @php $c++; @endphp
                        <div class="carousel__cell"
                             onclick="window.location.href = '{{ route('technologie.edit', $Techno->id) }}';"
                             style="cursor: pointer;background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/assets/img/technologies/{{ $Techno->image }}');background-repeat: no-repeat;background-size: contain;">
                            <br>
                            <p data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="bottom"
                               title="<em>{{ Lang('tech_desc_'. $Techno->id, 'DE', auth()->user()->userData()['race']) }}</em>">
                                {{ Lang('tech_name_'. $Techno->id, 'DE', auth()->user()->userData()['race']) }}
                            </p><br>
                            <p style="{{ $Techno->ress1 <= auth()->user()->userData()['ress1'] ? '':'color: red' }}">{{ Lang('global_ress1_name', 'DE') }}: {{ $Techno->ress1 }}</p>
                            <p style="{{ $Techno->ress2 <= auth()->user()->userData()['ress2'] ? '':'color: red' }}">{{ Lang('global_ress2_name', 'DE') }}: {{ $Techno->ress2 }}</p>
                            <p style="{{ $Techno->ress3 <= auth()->user()->userData()['ress3'] ? '':'color: red' }}">{{ Lang('global_ress3_name', 'DE') }}: {{ $Techno->ress3 }}</p>
                            <p style="{{ $Techno->ress4 <= auth()->user()->userData()['ress4'] ? '':'color: red' }}">{{ Lang('global_ress4_name', 'DE') }}: {{ $Techno->ress4 }}</p>
                            <p style="{{ $Techno->ress5 <= auth()->user()->userData()['ress5'] ? '':'color: red' }}">{{ Lang('global_ress5_name', 'DE') }}: {{ $Techno->ress5 }}</p>
                            Bauzeit: {{ timeconversion($Techno->tech_build_time) }}<br><br>
                            {{ $Techno->canBuild() }}
                            @if($Techno->canBuild() == 'in bau')
                                @set($rotate, $c)
                                @set($timeend, auth()->user()->userTechs($Techno->id)->time - time())

                                <div id="clockdiv">
                                    <span class="Timer"></span>
                                </div>
                                <script>
                                </script>
                            @endif
                        </div>
                    @endif
                @endfor
            @endforeach
        </div>
    </div>

    <div class="carousel-options" style="display: none">
        <input class="cells-range" type="range" min="3" max="15" value="9"/>
        <input type="radio" name="orientation" value="horizontal" checked/>
        <input type="radio" name="orientation" value="vertical"/>
    </div>
    <div class="ressMain">
        <div class="ress" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="bottom"
             title="<b>{{ Lang('global_ress1_name', 'DE') }}</b> <br><br><em>{{ Lang('global_ress1_desc', 'DE') }}</em>">
            <img src="{{ getImage('_1.png', 'ressurcen', auth()->user()->userData()['race']) }}">
            <p>{{ number_shorten( auth()->user()->userData()['ress1'], 0) }}</p>
        </div>
        <div class="ress" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="bottom"
             title="<b>{{ Lang('global_ress2_name', 'DE') }}</b> <br><br><em>{{ Lang('global_ress2_desc', 'DE') }}</em>">
            <img src="{{ getImage('_2.png', 'ressurcen', auth()->user()->userData()['race']) }}">
            <p>{{ number_shorten( auth()->user()->userData()['ress2'], 0) }}</p>
        </div>
        <div class="ress" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="bottom"
             title="<b>{{ Lang('global_ress3_name', 'DE') }}</b> <br><br><em>{{ Lang('global_ress3_desc', 'DE') }}</em>">
            <img src="{{ getImage('_3.png', 'ressurcen', auth()->user()->userData()['race']) }}">
            <p>{{ number_shorten( auth()->user()->userData()['ress3'], 0) }}</p>
        </div>
        <div class="ress" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="bottom"
             title="<b>{{ Lang('global_ress4_name', 'DE') }}</b> <br><br><em>{{ Lang('global_ress4_desc', 'DE') }}</em>">
            <img src="{{ getImage('_4.png', 'ressurcen', auth()->user()->userData()['race']) }}">
            <p>{{ number_shorten( auth()->user()->userData()['ress4'], 0) }}</p>
        </div>
        <div class="ress" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="bottom"
             title="<b>{{ Lang('global_ress5_name', 'DE') }}</b> <br><br><em>{{ Lang('global_ress5_desc', 'DE') }}</em>">
            <img src="{{ getImage('_5.png', 'ressurcen', auth()->user()->userData()['race']) }}">
            <p>{{ number_shorten( auth()->user()->userData()['ress5'], 0) }}</p>
        </div>
    </div>
    <i class="bi bi-caret-left-fill" id="pfeill" style="color: white;font-size: xxx-large;" onclick="leftclick()"></i>
    <i class="bi bi-caret-right-fill" id="pfeilr" style="color: white;font-size: xxx-large;" onclick="rightclick()"></i>
@endsection

@section('scripts')

    <script>
        var carousel = document.querySelector('.carousel');
        var cells = carousel.querySelectorAll('.carousel__cell');
        var cellCount; // cellCount set from cells-range input value
        var selectedIndex = {{($rotate ?? 1)}} - 1;
        var cellWidth = carousel.offsetWidth;
        var cellHeight = carousel.offsetHeight;
        var isHorizontal = true;
        var rotateFn = isHorizontal ? 'rotateY' : 'rotateX';
        var radius, theta;

        // console.log( cellWidth, cellHeight );

        function rotateCarousel() {
            var angle = theta * selectedIndex * -1;
            carousel.style.transform = 'translateZ(' + -radius + 'px) ' +
                rotateFn + '(' + angle + 'deg)';
        }

        // var prevButton = document.querySelector('.previous-button');
        // prevButton.addEventListener( 'click', function() {
        //     selectedIndex--;
        //     rotateCarousel();
        // });

        function leftclick() {
            selectedIndex--;
            rotateCarousel();
        };

        // var nextButton = document.querySelector('.next-button');
        // nextButton.addEventListener('click', function () {
        //     selectedIndex++;
        //     rotateCarousel();
        // });

        function rightclick() {
            selectedIndex++;
            rotateCarousel();
        };

        // var cellsRange = document.querySelector('.cells-range');
        // cellsRange.addEventListener('change', changeCarousel);
        // cellsRange.addEventListener('input', changeCarousel);


        function changeCarousel() {
            @php if(isset($c)) $c = ( $c <= 3 ? 3:$c ); @endphp
                cellCount = {{$c}};
            theta = 360 / cellCount;
            var cellSize = isHorizontal ? cellWidth : cellHeight;
            radius = Math.round((cellSize / 2) / Math.tan(Math.PI / cellCount));
            for (var i = 0; i < cells.length; i++) {
                var cell = cells[i];
                if (i < cellCount) {
                    // visible cell
                    cell.style.opacity = 1;
                    var cellAngle = theta * i;
                    cell.style.transform = rotateFn + '(' + cellAngle + 'deg) translateZ(' + radius + 'px)';
                } else {
                    // hidden cell
                    cell.style.opacity = 0;
                    cell.style.transform = 'none';
                }
            }

            rotateCarousel();
        }

        var orientationRadios = document.querySelectorAll('input[name="orientation"]');
        (function () {
            for (var i = 0; i < orientationRadios.length; i++) {
                var radio = orientationRadios[i];
                radio.addEventListener('change', onOrientationChange);
            }
        })();

        function onOrientationChange() {
            var checkedRadio = document.querySelector('input[name="orientation"]:checked');
            isHorizontal = checkedRadio.value == 'horizontal';
            rotateFn = isHorizontal ? 'rotateY' : 'rotateX';
            changeCarousel();
        }

        // set initials
        onOrientationChange();
    </script>
@isset($timeend)
    <script>
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
            const Timer = clock.querySelector('.Timer');

            function updateClock() {
                const t = getTimeRemaining(endtime);

                Timer.innerHTML = (t.days !== 0 ? t.days + 'Tage ':'') + ('0' + t.hours).slice(-2) + ':' + ('0' + t.minutes).slice(-2) + ':' + ('0' + t.seconds).slice(-2);

                if (t.total <= 0) {
                    clearInterval(timeinterval);
                    Timer.innerHTML = 'Fertig!';
                }
            }

            updateClock();
            const timeinterval = setInterval(updateClock, 1000);
        }

        //const deadline = new Date(Date.parse(new Date()) + 3600 * 1000);
        initializeClock('clockdiv', new Date(Date.parse(new Date()) + {{$timeend}} * 1000));
    </script>
@endisset
@endsection
