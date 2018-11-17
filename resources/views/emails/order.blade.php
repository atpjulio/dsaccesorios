<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Untitled Document</title>
    <style>
        .confirm-table {
            border: 0.1mm solid #000000;
        }

        .confirm-table tr {
            border: 0.1mm solid #999999;
            margin: 0;
            border-bottom-width: 0;
        }

        .confirm-table tr td {
            border: 0.1mm solid #999999;
            border-right-width: 0;
            border-bottom-width: 0;
        }

        .confirm-table .bg-danger th {
            border: 0.1mm solid #999999;
            border-top-width: 0;
            border-bottom-width: 0;
            border-right-width: 0;
        }

        .bg-danger {
            background-color:#f5c6cb;
        }

        td h5 {
            font-weight: normal;
        }
    </style>
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
                    <td style="padding: 10px;background-color:#FFFFFF; width: 100%;" align="left">
                    {!! $content !!}
                    <br>
                    <table class="confirm-table">
                        <thead>
                        <tr class="bg-danger">
                            <th scope="col" style="border-left-width: 0;"><h5>Producto</h5></th>
                            <th scope="col" style=""><h5>Cantidad</h5></th>
                            <th scope="col" class=""><h5>Precio Unitario</h5></th>
                            <th scope="col" style=""><h5>Monto</h5></th>
                        </tr>
                        </thead>
                        <tbody id="dynamic-cart">
                            @include('partials.shopping_cart_table_email')
                        </tbody>
                    </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 10px;background-color:#FFFFFF" align="left;">
                        <br>
                        <p>Gracias por confiar en nosotros,</p>
                        <p>{{ config('constants.companyInfo.longName') }}</p>
                        <p>&nbsp;</p>
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

