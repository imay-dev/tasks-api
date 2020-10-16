<html xmlns="http://www.w3.org/1999/xhtml"
>
<script src="chrome-extension://ljdobmomdgdljniojadhoplhkpialdid/page/prompt.js"></script>
<script src="chrome-extension://ljdobmomdgdljniojadhoplhkpialdid/page/runScript.js"></script>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Created</title>
    <style type="text/css">
        /* ----- Custom Font Import ----- */
        @import url(https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic&subset=latin,latin-ext);

        /* ----- Text Styles ----- */
        table {
            font-family: 'Lato', Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: antialiased;
            font-smoothing: antialiased;
        }

        @media only screen and (max-width: 700px) {
            /* ----- Base styles ----- */
            .full-width-container {
                padding: 0 !important;
            }

            .container {
                width: 100% !important;
            }
            .header td {
                padding: 30px 15px 30px 15px !important;
            }
            .projects-list tr {
                display: block !important;
            }

            .projects-list td {
                display: block !important;
            }

            .projects-list tbody {
                display: block !important;
            }

            .projects-list img {
                margin: 0 auto 25px auto;
            }


            .half-block tr {
                display: block !important;
            }

            .half-block td {
                display: block !important;
            }

            /* ----- Hero subheader ----- */
            .hero-subheader__title {
                padding: 80px 15px 15px 15px !important;
                font-size: 35px !important;
            }

            .hero-subheader__content {
                padding: 0 15px 90px 15px !important;
            }


            .info-bullets tr {
                display: block !important;
            }

            .info-bullets td {
                display: block !important;
            }

            .info-bullets tbody {
                display: block;
            }
        }
    </style>

    <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml><![endif]-->
</head>

<body style="padding: 0; margin: 0;" bgcolor="#eeeeee">
<span
    style="color:transparent !important; overflow:hidden !important; display:none !important; line-height:0px !important; height:0 !important; opacity:0 !important; visibility:hidden !important; width:0 !important; mso-hide:all;">This is your preheader text for this email (Read more about email preheaders here - https://goo.gl/e60hyK)</span>

<!-- / Full width container -->
<table class="full-width-container" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%"
       bgcolor="#eeeeee" style="width: 100%; height: 100%; padding: 30px 0 30px 0;">
    <tbody>
    <tr>
        <td align="center" valign="top">
            <!-- / 700px container -->
            <table class="container" border="0" cellpadding="0" cellspacing="0" width="700" bgcolor="#ffffff"
                   style="width: 700px;">
                <tbody>
                <tr>
                    <td align="center" valign="top">
                        <!-- / Header -->
                        <table class="container header" border="0" cellpadding="0" cellspacing="0" width="620"
                               style="width: 620px;">
                            <tbody>
                            <tr>
                                <td style="padding: 30px 0 30px 0; border-bottom: solid 1px #eeeeee;" align="left">
                                    <a href="#" style="font-size: 30px; text-decoration: none; color: #000000;">Tasks</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- /// Header -->

                        <!-- / Hero subheader -->
                        <table class="container hero-subheader" border="0" cellpadding="0" cellspacing="0" width="620"
                               style="width: 620px;">
                            <tbody>
                            <tr>
                                <td class="hero-subheader__title"
                                    style="font-size: 28px; font-weight: bold; padding: 80px 0 15px 0;" align="left">
                                    A task has been created
                                </td>
                            </tr>

                            <tr>
                                <td class="hero-subheader__content"
                                    style="font-size: 16px; line-height: 27px; color: #969696; padding: 0 60px 90px 0;"
                                    align="left">
                                    <b>Title:</b> {{ $title }} <br>
                                    <b>Description:</b> {{ $description }}
                                </td>
                            </tr>
                            </tbody>
                        </table>


                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>
