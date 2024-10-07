<?php
$http = url('/');
?>
        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
</head>
<body>
<table cellpadding="0" cellspacing="0" align="center" border="0" width="100%" >
    <tr>
        <td width="600" border="0"  align="center">
            <table cellpadding="0" cellspacing="0" border="0" width="600" style="font-family: Helvetica Neue, Helvetica, Arial, sans-serif">
                <tr>
                    <td width="100%" style="width:100%; text-align: center; border:0; padding: 0; background-color: #fff">
                        <a target="_blank" href="{{$http}}"><img src="{{$http}}/img/logo.png" style="width:30%; display: block; margin: 10px auto" alt="Smadia"></a>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" bgcolor="#F2F2F2" width="100%" style="width:100%; text-align: center; border:0; padding: 0; background-color: #F2F2F2;">
                        <table cellpadding="0" align="center" cellspacing="0" border="0" width="400">
                            <tr>
                                <p align="center" border="0" style="padding-top: 20px; padding-bottom: 20px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13pt; color: #808080; line-height: 1.5em;">
                                    <span style="color: #70B125; font-weight: bold; font-size: 12pt">¡Hola! </span>
                                <p style="color: #808080; font-size: 12pt">Se ha realizado una suscripción desde el formulario de <a target="_blank" href='{{$http}}/' style='text-decoration: none'><span style='font-weight:700;font-size: 16px;color: #70B125;'>{{$http}}</span></a>.<br>
                                    Queremos informarle que los datos seran suministrados aqui.</p>
                                <br>
                                <div style='background: #70B125; color: #F0F0F0;width: 98%; padding: 5px 10px;'>INFORMACIÓN BÁSICA</div>
                                <br>
                                <div style='padding-left: 10px'>
                                    <p style="color: #808080; font-size: 12pt">Correo Electronico: {{$email}}</p>
                                    <br>
                                </div>
                                <span style="color: #70B125">Mensaje automatico desde Claudia Obregón</span> <i></i>

                            </tr>
                        </table>
                    </td>
                </tr>


            </table>
        </td>
    </tr>
</table>
