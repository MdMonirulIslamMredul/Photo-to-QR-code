<html lang="en" class=""><link type="text/css" id="dark-mode" rel="stylesheet" href=""><style type="text/css" id="dark-mode-сustom-style"></style><style type="text/css" id="dark-mode-theme-changer-style"></style><!--<![endif]--><head>
    <meta charset="utf-8">
    <title> ভূমি উন্নয়ন কর: Dakhila</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=600, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0, user-scalable=no" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <!-- All original CSS files included for exact styling -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css">
    <link href="https://dakhila.ldtax.gov.bd/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://dakhila.ldtax.gov.bd/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <link href="https://dakhila.ldtax.gov.bd/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://dakhila.ldtax.gov.bd/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
    <link href="https://dakhila.ldtax.gov.bd/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css">
    <link href="https://dakhila.ldtax.gov.bd/assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
    <link href="https://dakhila.ldtax.gov.bd/assets/global/css/plugins-md.css" rel="stylesheet" type="text/css">
    <link href="https://dakhila.ldtax.gov.bd/assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css">
    <link href="https://dakhila.ldtax.gov.bd/assets/admin/layout4/css/themes/light.css" rel="stylesheet" type="text/css" id="style_color">
    <link href="https://dakhila.ldtax.gov.bd/assets/admin/layout4/css/custom.css" rel="stylesheet" type="text/css">
    <link href="https://dakhila.ldtax.gov.bd/css/common.css" rel="stylesheet" type="text/css">
    <link href="https://dakhila.ldtax.gov.bd/css/style.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">
    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>

</head>
<body class="page-md page-sidebar-page-sidebar-closed-hide-logo page-header-fixed page-footer-fixed">
    <div class="clearfix"></div>
    <div class="page-container">
        <div class="page-content">
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12">

                            <div style="display: flex; margin-bottom: 1.25rem; justify-content: center; align-items: center;" class="print-button-container">
                                <button onclick="printDiv('printArea')" style="padding-top: 0.25rem; padding-bottom: 0.25rem; padding-left: 0.75rem; padding-right: 0.75rem; border-radius: 0.25rem; color: #ffffff; background-color: #3B82F6; border-color: #3B82F6;">🖨️ প্রিন্ট</button>
                            </div>
                            <div class="portlet-body">
                                <div id="printArea" class="content" style="width: 815px; margin: 0 auto;">
                                    <div class="col-md-12">
                                        <style type="text/css">
                                            body { font-family: "kalpurush", Arial, sans-serif; font-size: 13px !important; line-height: 1.2; color: #333; background-color: #fff; }
                                            .dotted_botton { border: none; border-bottom: 1px dotted #000; background-color: #fff; }
                                            .b1 { border: 1px dotted; padding: 2px; } .text-left { text-align: left } .text-right { text-align: right } .text-center { text-align: center }

                                            /* This style ensures all cells in the collection table are vertically centered. */
                                            .collection-table th, .collection-table td {
                                                vertical-align: middle !important;
                                                text-align: center; /* Ensures horizontal centering as well */
                                            }
                                        </style>
                                        <style type="text/css" media="print">
                                            @page { size: a4; margin: 0mm; } html { background-color: #FFFFFF; margin: 0px; } body { border: solid 0px blue; margin: 0mm; } .print-button-container { display: none; }
                                        </style>
                                        <div style="font-family:'kalpurush',Arial,sans-serif; font-size:14px !important; line-height:1.2;color: #333; background-color: #fff; width: 7.9in; height: 11in; border-radius: 10px; border: dotted 1px; padding: 10px; float: left; margin: 30px auto; position: relative;">
                                            <!-- HEADER AND BASIC INFO -->

                                            {{-- <img src="uploads/1762946181-69146c8561821.jpg" style="width: 100%; height: auto;"> --}}
                                            {{-- <img src="{{ asset($dakhila->file_path) }}" style="width: 100%; height: auto;"> --}}

                                            @php
                                                // 1. Get the file extension
                                                $extension = strtolower(pathinfo($dakhila->file_path, PATHINFO_EXTENSION));
                                                // 2. Check if it's a PDF
                                                $is_pdf = $extension === 'pdf';
                                                // Set dimensions for the display area
                                                $display_style = 'width: 100%; height: auto;'; // Default for images
                                                $pdf_embed_style = 'width: 100%; height: 100%;'; // Fixed height for PDF viewer
                                            @endphp

                                            @if ($is_pdf)
                                                {{-- PDF EMBED PREVIEW --}}
                                                <div style="{{ $pdf_embed_style }}">
                                                    <iframe src="{{ asset($dakhila->file_path) }}"
                                                            style="width: 100%; height: 100%; border: none;">
                                                        {{-- Fallback link --}}
                                                        <p class="text-center text-muted mt-3">
                                                            Your browser does not support embedded PDF files.
                                                            <a href="{{ asset($dakhila->file_path) }}" target="_blank">Click here to view the PDF.</a>
                                                        </p>
                                                    </iframe>
                                                </div>
                                            @else
                                                {{-- IMAGE VIEW --}}
                                                <img src="{{ asset($dakhila->file_path) }}" style="{{ $display_style }}">
                                            @endif


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            setTimeout(function() {
                window.print();
                document.body.innerHTML = originalContents;
                location.reload();
            }, 250);
        }
        function generateQRCode() {
            var qrElement = document.getElementById("qrcode");
            if (qrElement) {
                qrElement.innerHTML = "";
                // The PHP variable $current_url is now correct, so this will work as intended
                new QRCode(qrElement, { text: "mridul", width: 75, height: 75, correctLevel: QRCode.CorrectLevel.M });
            }
        }
        document.addEventListener("DOMContentLoaded", function() { generateQRCode(); });
    </script>

<div id="gtx-trans" style="position: absolute; left: 938px; top: 225px;"><div class="gtx-trans-icon"></div></div></body></html>
