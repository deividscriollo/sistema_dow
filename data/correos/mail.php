<?php
require 'PHPMailer/PHPMailerAutoload.php';
//require 'prueba.php';
/**
* Clase email que se extiende de PHPMailer
*/
class email  extends PHPMailer{

    //datos de remitente
    var $tu_email = 'attp.hgton@gmail.com';
    var $tu_nombre = 'TOTORA SISA';
    var $tu_password ='kangaroo@123';

    /**
 * Constructor de clase
 */
    public function __construct()
    {
      //configuracion general
     $this->IsSMTP(); // protocolo de transferencia de correo
     $this->Host = 'smtp.gmail.com';  // Servidor GMAIL
     $this->Port = 465; //puerto
     $this->SMTPAuth = true; // Habilitar la autenticación SMTP
     $this->Username = $this->tu_email;
     $this->Password = $this->tu_password;
     $this->SMTPSecure = 'ssl';  //habilita la encriptacion SSL
     //remitente
     $this->From = $this->tu_email;
    $this->FromName = $this->tu_nombre;
    }

    /**
 * Metodo encargado del envio del e-mail
 */
    public function enviar( $para, $nombre, $titulo , $contenido, $archivo)
    {
       $this->AddAddress( $para ,  $nombre );  // Correo y nombre a quien se envia
       $this->WordWrap = 50; // Ajuste de texto
       $this->IsHTML(true); //establece formato HTML para el contenido
       $this->Subject =$titulo;
       $this->Body    =  $contenido; //contenido con etiquetas HTML
       $this->AltBody =  strip_tags($contenido); //Contenido para servidores que no aceptan HTML
       $this->AddAttachment('../correos/factura_electronicaid.zip');
       //envio de e-mail y retorno de resultado
       return $this->Send() ;
   }

}//--> fin clase

