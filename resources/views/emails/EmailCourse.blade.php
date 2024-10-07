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
                    <td width="100%" style="width:100%; text-align: center; border:0; padding: 0;">
                        <a target="_blank" href="{{$http}}"><img src="{{$http}}/img/banner_mail.jpg" style="width:100%; display: block" ></a>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" bgcolor="#F2F2F2" width="100%" style="width:100%; text-align: center; border:0; padding: 0; background-color: #F2F2F2;">
                        <table cellpadding="0" align="center" cellspacing="0" border="0" width="400">
                            <tr>
                                <td align="center" border="0" style="padding-top: 20px; padding-bottom: 20px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13pt; color: #808080; line-height: 1.5em;">
                                    <span style="color: #70B125; font-weight: bold; font-size: 12pt">Buenas {{$user->name}}  <br> </span>
                                    Usted ha realizado una compra de un curso desde <a target="_blank" href='{{$http}}/' style='text-decoration: none'><span style='font-weight:700;font-size: 16px;color: #1C3465;'>{{$http}}</span></a>.<br>
                                    Queremos informarle que los datos seran suministrados aqui.
                                    <br>
                                    <div style='background: #70B125; color: #F0F0F0;width: 98%; padding: 5px 10px;'>INFORMACIÓN BÁSICA</div>
                                    <br>
                                    <div style='padding-left: 10px'>
                                        Estado: {{$status}} <br>
                                        Nombre: {{$course->titulo}} <br>
                                        Total: {{$courseP->total}} USD <br>
                                    </div>
                                    <span style="color: #70B125">Mensaje automatico desde Claudia Obregon.</span> <i></i>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top" width="100%" bgcolor="#000000" style="width:100%; border:0; padding-top: 40px; padding-bottom: 40px; background-color: #70B125">
                        <table cellpadding="0" cellspacing="0" align="center" border="0" width="550" style="width: 550px; border-collapse: collapse">
                            <tr>
                                <td width="12.33%" border="0" align="center" valign="center" style="width: 12.33%; line-height: 1.3em; letter-spacing: 1px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 8pt; color: #D1A044;">
                                    <a target="_blank" style="color: #F0F0F0; text-decoration: none" href="{{$http}}">INICIO</a>
                                </td>
                                <td width="5.2%" border="0" align="center" valign="center" style="width: 5.2%; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 8pt; color: #ffffff;">|</td>
                                <td width="12.33%" border="0" align="center" valign="center" style="width: 12.33%; line-height: 1.3em; letter-spacing: 1px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 8pt; color: #ffffff;">
                                    <a target="_blank" style="color: #F0F0F0; text-decoration: none" href="{{$http}}/conoceme">CONOCEME</a>
                                </td>
                                <td width="5.2%" border="0" align="center" valign="center" style="width: 5.2%; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 8pt; color: #ffffff;">|</td>
                                <td width="12.33%" border="0" align="center" valign="center" style="width: 12.33%; line-height: 1.3em; letter-spacing: 1px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 8pt; color: #ffffff;">
                                    <a target="_blank" style="color: #F0F0F0; text-decoration: none" href="{{$http}}/contacto">CONTACTO</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top" width="100%" bgcolor="" style="width:100%; border:0; padding-top: 20px;padding-bottom: 20px;">
                        <table cellpadding="0" cellspacing="0" align="center" border="0" width="550" style="width: 550px; border-collapse: collapse;">
                            <tr>
                                <td align="left" valign="bottom" width="50%" bgcolor="#ffffff" style="width: 50%; line-height: 1.3em; letter-spacing: 1px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 8pt; color: #ffffff;background-image: url('{{$http}}/img/footer/background.png')">
                                    <a target="_blank" href="{{$http}}"><img style="padding-bottom: 20px;width: 100px;" src="{{$http}}/img/logo.png" alt="2-04"></a><br>
                                </td>
                                <td align="right" valign="bottom" width="50%" bgcolor="#ffffff" style="width: 50%; line-height: 1.3em; letter-spacing: 1px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 8pt; color: #70B125;">
                                    <a  style="color: #70B125; text-decoration: none" href="{{$http}}"><b>CONTÁCTENOS</b></a><br><br>
                                    Claudia Obregon,<br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
