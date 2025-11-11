<!DOCTYPE html>
<!-- saved from url=(0219)https://erevenue.dncc.gov.bd/Tradelicense/rpt_TradeLicense_tinyurl_print.aspx?id=e356d3b9-d0d9-4e81-a431-ca745dbca7e7&printtype=dwaRpcdzXN8ksZBGu3vFcQ%3D%3D&transactionno=9rjXPQiTW0YxLgPS7gtdA3He1TAn3%2FWO2x6sydOT8qs%3D -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>

</title>
    <style>
        form {
            min-height: 0px;
            background-color: #FFF;
        }

        @page {
            size: auto; /* auto is the initial value */
            /* this affects the margin in the printer settings */
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }
        }

        h3 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            color: black;
        }

        .style1 {
            font-size: 12px;
        }

        td.container {
            height: 20px;
        }

        /* --- WATERMARK STYLES RE-INTRODUCED --- */
        .waterMark {
            position: absolute; /* Position it relative to .fullBody */
            top: 320px; /* Start position to place it over the main content area */
            left: 0;
            right: 0;
            width: 100%;
            height: 600px;
            background-image: url('/images/dncc_logo.png'); /* Use your local logo path */
            background-size: 500px 500px;
            background-repeat: no-repeat;
            background-position: center;
            opacity: 0.1; /* Control the transparency of only the watermark */
            z-index: ; /* Send it behind the content */
        }
        /* --- END WATERMARK STYLES --- */

        .fullBody {
            position: relative; /* Set this as the reference point for the absolute watermark */
            top: 25px;
            bottom: 0px;
            left: auto;
            right: auto;
            width: 900px;
            /* Removed background-image and opacity from here! */
        }

        .auto-style1 {
            width: 122px;
        }

        .auto-style3 {
            width: 25%;
            font-size: 12px;
        }

        .auto-style4 {
            width: 16%;
            font-size: 12px;
        }

        .auto-style5 {
            width: 100%;
        }
    </style>

</head>
<body data-new-gr-c-s-check-loaded="14.1251.0" data-gr-ext-installed="">
    <form method="post" action="https://erevenue.dncc.gov.bd/Tradelicense/rpt_TradeLicense_tinyurl_print.aspx?id=e356d3b9-d0d9-4e81-a431-ca745dbca7e7&amp;printtype=dwaRpcdzXN8ksZBGu3vFcQ%3d%3d&amp;transactionno=9rjXPQiTW0YxLgPS7gtdA3He1TAn3%2fWO2x6sydOT8qs%3d" id="form1">
<div class="aspNetHidden">
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUINjM4ODQ1MTNkZKUh2049ojU49rSQ+ScAhr0sBNJU3XPsrfFfB/Typpnz">
</div>

