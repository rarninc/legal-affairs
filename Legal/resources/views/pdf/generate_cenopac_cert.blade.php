<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CENOPAC</title>

    <style>
        .cert{
            padding-left: 2cm;
            padding-right: 2cm;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: none;
        }

        td {
            border: none;
            border-bottom: solid windowtext 1.0pt;
            padding: 7.2pt 0cm 7.2pt 0cm;
        }

        p {
            margin: 0cm;
            line-height: normal;
            font-size: 16px;
        }

        img {
            width: 96px;
        }

        strong {
            font-family: "Times New Roman", 'Arial';
            color: black;
        }

        .logo-container {
            text-align: center;
        }

        .office-info {
            text-align: center;
            color:#bf7e9e;  
            font-family: 'Arial', 'sans-serif';
        }
        
        .university{
            font-family: 'Arial', 'sans-serif';
            color:#993366;
            font-weight: bolder;
        }


        .legal-counsel {
            text-align: center;
            color: #bf7e9e;
            font-family: 'Arial ', 'Times New Roman';
            padding: 7.2pt 0cm;
            vertical-align: top;
        }

        .certification-header {
            text-align: center;
            font-size: 16px;
            font-family: "Times New Roman", serif;
            font-weight: bold;
            margin-top: 36pt;
            margin-bottom: 36pt;
        }

        .certification-content {
            text-align: justify;
            text-indent: 36.0pt;
            font-size: 16px;
            font-family: "Times New Roman", serif;
            margin-top: 6pt;
            margin-bottom: 6pt;
        }

        .signature {
            text-align: right;
            font-size: 16px;
            font-family: "Times New Roman", serif;
            font-weight: bold;
            margin-top: 72pt;
            margin-bottom: 6pt;
            margin-right: 1.5cm;
        }
        
    </style>
</head>

<body class="cert">
    <table>
        <tbody>
            <tr>
                <td class="logo-container">
                    <p><img src="storage/img/PLM LOGO.png" alt="image"></p>
                </td>
                <td class="office-info">
                    <p>Republic of the Philippines<br>
                        <span class = 'university'>PAMANTASAN NG LUNGSOD NG MAYNILA</span>
                    <br>Intramuros, Manila</p>
                </td>
                <td class="logo-container">
                    <p><img src="storage/img/manila.png" alt="manila_logo"></p>
                </td>
            </tr>
            
        </tbody>
    </table>
    
   
    <hr>
    <p class="legal-counsel">OFFICE OF THE UNIVERSITY LEGAL COUNSEL</p>
     
    
    <p></p>

    <p class="certification-header">CERTIFICATION</p>

    <p class="certification-content">
        I hereby certify that, based on the records of this office, there is no pending administrative case before the 
        Pamantasan ng Lungsod ng Maynila (PLM) against 
        <strong>{{$employee_name}}</strong>, 
        <span style="color: black; background: white;">{{$position}} of the {{$originating_office}}.</span>
    </p>

    <p class="certification-content">{{$date_issued}}, City of Manila.</p>
    
    <p class="signature">Carlo Florendo C. Castro <br><span style="font-weight: normal;">University Legal Counsel</span></p>
</body>

</html>