/* == se emplea la clase email == */
function envio_correo_ventas($correoa, $nombre, $total_factura, $link, $num_factura){

  $res=0;
  $contenido_html =  '
  <!DOCTYPE html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
      <meta name="viewport" content="initial-scale=1.0">
      <meta name="format-detection" content="telephone=no">
      <style type="text/css">
        body {
          width: 100%;
          margin: 0;
          padding: 0;
          -webkit-font-smoothing: antialiased;
        }
        @media only screen and (max-width: 600px) {
          table[class="table-row"] {
            float: none !important;
            width: 98% !important;
            padding-left: 20px !important;
            padding-right: 20px !important;
          }
          table[class="table-row-fixed"] {
            float: none !important;
            width: 98% !important;
          }
          table[class="table-col"], table[class="table-col-border"] {
            float: none !important;
            width: 100% !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
            table-layout: fixed;
          }
          td[class="table-col-td"] {
            width: 100% !important;
          }
          table[class="table-col-border"] + table[class="table-col-border"] {
            padding-top: 12px;
            margin-top: 12px;
            border-top: 1px solid #E8E8E8;
          }
          table[class="table-col"] + table[class="table-col"] {
            margin-top: 15px;
          }
          td[class="table-row-td"] {
            padding-left: 0 !important;
            padding-right: 0 !important;
          }
          table[class="navbar-row"] , td[class="navbar-row-td"] {
            width: 100% !important;
          }
          img {
            max-width: 100% !important;
            display: inline !important;
          }
          img[class="pull-right"] {
            float: right;
            margin-left: 11px;
                  max-width: 125px !important;
            padding-bottom: 0 !important;
          }
          img[class="pull-left"] {
            float: left;
            margin-right: 11px;
            max-width: 125px !important;
            padding-bottom: 0 !important;
          }
          table[class="table-space"], table[class="header-row"] {
            float: none !important;
            width: 98% !important;
          }
          td[class="header-row-td"] {
            width: 100% !important;
          }
        }
        @media only screen and (max-width: 480px) {
          table[class="table-row"] {
            padding-left: 16px !important;
            padding-right: 16px !important;
          }
        }
        @media only screen and (max-width: 320px) {
          table[class="table-row"] {
            padding-left: 12px !important;
            padding-right: 12px !important;
          }
        }
        @media only screen and (max-width: 608px) {
          td[class="table-td-wrap"] {
            width: 100% !important;
          }
        }
      </style>
    </head>
   <body style="font-family: Arial, sans-serif; font-size: 13px; color: rgb(68, 68, 68); min-height: 200px;" bgcolor="#E4E6E9" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0" cz-shortcut-listen="true">

    <table width="100%" height="100%" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0">
      <tbody>
        <tr>
          <td width="100%" align="center" valign="top" bgcolor="#E4E6E9" style="background-color:#E4E6E9; min-height: 200px;">
            <table style="table-layout: auto; width: 100%; background-color: #438eb9;" width="100%" bgcolor="#438eb9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td width="100%" align="center" style="width: 100%; background-color: #438eb9;" bgcolor="#438eb9" valign="top"><table class="table-row-fixed" height="50" width="600" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="navbar-row-td" valign="middle" height="50" width="600" data-skipstyle="true" align="left">
           <table class="table-row" style="table-layout: auto; padding-right: 16px; padding-left: 16px; width: 600px;" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px;">
             <td class="table-row-td" style="padding-right: 16px; font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; vertical-align: middle;" valign="middle" align="left">
               <a href="#" style="color: #ffffff; text-decoration: none; padding: 10px 0px; font-size: 18px; line-height: 20px; height: auto; background-color: transparent;">
              Totora SISA s.c.c
             </a>
             </td>
           
             <td class="table-row-td" align="right" valign="middle" style="font-family: Arial, sans-serif; line-height: 19px; color: #FFFFFF; font-size: 13px; font-weight: normal; text-align: right; vertical-align: middle;">
              papel hecho a mano
             </td>
           </tr></tbody></table>
          </td></tr></tbody></table></td></tr></tbody></table>
            <table>
              <tbody>
                <tr>
                  <td class="table-td-wrap" align="center" width="608">
                    
                    <table class="table-space" height="6" style="height: 6px; font-size: 0px; line-height: 0; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="6" style="height: 6px; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" align="left">&nbsp;</td></tr></tbody></table>
                    <table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>

                    <table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 24px; padding-right: 24px;" valign="top" align="left">
                     <table class="table-col" align="left" width="552" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="552" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">  
                      <div style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; text-align: center;">
                        <img src="https://raw.githubusercontent.com/deividscriollo/sistema_dow/master/empresa/banner_correo.jpg" style="border: 0px none #444444; vertical-align: middle; display: block; padding-bottom: 9px;" hspace="0" vspace="0" border="0">
                      </div>
                     </td></tr></tbody></table>
                    </td></tr></tbody></table>

                    <table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0">
                      <tbody>
                        <tr>
                          <td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
                           <table class="table-col" align="left" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="528" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
                           <table class="header-row" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="header-row-td" width="528" style="font-size: 28px; margin: 0px; font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #478fca; padding-bottom: 10px; padding-top: 15px;" valign="top" align="left">Estimado, '.$nombre.'</td></tr></tbody></table>
                           </td></tr></tbody></table>
                          </td>
                        </tr>
                      </tbody>
                    </table>


    <table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
    <table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
       <table class="table-col" align="left" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="528" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
       
       </td></tr></tbody></table>
    </td></tr></tbody></table>
    <table class="table-space" height="24" style="height: 24px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="24" style="height: 24px; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
    <table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
     <table class="table-col" align="left" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="528" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; width: 528px;" valign="top" align="left">
      <table class="header-row" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="header-row-td" width="528" style="font-family: Arial, sans-serif;  color: #6397bf; margin: 010px; font-size: 18px; " valign="top" align="right">Resumen de su factura</td></tr></tbody></table>
     </td></tr></tbody></table>
    </td></tr></tbody></table>
    <div style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px;">
      <table class="table-row" style="table-layout: auto; padding-right: 24px; padding-left: 24px; width: 600px; background-color: #ffffff;" bgcolor="#FFFFFF">
        <thead>
          <tr style="background-color: red;">
            <td></td>
            <td></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #6397bf; margin: 010px; font-size: 18px; padding-bottom: 8px; padding-top: 10px;">Ruc</td>
            <td>1091712381001</td>      
          </tr>
          <tr>
            <td style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #6397bf; margin: 010px; font-size: 18px; padding-bottom: 8px; padding-top: 10px;">Numero Factura</td>
            <td>'.$num_factura.'</td>      
          </tr>
          <tr>
            <td style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #6397bf; margin: 010px; font-size: 18px; padding-bottom: 8px; padding-top: 10px;">Fecha Emisión</td>
            <td>18/02/2015</td>      
          </tr>
          <tr>
            <td style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #6397bf; margin: 010px; font-size: 18px; padding-bottom: 8px; padding-top: 10px;">Autorización Factura Electrónica</td>
            <td>1115375970985766689345609834563</td>
          </tr>
          <tr>
            <td style="background: #edf3f9; font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #6397bf; margin: 010px; font-size: 18px; padding-bottom: 8px; padding-top: 10px;">Valor a Pagar</td>
            <td style="background: #d4f9aa;">'.$total_factura.'</td>      
          </tr>
          <tr>
            <td style="background: #edf3f9; font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #6397bf; margin: 010px; font-size: 18px; padding-bottom: 8px; padding-top: 10px;">Fecha Maximo de Pago</td>
            <td style="background: #d4f9aa;">18/03/2015</td>      
          </tr>
        </tbody>
      </table>
    <table class="table-space" height="8" style="height: 8px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="8" style="height: 8px; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
      <table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
       <table class="table-col" align="left" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="528" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
       <table width="60%" align="center" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td width="100%" bgcolor="#d9edf7" style="font-family: Arial, sans-serif; line-height: 19px; color: #31708f; font-size: 14px; font-weight: normal; padding: 15px; border: 1px solid #bce8f1; background-color: #f9d2aa;" valign="top" align="left">
         Si requiere su factura electrónica para la declaración tributaria del SRI. 
         <br>
         <a href="'.$link.'" style="color: #428bca; text-decoration: none; background-color: transparent;"> Dar clic Aqui</a>
       </td></tr></tbody></table>
       </td></tr></tbody></table>
    </td></tr></tbody></table>

    </div>
    <table class="table-space" height="8" style="height: 8px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="8" style="height: 8px; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
    <table class="table-space" height="24" style="height: 24px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="24" style="height: 24px; width: 600px; padding-left: 18px; padding-right: 18px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="center">&nbsp;<table bgcolor="#E8E8E8" height="0" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td bgcolor="#E8E8E8" height="1" width="100%" style="height: 1px; font-size:0;" valign="top" align="left">&nbsp;</td></tr></tbody></table></td></tr></tbody></table>


    <table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
       <table class="table-col" align="left" width="273" style="padding-right: 18px; table-layout: fixed;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-col-td" width="255" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
      <table class="header-row" width="255" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="header-row-td" width="255" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #478fca; margin: 0px; font-size: 18px; padding-bottom: 8px; padding-top: 10px;" valign="top" align="left">Nuestros Redes Sociales</td></tr></tbody></table>
      
      <div style="font-family: Arial, sans-serif; line-height: 36px; color: #444444; font-size: 13px;">
        <a href="https://www.facebook.com/empressatotorasisa?fref=ts" style="color: #ffffff; text-decoration: none; margin: 0px; text-align: center; vertical-align: baseline; border: 4px solid #6fb3e0; padding: 4px 9px; font-size: 14px; line-height: 19px; background-color: #6fb3e0;">Twitter</a>
        <a href="https://www.facebook.com/empressatotorasisa?fref=ts" style="color: #6688a6; text-decoration: none; margin: 0px; text-align: center; vertical-align: baseline; border-width: 1px 1px 2px; border-style: solid; border-color: #8aafce; padding: 6px 12px; font-size: 14px; line-height: 20px; background-color: #ffffff;">Facebook</a>
        <a href="" style="color: #b7837a; text-decoration: none; margin: 0px; text-align: center; vertical-align: baseline; border-width: 1px 1px 2px; border-style: solid; border-color: #d7a59d; padding: 6px 12px; font-size: 14px; line-height: 20px; background-color: #ffffff;">Google+</a>
      </div>
       </td></tr></tbody></table>
       
       <table class="table-col" align="left" width="255" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="255" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
      <table class="header-row" width="255" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="header-row-td" width="255" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #478fca; margin: 0px; font-size: 18px; padding-bottom: 8px; padding-top: 10px;" valign="top" align="left">Nuestra información de contacto</td></tr></tbody></table>
      Tel 2919-508
      <br> 
      Cel.: 0988598926-0988449456
      <br>
      Email:  totorasisa@yahoo.com
       </td></tr></tbody></table>    
    </td></tr></tbody></table>
    <table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>


    <table class="table-space" height="6" style="height: 6px; font-size: 0px; line-height: 0; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="6" style="height: 6px; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" align="left">&nbsp;</td></tr></tbody></table>
    <table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
     <table class="table-col" align="left" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="528" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
       <table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
       <div style="font-family: Arial, sans-serif; line-height: 19px; color: #777777; font-size: 14px; text-align: center;">© 2014 Totora Sisa</div>
       <table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
       <div style="font-family: Arial, sans-serif; line-height: 19px; color: #bbbbbb; font-size: 13px; text-align: center;">
        <a href="http://responsiweb.com/themes/preview/ace/1.3.3/build/demo/email-newsletter.html#" style="color: #428bca; text-decoration: none; background-color: transparent;">Terminos de Uso</a>
        &nbsp;|&nbsp;
        <a href="http://responsiweb.com/themes/preview/ace/1.3.3/build/demo/email-newsletter.html#" style="color: #428bca; text-decoration: none; background-color: transparent;">Privacidad</a>
        &nbsp;|&nbsp;
       </div>
       <table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
     </td></tr></tbody></table>
    </td></tr></tbody></table>
    <table class="table-space" height="8" style="height: 8px; font-size: 0px; line-height: 0; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="8" style="height: 8px; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" align="left">&nbsp;</td></tr></tbody></table></td></tr></tbody></table>
    </td></tr>
     </tbody></table>
    </body>
  </html>
  ';
  
  $email = new email();
  if ($email->enviar( $correoa , 'TOTORA SISA' , 'FACTURA ELECTRONICA' ,  $contenido_html,'df') )
     $res=1;
  else
  {
     $res=0;
  }
  return $res;
}






//envio_correo_ventas('deividscriollo@gmail.com','deivid C','678567',$filename,'1234');
?>