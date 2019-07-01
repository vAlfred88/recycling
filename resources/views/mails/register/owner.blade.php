<html><head></head><body><div style="
    /* margin: 0 auto 0 auto; */
    font-family: Helvetica serif, Arial;
    background-color: #F7F7F7;
    ">
    <meta http-equiv="Content-Type" content="text/html;
charset=UTF-8">
    <div style="width: 800px;
margin: auto;">

        <div style="position: relative">
            <div style="display: inline-block;background-color: #f48e35;background: linear-gradient(to right, #ff9029 0%, #fe6b37 100%);width: 100%;padding: 30 0 30 0;">

                <div align="center"> <img src="http://vtorser.appomart.ru/images/logo-white.svg" style="
    width:12em;
    height:auto;
    margin: 0.5em 0 0.5em 0.5em"></div>
            </div>
            <!--<div style="display: inline-block;
margin: 0 0 0 1em;
position: absolute;
bottom: 0;
width: 60%">
                ВторCервис - портал в помощь ломозаготовителям блабла
            </div>-->
        </div>

        <div style="background-color: white;
box-shadow: 0 0 7px 0px rgba(0,0,0,0.2);
padding: 1em 1em 1em 1em;
margin: 1em 0 0 0">

            <table class="main-table" cellpadding="0" cellspacing="0" border="0" width="100%" align="center" style="border-collapse:collapse;margin:0 auto;width:100%;">
                <tbody><tr>
                    <td>
                        <!--[if (gte mso 9)|(IE)]>
                        <table width="600" align="center">
                            <tr>
                                <td><![endif]-->
                        <table class="outer" cellpadding="0" cellspacing="0" border="0" width="100%" align="center" style="border-collapse:collapse;margin:0 auto;max-width:600px;width:100%; background: #ffffff;">
                            <tbody>


                            <tr>
                                <td class="middle" style="-webkit-font-smoothing:subpixel-antialiased;text-align:center">
                                    <table cellpadding="0" cellspacing="0" border="0" width="100%" align="center" style="border-collapse:collapse;margin:38px auto 0;width:100%">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <p style="font-size: 16px;color: #000000;line-height: 24px; margin-top: 0; margin-bottom: 0;">
                                                    Компания {{$mycompany->name}} была добавлена в рейтинг ломозаготовителей на
                                                    портале ВторСервис!</p></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-collapse:collapse; width: 100%; margin-top: 15px;">
                                                    <tbody><tr>
                                                        <td align="left" width="40"><img src="http://vtorser.appomart.ru/index_files/flag.png" alt=""></td>
                                                        <td>
                                                            <p style="font-size: 14px;color: #fe6b37;font-weight: 600;padding: 10px 0 6px; margin-top: 0; margin-bottom: 0;">
                                                                40%</p>
                                                        </td>
                                                        <td align="right" width="40"><div style="position:relative;right: -20px"><img class="diamond" src="http://vtorser.appomart.ru/index_files/diamond.png" alt=""></div></td>
                                                    </tr>
                                                    </tbody></table>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-collapse:collapse; width: 100%;">
                                                    <tbody><tr>
                                                        <td width="40%" height="10" style="background-color: #F44336;"></td>
                                                        <td style="background-color: #9E9E9E;"></td>
                                                    </tr>
                                                    </tbody></table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="table" style="-webkit-font-smoothing:subpixel-antialiased;text-align:center">
                                    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-collapse:collapse;margin:20px auto 0;width:100%">
                                        <tbody>
                                        <tr height="60" style="height: 60px;">
                                            <td align="left" colspan="2"><p style="color: #6e6e6e; font-size: 15px;font-weight: 600; margin-top: 0; margin-bottom: 0;">
                                                    ТОП ломзаготовителей</p></td>
                                            <td style="display: none;" class="no_tablet"><p style="color: #6e6e6e; font-size: 12px; padding-left: 5px; padding-right: 5px; margin-top: 0; margin-bottom: 0;">
                                                    Активность</p></td>
                                            <td>
                                                <p style="color: #6e6e6e; font-size: 12px; padding-left: 10px; padding-right: 10px; margin-top: 0; margin-bottom: 0;">
                                                    Отзывы</p></td>
                                            <td style="display: none;" class="no_tablet"><p style="color: #6e6e6e; font-size: 12px; padding-left: 5px; padding-right: 5px; margin-top: 0; margin-bottom: 0;">
                                                    Пункты приема</p></td>
                                            <td style="display: none;" class="no_tablet"><p style="color: #6e6e6e; font-size: 12px; padding-left: 5px; padding-right: 5px; margin-top: 0; margin-bottom: 0;">
                                                    Охват городов</p></td>
                                            <td align="right"><p style="color: #6e6e6e; font-size: 12px; white-space: nowrap; margin-top: 0; margin-bottom: 0;">
                                                    Рейтинг</p></td>
                                        </tr>
                                        @foreach($companies as $company)
                                            <tr height="80" style="height: 84px; border-bottom: 1px solid #cccccc;">
                                                <td width="35" align="left"><p style="color: #6e6e6e;font-size: 12px;font-weight: 600; margin-top: 0; margin-bottom: 0;">
                                                        {{$company->id}}</p></td>
                                                <td align="left" style="vertical-align: bottom; padding-bottom: 15px;">
                                                    <div style="display: inline-block;vertical-align: middle;">
                                                        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:10px;">
                                                            <tbody><tr>
                                                                <td>
                                                                    <p style="display: block;font-size: 16px;color: #000000;word-break: break-all; white-space: normal; text-align: justify; padding-right: 20px; margin-top: 0; margin-bottom: 0;">
                                                                        {{$company->name}}</p>
                                                                    <p style="display: block;font-size: 16px;color: #6e6e6e; margin-top: 0; margin-bottom: 0;">
                                                                        {{$company->address}}</p></td>
                                                            </tr>
                                                            </tbody></table>
                                                    </div>
                                                </td>
                                                <td style="display: none;" class="no_tablet"><p style="color: #f49135;font-size: 18px; margin-top: 0; margin-bottom: 0;">
                                                        {{ $company->positiveReviews }}</p></td>
                                                <td>
                                                    <p style="color: #01af66;font-size: 18px; margin-top: 0; margin-bottom: 0;">
                                                        {{ $company->positiveReviews }}</p></td>
                                                <td style="display: none;" class="no_tablet"><p style="color: #f49135;font-size: 18px; margin-top: 0; margin-bottom: 0;">
                                                        {{ $company->positiveReviews }}</p></td>
                                                <td style="display: none;" class="no_tablet"><p style="color: #f49135;font-size: 18px; margin-top: 0; margin-bottom: 0;">
                                                        {{ $company->positiveReviews }}</p></td>
                                                <td align="right"><p class="up" style="font-size: 18px; white-space: nowrap; margin-top: 0; margin-bottom: 0;">
                                                        {{ $company->positiveReviews }}<img src="http://vtorser.appomart.ru/index_files/up.png" alt=""></p></td>
                                            </tr>
                                        @endforeach

                                        <tr height="45" style="height: 45px;">
                                            <td colspan="7" height="39" style="border-top: 1px solid #cccccc; border-bottom: 1px solid #cccccc; padding-top: 20px; padding-bottom: 20px;">
                                                <p style=" margin-top: 0; margin-bottom: 0;font-size: 18px; line-height: 21px; color: #6e6e6e;">
                                                    Ваша компания не участвует в рейтинге, зайдите на портал
                                                    и заполните анкету, чтобы участвовать</p></td>
                                        </tr>

                                        <tr height="80" style="height: 84px; ">
                                            <td width="35" align="left"><p style="color: #6e6e6e;font-size: 12px;font-weight: 600; margin-top: 0; margin-bottom: 0;">
                                                    -</p></td>
                                            <td align="left" style="vertical-align: bottom; padding-bottom: 15px;">
                                                <div style="display: inline-block;vertical-align: middle;">
                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:10px;">
                                                        <tbody><tr>
                                                            <td>
                                                                <p style="display: block;font-size: 16px; margin-top: 0; margin-bottom: 0;color: #000000;word-break: break-all; white-space: normal; text-align: justify; padding-right: 20px;">
                                                                    {{$mycompany->name}}</p>
                                                                {{--<p style="display: block;font-size: 16px; margin-top: 0; margin-bottom: 0;color: #6e6e6e;">--}}
                                                                    {{--Москва</p>--}}
                                                            </td>
                                                        </tr>
                                                        </tbody></table>
                                                </div>
                                            </td>
                                            <td style="display: none;" class="no_tablet"><p style="color: #f49135;font-size: 18px; margin-top: 0; margin-bottom: 0;">
                                                    -</p></td>
                                            <td>
                                                <p style="color: #01af66;font-size: 18px; margin-top: 0; margin-bottom: 0;">
                                                    -</p></td>
                                            <td style="display: none;" class="no_tablet" width="75"><p style="color: #6e6e6e;font-size: 18px; margin-top: 0; margin-bottom: 0;">
                                                    -</p></td>
                                            <td style="display: none;" class="no_tablet" width="75"><p style="color: #6e6e6e;font-size: 18px; margin-top: 0; margin-bottom: 0;">
                                                    -</p></td>
                                            <td align="right"><p style="padding-right: 13px;font-size: 18px; margin-top: 0; margin-bottom: 0;">
                                                    -</p></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="button-row" style="-webkit-font-smoothing:subpixel-antialiased;text-align:center;padding: 19px 0 30px;">
                                    <table cellpadding="0" cellspacing="0" border="0" width="100%" align="center" style="border-collapse:collapse;margin:0 auto;width:100%">
                                        <tbody>
                                        <tr>
                                            <td style="padding-bottom: 15px; text-align: center">
                                                <a href="{{route('home')}}" class="activate-link" style="line-height: 50px;
                                                   background: #ff9029;
                                                    background: linear-gradient(to right, #ff9029 0%, #fe6b37 100%);
                                                    font-size: 16px; display: inline-block;
                                                    text-align: center;
                                                     color: #ffffff; width: 230px;
                                                     text-decoration: none;
                                                     border-radius: 30px;">Активировать аккаунт</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <a style="font-size: 16px; line-height: 19px; color: #ff9028;" href="#">Отписаться</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
                    </td>
                </tr>
                </tbody></table>

            <!--<div style="margin: 1em 0 0 0">foot</div>-->

        </div>
    </div>


    <div style="margin: 1em 0 0 0">
        <!--[if (gte mso 9)|(IE)]>
        <table width="800" align="center">
            <tr>
                <td><![endif]-->
        <table class="outer" cellpadding="0" cellspacing="0" border="0" width="100%" align="center" style="border-collapse:collapse;margin:5px auto 0;max-width:800px;width:100%;background-color: #333b3f;">
            <tbody>
            <tr>
                <td class="three-columns" style="-webkit-font-smoothing:subpixel-antialiased;font-size:0;text-align:center">
                    <!--[if (gte mso 9)|(IE)]>
                    <table width="100%">
                        <tr>
                            <td width="33%" valign="top">
                    <![endif]-->
                    <div class="column " style="-webkit-font-smoothing:subpixel-antialiased;display:inline-block;font-size:14px;max-width:200px;text-align:left;vertical-align:top;width:100%; padding-top: 20px; padding-bottom: 20px;">
                        <table width="100%" cellpadding="0" height="100%" style="border-collapse:collapse">
                            <tbody>
                            <tr>
                                <td style="-webkit-font-smoothing:subpixel-antialiased; padding:0;">
                                    <table width="100%" cellpadding="0" style="border-collapse:collapse;border-radius:4px">
                                        <tbody>
                                        <tr>
                                            <td style="-webkit-font-smoothing:subpixel-antialiased;color:#fff;font-size:14px;line-height:22px;text-align:center">
                                                ИНН <a style="color: #ffffff !important">6745643567</a> <br>
                                                ОГРН <a style="color: #ffffff !important">5675759949</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--[if (gte mso 9)|(IE)]>
                    <td width="33%" valign="top">
                    <![endif]-->
                    <div class="column" style="-webkit-font-smoothing:subpixel-antialiased;display:inline-block;font-size:14px;max-width:200px;text-align:left;vertical-align:top;width:100%; padding-top: 20px; padding-bottom: 20px;">
                        <table width="100%" cellpadding="0" height="44" style="border-collapse:collapse">
                            <tbody>
                            <tr>
                                <td style="-webkit-font-smoothing:subpixel-antialiased; padding:0;">
                                    <table width="100%" cellpadding="0" style="border-collapse:collapse;border-radius:4px">
                                        <tbody>
                                        <tr>
                                            <td align="center" style="-webkit-font-smoothing:subpixel-antialiased;color:#fff;font-size:14px;line-height:22px;text-align:center;">
                                                <img src="http://vtorser.appomart.ru/images/logo-white.svg" alt="" style="
    height: 30px;
"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--[if (gte mso 9)|(IE)]>
                    <td width="33%" valign="top">
                    <![endif]-->
                    <div class="column" style="-webkit-font-smoothing:subpixel-antialiased;display:inline-block;font-size:14px;max-width:200px;text-align:left;vertical-align:top;width:100%; padding-top: 20px; padding-bottom: 20px;">
                        <table width="100%" cellpadding="0" height="44" style="border-collapse:collapse">
                            <tbody>
                            <tr>
                                <td style="-webkit-font-smoothing:subpixel-antialiased; padding:0;">
                                    <table width="100%" cellpadding="0" style="border-collapse:collapse;border-radius:4px">
                                        <tbody>
                                        <tr>
                                            <td class="paragraph" style="-webkit-font-smoothing:subpixel-antialiased;color:#fff;font-size:14px;line-height:22px;text-align:center">
                                                <a style="font-family: inherit; font-size: inherit; line-height: inherit; color: #ffffff; text-decoration: none;" href="">Техническая поддержка</a> <br>
                                                <a style="color: #ffffff !important">Copyright ©</a> <a style="color: #ffffff !important">2018-2019</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--[if (gte mso 9)|(IE)]><![endif]-->
                </td>
            </tr>
            </tbody>
        </table>

    </div>
</div>
</body></html>
