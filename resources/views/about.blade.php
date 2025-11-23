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
    </style>
</head>

<body class="scroll-container h-screen">
    <div class="flex flex-col h-full w-full">
        <!--Header-->
        <div class="navbar bg-base-100">
            <div class="flex-none">
                <label for="sidebar" class="btn btn-square btn-ghost drawer-button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </label>
            </div>
            <div class="flex-1 items-center space-x-2">
                <img class="h-14 w-14" src="storage/img/PLM LOGO.png" alt="PLM">
                <img class="h-12 w-72" src="storage/img/PLM HEADER.png" alt="PLM">
            </div>
            <div class="flex-none h-full gap-2">
                <button class="btn btn-ghost text-lg text-neutral"><a href="dashboard">Home</a></button>
                <button class="btn btn-ghost text-lg text-neutral"><a href="about">About</a></button>
                <div class="dropdown dropdown-end mx-2">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img alt="profile pic" src="storage/img/profile.png"/>
                        </div>
                    </div>
                    <ul tabindex="0" class="mt-3 z-[1] p-4 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52 gap-1 font-medium">
                        <li>
                        <a class="shadow font-bold"><img class="w-5 h-5" src="storage/img/user.png">Atty. Carlo Castro</a>
                        </li>
                        <span class="divider my-1"></span>
                        <li>
                        <a href="about"><img class="w-6 h-6" src="storage/img/information.png">About</a>
                        </li>
                        <li>
                        <a href=""><img class="w-6 h-5" src="storage/img/logout.png">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--Header-->

        <!--Lower Div-->
        
        <div class="relative h-fit w-full bg-neutral-600">
            <img src="storage/img/plm background.jpg" alt="" class="absolute h-full w-full opacity-50">
            <div class="flex flex-col items-center gap-4 p-8 text-center text-neutral-content ">
                <div class="flex flex-col h-fit w-2/3 py-8 gap-2 bg-black opacity-70 rounded-2xl">
                    <h1 class="text-3xl font-bold text-gold">Pamantasan ng Lungsod ng Maynila</h1>
                    <h1 class="text-5xl font-bold"><i>Office of the University Legal Counsel</i></h1>
                    <h1 class="text-2xl font-semibold text-gold">Intramuros, Manila</h1>
                </div>

                <div class="card h-fit w-2/3 bg-gray-300 text-black shadow-sm relative">
                    <div class="card-body h-full flex p-10 gap-4">
                        <h1 class="text-xl font-semibold">The Office of the University Legal Counsel (OULC) is headed by the University Legal Counsel.</h1>
                        
                        <div class="card h-full w-full bg-gray-400 text-black shadow-sm relative">
                            <div class="card-body h-full w-full p-5">
                                <h1 class="text-xl font-semibold flex justify-start mb-2">The tasks of OULC are as follows:</h1>
                                <div class="flex text-xl gap-4 pl-10">
                                    <button class="btn btn-circle btn-xs btn-neutral mt-1">1</button>
                                    <p class="text-start">Review of all University policies, rules and regulations, and the University Code, and determine their applicability and flexibility with the changing times and recommend amendment and/or revision to the Board of Regents and/or the proper body.</p>
                                </div>
                                <div class="flex text-xl gap-4 pl-10">
                                    <button class="btn btn-circle btn-xs btn-neutral mt-1">2</button>
                                    <p class="text-start">Provision of legal service covering all aspects of university program and operations, such as but not limited to preparation and review of contracts and memorandum of agreement.</p>
                                </div>
                                <div class="flex text-xl gap-4 pl-10">
                                    <button class="btn btn-circle btn-xs btn-neutral mt-1">3</button>
                                    <p class="text-start">Provision of legal opinions on matters referred by the Board, the Office of the President, and other units.</p>
                                </div>
                                <div class="flex text-xl gap-4 pl-10">
                                    <button class="btn btn-circle btn-xs btn-neutral mt-1">4</button>
                                    <p class="text-start">Representation and defense of the University and its officials and employees through a more systematic, highly dependable, and swift legal services.</p>
                                </div>
                                <div class="flex text-xl gap-4 pl-10">
                                    <button class="btn btn-circle btn-xs btn-neutral mt-1">5</button>
                                    <p class="text-start">Conduct of investigations on administrative cases filed against erring employees and submit recommendations pertaining thereto.</p>
                                </div>
                                <div class="flex text-xl gap-4 pl-10">
                                    <button class="btn btn-circle btn-xs btn-neutral mt-1">6</button>
                                    <p class="text-start">Conduct of consultation with the duly recognized employee's association on matters that will improve employee's working conditions or status acceptable to management and beneficial to all rank-and-file employees of the University.</p>
                                </div>
                                <div class="flex text-xl gap-4 pl-10">
                                    <button class="btn btn-circle btn-xs btn-neutral mt-1">7</button>
                                    <p class="text-start">Performance of other functions assigned by the President and the Board of Regents.</p>
                                </div>

                            </div>
                        </div>

                        <div class="divider"></div>

                        <h1 class="text-2xl font-semibold">Organization</h1>

                        <div>
                            <div class="carousel w-full h-fit">
                                <div id="slide1" class="carousel-item relative h-full w-full justify-center items-center py-4">
                                    <img src="storage/img/plm background.jpg" alt="" class="absolute h-full w-full rounded-xl opacity-50">
                                    <div class="card w-72 bg-base-100 shadow-xl">
                                        <figure class="p-5">
                                            <img src="storage/img/profile.png" alt="Org" class="mask mask-circle" />
                                        </figure>
                                        <div class="card-body items-center text-center p-5 pt-0">
                                            <h2 class="card-title">Full Name</h2>
                                            <p>University Legal Counsel</p>
                                        </div>
                                    </div>
                                    <div class="absolute flex justify-between transform -translate-y-1/2 right-5 top-1/2">
                                    <a href="#slide2" class="btn btn-circle">❯</a>
                                    </div>
                                </div>
                                <div id="slide2" class="carousel-item relative h-full w-full justify-center items-center py-4">
                                    <img src="storage/img/plm background.jpg" alt="" class="absolute h-full w-full rounded-xl opacity-50">
                                    <div class="card w-72 bg-base-100 shadow-xl">
                                        <figure class="p-5">
                                            <img src="storage/img/profile.png" alt="Org" class="mask mask-circle" />
                                        </figure>
                                        <div class="card-body items-center text-center p-5 pt-0">
                                            <h2 class="card-title">Full Name</h2>
                                            <p>Executive Assistant IV</p>
                                        </div>
                                    </div>
                                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                                    <a href="#slide1" class="btn btn-circle">❮</a> 
                                    <a href="#slide3" class="btn btn-circle">❯</a>
                                    </div>
                                </div>
                                <div id="slide3" class="carousel-item relative h-full w-full justify-center items-center py-4 gap-4">
                                    <img src="storage/img/plm background.jpg" alt="" class="absolute h-full w-full rounded-xl opacity-50">
                                    <div class="card w-72 bg-base-100 shadow-xl">
                                        <figure class="p-5">
                                            <img src="storage/img/profile.png" alt="Org" class="mask mask-circle" />
                                        </figure>
                                        <div class="card-body items-center text-center p-5 pt-0">
                                            <h2 class="card-title">Full Name</h2>
                                            <p>Attorney III</p>
                                        </div>
                                    </div>
                                    <div class="card w-72 bg-base-100 shadow-xl">
                                        <figure class="p-5">
                                            <img src="storage/img/profile.png" alt="Org" class="mask mask-circle" />
                                        </figure>
                                        <div class="card-body items-center text-center p-5 pt-0">
                                            <h2 class="card-title">Full Name</h2>
                                            <p>Attorney III</p>
                                        </div>
                                    </div>
                                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                                    <a href="#slide2" class="btn btn-circle">❮</a> 
                                    <a href="#slide4" class="btn btn-circle">❯</a>
                                    </div>
                                </div>
                                <div id="slide4" class="carousel-item relative h-full w-full justify-center items-center py-4">
                                    <img src="storage/img/plm background.jpg" alt="" class="absolute h-full w-full rounded-xl opacity-50">
                                    <div class="card w-72 bg-base-100 shadow-xl">
                                        <figure class="p-5">
                                            <img src="storage/img/profile.png" alt="Org" class="mask mask-circle" />
                                        </figure>
                                        <div class="card-body items-center text-center p-5 pt-0">
                                            <h2 class="card-title">Full Name</h2>
                                            <p>Senior Reproduction Machine Officer</p>
                                        </div>
                                    </div>
                                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                                    <a href="#slide3" class="btn btn-circle">❮</a> 
                                    <a href="#slide5" class="btn btn-circle">❯</a>
                                    </div>
                                </div>
                                <div id="slide5" class="carousel-item relative h-full w-full justify-center items-center py-4">
                                    <img src="storage/img/plm background.jpg" alt="" class="absolute h-full w-full rounded-xl opacity-50">
                                    <div class="card w-72 bg-base-100 shadow-xl">
                                        <figure class="p-5">
                                            <img src="storage/img/profile.png" alt="Org" class="mask mask-circle" />
                                        </figure>
                                        <div class="card-body items-center text-center p-5 pt-0">
                                            <h2 class="card-title">Full Name</h2>
                                            <p>Utility Worker</p>
                                        </div>
                                    </div>
                                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                                    <a href="#slide4" class="btn btn-circle">❮</a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
</body>

</html>