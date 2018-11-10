<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Untitled Document</title>
</head>

<body>
    <div style="background:#d6ebf3;padding:20px;">
        <table style="font-size: 12px; font-family: 'Karla', sans-serif; border: 1px solid #000000; line-height: 18px; color: #555;" border="0" width="600" cellspacing="0" cellpadding="0" align="center">
            <thead>
                <tr>
                    <th style="background-color: #00A39B; border-top: 1px solid #00A39B; font-size: 20px; color:#FFFFFF; height: 20px;padding:1px" align="center">
                        <p><img src="{{ config('constants.companyInfo.longLogo') }}" height="125"/></p>
                        <p>{{ config('constants.companyInfo.longName') }}</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 10px;background-color:#FFFFFF" align="left;">
                        {!! $content !!}
                        <br><br>
                        <p>
                            <em>
                                Para evitar seguir recibiendo noticias de {{ config('constants.companyInfo.longName') }} puedes hacer clic en el siguiente enlace
                            </em>
                        </p>
                        <p>
                            <em>
                                 {!! env('APP_URL')."/subscriptions/unsubscribe/".$id !!}
                            </em>
                        </p>
                    </td>
                </tr>
            </tbody>
            <tfoot>
            <tr>
                <td style="background-color: #EB899B; border-top: 1px solid #EB899B; font-size: 10px; color:#ffffff;height: 23px;" align="center">
                    <a style="color:#ffffff;" href="{{ env('APP_URL') }}">{{ env('APP_URL') }}</a> | {{config('constants.companyInfo.phoneNumber')}}
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
    <p>&nbsp;</p>
</body>
</html>

