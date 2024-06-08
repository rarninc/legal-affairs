<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Office of the University Legal Counsel</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="shortcut icon" type="x-icon" href="storage/img/PLM LOGO.png"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js"></script>

    <style>
    .scroll-container::-webkit-scrollbar {
        width: 8px;
    }
    .scroll-container::-webkit-scrollbar-track {
        background-color: #f1f1f1;
    }
    .scroll-container::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 10px;
    }
    .scroll-container::-webkit-scrollbar-thumb:hover {
        background-color: #555; 
    }
    .header-drop{
      	z-index: 10;
    }
    </style>
</head>

<body class="bg-neutral-200 scroll-container">
    <div class="flex flex-col h-full w-full">
        @include('header',['fullname' => $fullname])

        <!--Lower Div-->
        <div class="flex h-screen w-full">
        <!--Side Nav Bar -->
        <div class="drawer lg:drawer-open">
            <input id="sidebar" type="checkbox" class="drawer-toggle" />
            <!-- Page Content -->
            <div class="drawer-content flex flex-col p-4">
                @yield('content')
            </div> 
            <!-- Page Content -->
            <div class="drawer-side">
                <label for="sidebar" aria-label="close sidebar" class="drawer-overlay"></label>
                <ul class="menu w-80 min-h-full bg-indigo-800 text-white">
                    <!-- Sidebar content here -->
                    <a href="dashboard" class="flex flex-col justify-center p-4 mt-4 mb-8 gap-4 hover:text-gold">
                        <span class="text-2xl text-center font-bold">Office of the University Legal Counsel</span>
                        <div class="divider divider-warning text-lg">OULC</div>
                    </a>
                    <!--University Clearance-->
                    <div class="collapse collapse-arrow hover:bg-indigo-900">
                        <!-- <input type="radio" name="my-accordion-1"/>  -->
                        <input type="checkbox">
                        <div class="collapse-title flex items-center py-2 px-5 gap-3">
                            <img class="w-6 h-6" src="storage/img/feature icon.png">
                            <span class="w-full text-xl font-normal leading-7 text-white">University Clearance</span>
                        </div>
                        <div class="collapse-content font-normal"> 
                            <li><a href="cenopac" class="px-10 hover:bg-neutral-100 hover:text-black">CeNoPAC</a></li>
                            <li><a href="cenopac_request" class="px-10 hover:bg-neutral-100 hover:text-black">Requests</a></li>
                            <li><a href="cenopac_record" class="px-10 hover:bg-neutral-100 hover:text-black">Records</a></li>
                        </div>
                    </div>
                    <!--Case Matrix-->
                    <a href="case_matrix" class="collapse hover:bg-indigo-900">
                        <div class="collapse-title flex items-center py-2 px-5 gap-3">
                            <img class="w-6 h-6" src="storage/img/feature icon.png">
                            <span class="w-full text-xl font-normal leading-7 text-white">Case Matrix</span>
                        </div>
                    </a>
                    <!--Document Tracker-->
                    <div class="collapse collapse-arrow hover:bg-indigo-900">
                        <!-- <input type="radio" name="my-accordion-1"/>   -->
                        <input type="checkbox">
                        <div class="collapse-title flex items-center py-2 px-5 gap-3">
                            <img class="w-6 h-6" src="storage/img/feature icon.png">
                            <span class="w-full text-xl font-normal leading-7 text-white">Document Manager</span>
                        </div>
                        <div class="collapse-content font-normal"> 
                            <li><a href="document_record" class="px-10 hover:bg-neutral-100 hover:text-black">Track Document</a></li>
                            <li><a href="document_view" class="px-10 hover:bg-neutral-100 hover:text-black">Records</a></li>
                        </div>
                    </div>
                    <!--Logout-->
                    <a href="/" class="flex items-center mt-auto mb-10 hover:bg-indigo-900 py-1 pl-12 gap-2">
                        <img class="w-6 h-5" src="storage/img/logout icon.png">
                        <span class="w-full text-lg font-light leading-7 text-white transition duration-300">Logout</span>
                    </a>
                </ul>
            </div>
        </div>
        <!--Side Nav Bar-->
        
    </div>

    <!--Script for Date and Time-->
    <script>
        
        function updateDateTime() {
        const now = new Date();
        const currentDateTime = now.toLocaleString();
        document.querySelector('#datetime').textContent = currentDateTime;
        }
        setInterval(updateDateTime, 1000);
    </script>

</body>

</html>