<div class="aspNetHidden">

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="324B4B92">
</div>

		{{-- The Watermark div is now inside the fullBody div below --}}

        <div style="width: 900px; padding-top: 0px;" class="fullBody">

            {{-- THE WATERMARK DIV FOR BACKGROUND IMAGE --}}
            <div class="waterMark"></div>

            <div style="width: 900px; text-align: center; padding-top: 1px;">



                <div style="width: 900px; text-align: center; padding-top: 0px;">


                    <table id="header" width="900" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tbody>
                            <tr>
                                <td width="300">

                                </td>
                                <td width="600">
                                    <h2 style="color: darkslategrey">ঢাকা উত্তর সিটি কর্পোরেশন</h2>

                                </td>
                                <td width="300">&nbsp;</td>
                            </tr>
                            <tr>
                                {{--
                                    START: QR CODE AND ISSUE DETAILS BLOCK
                                    This replaces the old issue date/time table structure.
                                --}}
                                <td width="300" rowspan="5">
                                    <div style="text-align: center; padding: 10px 0;">

                                        {{-- QR Code Image Placeholder --}}
                                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode($licence->licence_number) }}"
                                             alt="QR Code" style="width: 150px; height: 150px; margin-bottom: 5px;">

                                        {{-- Title: লাইসেন্স ইস্যুর বিবরণ --}}
                                        <p style="font-weight: bold; font-size: 14px; margin: 0; padding-top: 5px;">লাইসেন্স ইস্যুর বিবরণ</p>

                                        <hr style="width: 80%; border: 0.5px solid #000; margin: 5px auto;">
                                    </div>

                                    {{-- Issue Date and Time Table --}}
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left: 10px; text-align: left;">
                                        <tbody>
                                            <tr>
                                                <td style="width: 100px; font-size: 12px; padding-bottom: 2px;">ইস্যুর তারিখ</td>
                                                <td style="font-size: 12px;">: <font face="SutonnyAMJ">{{ $licence->t_issue_date }}</font></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 100px; font-size: 12px; padding-bottom: 2px;">ইস্যুর সময়</td>
                                                <td style="font-size: 12px;">: <font face="SutonnyAMJ">{{ $licence->t_issue_time }}</font></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                {{-- END: QR CODE AND ISSUE DETAILS BLOCK --}}

                                <td width="300">
                                    <div style="vertical-align: 0px">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr style="padding-top: 0px">
                                                    <td style="vertical-align: top;">www.dncc.gov.bd</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                </td>
                              <td rowspan="5" width="300">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <img src="{{ $licence->applicant_image }}" style="width: 200px; height: 200px;">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>


                                </td>

                            </tr>
                            <tr>

                                <td width="300">

                                     <img src="/images/dncc_logo.png" style="width: 100px; height: 100px;">
                                </td>
                            </tr>
                            <tr>
                                <td>

                                    <h2>ই-ট্রেড লাইসেন্স </h2>





                                </td>
                            </tr>
                            <tr>

                                <td width="300">



                                    <h3>লাইসেন্স নং&nbsp;&nbsp;&nbsp; : {{ $licence->licence_number }}  </h3>

                                </td>

                            </tr>
                            <tr>
                            </tr>

                        </tbody>
                    </table>


                </div>

            </div>

            <div style="width: 900px; padding-top: 12px;">
                <table id="body" width="900" border="0" cellspacing="0" cellpadding="0" align="center" style="border: 2px solid #E3DFCB;">
                    <tbody><tr>
                        <td style="color: darkslategrey; font-size: 12px;">
                        স্থানীয় সরকার (সিটি কর্পোরেশন) আইন, ২০০৯ (২০০৯ সনের ৬০ নং আইন) এর ধারা ৮৪- তে প্রদত্ত ক্ষমতাবলে সরকার প্রণীত আদর্শ কর তফসিল, ২০১৬ এর ১০ অনুচ্ছেদ অনুযায়ী ব্যবসা, বৃত্তি, পেশা বা শিল্প প্রতিষ্ঠানের উপর আরোপিত কর আদায়ের লক্ষ্যে নিন্মে বর্ণিত ব্যক্তি/ প্রতিষ্ঠানের আনুকূলে অত্র ট্রেড লাইসেন্সটি ইস্যু করা হলো।

                        </td>
                    </tr>

                </tbody></table>
            </div>

            <div style="width: 900px; padding-top: 10px;">
                <table id="body" width="900" border="0" cellspacing="0" cellpadding="0" align="left" style="border: 2px solid #E3DFCB;">
                    <tbody>
                        <tr>
                            <td width="3%" style="font-weight: bold; text-align: right; font-size: 12px;">১।</td>
                            <td class="auto-style3" style="font-weight: bold">&nbsp; ব্যবসা প্রতিষ্ঠানের নাম</td>
                            <td width="2%">:</td>
                            <td style="font-weight: bold; font-family: sutonnyMJ; font-size: 12px;" colspan="4">{{ $licence->business_name  }}</td>


                        </tr>
                        <tr>
                            <td width="3%" style="font-weight: bold; text-align: right; font-size: 12px;">২।</td>
                            <td class="auto-style3" style="font-weight: bold">&nbsp;&nbsp;প্রতিষ্ঠানের মালিকের নাম</td>
                            <td width="2%">:</td>
                            <td style="font-weight: bold; font-family: sutonnyMJ; font-size: 12px;" colspan="4">{{ $licence->applicant_name   }}</td>

                        </tr>
                        <tr>
                            <td width="3%" style="font-weight: bold; text-align: right; font-size: 12px;">৩।</td>
                            <td class="auto-style3" style="font-weight: bold">&nbsp; পিতা / স্বামীর নাম</td>
                            <td width="2%">:</td>
                            <td style="font-weight: bold; font-family: sutonnyMJ; font-size: 12px;">{{ $licence->father_husband_name  }}</td>
                            <td class="auto-style4"></td>
                            <td width="10%"></td>
                            <td width="10%"></td>
                        </tr>
                        <tr>
                            <td width="3%" style="font-weight: bold; text-align: right; font-size: 12px;">৪।</td>
                            <td class="auto-style3" style="font-weight: bold">&nbsp; মাতার নাম</td>
                            <td width="2%">:</td>
                            <td style="font-weight: bold; font-family: sutonnyMJ; font-size: 12px;">{{ $licence->mother_name }}</td>
                            <td class="auto-style4"></td>
                            <td width="10%"></td>
                            <td width="10%"></td>
                        </tr>
                        <tr>
                            <td width="3%" style="font-weight: bold; text-align: right; font-size: 12px;">৫।</td>
                            <td class="auto-style3" style="font-weight: bold">&nbsp; ব্যবসার প্রকৃতি&nbsp;</td>
                            <td width="2%">:</td>
                            <td style="font-weight: bold; font-family: sutonnyMJ; font-size: 12px;">{{ $licence->business_nature }}</td>
                            <td class="auto-style4"></td>
                            <td width="10%"></td>
                            <td width="10%"></td>
                        </tr>
                        <tr>
                            <td width="3%" style="font-weight: bold; text-align: right; font-size: 12px; vertical-align: top;">৬।</td>
                            <td class="auto-style3" style="font-weight: bold; vertical-align: top;">&nbsp; ব্যবসার ধরণ</td>
                            <td width="2%" style="vertical-align: top;">:</td>
                            <td colspan="4" style="font-weight: bold; font-size: 12px; vertical-align: top; font-family: sutonnyMJ;">{{ $licence->business_type }}</td>

                        </tr>
                        <tr>
                            <td width="3%" style="font-weight: bold; text-align: right; font-size: 12px;">৭।</td>
                            <td class="auto-style3" style="font-weight: bold;">&nbsp; প্রতিষ্ঠানের ঠিকানা </td>
                            <td width="2%">:</td>
                            <td colspan="4" style="font-weight: bold; font-family: sutonnyMJ; font-size: 12px;">{{ $licence->business_address }}</td>

                        </tr>







                        <tr>
                            <td width="3%" style="font-weight: bold; text-align: right; font-size: 12px;">৮। </td>
                            <td class="auto-style3" style="font-weight: bold; font-size: 12px; border-top: solid; border-width: 1px">&nbsp; অঞ্চল / বাজার শাখা</td>
                            <td width="2%">:</td>
                            <td width="15%" style="font-weight: bold; font-size: 12px;"> {{ $licence->regional }}</td>
                            <td style="font-weight: bold; font-size: 12px; text-align: right;" class="auto-style4">ওয়ার্ড / মার্কেট</td>
                            <td width="2%">:</td>
                            <td width="15%" style="font-weight: bold; font-size: 12px; font-family: sutonnyMJ">{{ $licence->word_no }}</td>
                        </tr>
                        <tr>
                            <td width="3%">&nbsp;</td>
                            <td class="auto-style3" style="font-weight: bold; font-size: 12px;">&nbsp; এলাকা</td>
                            <td width="2%">:</td>
                            <td width="15%" style="font-weight: bold; font-size: 12px;">{{ $licence->area }}</td>
                            <td class="auto-style4">&nbsp;</td>
                            <td width="2%">&nbsp;</td>
                            <td width="15%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="3%">&nbsp;</td>
                            <td class="auto-style3" style="font-weight: bold">&nbsp;</td>
                            <td width="2%">&nbsp;</td>
                            <td width="15%">&nbsp;</td>
                            <td class="auto-style4">&nbsp;</td>
                            <td width="2%">&nbsp;</td>
                            <td width="15%">&nbsp;</td>
                        </tr>



                        <tr>
                            <td width="3%">&nbsp;</td>
                            <td class="auto-style3" style="font-weight: bold">&nbsp;</td>
                            <td width="2%">&nbsp;</td>
                            <td width="15%">&nbsp;</td>
                            <td class="auto-style4">&nbsp;</td>
                            <td width="2%">&nbsp;</td>
                            <td width="15%">&nbsp;</td>
                        </tr>

                        <tr>
                            <td width="3%" style="font-weight: bold; text-align: right; font-size: 12px;">৯।</td>
                            <td class="auto-style3" style="font-weight: bold; font-size: 12px; font-size: 12px;">&nbsp; এনআইডি/পাসপোর্ট/জন্ম নিব: নং</td>
                            <td width="2%">:</td>
                            <td width="15%" style="font-size: 12px;">{{ $licence->nid_number }}
 </td>
                            <td style="font-weight: bold; font-size: 12px; text-align: right;" class="auto-style4">বিআইএন নং</td>
                            <td width="2%">:</td>
                            <td width="5%" style="font-size: 12px;"></td>
                        </tr>
                        <tr>
                            <td width="3%">&nbsp;</td>
                            <td class="auto-style3" style="font-weight: bold; font-size: 12px;">&nbsp; ফোন&nbsp; </td>
                            <td width="2%">:</td>
                            <td width="15%" style="font-size: 12px;">{{ $licence->mobile_number}}</td>
                            <td style="font-weight: bold; font-size: 12px; text-align: right;" class="auto-style4;">ই-মেইল</td>
                            <td width="2%">:</td>
                            <td width="5%" style="font-size: 12px"> </td>
                        </tr>
                        <tr>
                            <td width="3%">&nbsp;</td>
                            <td class="auto-style3" style="font-weight: bold">&nbsp;</td>
                            <td width="2%">&nbsp;</td>
                            <td width="15%">&nbsp;</td>
                            <td style="font-weight: bold" class="auto-style4">&nbsp;</td>
                            <td width="2%">&nbsp;</td>
                            <td width="5%">&nbsp;</td>
                        </tr>



                        <tr>
                            <td width="3%" style="font-weight: bold; text-align: right; font-size: 12px;">১০।</td>
                            <td class="auto-style3" style="font-weight: bold; font-size: 12px;">&nbsp; অর্থ বছর</td>
                            <td width="2%">:</td>
                            <td width="15%" style="font-family: sutonnyMJ; font-size: 12px;">{{ $licence->fiscal_year}} [নবায়নকৃত] </td>
                            <td style="font-weight: bold; font-size: 12px; text-align: right;" class="auto-style4">ব্যবসা শুরুর তারিখ</td>
                            <td width="2%">:</td>
                            <td width="5%" style="font-family: sutonnyMJ; font-size: 12px;">{{ $licence->business_start_date }}</td>
                        </tr>




                        <tr>
                            <td width="3%" style="font-weight: bold; text-align: right; font-size: 12px;">১১।</td>
                            <td class="auto-style3" style="font-weight: bold; border-bottom: solid; border-width: 1px; font-size: 12px;">&nbsp; মালিকের বর্তমান ঠিকানা<br>
                            </td>
                            <td width="2%">&nbsp;</td>
                            <td width="15%">&nbsp;</td>
                            <td style="font-weight: bold; border-bottom: solid; border-width: 1px; font-size: 12px;" class="auto-style4;font-size: 12px;">মালিকের স্থায়ী ঠিকানা</td>
                            <td width="2%">&nbsp;</td>
                            <td width="5%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="3%">&nbsp;</td>
                            <td class="auto-style3">&nbsp; হোল্ডিং নং </td>
                            <td width="2%">:</td>
                            <td width="15%" style="font-size: 12px; font-family: sutonnyMJ">{{ $licence->pres_holding }}</td>
                            <td class="auto-style4">হোল্ডিং নং </td>
                            <td width="0%">:</td>
                            <td width="5%" style="font-size: 12px; font-family: sutonnyMJ">{{ $licence->perm_holding }}</td>
                        </tr>
                        <tr>
                            <td width="3%">&nbsp;</td>
                            <td class="auto-style3" ts="">&nbsp; রোড নং
                            </td>
                            <td width="2%">:</td>
                            <td width="15%" style="font-size: 12px; font-family: sutonnyMJ">{{ $licence->pres_road }}  </td>
                            <td class="auto-style4">রোড নং
                            </td>
                            <td width="2%">:</td>
                            <td width="5%" style="font-size: 12px; font-family: sutonnyMJ">{{ $licence->perm_road }}</td>
                        </tr>
                        <tr>
                            <td width="3%">&nbsp;</td>
                            <td class="auto-style3">&nbsp; গ্রাম / মহল্লা </td>
                            <td width="2%">:</td>
                            <td width="15%" style="font-size: 12px; font-family: sutonnyMJ">{{ $licence->pres_village }}</td>
                            <td class="auto-style4">গ্রাম / মহল্লা </td>
                            <td width="2%">:</td>
                            <td width="5%" style="font-size: 12px; font-family: sutonnyMJ">{{ $licence->perm_village}}

  </td>
                        </tr>
                        <tr>
                            <td width="3%">&nbsp;</td>
                            <td class="auto-style3">&nbsp; পোস্টকোড </td>
                            <td width="2%">:</td>
                            <td width="15%" style="font-size: 12px; font-family: sutonnyMJ">{{ $licence->pres_postcode }}</td>
                            <td class="auto-style4" style="font-size: 12px;">পোস্টকোড </td>
                            <td width="2%">:</td>
                            <td width="5%" style="font-size: 12px; font-family: sutonnyMJ">{{ $licence->perm_postcode }}</td>
                        </tr>
                        <tr>
                            <td width="3%">&nbsp;</td>
                            <td class="auto-style3">&nbsp; থানা
                            </td>
                            <td width="2%">:</td>
                            <td width="15%" style="font-size: 12px; font-family: sutonnyMJ">{{ $licence->pres_thana }}</td>
                            <td class="auto-style4">থানা
                            </td>
                            <td width="2%">:</td>
                            <td width="5%" style="font-size: 12px; font-family: sutonnyMJ">{{ $licence->perm_thana }}</td>
                        </tr>
                        <tr>
                            <td width="3%">&nbsp;</td>
                            <td class="auto-style3">&nbsp; জেলা </td>
                            <td width="2%">:</td>
                            <td width="15%" style="font-size: 12px; font-family: sutonnyMJ">{{ $licence->pres_district }}</td>
                            <td class="auto-style4">জেলা</td>
                            <td width="2%">:</td>
                            <td width="5%" style="font-size: 12px; font-family: sutonnyMJ"> {{ $licence->perm_district }} </td>
                        </tr>
                        <tr>
                            <td width="3%">&nbsp;</td>
                            <td class="auto-style3">&nbsp; বিভাগ </td>
                            <td width="2%">:</td>
                            <td width="15%" style="font-size: 12px; font-family: sutonnyMJ">{{ $licence->pres_division }}</td>
                            <td class="auto-style4">বিভাগ </td>
                            <td width="2%">:</td>
                            <td width="5%" style="font-size: 12px; font-family: sutonnyMJ">{{ $licence->perm_division }}</td>
                        </tr>





                        <tr>
                            <td width="3%" style="font-weight: bold; text-align: right; font-size: 12px;">১২।</td>
                            <td class="auto-style3" style="font-weight: bold; border-bottom: solid; border-width: 1px; font-size: 12px;">&nbsp; ট্রেড লাইসেন্স/নবায়ন ফি(বার্ষিক)
                                 </td>
                            <td width="2%">&nbsp;</td>
                            <td width="15%">&nbsp;</td>
                            <td class="auto-style4"></td>
                            <td width="2%">&nbsp;</td>
                            <td width="5%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="3%"></td>
                            <td class="auto-style3">&nbsp; লাইসেন্স/নবায়ন ফি


                            </td>
                            <td width="2%">:</td>
                            <td width="15%" style="font-weight: ; font-family: SutonnyMJ; font-size: 12px;"> ২০০০ </td>
                            <td class="auto-style4">সাইনবোর্ড কর</td>
                            <td width="2%">:</td>
                            <td width="5%" style="font-weight: ; font-family: sutonnyMJ; font-size: 12px;">৪৮০ </td>
                        </tr>
                        <tr>
                            <td width="3%">&nbsp;</td>
                            <td class="auto-style3">&nbsp; সারচার্জ</td>
                            <td width="2%">: </td>
                            <td width="15%" style="font-weight: ; font-family: sutonnyMJ; font-size: 12px;"> ০ </td>
                            <td class="auto-style4">ভ্যাট</td>
                            <td width="2%">:</td>
                            <td width="5%" style="font-weight: ; font-family: sutonnyMJ; font-size: 12px;">৩৭২</td>
                        </tr>
                        <tr>
                            <td width="3%">&nbsp;</td>
                            <td class="auto-style3">&nbsp; আয়কর / উৎসেকর</td>
                            <td width="2%">:</td>
                            <td width="15%" style="font-weight: ; font-family: sutonnyMJ; font-size: 12px;">৩০০০</td>
                           <td class="auto-style4" style="font-weight: ">বই মূল্য </td>
                            <td width="2%">:</td>
                            <td width="5%" style="font-weight: ; font-family: sutonnyMJ; font-size: 12px;">২৭০</td>
                        </tr>
                        <tr>
                            <td width="3%">&nbsp;</td>
                            <td class="auto-style3" style="font-family: sutonnyMJ; padding-left: 6px;">বকেয়া ()</td>
                            <td width="2%">:</td>
                            <td width="15%" style="font-weight: ; font-family: sutonnyMJ; font-size: 12px;">০</td>
                            <td class="auto-style4" style="font-weight: ">ফর্ম ফি</td>

