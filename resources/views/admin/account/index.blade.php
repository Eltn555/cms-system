@extends('admin')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Accounts
    </h2>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('admin.account.create') }}" class="btn btn-primary shadow-md mr-2">Add New Account</a>
            <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="search" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </div>
            </div>
        </div>
        <!-- BEGIN: Users Layout -->
        <div class="intro-y col-span-12 md:col-span-6">
            <div class="box">
                <div class="flex flex-col lg:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-5.jpg">
                    </div>
                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                        <a href="" class="font-medium">Angelina Jolie</a>
                        <div class="text-slate-500 text-xs mt-0.5">Backend Engineer</div>
                    </div>
                    <div class="flex -ml-2 lg:ml-0 lg:justify-end mt-3 lg:mt-0">
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="facebook" class="lucide lucide-facebook w-3 h-3 fill-current" data-lucide="facebook"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path></svg> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="twitter" class="lucide lucide-twitter w-3 h-3 fill-current" data-lucide="twitter"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5 0-.28-.03-.56-.08-.83A7.72 7.72 0 0023 3z"></path></svg> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="linkedin" class="lucide lucide-linkedin w-3 h-3 fill-current" data-lucide="linkedin"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg> </a>
                    </div>
                </div>
                <div class="flex flex-wrap lg:flex-nowrap items-center justify-center p-5">
                    <div class="w-full lg:w-1/2 mb-4 lg:mb-0 mr-auto">
                        <div class="flex text-slate-500 text-xs">
                            <div class="mr-auto">Progress</div>
                            <div>20%</div>
                        </div>
                        <div class="progress h-1 mt-2">
                            <div class="progress-bar w-1/4 bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <button class="btn btn-primary py-1 px-2 mr-2">Message</button>
                    <button class="btn btn-outline-secondary py-1 px-2">Profile</button>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6">
            <div class="box">
                <div class="flex flex-col lg:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-5.jpg">
                    </div>
                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                        <a href="" class="font-medium">Robert De Niro</a>
                        <div class="text-slate-500 text-xs mt-0.5">Software Engineer</div>
                    </div>
                    <div class="flex -ml-2 lg:ml-0 lg:justify-end mt-3 lg:mt-0">
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="facebook" class="lucide lucide-facebook w-3 h-3 fill-current" data-lucide="facebook"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path></svg> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="twitter" class="lucide lucide-twitter w-3 h-3 fill-current" data-lucide="twitter"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5 0-.28-.03-.56-.08-.83A7.72 7.72 0 0023 3z"></path></svg> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="linkedin" class="lucide lucide-linkedin w-3 h-3 fill-current" data-lucide="linkedin"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg> </a>
                    </div>
                </div>
                <div class="flex flex-wrap lg:flex-nowrap items-center justify-center p-5">
                    <div class="w-full lg:w-1/2 mb-4 lg:mb-0 mr-auto">
                        <div class="flex text-slate-500 text-xs">
                            <div class="mr-auto">Progress</div>
                            <div>20%</div>
                        </div>
                        <div class="progress h-1 mt-2">
                            <div class="progress-bar w-1/4 bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <button class="btn btn-primary py-1 px-2 mr-2">Message</button>
                    <button class="btn btn-outline-secondary py-1 px-2">Profile</button>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6">
            <div class="box">
                <div class="flex flex-col lg:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-4.jpg">
                    </div>
                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                        <a href="" class="font-medium">Johnny Depp</a>
                        <div class="text-slate-500 text-xs mt-0.5">Frontend Engineer</div>
                    </div>
                    <div class="flex -ml-2 lg:ml-0 lg:justify-end mt-3 lg:mt-0">
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="facebook" class="lucide lucide-facebook w-3 h-3 fill-current" data-lucide="facebook"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path></svg> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="twitter" class="lucide lucide-twitter w-3 h-3 fill-current" data-lucide="twitter"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5 0-.28-.03-.56-.08-.83A7.72 7.72 0 0023 3z"></path></svg> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="linkedin" class="lucide lucide-linkedin w-3 h-3 fill-current" data-lucide="linkedin"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg> </a>
                    </div>
                </div>
                <div class="flex flex-wrap lg:flex-nowrap items-center justify-center p-5">
                    <div class="w-full lg:w-1/2 mb-4 lg:mb-0 mr-auto">
                        <div class="flex text-slate-500 text-xs">
                            <div class="mr-auto">Progress</div>
                            <div>20%</div>
                        </div>
                        <div class="progress h-1 mt-2">
                            <div class="progress-bar w-1/4 bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <button class="btn btn-primary py-1 px-2 mr-2">Message</button>
                    <button class="btn btn-outline-secondary py-1 px-2">Profile</button>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6">
            <div class="box">
                <div class="flex flex-col lg:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-14.jpg">
                    </div>
                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                        <a href="" class="font-medium">Russell Crowe</a>
                        <div class="text-slate-500 text-xs mt-0.5">Software Engineer</div>
                    </div>
                    <div class="flex -ml-2 lg:ml-0 lg:justify-end mt-3 lg:mt-0">
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="facebook" class="lucide lucide-facebook w-3 h-3 fill-current" data-lucide="facebook"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path></svg> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="twitter" class="lucide lucide-twitter w-3 h-3 fill-current" data-lucide="twitter"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5 0-.28-.03-.56-.08-.83A7.72 7.72 0 0023 3z"></path></svg> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="linkedin" class="lucide lucide-linkedin w-3 h-3 fill-current" data-lucide="linkedin"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg> </a>
                    </div>
                </div>
                <div class="flex flex-wrap lg:flex-nowrap items-center justify-center p-5">
                    <div class="w-full lg:w-1/2 mb-4 lg:mb-0 mr-auto">
                        <div class="flex text-slate-500 text-xs">
                            <div class="mr-auto">Progress</div>
                            <div>20%</div>
                        </div>
                        <div class="progress h-1 mt-2">
                            <div class="progress-bar w-1/4 bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <button class="btn btn-primary py-1 px-2 mr-2">Message</button>
                    <button class="btn btn-outline-secondary py-1 px-2">Profile</button>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6">
            <div class="box">
                <div class="flex flex-col lg:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-11.jpg">
                    </div>
                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                        <a href="" class="font-medium">Sylvester Stallone</a>
                        <div class="text-slate-500 text-xs mt-0.5">Frontend Engineer</div>
                    </div>
                    <div class="flex -ml-2 lg:ml-0 lg:justify-end mt-3 lg:mt-0">
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="facebook" class="lucide lucide-facebook w-3 h-3 fill-current" data-lucide="facebook"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path></svg> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="twitter" class="lucide lucide-twitter w-3 h-3 fill-current" data-lucide="twitter"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5 0-.28-.03-.56-.08-.83A7.72 7.72 0 0023 3z"></path></svg> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="linkedin" class="lucide lucide-linkedin w-3 h-3 fill-current" data-lucide="linkedin"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg> </a>
                    </div>
                </div>
                <div class="flex flex-wrap lg:flex-nowrap items-center justify-center p-5">
                    <div class="w-full lg:w-1/2 mb-4 lg:mb-0 mr-auto">
                        <div class="flex text-slate-500 text-xs">
                            <div class="mr-auto">Progress</div>
                            <div>20%</div>
                        </div>
                        <div class="progress h-1 mt-2">
                            <div class="progress-bar w-1/4 bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <button class="btn btn-primary py-1 px-2 mr-2">Message</button>
                    <button class="btn btn-outline-secondary py-1 px-2">Profile</button>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6">
            <div class="box">
                <div class="flex flex-col lg:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-6.jpg">
                    </div>
                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                        <a href="" class="font-medium">Robert De Niro</a>
                        <div class="text-slate-500 text-xs mt-0.5">Software Engineer</div>
                    </div>
                    <div class="flex -ml-2 lg:ml-0 lg:justify-end mt-3 lg:mt-0">
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="facebook" class="lucide lucide-facebook w-3 h-3 fill-current" data-lucide="facebook"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path></svg> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="twitter" class="lucide lucide-twitter w-3 h-3 fill-current" data-lucide="twitter"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5 0-.28-.03-.56-.08-.83A7.72 7.72 0 0023 3z"></path></svg> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="linkedin" class="lucide lucide-linkedin w-3 h-3 fill-current" data-lucide="linkedin"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg> </a>
                    </div>
                </div>
                <div class="flex flex-wrap lg:flex-nowrap items-center justify-center p-5">
                    <div class="w-full lg:w-1/2 mb-4 lg:mb-0 mr-auto">
                        <div class="flex text-slate-500 text-xs">
                            <div class="mr-auto">Progress</div>
                            <div>20%</div>
                        </div>
                        <div class="progress h-1 mt-2">
                            <div class="progress-bar w-1/4 bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <button class="btn btn-primary py-1 px-2 mr-2">Message</button>
                    <button class="btn btn-outline-secondary py-1 px-2">Profile</button>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6">
            <div class="box">
                <div class="flex flex-col lg:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                    </div>
                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                        <a href="" class="font-medium">Tom Cruise</a>
                        <div class="text-slate-500 text-xs mt-0.5">Backend Engineer</div>
                    </div>
                    <div class="flex -ml-2 lg:ml-0 lg:justify-end mt-3 lg:mt-0">
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="facebook" class="lucide lucide-facebook w-3 h-3 fill-current" data-lucide="facebook"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path></svg> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="twitter" class="lucide lucide-twitter w-3 h-3 fill-current" data-lucide="twitter"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5 0-.28-.03-.56-.08-.83A7.72 7.72 0 0023 3z"></path></svg> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="linkedin" class="lucide lucide-linkedin w-3 h-3 fill-current" data-lucide="linkedin"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg> </a>
                    </div>
                </div>
                <div class="flex flex-wrap lg:flex-nowrap items-center justify-center p-5">
                    <div class="w-full lg:w-1/2 mb-4 lg:mb-0 mr-auto">
                        <div class="flex text-slate-500 text-xs">
                            <div class="mr-auto">Progress</div>
                            <div>20%</div>
                        </div>
                        <div class="progress h-1 mt-2">
                            <div class="progress-bar w-1/4 bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <button class="btn btn-primary py-1 px-2 mr-2">Message</button>
                    <button class="btn btn-outline-secondary py-1 px-2">Profile</button>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6">
            <div class="box">
                <div class="flex flex-col lg:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-1.jpg">
                    </div>
                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                        <a href="" class="font-medium">Robert De Niro</a>
                        <div class="text-slate-500 text-xs mt-0.5">Frontend Engineer</div>
                    </div>
                    <div class="flex -ml-2 lg:ml-0 lg:justify-end mt-3 lg:mt-0">
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="facebook" class="lucide lucide-facebook w-3 h-3 fill-current" data-lucide="facebook"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path></svg> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="twitter" class="lucide lucide-twitter w-3 h-3 fill-current" data-lucide="twitter"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5 0-.28-.03-.56-.08-.83A7.72 7.72 0 0023 3z"></path></svg> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="linkedin" class="lucide lucide-linkedin w-3 h-3 fill-current" data-lucide="linkedin"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg> </a>
                    </div>
                </div>
                <div class="flex flex-wrap lg:flex-nowrap items-center justify-center p-5">
                    <div class="w-full lg:w-1/2 mb-4 lg:mb-0 mr-auto">
                        <div class="flex text-slate-500 text-xs">
                            <div class="mr-auto">Progress</div>
                            <div>20%</div>
                        </div>
                        <div class="progress h-1 mt-2">
                            <div class="progress-bar w-1/4 bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <button class="btn btn-primary py-1 px-2 mr-2">Message</button>
                    <button class="btn btn-outline-secondary py-1 px-2">Profile</button>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6">
            <div class="box">
                <div class="flex flex-col lg:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-15.jpg">
                    </div>
                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                        <a href="" class="font-medium">Arnold Schwarzenegger</a>
                        <div class="text-slate-500 text-xs mt-0.5">Software Engineer</div>
                    </div>
                    <div class="flex -ml-2 lg:ml-0 lg:justify-end mt-3 lg:mt-0">
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="facebook" class="lucide lucide-facebook w-3 h-3 fill-current" data-lucide="facebook"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path></svg> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="twitter" class="lucide lucide-twitter w-3 h-3 fill-current" data-lucide="twitter"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5 0-.28-.03-.56-.08-.83A7.72 7.72 0 0023 3z"></path></svg> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="linkedin" class="lucide lucide-linkedin w-3 h-3 fill-current" data-lucide="linkedin"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg> </a>
                    </div>
                </div>
                <div class="flex flex-wrap lg:flex-nowrap items-center justify-center p-5">
                    <div class="w-full lg:w-1/2 mb-4 lg:mb-0 mr-auto">
                        <div class="flex text-slate-500 text-xs">
                            <div class="mr-auto">Progress</div>
                            <div>20%</div>
                        </div>
                        <div class="progress h-1 mt-2">
                            <div class="progress-bar w-1/4 bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <button class="btn btn-primary py-1 px-2 mr-2">Message</button>
                    <button class="btn btn-outline-secondary py-1 px-2">Profile</button>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6">
            <div class="box">
                <div class="flex flex-col lg:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-4.jpg">
                    </div>
                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                        <a href="" class="font-medium">Brad Pitt</a>
                        <div class="text-slate-500 text-xs mt-0.5">Software Engineer</div>
                    </div>
                    <div class="flex -ml-2 lg:ml-0 lg:justify-end mt-3 lg:mt-0">
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="facebook" class="lucide lucide-facebook w-3 h-3 fill-current" data-lucide="facebook"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path></svg> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="twitter" class="lucide lucide-twitter w-3 h-3 fill-current" data-lucide="twitter"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5 0-.28-.03-.56-.08-.83A7.72 7.72 0 0023 3z"></path></svg> </a>
                        <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="linkedin" class="lucide lucide-linkedin w-3 h-3 fill-current" data-lucide="linkedin"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg> </a>
                    </div>
                </div>
                <div class="flex flex-wrap lg:flex-nowrap items-center justify-center p-5">
                    <div class="w-full lg:w-1/2 mb-4 lg:mb-0 mr-auto">
                        <div class="flex text-slate-500 text-xs">
                            <div class="mr-auto">Progress</div>
                            <div>20%</div>
                        </div>
                        <div class="progress h-1 mt-2">
                            <div class="progress-bar w-1/4 bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <button class="btn btn-primary py-1 px-2 mr-2">Message</button>
                    <button class="btn btn-outline-secondary py-1 px-2">Profile</button>
                </div>
            </div>
        </div>
        <!-- END: Users Layout -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevrons-left" class="lucide lucide-chevrons-left w-4 h-4" data-lucide="chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg> </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-left" class="lucide lucide-chevron-left w-4 h-4" data-lucide="chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg> </a>
                    </li>
                    <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                    <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                    <li class="page-item active"> <a class="page-link" href="#">2</a> </li>
                    <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                    <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                    <li class="page-item">
                        <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-right" class="lucide lucide-chevron-right w-4 h-4" data-lucide="chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevrons-right" class="lucide lucide-chevrons-right w-4 h-4" data-lucide="chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg> </a>
                    </li>
                </ul>
            </nav>
            <select class="w-20 form-select box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select>
        </div>
        <!-- END: Pagination -->
    </div>
@endsection
