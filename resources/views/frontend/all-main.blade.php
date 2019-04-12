@extends('front.layouts.main')

@section('content')
    <div class="inner">
        <div class="column-container tb">
            <div class="left-column tbc">
                <span class="column-title vT"><span class="inb bT filter-btn"></span>Все ломозаготовители России, участвующие в рейтинге </span>
                <div class="filter-container">
                    <form class="filret clearfix shadow-element">
                        <div class="filret__select-box">
                            <select class="region">
                                <option value="Saint-Petersburg">Москва</option>
                                <option value="Moscow">Санкт-Петербург</option>
                                <option value="Yekaterinburg">Екатеринбург</option>
                                <option value="Yekaterinburg">Петропавловск-Камчатский</option>
                                <option value="Krasnoyarsk">Красноярск</option>
                            </select>
                        </div>
                        <div class="filret__checkbox-box">
                            <label class="checkbox-btn">
                                <input type="checkbox">
                                <span>Цветной металл</span>
                            </label>
                            <label class="checkbox-btn">
                                <input type="checkbox">
                                <span>Черный металл</span>
                            </label>
                            <label class="checkbox-btn">
                                <input type="checkbox">
                                <span>Демонтаж</span>
                            </label>
                            <label class="checkbox-btn">
                                <input type="checkbox">
                                <span>Вывоз</span>
                            </label>
                            <label class="checkbox-btn">
                                <input type="checkbox">
                                <span>Погрузчик</span>
                            </label>
                            <label class="checkbox-btn">
                                <input type="checkbox">
                                <span>Погрузчик</span>
                            </label>
                            <label class="checkbox-btn">
                                <input type="checkbox">
                                <span>Погрузчик</span>
                            </label>

                            <label class="checkbox-btn">
                                <input type="checkbox">
                                <span>Погрузчик</span>
                            </label>
                            <label class="checkbox-btn">
                                <input type="checkbox">
                                <span>Монтаж</span>
                            </label>
                            <label class="checkbox-btn">
                                <input type="checkbox">
                                <span>Погрузчик</span>
                            </label>
                            <label class="checkbox-btn">
                                <input type="checkbox">
                                <span>Погрузчик</span>
                            </label>
                            <label class="checkbox-btn">
                                <input type="checkbox">
                                <span>Погрузчик</span>
                            </label>
                            <label class="checkbox-btn">
                                <input type="checkbox">
                                <span>Погрузчик</span>
                            </label>
                            <label class="checkbox-btn">
                                <input type="checkbox">
                                <span>Монтаж</span>
                            </label>
                            <div class="search-box clearfix rL">
                                <input type="button" class="search-btn" value="Поиск">
                                <div class="rL hid">
                                    <input type="text" name="search" class="search-fild">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="table-container shadow-element">
                    <div class="table-overflow-x">
                        <table class="company-table">
                            <tr>
                                <th><span>№</span></th>
                                <th><span>Компания</span></th>
                                <th><span>Активность</span></th>
                                <th><span>Отзывы</span></th>
                                <th><span>Пункты<br> приема</span></th>
                                <th><span>Охват<br> городов</span></th>
                                <th><span>Рейтинг</span></th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td> 
                                    <span class="text-box inb rL">
                                        <span class="company-name">Название компании</span>
                                        <span class="company-location">Название компании</span>
                                        <span class="company-logo abs"></span>
                                    </span>
                                </td>
                                <td>12.5</td>
                                <td>25</td>
                                <td>8</td>
                                <td>3</td>
                                <td><span class="rating-growth">34.2</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td> 
                                    <span class="text-box inb rL">
                                        <span class="company-name">Название компании</span>
                                        <span class="company-location">Название компании</span>
                                        <span class="company-logo abs"></span>
                                    </span>
                                </td>
                                <td>12.5</td>
                                <td>25</td>
                                <td>8</td>
                                <td>3</td>
                                <td><span class="rating-drop">32.2</span></td>
                            </tr>
                            <tr class="focus">
                                <td>3</td>
                                <td> 
                                    <span class="text-box inb rL">
                                        <span class="company-name">Название компании</span>
                                        <span class="company-location">Название компании</span>
                                        <span class="company-logo abs"></span>
                                    </span>
                                </td>
                                <td>14.7</td>
                                <td>23</td>
                                <td>9</td>
                                <td>7</td>
                                <td><span class="rating-growth">29.9</span></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td> 
                                    <span class="text-box inb rL">
                                        <span class="company-name">Название компании</span>
                                        <span class="company-location">Название компании</span>
                                        <span class="company-logo abs"></span>
                                    </span>
                                </td>
                                <td>14.3</td>
                                <td>27</td>
                                <td>5</td>
                                <td>7</td>
                                <td><span class="rating-growth">28.2</span></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td> 
                                    <span class="text-box inb rL">
                                        <span class="company-name">Название компании</span>
                                        <span class="company-location">Название компании</span>
                                        <span class="company-logo abs"></span>
                                    </span>
                                </td>
                                <td>13.1</td>
                                <td>17</td>
                                <td>11</td>
                                <td>6</td>
                                <td><span class="rating-drop">23.7</span></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td> 
                                    <span class="text-box inb rL">
                                        <span class="company-name">Название компании</span>
                                        <span class="company-location">Название компании</span>
                                        <span class="company-logo abs"></span>
                                    </span>
                                </td>
                                <td>12.9</td>
                                <td>19<span class="slash">/</span><span class="fraction">2</span></td>
                                <td>5</td>
                                <td>7</td>
                                <td><span class="rating-growth">28.2</span></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td> 
                                    <span class="text-box inb rL">
                                        <span class="company-name">Название компании</span>
                                        <span class="company-location">Название компании</span>
                                        <span class="company-logo abs"></span>
                                    </span>
                                </td>
                                <td>12.9</td>
                                <td>45<span class="slash">/</span><span class="fraction">5</span></td>
                                <td>5</td>
                                <td>7</td>
                                <td><span class="rating-growth">21.2</span></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td> 
                                    <span class="text-box inb rL">
                                        <span class="company-name">Название компании</span>
                                        <span class="company-location">Название компании</span>
                                        <span class="company-logo abs"></span>
                                    </span>
                                </td>
                                <td>25.3</td>
                                <td>45<span class="slash">/</span><span class="fraction">5</span></td>
                                <td>5</td>
                                <td>7</td>
                                <td><span class="rating-drop">21.2</span></td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td> 
                                    <span class="text-box inb rL">
                                        <span class="company-name">Название компании</span>
                                        <span class="company-location">Название компании</span>
                                        <span class="company-logo abs"></span>
                                    </span>
                                </td>
                                <td>12.9</td>
                                <td>45<span class="slash">/</span><span class="fraction">5</span></td>
                                <td>5</td>
                                <td>7</td>
                                <td><span class="rating-growth">21.2</span></td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td> 
                                    <span class="text-box inb rL">
                                        <span class="company-name">Название компании</span>
                                        <span class="company-location">Название компании</span>
                                        <span class="company-logo abs"></span>
                                    </span>
                                </td>
                                <td>12.9</td>
                                <td>45<span class="slash">/</span><span class="fraction">5</span></td>
                                <td>5</td>
                                <td>7</td>
                                <td><span class="rating-growth">21.2</span></td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td> 
                                    <span class="text-box inb rL">
                                        <span class="company-name">Название компании</span>
                                        <span class="company-location">Название компании</span>
                                        <span class="company-logo abs"></span>
                                    </span>
                                </td>
                                <td>12.9</td>
                                <td>45<span class="slash">/</span><span class="fraction">5</span></td>
                                <td>5</td>
                                <td>7</td>
                                <td><span class="rating-growth">21.2</span></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td> 
                                    <span class="text-box inb rL">
                                        <span class="company-name">Название компании</span>
                                        <span class="company-location">Название компании</span>
                                        <span class="company-logo abs"></span>
                                    </span>
                                </td>
                                <td>13.1</td>
                                <td>17</td>
                                <td>11</td>
                                <td>6</td>
                                <td><span class="rating-drop">23.7</span></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td> 
                                    <span class="text-box inb rL">
                                        <span class="company-name">Название компании</span>
                                        <span class="company-location">Название компании</span>
                                        <span class="company-logo abs"></span>
                                    </span>
                                </td>
                                <td>12.9</td>
                                <td>19<span class="slash">/</span><span class="fraction">2</span></td>
                                <td>5</td>
                                <td>7</td>
                                <td><span class="rating-growth">28.2</span></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td> 
                                    <span class="text-box inb rL">
                                        <span class="company-name">Название компании</span>
                                        <span class="company-location">Название компании</span>
                                        <span class="company-logo abs"></span>
                                    </span>
                                </td>
                                <td>12.9</td>
                                <td>45<span class="slash">/</span><span class="fraction">5</span></td>
                                <td>5</td>
                                <td>7</td>
                                <td><span class="rating-growth">21.2</span></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td> 
                                    <span class="text-box inb rL">
                                        <span class="company-name">Название компании</span>
                                        <span class="company-location">Название компании</span>
                                        <span class="company-logo abs"></span>
                                    </span>
                                </td>
                                <td>25.3</td>
                                <td>45<span class="slash">/</span><span class="fraction">5</span></td>
                                <td>5</td>
                                <td>7</td>
                                <td><span class="rating-drop">21.2</span></td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td> 
                                    <span class="text-box inb rL">
                                        <span class="company-name">Название компании</span>
                                        <span class="company-location">Название компании</span>
                                        <span class="company-logo abs"></span>
                                    </span>
                                </td>
                                <td>12.9</td>
                                <td>45<span class="slash">/</span><span class="fraction">5</span></td>
                                <td>5</td>
                                <td>7</td>
                                <td><span class="rating-growth">21.2</span></td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td> 
                                    <span class="text-box inb rL">
                                        <span class="company-name">Название компании</span>
                                        <span class="company-location">Название компании</span>
                                        <span class="company-logo abs"></span>
                                    </span>
                                </td>
                                <td>12.9</td>
                                <td>45<span class="slash">/</span><span class="fraction">5</span></td>
                                <td>5</td>
                                <td>7</td>
                                <td><span class="rating-growth">21.2</span></td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td> 
                                    <span class="text-box inb rL">
                                        <span class="company-name">Название компании</span>
                                        <span class="company-location">Название компании</span>
                                        <span class="company-logo abs"></span>
                                    </span>
                                </td>
                                <td>12.9</td>
                                <td>45<span class="slash">/</span><span class="fraction">5</span></td>
                                <td>5</td>
                                <td>7</td>
                                <td><span class="rating-growth">21.2</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="right-column tbc">
                <span class="column-title">Другие металлы</span>
                <div class="metall-table-container shadow-element">
                    <table class="metall-table">
                        <tr class="tr">
                            <th><span>Металл</span></th>
                            <th><span>Курс</span></th>
                        </tr>
                        <tr>
                            <td>Алюминий</td>
                            <td>
                                    <span class="rate inb growth">
                                        <span class="price">8,26 $</span><br>
                                        <span class="percent">4,05 %</span>
                                    </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Олово</td>
                            <td>
                                    <span class="rate inb falling">
                                        <span class="price">6,78 $</span><br>
                                        <span class="percent">0,05 %</span>
                                    </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Цинк</td>
                            <td>
                                    <span class="rate inb growth">
                                        <span class="price">6,78 $</span><br>
                                        <span class="percent">0,05 %</span>
                                    </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Медь</td>
                            <td>
                                    <span class="rate inb growth">
                                        <span class="price">6,78 $</span><br>
                                        <span class="percent">0,05 %</span>
                                    </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Олово</td>
                            <td>
                                    <span class="rate inb growth">
                                        <span class="price">6,78 $</span><br>
                                        <span class="percent">0,05 %</span>
                                    </span>
                            </td>
                        </tr>
                    </table>
                    <div class="link-box">
                        Данные предоставлены сервисом <a href="www.lme.com">www.lme.com</a>
                    </div>
                </div>
                <div class="rating-banner">
                    <div class="rating-banner_header">
                        <span class="db">В рейтинге уже </span>
                        <span class="quantity db">250</span>
                        <span class="db">ломозаготовителей</span>
                    </div>
                    <span class="main-text">
                            Стань членом крупнейшего сообщества
                        </span>
                    <a class="btn db">Зарегестрироваться</a>
                </div>
            </div>
        </div>
    </div>
    <div class="over-footer clearfix">
        <div class="inner">
            <a class="btn fright">О портале Название</a>
            <a class="btn fright">Как считается Рейтинг?</a>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        //    стилизация select
        $('.region').niceSelect();
    </script>
@endpush