<td width="2%">:</td>

<td width="5%" style="font-weight: ; font-family: sutonnyMJ; font-size: 12px;">০</td>
                        </tr>



                         <tr>
                            <td width="3%">&nbsp;</td>
                            <td class="auto-style3">&nbsp; সংশোধনী ফি</td>
                            <td width="2%">:</td>
                            <td width="15%" style="font-weight: ; font-family: sutonnyMJ; font-size: 12px;">০.০০</td>
                             <td class="auto-style4" style="font-weight: ">অন্যান্য ফি</td>
                            <td width="2%">:</td>
                            <td width="5%" style="font-weight: ; font-family: sutonnyMJ; font-size: 12px;">৫০০.০০</td>
                        </tr>
			<tr>
                            <td width="3%">&nbsp;</td>
                            <td class="auto-style3">&nbsp;</td>
                            <td width="2%">:</td>
                            <td width="15%" style="font-weight: ; font-family: sutonnyMJ; font-size: 12px;"></td>
                            <td class="auto-style4" style="font-weight: ">সর্বমোট</td>
                            <td width="2%">:</td>
                            <td width="5%" style="font-weight: ; font-family: sutonnyMJ; font-size: 12px;">৬৬২২.০০</td>
                        </tr>





                        <tr>
                            <td width="3%">&nbsp;</td>
                            <td class="auto-style3" style="font-weight: bold">&nbsp;</td>
                            <td width="2%">&nbsp;</td>
                            <td width="15%">&nbsp;</td>
                            <td class="auto-style4">&nbsp;</td>
                            <td width="2%">&nbsp;</td>
                            <td width="15%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="3%">&nbsp;</td>
                            <td class="auto-style3" style="font-weight: bold">&nbsp;</td>
                            <td width="2%">&nbsp;</td>
                            <td width="15%">&nbsp;</td>
                            <td class="auto-style4">&nbsp;</td>
                            <td width="2%">&nbsp;</td>
                            <td width="15%">&nbsp;</td>
                        </tr>
                        <tr>

                            <td colspan="7" align="center">অত্র ট্রেড লাইসেন্স এর মেয়াদ ৩০ শে জুন, <font face="SutonnyAMJ">2026 </font>পর্যন্ত</td>
                        </tr>
                        <tr>
                            <td width="3%">&nbsp;</td>
                            <td class="auto-style3" style="font-weight: bold">&nbsp;</td>
                            <td width="2%">&nbsp;</td>
                            <td width="15%">&nbsp;</td>
                            <td class="auto-style4">&nbsp;</td>
                            <td width="2%">&nbsp;</td>
                            <td width="15%">&nbsp;</td>
                        </tr>


                        <tr>
                            <td width="3%">&nbsp;</td>
                            <td class="auto-style3" style="font-weight: bold">&nbsp;</td>
                            <td width="2%">&nbsp;</td>
                            <td width="15%">&nbsp;</td>
                            <td class="auto-style4">&nbsp;</td>
                            <td width="2%">&nbsp;</td>
                            <td width="15%">&nbsp;</td>
                        </tr>








                    </tbody>
                </table>
            </div>

            <div style="width: 900px; padding-top: 1px;">
                <table id="personaldeta1" width="900px" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="border: 2px solid #E3DFCB; font-size: 12px;">
                    <tbody><tr>
                        <td width="300px" align="center">
                            <img src="/images/dncc_sign1.png" style="width: 150px; height: 100px;">
                        </td>
                        <td width="300px" align="center">
                            <img src="/images/dncc_seal.png" style="width: 100px; height: 100px;">
                        </td>
                        <td width="300px" align="center">
                            <img src="/images/dncc_sign2.png" style="width: 150px; height: 100px;">
                        </td>
                    </tr>

                    <tr>

                        <td width="300px" align="center">লাইসেন্স ও বিজ্ঞাপন সুপারভাইজার
                        </td>

                        <td width="300px" align="center"></td>
                        <td width="300px" align="center">কর কর্মকর্তা
                        </td>
                    </tr>
                    <tr>
                        <td width="300px" align="center"></td>
                        <td width="300px" align="center"></td>
                        <td width="300px" align="center"></td>
                    </tr>
                    <tr>
                        <td width="300px" align="center"></td>
                        <td width="300px" align="center"></td>
                        <td width="300px" align="center"></td>
                    </tr>
                </tbody></table>
            </div>

        </div>
		</form>



</body><grammarly-desktop-integration data-grammarly-shadow-root="true"><template shadowrootmode="open"><style>
      div.grammarly-desktop-integration {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border: 0;
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select:none;
        user-select:none;
      }

      div.grammarly-desktop-integration:before {
        content: attr(data-content);
      }
    </style><div aria-label="grammarly-integration" role="group" tabindex="-1" class="grammarly-desktop-integration" data-content="{&quot;mode&quot;:&quot;full&quot;,&quot;isActive&quot;:true,&quot;isUserDisabled&quot;:false}"></div></template></grammarly-desktop-integration></html>
