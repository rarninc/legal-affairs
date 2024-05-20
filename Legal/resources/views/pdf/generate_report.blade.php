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
            padding-left: 20px;
            width: 300px;
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
        
        .text-col2{
            padding-left: 10px;
        }
        .monthly-report{
            color: black;
            font-weight: bold;
        }
        .graph-img{
            width:100%;
            height:200px;
        }

        strong{
            font-weight: bold;
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
        <span class = "monthly-report">{{$month_now}}</span>
    </p>
     
    
    <h2>Case Matrix</h2>
    <table>
        <tbody>
            <tr class="row-1">
                <td class="stats-graph col-1">
                    <div class= "graph-1">
                        <img class = "graph-img" src="{{$case_graph_url_1}}" alt="Case Matrix Year Graph">
                    </div>
                </td>
                <td class="stats-graph col-2">
                    <div class="graph-2">
                        <img class = "graph-img" src="{{$case_graph_url_2}}" alt="Case Matrix Current Month Graph">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="stats-graph col-1">
                    <ul class="data-overview">
                        <li><strong>Year {{now()->format("Y")}}<strong></li>
                        <li>Total Number of Cases: 
                            <strong>{{$counts['case']['total']['yearly']}}</strong>
                        </li>
                        <li>No. of Resolved Cases: 
                            <strong>{{$counts['case']['resolved']['yearly']}}</strong>
                        </li>
                        <li>No. of Ongoing Cases: 
                            <strong>{{$counts['case']['pending']['yearly']}}</strong>
                        </li>
                    </ul>
                </td>
                <td class="stats-graph col-2">
                    <ul class="data-overview text-col2">
                        <li><strong>{{$month_now}}<strong></li>
                        <li>Total Number of Cases: 
                            <strong>{{$counts['case']['total']['monthly']}}</strong>
                        </li>
                        <li>No. of Resolved Cases: 
                            <strong>{{$counts['case']['resolved']['monthly']}}</strong>
                        </li>
                        <li>No. of Ongoing Cases: 
                            <strong>{{$counts['case']['pending']['monthly']}}</strong>
                        </li>
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
                        <img class = "graph-img" src="{{$cenopac_graph_url_1}}" alt="CeNoPac Generated Year Graph">
                    </div>
                </td>
                <td class="stats-graph col-2">
                    <div class="graph-2">
                        <img class = "graph-img" src="{{$cenopac_graph_url_2}}" alt="CeNoPac Generated Current Month Graph">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="stats-graph col-1">
                    <ul class="data-overview">
                        <li><strong>Year {{now()->format("Y")}}</strong></li>
                        <li>Total No. of Generated Certificates: 
                            <strong>{{$counts['cenopac']['generated']['yearly']}}</strong>
                        </li>
                        <li>No. of Request: 
                            <strong>{{$counts['cenopac']['request']['yearly']}}</strong>
                        </li>
                        <li>No. of Denied Request: 
                            <strong>{{$counts['cenopac']['denied']['yearly']}}</strong>
                        </li>
                    </ul>
                </td>
                <td class="stats-graph col-2">
                    <ul class="data-overview text-col2">
                        <li><strong>{{$month_now}}<strong></li>
                        <li>Total No. of Generated Certificates: 
                            <strong>{{$counts['cenopac']['generated']['monthly']}}</strong>
                        </li>
                        <li>No. of Request: 
                            <strong>{{$counts['cenopac']['request']['monthly']}}</strong>
                        </li>
                        <li>No. of Denied Request: 
                            <strong>{{$counts['cenopac']['denied']['monthly']}}</strong>
                        </li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
    
    <h2>Document Tracker</h2>
    <table>
        <tbody>
            <tr class="row-1">
                <td class="stats-graph col-1">
                    <div class= "graph-1">
                        <img class = "graph-img" src="{{$doc_graph_url_1}}" alt="Document Processed Year Graph">
                    </div>
                </td>
                <td class="stats-graph col-2">
                    <div class="graph-2">
                        <img class = "graph-img" src="{{$doc_graph_url_2}}" alt="Document Processed Current Month Graph">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="stats-graph col-2">
                    <ul class="data-overview">
                        <li><strong>Year {{now()->format("Y")}}</strong></li>
                        <li>Total No. of Documents: 
                            <strong>{{$counts['doc']['total']['yearly']}}</strong>
                        </li>
                        <li>No. of Documents to be Processed: 
                            <strong>{{$counts['doc']['to-do']['yearly'] + $counts['doc']['doing']['yearly']}}</strong>
                        </li>
                        <li>No. of Processed Documents: 
                            <strong>{{$counts['doc']['done']['yearly']}}</strong>
                        </li>
                    </ul>
                </td>
                <td class="stats-graph col-2">
                    <ul class="data-overview text-col2">
                        <li><strong>{{$month_now}}</strong></li>
                        <li>Total No. of Documents: 
                            <strong>{{$counts['doc']['total']['monthly']}}</strong>
                        </li>
                        <li>No. of Documents to be Processed: 
                            <strong>{{$counts['doc']['to-do']['monthly'] + $counts['doc']['doing']['monthly']}}</strong>
                        </li>
                        <li>No. of Processed Documents: 
                            <strong>{{$counts['doc']['done']['monthly']}}</strong>
                        </li>
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
