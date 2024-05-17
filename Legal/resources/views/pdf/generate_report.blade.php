<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OULC Report</title>
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
        .stats-graph{
            border: none;
            
        }
        .case-matrix-graph{
            border: solid 1px ;
        }
        ul{
            list-style: none;
        }
        .data-overview{
            padding-left: 0px;
        }
        .graph-1{
            border: none;
            width: 300px;
        }
        .graph-2{
            border: none;
            width: 500px;
        }
        .col-1{
            width: 50%;
        }
        .col-2{
            width: 50%;
        }
        .row-1{
            height: 200px;
        }

        .monthly-report{
            color: black;
            font-weight: bold;
        }
        .graph-img{
            width:100%;
            height:200px;
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
    <p class="legal-counsel">OFFICE OF THE UNIVERSITY LEGAL COUNSEL
        <br>
        {{-- <span class = "monthly-report">Monthly Report ({{$month_now}})</span> --}}
    </p>
     
    
    <h2>Case Matrix</h2>
    <table>
        <tbody>
            <tr class="row-1">
                <td class="stats-graph col-1">
                    <div class= "graph-1">
                        <img class = "graph-img" src="{{$url_1}}" alt="Case Matrix Graph">
                    </div>
                </td>
                <td class="stats-graph col-2">
                    <div class="graph-2">
                        <canvas id="pie_chart"></canvas>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="stats-graph col-2">
                    <ul class="data-overview">
                        <li>Total Number of Cases: NUMBER</li>
                        <li>Number of Resolved Cases: NUMBER</li>
                        <li>Number of Pending Cases: NUMBER</li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
    
    <h2>CeNoPac</h2>
    <table>
        <tbody>
            <tr class="row-1">
                <td class="stats-graph col-1">
                    <div class= "graph-1">
                        <img class = "graph-img" src="{{$url_2}}" alt="CeNoPac Generated Graph">
                    </div>
                </td>
                <td class="stats-graph col-2">
                    <div class="graph-2">
                    </div>
                </td>
                <td class="stats-graph col-2">
                    <div class="graph-2">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="stats-graph col-2">
                    <ul class="data-overview">
                        <li>Total Number Certificate Generated: NUMBER</li>
                        <li>Number of Request: NUMBER</li>
                        <li>Number of Denied Request: NUMBER</li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
    

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <h2>Document Tracker</h2>
    <table>
        <tbody>
            <tr class="row-1">
                <td class="stats-graph col-1">
                    <div class= "graph-1">
                        <img class = "graph-img" src="{{$url_3}}" alt="Document Processed Graph">
                    </div>
                </td>
                <td class="stats-graph col-2">
                    <div class="graph-2">
                        
                    </div>
                </td>
            </tr>
            <tr>
                <td class="stats-graph col-2">
                    <ul class="data-overview">
                        <li>Total Number of Cases: NUMBER</li>
                        <li>Number of Resolved Cases: NUMBER</li>
                        <li>Number of Pending Cases: NUMBER</li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>

    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
      
        new Chart(ctx, {
          type: 'line',
          data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
              label: '# of Votes',
              data: [12, 19, 3, 5, 2, 3],
              borderWidth: 1,
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });


      </script> --}}

</body>
</html>
