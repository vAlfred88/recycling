@extends('front.layouts.main')

@section('content')
    <div class="about_section">
        <div class="inner">
            <div class="row">
                <div class="info_block" id="info_block">
                    <a class="logo db"><img width="52" src="{{asset($company->logo)}}" alt=""></a>
                    <div class="ah1 bold">{{ $company->name }}</div>
                    <div class="text_block rL hid">
                        {{ $company->description }}
                        <a class="abs db r0 b0 cp" onclick="textToggle()">подробнее</a>
                    </div>
                    <div class="address">{{ $company->address }}</div>
                    <div>
                        <a class="sbold" href="tel:{{ $company->phone }}">{{ $company->phone }}</a>
                    </div>
                    <div>
                        <a class="link company-link" target="_blank" href="{{ url($company->site) }}"
                           title="{{ $company->name }}">{{ $company->site }}</a>
                    </div>
                    <div>
                        <a class="link company-email" href="mailto:{{ $company->email }}"
                           title="{{ $company->email }}">{{ $company->email }}</a>
                    </div>
                    <div class="social">
                        @if(!empty($company->facebook))
                            <a class="inb vT" href="{{url($company->facebook) }}">
                                {{ svg_image('fb') }}
                            </a>
                        @endif
                        @if(!empty($company->instagram))
                            <a class="inb vT" href="{{ url($company->instagram) }}">
                                {{ svg_image('inst') }}
                            </a>
                        @endif
                        @if(!empty($company->vk))
                            <a class="inb vT" href="{{ url($company->vk) }}">
                                {{ svg_image('vk') }}
                            </a>
                        @endif

                    </div>
                </div>
                <div class="right_block rL">
                    <users-slick :users="{{ $company->users }}"></users-slick>
                    {{--                    <div class="people_slider alCenter fright slick-slider">--}}
                    {{--                        @if(count($users) > 3)--}}
                    {{--                            <button class="slick-prev slick-arrow" type="button">Previous</button>--}}
                    {{--                        @endif--}}
                    {{--                        <div class="slick-list">--}}
                    {{--                            <div class="slick-track">--}}
                    {{--                                @foreach($users as $user)--}}
                    {{--                                    <div class="item">--}}
                    {{--                                        <div class="block">--}}
                    {{--                                            <div class="image_block m0a cover brd50"--}}
                    {{--                                                 style="background-image: url({{ $user->image }});"></div>--}}
                    {{--                                            <div class="ah1 sbold">{{ $user->name }}</div>--}}
                    {{--                                            <div class="ah2">{{ $user->position }}</div>--}}
                    {{--                                            <a class="inb vT nowrap" href="mailto:{{ $user->email }}"--}}
                    {{--                                               title="{{ $user->email }}">{{ $user->email }}</a>--}}
                    {{--                                            <a class="inb vT nowrap"--}}
                    {{--                                               href="tel:{{ $user->phone }}">{{ $user->phone }}</a>--}}
                    {{--                                            <a href="mailto:{{ $user->email }}" class="email sb abs brd50">--}}
                    {{--                                                <svg width="20" height="14" viewBox="0 0 20 14" fill="none"--}}
                    {{--                                                     xmlns="http://www.w3.org/2000/svg">--}}
                    {{--                                                    <path--}}
                    {{--                                                        d="M17.5489 13.7965H2.45105C1.65123 13.7965 1 13.1459 1 12.3455V2.45105C1 1.65065 1.65123 1 2.45105 1H17.5489C18.3488 1 19 1.65065 19 2.45105V12.3455C19 13.1459 18.3488 13.7965 17.5489 13.7965ZM2.45105 1.58042C1.97104 1.58042 1.58042 1.97104 1.58042 2.45105V12.3455C1.58042 12.8255 1.97104 13.2161 2.45105 13.2161H17.5489C18.029 13.2161 18.4196 12.8255 18.4196 12.3455V2.45105C18.4196 1.97104 18.029 1.58042 17.5489 1.58042H2.45105Z"--}}
                    {{--                                                        fill="#F49135"--}}
                    {{--                                                        stroke="#F49135"--}}
                    {{--                                                        stroke-width="0.3">--}}
                    {{--                                                    </path>--}}
                    {{--                                                    <path--}}
                    {{--                                                        d="M10 8.85643C9.61406 8.85643 9.22808 8.72816 8.93439 8.47219L1.51719 2.00805C1.39647 1.90241 1.3837 1.71958 1.48933 1.59885C1.59497 1.47696 1.77838 1.46536 1.89911 1.57041L9.31572 8.03455C9.68719 8.35785 10.314 8.35727 10.6844 8.03455L18.0992 1.57099C18.2194 1.46478 18.4022 1.47696 18.509 1.59943C18.6146 1.72016 18.6019 1.90299 18.4811 2.00863L11.0657 8.47161C10.772 8.72816 10.386 8.85643 10 8.85643Z"--}}
                    {{--                                                        fill="#F49135"--}}
                    {{--                                                        stroke="#F49135"--}}
                    {{--                                                        stroke-width="0.3">--}}
                    {{--                                                    </path>--}}
                    {{--                                                </svg>--}}
                    {{--                                            </a>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                @endforeach--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        @if(count($users) > 3)--}}
                    {{--                            <button class="slick-next slick-arrow" type="button">Next</button>--}}
                    {{--                        @endif--}}
                    {{--                    </div>--}}
                    <div class="clear"></div>
                    <div class="review_block alRight">
                        <div class="inb vT">
                            <span class="orange">5 место в рейтинге</span>
                            <a href="{{ route('front.recycles.reviews.index', $company) }}">
                                Отзывы <b class="sbold">+{{ $company->positiveReviews }}</b> <b
                                    class="sbold">-{{ $company->negativeReviews }}</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end about_section -->
    <div class="gray-bg-img">
        <div class="gray_bg">
            <reception-filter></reception-filter>
        </div>
        <receptions-tab inline-template :receptions="{{$receptions}}">
            <div class="gray_bg padding-top-none rL tab-item-wrap tab-item-wrap_show">
                <div class="inner">
                    @foreach($receptions as $reception)
                        <div class="tab-disp rL clearfix">
                            <div class="tab-item">
                                <div class="row">
                                    <div class="block block1">
                                        <div class="orange_row">{{ $reception->address }}</div>
                                        <div class="text_block">
                                            <div class="phone_block rL">
                                                <div>
                                                    <a href="tel:{{ $reception->phone }}">
                                                        {{ $reception->phone }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="time_block rL">
                                                <div>пн - пт: с 9:30 до 20:30</div>
                                                <div>сб, вс: с10:30 до 20:30</div>
                                            </div>
                                            <div class="rL hid">
                                                <div class="people_block rL hid">
                                                    @foreach($reception->users as $user)
                                                        <div class="item fleft">
                                                            <div class="image_block db cover brd50 m0a"
                                                                 style="background-image: url({{ $user->iamge }});"></div>
                                                            <div class="ah2">
                                                                <span class="db">{{ $user->name }}</span>
                                                            </div>
                                                            <div class="orange">{{ $user->position }}</div>
                                                        </div>
                                                    @endforeach
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block block2">
                                        <div class="ah2">Список услуг</div>
                                        <ul>
                                            @foreach($reception->services as $service)
                                                <li>{{ $service->name }}</li>
                                            @endforeach
                                        </ul>
                                        <a href="" class="abs price b0">
                                            <span class="db"> Скачать прайс</span>
                                            Обновлен 15.07.2018
                                        </a>
                                    </div>
                                    <div class="block block3">
                                        <div class="ah2">
                                            Отзывы пункта
                                            <span class="fright">-1</span>
                                            <span class="fright">+5</span>
                                        </div>
                                        @foreach($reception->reviews()->paginate(2) as $review)
                                            <div class="item">
                                                <div class="people">
                                                    <div class="image_block fleft rL hid brd50 cover"
                                                         style="/*background-image:url(сюда помещается аватарка зарегистр. пользователя);*/"></div>
                                                    <div class="rL hid">
                                                        <span class="db">{{ optional($review->user)->name }}</span>
                                                        12.07.2018
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="text_block">
                                                    <div class="scroll_block">
                                                        <div class="text_block_inner">
                                                            {{ $review->body }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
{{--            tab-item-wrap--}}
            <div class="gray_bg padding-top-none rL" v-if="false">
                <gmap-map :center="center"
                          :zoom="7"
                          @center_changed="updateCenter"
                          :options="options"
                          map-type-id="terrain"
                          ref="map"
                          style="height: 500px"
                          class="map-box">
                    <gmap-marker v-for="reception in receptions"
                                 icon="/img/black-marker.png"
                                 :position="{lat: parseFloat(reception.place.lat), lng: parseFloat(reception.place.lng)}"
                                 class="mx-15 overflow-hidden">
                    </gmap-marker>
                </gmap-map>
                <div class="inner">
                    <div class="tab-disp clearfix">

                        <div class="tab-item">

                            <div class="contetn-box rL fright row">

                                <div class="block block1">
                                    <div class="orange_row">г. Москва ул. Капотня, дом 1</div>
                                    <div class="text_block">
                                        <div class="phone_block rL">
                                            <div><a href="tel:+79113444361">8 (911) 344-34-61</a></div>
                                            <div><a href="tel:+79118753199">8 (911) 875-31-99</a></div>
                                        </div>
                                        <div class="time_block rL">
                                            <div>пн - пт: с 9:30 до 20:30</div>
                                            <div>сб, вс: с10:30 до 20:30</div>
                                        </div>
                                        <div class="rL hid">
                                            <div class="people_block rL hid">
                                                <div class="item fleft">
                                                    <div class="image_block db cover brd50 m0a"
                                                         style="background-image: url({{asset('images/ava-1.png')}});"></div>
                                                    <div class="ah2"><span class="db">Андрей</span> <span
                                                            class="db">Степанов</span></div>
                                                    <div class="orange">Начальник</div>
                                                </div>
                                                <div class="item fleft">
                                                    <div class="image_block db cover brd50 m0a"
                                                         style="background-image: url({{asset('images/ava-2.png')}});"></div>
                                                    <div class="ah2"><span class="db">Денис</span><span
                                                            class="db">Рубцов</span>
                                                    </div>
                                                    <div class="orange">Помощник главного инженера</div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="block block2">
                                    <div class="ah2">Список услуг</div>
                                    <ul>
                                        <li>Прием черного металла</li>
                                        <li>Прием цветного металла</li>
                                        <li>Демонтаж</li>
                                        <li>Вывоз металлоконструкций</li>
                                        <li>Въезд для грузовиков</li>
                                        <li>Весы для мелкого и крупного лома</li>
                                    </ul>
                                    <a href="" class="abs price b0">
                                        <span class="db"> Скачать прайс</span>
                                        Обновлен 15.07.2018
                                    </a>
                                </div>

                                <div class="block block3">
                                    <div class="ah2">
                                        Отзывы пункта
                                        <span class="fright">-1</span>
                                        <span class="fright">+5</span>
                                    </div>
                                    <div class="item">
                                        <div class="people people_bg">
                                            <div class="image_block fleft rL hid brd50 cover"
                                                 style="background-image:url({{asset('images/ava-review-1.png')}});"></div>
                                            <div class="rL hid">
                                                <span class="db">Владимир Ефремов</span>
                                                12.07.2018
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="text_block">
                                            <div class="scroll_block">
                                                <div class="text_block_inner">
                                                    Давно сотрудничаем, у них большой спектр услуг и точек приема
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="people people_bg">
                                            <div class="image_block fleft rL hid brd50 cover"
                                                 style="background-image:url({{asset('images/ava-review-2.png')}});"></div>
                                            <div class="rL hid">
                                                <span class="db">Денис Потапов</span>
                                                12.07.2018
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="text_block over-x">
                                            <div class="scroll_block">
                                                <div class="text_block_inner">
                                                    Быстро, удобный склад рекомендую!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="people people_bg monkey-work">
                                            <div class="image_block fleft rL hid brd50 cover"
                                                 style="background-image:url({{asset('images/ava-review-3.png')}});"></div>
                                            <div class="rL hid">
                                                <span class="db">Андрей Симонов</span>
                                                12.05.2018
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </receptions-tab>
    </div>
@endsection
