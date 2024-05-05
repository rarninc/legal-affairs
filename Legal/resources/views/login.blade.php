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
</head>

<body class="bg-neutral-600 h-screen w-screen">
    <!--Main Div-->
    <div class="flex justify-end items-center h-full w-full">
        <div class="relative flex h-full w-full">
        <div class="relative h-full w-full">
            <img src="storage/img/background.png" alt="Background" class="absolute h-full w-full">
            <img src="storage/img/plm facade 1.png" alt="PLM Facade" class="h-full w-full">
        </div>
        <div class="bg-indigo-900 h-full w-2/5"></div>
        </div>

        <!--Login Box-->
        <div class="card h-fit w-1/3 bg-base-100 shadow-xl absolute m-52">
            <div class="card-body">
                <div class="w-full mb-3">
                    <img src="storage/img/PLM.png" class="h-20">
                </div>
                <div class="w-full text-login-200 text-5xl font-bold mb-3 pr-1">PLM Office of the University Legal Counsel</div>

                <!--Login fields-->
                <div class="w-full mt-7">
                    <form action="">
                        <div class="flex flex-col w-full gap-4">
                            <div class="flex flex-col">
                                <label for="employee_number" class="block mb-2 text-sm font-medium text-gray-900">Employee Number</label>
                                <input wire:model.defer='employee_number' id="employee_number" type="text" placeholder="Employee Number" class="input input-bordered w-full input-md" />
                                @error('employee_number')
                                <span class="text-red-500"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <div class="flex">
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 flex-1">Password</label>
                                    <a href="" class="text-sm text-slate-600 font-light hover:text-indigo-900">Forgot Password?</a>
                                </div>
                                <input wire:model.defer='password' id="password" type="password" placeholder="Password" class="input input-bordered w-full input-md" />
                                @error('password')
                                <span class="text-red-500"> {{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </form>
                    <div class="card-actions justify-center">
                        <a href="dashboard" class="mt-7 h-fit">
                            <button class="btn w-44 bg-indigo-800 btn-primary text-white">Login</button>
                        </a>
                    </div>
                </div>
                <!--Login fields-->
            </div>
        </div>
        <!--Login Box-->
    </div>
    <!--Main Div-->
</body>
</html>