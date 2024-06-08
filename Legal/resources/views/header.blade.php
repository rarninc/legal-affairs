<!--Header-->
<div class="navbar bg-base-100">
            <!--<div class="flex-none">
                <label for="sidebar" class="btn btn-square btn-ghost drawer-button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </label>
            </div>-->
            <div class="flex-1 items-center space-x-2">
              	<label for="sidebar" class="btn btn-square btn-ghost drawer-button h-14 w-14">
                    <img class="h-14 w-14" src="storage/img/PLM LOGO.png" alt="PLM">
                </label>
                <img class="h-12 w-72" src="storage/img/PLM HEADER.png" alt="PLM">
            </div>
            <div class="flex-none h-full gap-2">
                <button class="btn btn-ghost text-lg text-neutral"><a href="dashboard">Home</a></button>
                <button class="btn btn-ghost text-lg text-neutral"><a href="about">About</a></button>
                <div class="header-drop dropdown dropdown-end mx-2">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img alt="profile pic" src="storage/img/profile.png"/>
                        </div>
                    </div>
                    <ul tabindex="0" class="mt-3 z-[1] p-4 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52 gap-1 font-medium">
                        <li>
                        <a class="shadow font-bold"><img class="w-5 h-5" src="storage/img/user.png">{{$fullname}}</a>
                        </li>
                        <span class="divider my-1"></span>
                        <li>
                        <a href="about"><img class="w-6 h-6" src="storage/img/information.png">About</a>
                        </li>
                        <li>
                        <a href="https://login.plmerp24.cloud/employeedashboard"><img class="w-6 h-5" src="storage/img/logout.png">Employee Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--Header-->